<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use RealRashid\SweetAlert\Facades\Alert;

class PostController extends Controller
{
    public function index()
    {
        $posts = Cache::remember('posts', now()->addDays(7), function() {
            return Post::with(['category', 'user'])->orderBy('updated_at', 'desc')->get();
        });
        // $posts = Post::with(['category', 'user'])->orderBy('updated_at', 'desc')->get();
        confirmDelete('Apakah anda yakin untuk menghapus postingan ini?', 'Postingan yang dihapus akan masuk ke tempat sampah.');
        return view('dashboard-borex.posts.index', [
            'title' => 'Daftar Postingan',
        ], compact('posts'));
    }
   
    public function create()
    {
        $categories = Cache::remember('categories', now()->addDays(7), function() {
            return Category::orderBy('updated_at', 'desc')->get();
        });

        return view('dashboard-borex.posts.create', [
            'title' => 'Tambah Postingan',
        ], compact('categories'));
    }

    public function store(Request $request)
    {
        $rules = [
            'title' => ['required', Rule::unique('posts')],
            'slug' => ['required', Rule::unique('posts')],
            'body' => ['required'],
            'category_id' => ['required'],
            'user_id' => ['required'],

        ];

        $validator = Validator::make($request->all(), $rules,  [
            'category_id.required' => 'Category field is required',
        ]);

        if ($validator->fails()) {
            // dd($validator->errors());
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $validatedData = $validator->validated();
        $post = Post::create($validatedData);
        $postCategory = $post->category->name;
        Cache::forget('posts');
        Alert::success('Data Postingan berhasil ditambahkan!', 'Tabel berhasil diperbarui.');
        return redirect()->route('posts.index')->with('message', "Data Postingan <b>$post->title</b> dengan tipe <b>$postCategory</b> telah berhasil <b>ditambahkan!</b>");
    }

    public function show(Post $post)
    {
        return view('dashboard-borex.posts.show', [
            'title' => $post->title,
        ], compact('post'));
    }

    public function edit(Post $post)
    {
        $categories = Cache::remember('categories', now()->addDays(7), function() {
            return Category::orderBy('updated_at', 'desc')->get();
        });

        return view('dashboard-borex.posts.edit', [
            'title' => 'Edit Postingan ' . $post->title,
        ], compact('post', 'categories'));
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
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        $validatedData = $validator->validated();
        $post->update($validatedData);
        Cache::forget('posts');
        Alert::success('Data Postingan berhasil diperbarui!', 'Tabel berhasil diperbarui.');

        return redirect()->route('posts.index')->with('message', "Data Postingan <b>{$post->title}</b> telah berhasil <b>diperbarui!</b>");
    }

    public function destroy(Post $post)
    {
        $judulPostingan = $post->title;
        $post->delete();
        Cache::forget('posts');
        
        // toast('Data postingan berhasil dihapus!!','success');
        return back()->with('message', "Postingan dengan judul <b>$judulPostingan</b> berhasil dihapus!");
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
