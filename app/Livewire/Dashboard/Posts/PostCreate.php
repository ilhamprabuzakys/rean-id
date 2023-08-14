<?php

namespace App\Livewire\Dashboard\Posts;

use DOMDocument;
use App\Models\Tag;
use Livewire\Component;
use App\Models\Category;
use App\Models\FilePost;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\On;
use Livewire\WithFileUploads;

class PostCreate extends Component
{
    use WithFileUploads;
    public $title, $slug, $category_id, $file_path, $body, $status, $user_id;
    public $files = [];
    public $tags = [];

    public function mount()
    {
        $this->user_id = \auth()->user()->id;
        if (auth()->user()->role !== 'member') {
            $this->status = 'approved';
        } else {
            $this->status = 'pending';
        }
    }

    private function rules()
    {
        return [
            'title' => ['required', 'min:4', Rule::unique('posts')],
            'slug' => ['required'],
            'body' => ['required'],
            'files.*' => ['max:20000', 'mimes:jpg,jpeg,png,webp'],
        ];
    }

    protected $message = [
        'title.required' => 'Judul harus diisi',
        'title.min' => 'Judul tidak boleh terlalu pendek',
        'description.required' => 'Deskripsi harus diisi',
        'description.min' => 'Deskripsi tidak boleh terlalu pendek',
        'province.required' => 'Provinsi harus diisi',
        'city.required' => 'Kota harus diisi',
        'merge_date.required' => 'Tanggal harus diisi',
        'contact_email.required' => 'Kontak Email harus diisi',
        'organizer.required' => 'Penyelenggara harus diisi',
        'location.required' => 'Lokasi harus diisi',
        'files.*.max' => 'Ukuran file terlalu besar, maksimal hanya 20MB',
        'files.*.mimes' => 'Format file harus gambar',
    ];

    public function render()
    {
        $categories = Category::oldest('name')->get();
        $tags = Tag::oldest('name')->get();
        $statuses = collect([
            (object) ['key' => 'pending', 'label' => 'Pending'],
            (object) ['key' => 'approved', 'label' => 'Approved'],
            (object) ['key' => 'rejected', 'label' => 'Rejected'],
        ]);
        return view('livewire.dashboard.posts.post-create', compact('categories', 'tags', 'statuses'));
    }

    public function store()
    {
        try {
            $this->validate($this->rules(), $this->message);

            $this->parseDateRange();
            $this->processDescriptionImages();

            // Simpan data ke variabel
            $post = Post::create($this->all());

            // Simpan files
            $this->storeFiles($post);  // Mengirim id data ke fungsi storeFiles
            $this->resetInput();
            $this->dispatch('stored');
            $this->dispatch('swal:modal', [
                'icon' => 'success',
                'title' => 'Berhasil dibuat',
                'text' => 'Berhasil menambahkan data ' . $post->category->name,
            ]);
        } catch (ValidationException $e) {
            $this->dispatch('swal:modal', [
                'icon' => 'error',
                'title' => 'Terjadi Kesalahan',
                'text' => 'Ada beberapa kesalahan pada input Anda',
            ]);

            // Mengirim error bag ke komponen Livewire
            $this->setErrorBag($e->validator->getMessageBag());
        }
    }

    private function storeFiles($post)
    {
        // if ($this->files) {
        //     $objName = Str::slug($post->title); // Menggunakan slug agar aman untuk nama file

        //     $timestamp = now()->format('H:i_d-m-Y');
        //     $extension = $this->file_path->getClientOriginalExtension(); // Mendapatkan ekstensi file

        //     // Membuat format nama file
        //     $filename = "{$post->id}_{$objName}_{$timestamp}.{$extension}";

        //     // Menyimpan file dengan nama yang telah diformat
        //     $path = $this->file_path->storeAs('posts/cover', $filename);

        //     $storedPath = "storage/" . $path;

        //     FilePost::create([
        //         'file_path' => $storedPath,
        //         'post_id' => $post->id
        //     ]);
        // }
        if ($this->files) {
            $objName = Str::slug($post->title); // Menggunakan slug agar aman untuk nama file

            foreach ($this->files as $key => $file) {
                $timestamp = now()->format('H:i_d-m-Y');
                $extension = $file->getClientOriginalExtension(); // Mendapatkan ekstensi file

                // Membuat format nama file
                $filename = "{$post->id}_{$objName}_file-{$key}_{$timestamp}.{$extension}";

                // Menyimpan file dengan nama yang telah diformat
                $path = $file->storeAs('posts/cover', $filename);

                $storedPath = "storage/" . $path;

                FilePost::create([
                    'file_path' => $storedPath,
                    'post_id' => $post->id
                ]);
            }
        }
    }

    private function processDescriptionImages()
    {
        $content = $this->body;
        $dom = new DOMDocument();
        $dom->loadHTML($content, 9);
        $images = $dom->getElementsByTagName('img');

        foreach ($images as $key => $img) {
            $data = \base64_decode(explode(',', explode(';', $img->getAttribute('src'))[1])[1]);
            $image_name = "/storage/posts/detail/" . time() . $key . '.png';
            \file_put_contents(\public_path() . $image_name, $data);
            $img->removeAttribute('src');
            $img->setAttribute('src', $image_name);
        }

        $this->body = $dom->saveHTML();
    }
}
