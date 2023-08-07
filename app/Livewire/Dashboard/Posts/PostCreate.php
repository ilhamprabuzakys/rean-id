<?php

namespace App\Livewire\Dashboard\Posts;

use Carbon\Carbon;
use App\Models\Tag;
use App\Models\Post;
use Livewire\Component;
use App\Models\Category;
use App\Models\MediaPost;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Livewire\WithFileUploads;

class PostCreate extends Component
{
    use WithFileUploads;
    
    public $title, $slug, $category_id, $file_path, $body;
    public $tags = [];

    public function render()
    {
        $categories = Category::oldest('name')->get();
        $tags = Tag::oldest('name')->get();
        return view('livewire.dashboard.posts.post-create', compact('categories', 'tags'));
    }

    public function store()
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

        $data = [
            'title' => $this->title,
            'slug' => $this->slug,
            'body' => $this->body,
            'file_path' => $this->file_path,
            'category_id' => $this->category_id,
            'user_id' => auth()->user()->id,
        ];

        $validator = Validator::make($data, $rules, $customMessage);

        if ($validator->fails()) {
            // dd($validator->errors());
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $validatedData = $validator->validated();
        $authId = auth()->user()->id;
        // Validasi File Upload
        $media = '';
        $media_file_path = '';
        if ($this->file_path) {
            // $validatedData['file_path'] = $request->file('file_path')->store('posts-file');
            $file = $this->file_path;
            $extension = $file->getClientOriginalExtension();
            $originalName = $file->getClientOriginalName();
            $timestamp = Carbon::now()->format('H:i:s_l_Y');

            $newFileName = $timestamp . '_' . $originalName;
            $validatedData['file_path'] = $file->storeAs('posts-file', $newFileName);
        }
        // dd($validatedData['file_path']);
        $validatedData['date'] = date('Y-m-d'); // Mengatur tanggal saat ini;
        $validatedData['title'] = Str::of($this->title)->title();
        if (auth()->user()->role != 'member') {
            $validatedData['status'] = 'approved';
        }
        $post = Post::create($validatedData);
        if ($this->tags) {
            // Ambil input tags dari user
            $inputTags = $this->tags;
        
            // Inisialisasi array untuk menampung ID tags
            $tagIds = [];
        
            foreach ($inputTags as $tagName) {
                // Cek apakah tag sudah ada atau belum
                $tag = Tag::firstWhere('name', $tagName);
        
                if (!$tag) {
                    // Jika tag belum ada, buat tag baru
                    $tag = Tag::create(['name' => $tagName]);
                }
        
                // Tambahkan ID tag ke dalam array
                $tagIds[] = $tag->id;
            }
        
            // Lakukan proses sync dengan ID tags
            $post->tags()->sync($tagIds);
        }
        $post->save();
        $post_title = $post->title;
        $post_category = $post->category->name;
        $post_id = $post->id;
        // Simpan link file ke MediaPost
        $mediaPost = new MediaPost();
        $mediaPost->post_id = $post->id;
        $mediaPost->file_path = $media_file_path; // Ganti dengan path file yang sesuai
        $mediaPost->user_id = $authId; // Ganti dengan path file yang sesuai
        $mediaPost->save();
        // Alert::success('Data Postingan berhasil ditambahkan!', 'Tabel berhasil diperbarui.');
        // Insert Media
        // dd($file_path, auth()->user()->id, $post->id);

        $this->emit("storePost", "Post $post_title berhasil ditambahkan");
        $this->emit('alertSuccess', 'Data berhasil ditambahkan');
        $this->resetInput();
    }

    public function resetInput(){
        $this->name = null;
    }
}
