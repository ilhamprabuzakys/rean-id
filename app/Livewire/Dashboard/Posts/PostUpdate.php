<?php

namespace App\Livewire\Dashboard\Posts;

use App\Models\Category;
use App\Models\FilePost;
use App\Models\Post;
use App\Models\Tag;
use DOMDocument;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\On;
use Livewire\WithFileUploads;

class PostUpdate extends Component
{
    use WithFileUploads;
    public $post, $title, $slug, $category_id, $file_path, $body, $status, $user_id;
    public $files = [];
    public $tags = [];
    public $existingFiles = [];
    public $filePathOrName = '';
    public $existingMediaFile;
    public $mediaFileID;

    public function mount($post)
    {
        $this->post = $post;
        $this->slug = $post->slug;
        $this->title = $post->title;
        $this->body = $post->body;
        $this->status = $post->status;
        $this->category_id = $post->category_id;
        $this->user_id = $post->user_id;
        $this->tags = $post->tags->pluck('name')->toArray();
        $allowedExtensions = ['mp3', 'mp4', 'mkv'];

        $this->existingFiles = $post->files
            ->filter(function ($file) use ($allowedExtensions) {
                // Dapatkan ekstensi file
                $fileExtension = pathinfo($file->file_path, PATHINFO_EXTENSION);
                // Return true jika bukan file media, sehingga file akan tetap di koleksi
                return !in_array($fileExtension, $allowedExtensions);
            })
            ->map(function ($file) {
                return [
                    'source' => asset($file->file_path),
                    'options' => [
                        'type' => 'limbo',
                        'file' => [
                            'name' => basename($file->file_path),
                            'size' => filesize(public_path($file->file_path)),
                            'type' => mime_content_type(public_path($file->file_path))
                        ],
                        'metadata' => [
                            'id' => $file->id,
                        ],
                    ],
                ];
            })->toArray();
            
        if (in_array($post->category_id, [3, 6, 7])) {
            $this->existingMediaFile = $post->files
                ->filter(function ($file) use ($allowedExtensions) {
                    $extension = pathinfo($file->file_path, PATHINFO_EXTENSION);
                    return in_array($extension, $allowedExtensions);
                })
                ->map(function ($file) {
                    $filePath = public_path($file->file_path);
                    $fileSizeBytes = filesize($filePath);
                    if ($fileSizeBytes < 1024 * 1024) { // Jika kurang dari 1MB
                        $fileSize = round($fileSizeBytes / 1024, 2) . "KB";
                    } else {
                        $fileSize = round($fileSizeBytes / (1024 * 1024), 2) . "MB";
                    }
                    return (object) [
                        'source_path' => asset($file->file_path),
                        'extension' => pathinfo($file->file_path, PATHINFO_EXTENSION),
                        'file_name' => basename($file->file_path),
                        'file_size' => $fileSize,
                        'mime_type' => mime_content_type($filePath),
                        'id' => $file->id
                    ];
                })
                ->first();
        }
    }

    private function rules()
    {
        return [
            'title' => ['required', 'min:4', Rule::unique('posts')->ignore($this->post->id)],
            'slug' => ['required'],
            'body' => ['required'],
            'files.*' => ['max:20000', 'mimes:jpg,jpeg,png,webp'],
        ];
    }

    protected $messages = [
        'title.required' => 'Judul harus diisi',
        'title.min' => 'Judul tidak boleh terlalu pendek',
        'title.unique' => 'Data postingan dengan judul ini sudah ada',
        'slug.required' => 'Slug harus diisi',
        'body.required' => 'Body harus diisi',
        'files.*.max' => 'Ukuran file terlalu besar, maksimal hanya 20MB',
        'files.*.mimes' => 'Format file harus gambar',
    ];

    public function resetInput()
    {
        $this->title = null;
        $this->slug = null;
        $this->body = null;
        $this->files = null;
    }

    public function render()
    {
        $categories = Category::oldest('name')->get();
        $tagsItem = Tag::oldest('name')->get();
        $statuses = collect([
            (object) ['key' => 'pending', 'label' => 'Pending'],
            (object) ['key' => 'approved', 'label' => 'Approved'],
            (object) ['key' => 'rejected', 'label' => 'Rejected'],
        ]);
        return view('livewire.dashboard.posts.post-update', compact('categories', 'tagsItem', 'statuses'));
    }

