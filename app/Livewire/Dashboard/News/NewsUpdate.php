<?php

namespace App\Livewire\Dashboard\News;

use DOMDocument;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class NewsUpdate extends Component
{
    use WithFileUploads;

    public $user_id;
    public $title, $about, $file_path, $body;
    public $news;

    public function mount($news, $user)
    {
        $this->news = $news;
        $this->title = $news->title;
        $this->about = $news->about;
        $this->body = $news->body;
        $this->user_id = $user;
    }

    public function rules()
    {
        return [
            'title' => ['required', 'min:4', 'max:50', Rule::unique('news')->ignore($this->news->id)],
            'about' => ['required', 'min:4', 'max:20'],
            'file_path' => ['max:2048'],
            'body' => ['required', 'min:4'],
        ];
    }

    protected $messages = [
        'title.required' => 'Judul itu harus diisi',
        'title.min' => 'Judul terlalu pendek',
        'title.max' => 'Judul terlalu panjang, maksimal hanya 50 karakter',
        'title.unique' => 'Berita dengan judul ini sudah ada',
        'about.required' => 'Topik itu harus diisi',
        'about.min' => 'Topik terlalu pendek',
        'about.max' => 'Topik terlalu panjang, maksimal hanya 20 karakter',
        'file_path.max' => 'Ukuran file terlalu besar, maksimal hanya 2MB',
        'body.required' => 'Body itu harus diisi',
        'body.min' => 'Konten body terlalu pendek',
    ];

    protected $validationAttributes = [
        'title' => 'Judul',
        'about' => 'Topik',
        'file_path' => 'Gambar Cover',
        'body' => 'Konten Body',
    ];

    public function render()
    {
        return view('livewire.dashboard.news.news-update');
    }

    public function update()
    {
        $validatedData = $this->processFilePath();
        $this->deleteRemovedImages();
        $validatedData['body'] = $this->processSummernoteImages();
        $validatedData['user_id'] = $this->user_id;
        try {
            $this->news->update($validatedData);
        } catch (\Throwable $th) {
            $this->dispatch('swal:modal', [
                'icon' => 'error',
                'title' => 'Error',
                'text' => 'Terjadi kesalahan saat menyimpan data',
            ]);    
        }
        $this->dispatch('swal:modal', [
            'icon' => 'success',
            'title' => 'Update Data',
            'text' => 'Data berhasil diperbarui',
        ]);
    }

    private function processFilePath()
    {
        $validatedData = $this->validate();

        if ($this->file_path) {
            $path = $this->file_path->store('file_path');
            $validatedData['file_path'] = "storage/" . $path;

            if ($this->news->file_path) {
                $oldFilePath = str_replace('storage/', '', $this->news->file_path);
                Storage::delete($oldFilePath);
            }
        } else {
            unset($validatedData['file_path']);
        }

        return $validatedData;
    }

    private function deleteRemovedImages()
    {
        $currentDom = new DOMDocument();
        $currentDom->loadHTML($this->news->body, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
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
}
