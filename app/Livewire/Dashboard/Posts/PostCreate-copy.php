<?php

namespace App\Livewire\Dashboard\Posts;

use DOMDocument;
use App\Models\Tag;
use Livewire\Component;
use App\Models\Category;
use App\Models\FilePost;
use App\Models\FilePostMedia;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\On;
use Livewire\WithFileUploads;

class PostCreate extends Component
{
    use WithFileUploads;
    public $title, $slug, $category_id, $category_type_id, $file_path, $body, $status, $user_id;
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
            'body' => ['required'],
        ];
    }

    protected $messages = [
        'title.required' => 'Judul harus diisi',
        'title.min' => 'Judul tidak boleh terlalu pendek',
        'title.unique' => 'Data postingan dengan judul ini sudah ada',
        'body.required' => 'Body harus diisi',
    ];

    public function resetInput()
    {
        $this->title = null;
        $this->body = null;
        $this->files = null;
        $this->file_path = null;
    }

    public function render()
    {
        $categories = Category::with('type')->oldest('name')->get();
        $tagsItem = Tag::oldest('name')->get();
        $statuses = collect([
            (object) ['key' => 'pending', 'label' => 'Pending'],
            (object) ['key' => 'approved', 'label' => 'Approved'],
            (object) ['key' => 'rejected', 'label' => 'Rejected'],
        ]);
        return view('livewire.dashboard.posts.post-create', compact('categories', 'tagsItem', 'statuses'));
    }

    public function store($action = null)
    {
        if ($this->title == null && $this->category_id == null && $this->body == null)
        {
            $this->dispatch('swal:modal', [
                'icon' => 'error',
                'title' => 'Terjadi Kesalahan',
                'text' => 'Anda belum mengisi apapun, harap isi form sebelum submit',
            ]);
            return;
        }

        try {
            $rules = $this->rules();
            if ($this->category_type_id == 2) {
                $rules['file_path'] = 'required|max:5000|mimes:mp3';
                $this->messages['file_path.required'] = 'Media Audio file harus disertakan';
                $this->messages['file_path.mimes'] = 'Media Audio file harus berformat media: MP3';
                $this->messages['file_path.max'] = 'Ukuran Media Audio file tidak boleh lebih besar dari 5MB';
            }

            if ($this->category_type_id == 3) {
                $rules['file_path'] = 'required|max:10000|mimes:mp4';
                $this->messages['file_path.required'] = 'Media Video file harus disertakan';
                $this->messages['file_path.mimes'] = 'Media Video file harus berformat media: MP4';
                $this->messages['file_path.max'] = 'Ukuran Media Video file tidak boleh lebih besar dari 10MB';
            }
            
            if ($this->category_type_id == 1 || $this->category_type_id == 5) {
                $rules['files.*'] = ['max:3000', 'mimes:jpg,jpeg,png'];
                $this->messages['files.*.mimes'] = 'Format file anda tidak valid, harus dalam: JPG, JPEG, PNG';
                $this->messages['files.*.max'] = 'Ukuran file terlalu besar, maksimal hanya 3MB';
            } 
            if($this->category_type_id != 1 && $this->category_type_id != 5) {
                // dd('gboleh kosong', $this->category_type_id);
                return;
            }

            // if ($this->files == null) {
            //     $this->addError('files', 'Cover image harus disertakan.');
            //     $this->dispatch('swal:modal', [
            //         'icon' => 'error',
            //         'title' => 'Terjadi Kesalahan',
            //         'text' => 'Ada beberapa kesalahan pada input Anda' . \getErrorsString($this->getErrorBag()),
            //     ]);
            //     return;
            // }

            $this->validate($rules, $this->messages);
            // dd($rules, $this->category_type_id, $this->files, $this->getErrorBag());


            $this->slug = Str::slug($this->title);
            $this->title = Str::of($this->title)->title();
            $this->processDescriptionImages();

            // Simpan data ke variabel
            $post = Post::create($this->all());
            $this->storeTags($post);
            // Simpan files
            $this->storeFiles($post);
            // Simpan file media jika ada
            if ($this->file_path !== null && in_array($this->category_id, [3, 6, 7])) {
                $this->storeMediaFile($post);
            }
            $this->resetInput();
            $this->dispatch('stored');
            $this->dispatch('swal:modal', [
                'icon' => 'success',
                'title' => 'Berhasil dibuat',
                'text' => 'Berhasil menambahkan data ' . $post->category->name,
            ]);
            if ($action == 'save-and-continue') {
                return; // Tidak melakukan redirect, hanya menampilkan pesan
            }
            return redirect()->route('posts.index');
        } catch (ValidationException $e) {
            $this->dispatch('swal:modal', [
                'icon' => 'error',
                'title' => 'Terjadi Kesalahan',
                'text' => 'Ada beberapa kesalahan pada input Anda' . \getErrorsString($e),
            ]);

            // Mengirim error bag ke komponen Livewire
            $this->setErrorBag($e->validator->getMessageBag());
        }
    }

    private function storeTags($post)
    {
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

                $tag->disableLogging();
                // Tambahkan ID tag ke dalam array
                $tagIds[] = $tag->id;
            }

            // Lakukan proses sync dengan ID tags
            $post->tags()->sync($tagIds);
        }
        $post->save();
        $post->disableLogging();
    }

    private function storeMediaFile($post) 
    {
        $objName = Str::slug($post->title); // Menggunakan slug agar aman untuk nama file
        $directoryPath = public_path('storage/posts/media/');
        if (!file_exists($directoryPath)) {
            mkdir($directoryPath, 0777, true);
        }
        // dd($this->file_path);
        if ($this->file_path)
        {
            $timestamp = now()->format('H:i_d-m-Y');
            $extension = $this->file_path->getClientOriginalExtension();
            // Membuat format nama file
            $filename = "{$post->id}_{$objName}_{$timestamp}.{$extension}";

            // Menyimpan file dengan nama yang telah diformat
            $path = $this->file_path->storeAs('posts/media', $filename);

            $storedPath = "storage/" . $path;

            FilePostMedia::create([
                'file_path' => $storedPath,
                'post_id' => $post->id,
                'file_extension' => $extension
            ]);
        }
    }

    private function storeFiles($post)
    {
        $directoryPath = public_path('storage/posts/cover/');
        if (!file_exists($directoryPath)) {
            mkdir($directoryPath, 0777, true);
        }
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

        $directoryPath = public_path('storage/posts/detail/');

        if (!file_exists($directoryPath)) {
            mkdir($directoryPath, 0777, true);
        }

        foreach ($images as $key => $img) {
            $src = $img->getAttribute('src');
            // Cek apakah ini adalah data base64
            if (strpos($src, 'data:image/') === 0) {
                $data = \base64_decode(explode(',', explode(';', $src)[1])[1]);
                $title = Str::slug($this->title);
                $timestamp = now()->format('H:i_d-m-Y');
                $key++;
                $image_name = "/storage/posts/detail/{$title}_detail-{$key}_{$timestamp}.png";
                \file_put_contents(\public_path() . $image_name, $data);
                $img->removeAttribute('src');
                $img->setAttribute('src', $image_name);
            }
        }
        $this->body = $dom->saveHTML();
    }
}