    public function update()
    {
        try {
            $this->title = Str::of($this->title)->title();
            $rules = $this->rules();
            $mediaExtensions = ['mp3', 'mp4', 'mkv'];
            $hasMediaFile = false;

            // Cek apakah ada file dengan ekstensi media di $post->files
            foreach ($this->post->files as $file) {
                $fileExtension = pathinfo($file->file_path, PATHINFO_EXTENSION);
                if (in_array($fileExtension, $mediaExtensions)) {
                    $hasMediaFile = true;
                    break;
                }
            }
            // dd(!$hasMediaFile);
            if (in_array($this->category_id, [3, 6, 7]) && !$hasMediaFile) {
                $rules['file_path'] = 'required|max:20000|mimes:mp3,mp4,mkv';
                $this->messages['file_path.required'] = 'Media file harus disertakan';
                $this->messages['file_path.mimes'] = 'Media file harus berformat media: mp3,mp4,mkv';
                $this->messages['file_path.max'] = 'Ukuran media file tidak boleh lebih besar dari 20MB';
            }

            $this->validate($rules, $this->messages);
            $this->deleteRemovedImages();
            $this->processDescriptionImages();

            // Simpan data ke variabel
            $this->storeTags();
            // Simpan files
            $this->storeFiles();  // Mengirim id data ke fungsi storeFiles
            // Simpan file media jika ada
            // Jika category_id di luar dari 3, 6, 7
            if (!in_array($this->category_id, [3, 6, 7])) {
                foreach ($this->post->files as $file) {
                    $fileExtension = pathinfo($file->file_path, PATHINFO_EXTENSION);
                    $mediaExtensions = ['mp3', 'mp4', 'mkv']; // contoh ekstensi file media

                    // Jika file adalah file media
                    if (in_array($fileExtension, $mediaExtensions)) {
                        // Hapus dari penyimpanan
                        Storage::delete(str_replace('storage/', '', $file->file_path));
                        // Hapus dari database
                        $file->delete();
                    }
                }
            } else {
                // Logika penyimpanan file media Anda sebelumnya
                if ($this->file_path !== null) {
                    $this->storeMediaFile($this->post);
                }
            }

            $this->post->update($this->all());

            $this->resetInput();
            $this->dispatch('swal:modal', [
                'icon' => 'success',
                'title' => 'Berhasil update',
                'text' => 'Berhasil memperbarui data ' . $this->post->title,
            ]);

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

    private function storeMediaFile($post)
    {
        $objName = Str::slug($post->title); // Menggunakan slug agar aman untuk nama file
        $directoryPath = public_path('storage/posts/media/');
        if (!file_exists($directoryPath)) {
            mkdir($directoryPath, 0777, true);
        }
        if ($this->file_path) {
            $timestamp = now()->format('H:i_d-m-Y');
            $extension = $this->file_path->getClientOriginalExtension();
            // Membuat format nama file
            $filename = "{$post->id}_{$objName}_{$timestamp}.{$extension}";

            // Menyimpan file dengan nama yang telah diformat
            $path = $this->file_path->storeAs('posts/media', $filename);

            $storedPath = "storage/" . $path;

            FilePost::create([
                'file_path' => $storedPath,
                'post_id' => $post->id
            ]);
        }
    }


    private function storeTags()
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

                // Tambahkan ID tag ke dalam array
                $tagIds[] = $tag->id;
            }

            // Lakukan proses sync dengan ID tags
            $this->post->tags()->sync($tagIds);
        }
        $this->post->save();
    }

    public function removeMediaFile($id)
    {
        $this->mediaFileID = $id;
        $this->dispatch('swal:postmedia', [
            'title' => 'Media',
        ]);
    }

    #[On('mediaDeleteConfirmed')]
    public function seriouslyMediaRemoveFile()
    {
        // Coba temukan file berdasarkan path di database
        $file = FilePost::find($this->mediaFileID);

        if ($file) {
            // Ini adalah file yang sudah ada, jadi kita hapus dari database dan penyimpanan
            Storage::delete(str_replace('storage/', '', $file->file_path));
            $file->delete();
            $this->existingMediaFile = null; // Setelah penghapusan berhasil, set properti ini ke null
        }
    }

    public function removeFile($filePathOrName)
    {
        $this->filePathOrName = $filePathOrName;
        $this->dispatch('swal:filepond', [
            'title' => 'File',
        ]);
    }

    #[On('filepondDeleteConfirmed')]
    public function seriouslyRemoveFile()
    {
        // Coba temukan file berdasarkan path di database
        $fileEvent = FilePost::where('file_path', 'like', '%' . $this->filePathOrName . '%')->first();

        if ($fileEvent) {
            // Ini adalah file yang sudah ada, jadi kita hapus dari database dan penyimpanan
            Storage::delete(str_replace('storage/', '', $fileEvent->file_path));
            $fileEvent->delete();
        } else {
            // Ini mungkin file baru yang di-upload, jadi kita hanya hapus dari penyimpanan
            Storage::delete('posts/cover/' . $this->filePathOrName);
        }
    }

    private function storeFiles()
    {
        if ($this->files) {
            $objName = Str::slug($this->title); // Menggunakan slug agar aman untuk nama file

            foreach ($this->files as $index => $file) {
                $timestamp = now()->format('H:i_d-m-Y');
                $extension = $file->getClientOriginalExtension(); // Mendapatkan ekstensi file

                // Membuat format nama file
                $filename = "{$this->post->id}_{$objName}_file-" . ($index + 1) . "_{$timestamp}.{$extension}";

                // Menyimpan file dengan nama yang telah diformat
                $path = $file->storeAs('posts/cover', $filename);

                $storedPath = "storage/" . $path;

                FilePost::create([
                    'file_path' => $storedPath,
                    'post_id' => $this->post->id
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
                $timestamp = now()->format('H:i_d-m-Y');
                $title = Str::slug($this->title);
                $key++;
                $image_name = "/storage/posts/detail/{$title}_detail-{$key}_{$timestamp}.png";
                \file_put_contents(\public_path() . $image_name, $data);
                $img->removeAttribute('src');
                $img->setAttribute('src', $image_name);
            }
        }
        $this->body = $dom->saveHTML();
    }

    private function deleteRemovedImages()
    {
        $currentDom = new DOMDocument();
        $currentDom->loadHTML($this->post->body, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $currentImages = $currentDom->getElementsByTagName('img');
        $currentImageSources = [];

        foreach ($currentImages as $img) {
            $currentImageSources[] = $img->getAttribute('src');
        }

        $content = $this->body;
        $dom = new DOMDocument();
        $dom->loadHTML($content, 9);
        $images = $dom->getElementsByTagName('img');

        $updatedImageSources = [];
        foreach ($images as $img) {
            $updatedImageSources[] = $img->getAttribute('src');
        }

        $imagesToDelete = array_diff($currentImageSources, $updatedImageSources);

        foreach ($imagesToDelete as $src) {
            $pathToDelete = str_replace('/storage/', '', $src);
            Storage::disk('public')->delete($pathToDelete);
        }
    }
}
