<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use App\Models\MediaPost;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Cache;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class PostController extends Controller
{
    public function index()
    {
        $posts = cache()->remember('posts', now()->addDays(7), function () {
            return Post::with(['category', 'user'])->orderBy('updated_at', 'desc')->get();
        });

        $categories = cache()->remember('categories', now()->addDays(7), function () {
            return Category::orderBy('updated_at', 'desc')->get();
        });

        $tags = cache()->remember('tags', now()->addDays(7), function () {
            return Tag::orderBy('updated_at', 'desc')->get();
        });

        $statuses = collect([
            (object) ['key' => 'pending', 'label' => 'Pending'],
            (object) ['key' => 'approved', 'label' => 'Approved'],
            (object) ['key' => 'rejected', 'label' => 'Rejected'],
        ]);


        // $posts = Post::with(['category', 'user'])->orderBy('updated_at', 'desc')->get();
        confirmDelete('Apakah anda yakin untuk menghapus postingan ini?', 'Postingan yang dihapus akan masuk ke tempat sampah.');
        return view('dashboard.posts.index', [
            'title' => 'Daftar Postingan',
        ], compact('posts', 'categories', 'tags', 'statuses'));
    }

    public function create()
    {
        $categories = cache()->remember('categories', now()->addDays(7), function () {
            return Category::orderBy('name', 'asc')->get();
        });

        $tags = cache()->remember('tags', now()->addDays(7), function () {
            return Tag::orderBy('updated_at', 'desc')->get();
        });

        return view('dashboard.posts.create', [
            'title' => 'Tambah Postingan',
        ], compact('categories', 'tags'));
    }

    public function store(Request $request)
    {
        $rules = [
            'title' => ['required', Rule::unique('posts')],
            'slug' => ['required', Rule::unique('posts')],
            'body' => ['required'],
            'file_path' => ['file', 'mimes:mp4,mkv,mp3,jpg,jpeg,png,svg', 'max:102400'],
            'category_id' => ['required'],
            'user_id' => ['required'],
        ];

        $customMessage = [
            'category_id.required' => 'Category field is required',
            'file_path.mimes' => 'The file must be a valid audio or video format (MP3, MP4, MKV).',
        ];

        $validator = Validator::make($request->all(), $rules, $customMessage);

        if ($validator->fails()) {
            // dd($validator->errors());
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $validatedData = $validator->validated();
        $authId = auth()->user()->id;
        $file_path = '';
        // Validasi File Upload
        $media = '';
        if ($request->file('file_path')) {
            // $validatedData['file_path'] = $request->file('file_path')->store('posts-file');

            $file = $request->file('file_path');
            $extension = $file->getClientOriginalExtension();
            $originalName = $file->getClientOriginalName();
            $timestamp = Carbon::now()->format('H:i:s_l_Y');

            $newFileName = $timestamp . '_' . $originalName;
            $validatedData['file_path'] = $file->storeAs('posts-file', $newFileName);
            $file_path = $validatedData['file_path'];
        }
        // dd($validatedData['file_path']);
        $validatedData['date'] = date('Y-m-d'); // Mengatur tanggal saat ini;
        $validatedData['title'] = Str::of($request->input('title'))->title();
        if (auth()->user()->role != 'member') {
            $validatedData['status'] = 'approved';
        }
        $post = Post::create($validatedData);
        if ($request->has('tags')) {
            $post->tags()->sync($request->input('tags'));
            $post->save();
        }
        $postCategory = $post->category->name;
        $postId = $post->id;
        // Simpan link file ke MediaPost
        $mediaPost = new MediaPost();
        $mediaPost->post_id = $post->id;
        $mediaPost->file_path = $file_path; // Ganti dengan path file yang sesuai
        $mediaPost->user_id = $authId; // Ganti dengan path file yang sesuai
        $mediaPost->save();
        // Alert::success('Data Postingan berhasil ditambahkan!', 'Tabel berhasil diperbarui.');
        // Insert Media
        // dd($file_path, auth()->user()->id, $post->id);



        toast('Data Postingan berhasil ditambahkan!', 'success');

        return redirect()->route('posts.index')->with('message', "Data Postingan <b>$post->title</b> dengan tipe <b>$postCategory</b> telah berhasil <b>ditambahkan!</b>");
    }

    public function show(Post $post)
    {
        return view('dashboard.posts.show', [
            'title' => $post->title,
        ], compact('post'));
    }

    public function edit(Post $post)
    {
        $categories = cache()->remember('categories', now()->addDays(7), function () {
            return Category::orderBy('updated_at', 'desc')->get();
        });

        $tags = cache()->remember('tags', now()->addDays(7), function () {
            return Tag::orderBy('updated_at', 'desc')->get();
        });

        $statuses = collect([
            (object) ['key' => 'pending', 'label' => 'Pending'],
            (object) ['key' => 'approved', 'label' => 'Approved'],
            (object) ['key' => 'rejected', 'label' => 'Rejected'],
        ]);

        // dd($statuses);

        return view('dashboard.posts.edit', [
            'title' => 'Edit Postingan ' . $post->title,
            'statuses' => $statuses,
        ], compact('post', 'categories', 'tags'));
    }

    public function update(Request $request, Post $post)
    {
        $rules = [
            'title' => ['required', Rule::unique('posts')->ignore($post->id)],
            'slug' => ['required', Rule::unique('posts')->ignore($post->id)],
            'body' => ['required'],
            'category_id' => ['required'],
            'user_id' => ['required'],
        ];

        $validator = Validator::make($request->all(), $rules, [
            'category_id.required' => 'Category field is required',
        ]);

        if ($validator->fails()) {
            dd($validator->errors());
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $validatedData = $validator->validated();
        $validatedData['status'] = $request->input('status');
        $post->update($validatedData);
        if ($request->has('tags')) {
            $post->tags()->sync($request->input('tags'));
            $post->save();
        }


        // Alert::success('Data Postingan berhasil diperbarui!', 'Tabel berhasil diperbarui.');
        toast('Data postingan berhasil diperbarui!', 'success');

        return redirect()->route('posts.index')->with('message', "Data Postingan <b>{$post->title}</b> telah berhasil <b>diperbarui!</b>");
    }

    public function destroy(Post $post)
    {
        $judulPostingan = $post->title;
        $post->delete();

        // toast('Data postingan berhasil dihapus!!','success');
        return back()->with('message', "Postingan dengan judul <b>$judulPostingan</b> berhasil dihapus!");
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }

    public function approval()
    {
        $posts = cache()->remember('posts', now()->addDays(7), function () {
            return Post::with(['category', 'user'])->orderBy('updated_at', 'desc')->get();
        });

        $categories = cache()->remember('categories', now()->addDays(7), function () {
            return Category::orderBy('updated_at', 'desc')->get();
        });

        $statuses = collect([
            (object) ['key' => 'pending', 'label' => 'Pending'],
            (object) ['key' => 'approved', 'label' => 'Approved'],
            (object) ['key' => 'rejected', 'label' => 'Rejected'],
        ]);

        // $posts = Post::with(['category', 'user'])->orderBy('updated_at', 'desc')->get();
        confirmDelete('Apakah anda yakin untuk menghapus postingan ini?', 'Postingan yang dihapus akan masuk ke tempat sampah.');
        return view('dashboard.posts.approval', [
            'title' => 'Perizinan Postingan',
        ], compact('posts', 'categories', 'statuses'));
    }

    public function approvalForm(Request $request)
    {
        $rules = [
            'status' => ['required'],
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            dd($validator->errors());
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $validatedData = $validator->validated();
        // dd($validatedData);
        $post = Post::where('id', $request->input('post_id'))->first();
        $post->update($validatedData);

        // Alert::success('Data Postingan berhasil diperbarui!', 'Tabel berhasil diperbarui.');
        toast('Data postingan berhasil diperbarui!', 'success');

        return redirect()->back()->with('message', "Data Postingan <b>{$post->title}</b> telah berhasil <b>diperbarui!</b>");
    }
}
