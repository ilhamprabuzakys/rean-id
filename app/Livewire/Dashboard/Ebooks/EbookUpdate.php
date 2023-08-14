<?php

namespace App\Livewire\Dashboard\Ebooks;

use App\Models\Ebook;
use DOMDocument;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithFileUploads;

class EbookUpdate extends Component
{
    use WithFileUploads;

    public $ebook;
    public $title, $description, $pages, $author, $published_at, $body, $user_id, $file_path;
    public $files = [];
    public $existingFiles = [];
    public $filePathOrName = '';

    public function mount($user, $ebook)
    {
        $this->user_id = $user;
        $this->ebook = $ebook;
        $this->title = $ebook->title;
        $this->description = $ebook->description;
        $this->pages = $ebook->pages;
        $this->author = $ebook->author;
        $this->published_at = $ebook->published_at;
        $this->body = $ebook->body;
        $this->user_id = $ebook->user_id;
        $this->file_path = $ebook->file_path;
                // Ambil semua file terkait dengan data ini
        $this->existingFiles = $ebook->files->map(function ($file) {
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
    }

    public function rules()
    {
        return [
            'title' => ['required', 'min:4', 'max:50', Rule::unique('ebooks')->ignore($this->ebook->id)],
            'description' => ['required', 'min:4', 'max:100'],
            'pages' => ['required'],
            'author' => ['required'],
            'published_at' => ['required'],
            'file_path' => ['max:20000'],
            'body' => ['required', 'min:4'],
            'files.*' => ['max:20000', 'mimes:jpg,jpeg,png,webp'],
        ];
    }

    protected $messages = [
        'title.required' => 'Judul itu harus diisi',
        'title.min' => 'Judul terlalu pendek',
        'title.max' => 'Judul terlalu panjang, maksimal hanya 50 karakter',
        'title.unique' => 'Ebook dengan judul ini sudah ada',
        'description.required' => 'Deskripsi itu harus diisi',
        'description.min' => 'Deskripsi terlalu pendek',
        'description.max' => 'Deskripsi terlalu panjang, maksimal hanya 20 karakter',
        'pages.required' => 'Pages itu harus diisi',
        'author.required' => 'Author itu harus diisi',
        'cover_path.max' => 'Ukuran file terlalu besar, maksimal hanya 6MB',
        'file_path.max' => 'Ukuran file terlalu besar, maksimal hanya 20MB',
        'file_path.mimes' => 'Format file harus PDF',
        'files.*.max' => 'Ukuran file terlalu besar, maksimal hanya 20MB',
        'files.*.mimes' => 'Format file harus gambar',
        'body.required' => 'Body itu harus diisi',
        'body.min' => 'Konten body terlalu pendek',
    ];

    public function render()
    {
        return view('livewire.dashboard.ebooks.ebook-update');
    }

    public function update()
    {
        try {
            $this->validate($this->rules(), $this->messages);

            $this->parseDateRange();
            $this->storeFiles();
            $this->processDescriptionImages();

            $this->event->update($this->all());

            $this->dispatch('swal:modal', [
                'icon' => 'success',
                'title' => 'Update Berhasil',
                'text' => 'Berhasil memperbarui data Event',
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

    private function processFilePath()
    {
        $validatedData = $this->validate();

        if ($this->ebook->file_path) {
            if ($this->file_path)  {
                if ($this->file_path != $this->ebook->file_path) {
                    $path = $this->file_path->store('file_path');
                    $validatedData['file_path'] = "storage/" . $path;

                    if ($this->ebook->file_path) {
                        $oldFilePath = str_replace('storage/', '', $this->ebook->file_path);
                        Storage::delete($oldFilePath);
                    }
                } else {
                    $validatedData['file_path'] = $this->ebook->file_path;
                }
            } else {
                $validatedData['file_path'] = $this->ebook->file_path;
            }
        } elseif($this->file_path) {
            $path = $this->file_path->store('file_path');
            $validatedData['file_path'] = "storage/" . $path;
        } else {
            unset($validatedData['file_path']);
        }

         if ($this->ebook->cover_path) {
            if ($this->cover_path)  {
                if ($this->cover_path != $this->ebook->cover_path) {
                    $path = $this->cover_path->store('cover_path');
                    $validatedData['cover_path'] = "storage/" . $path;

                    if ($this->ebook->cover_path) {
                        $oldFilePath = str_replace('storage/', '', $this->ebook->cover_path);
                        Storage::delete($oldFilePath);
                    }
                } else {
                    $validatedData['cover_path'] = $this->ebook->cover_path;
                }
            } else {
                $validatedData['cover_path'] = $this->ebook->cover_path;
            }
        } elseif($this->cover_path) {
            $path = $this->cover_path->store('cover_path');
            $validatedData['cover_path'] = "storage/" . $path;
        } else {
            unset($validatedData['cover_path']);
        }

        return $validatedData;
    }

    private function deleteRemovedImages()
    {
        $currentDom = new DOMDocument();
        $currentDom->loadHTML($this->ebook->body, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
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

    private function processSummernoteImages()
    {
        $content = $this->body;
        $dom = new DOMDocument();
        $dom->loadHTML($content, 9);
        $images = $dom->getElementsByTagName('img');

        foreach ($images as $key => $img) {
            $src = $img->getAttribute('src');
            if (strpos($src, 'data:image/') === 0) {
                $data = \base64_decode(explode(',', explode(';', $src)[1])[1]);
                $image_name = "summernotes/" . time() . $key . '.png';
                $path = Storage::disk('public')->put($image_name, $data);

                if (!$path) {
                    throw new \Exception("Failed to save image to storage");
                }

                $img->removeAttribute('src');
                $img->setAttribute('src', "/storage/" . $image_name);
            }
        }

        return $dom->saveHTML();
    }

    public function resetInput()
    {
        $this->title = null;
        $this->description = null;
        $this->pages = null;
        $this->author = null;
        $this->published_at = null;
        $this->body = null;
    }


}
