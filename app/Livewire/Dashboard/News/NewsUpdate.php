<?php

namespace App\Livewire\Dashboard\News;

use App\Models\FileNews;
use DOMDocument;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\Attributes\On;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class NewsUpdate extends Component
{
    use WithFileUploads;

    public $user_id;
    public $title, $slug, $about, $file_path, $body;
    public $existingFile;
    public $news;
    public $filePathOrName = '';

    public function mount($news, $user)
    {
        $this->news = $news;
        $this->title = $news->title;
        $this->about = $news->about;
        $this->body = $news->body;
        $this->user_id = $user;
        if ($news->file && $news->file->file_path !== null) {
            $this->existingFile = [
                [
                    'source' => asset($news->file->file_path),
                    'options' => [
                        'type' => 'limbo',
                        'file' => [
                            'name' => basename($news->file->file_path),
                            'size' => filesize(public_path($news->file->file_path)),
                            'type' => mime_content_type(public_path($news->file->file_path))
                        ],
                        // Jika Anda memiliki id atau metadata lain yang Anda ingin asosiasikan dengan file ini, Anda bisa menambahkannya di sini
                    ],
                ]
            ];
        }
    }

    public function rules()
    {
        return [
            'title' => ['required', 'min:4', 'max:50', Rule::unique('news')->ignore($this->news->id)],
            'about' => ['required', 'min:4', 'max:20'],
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
        // dd($this->all());
        try {
            $this->slug = Str::slug($this->title);
            $this->title = Str::of($this->title)->title();

            $this->validate($this->rules(), $this->messages);
            $this->storeFiles();
            $this->deleteRemovedImages();
            $this->processDescriptionImages();

            $this->news->update($this->all());
            $this->dispatch('swal:modal', [
                'icon' => 'success',
                'title' => 'Update Berhasil',
                'text' => 'Berhasil memperbarui data Berita',
            ]);
            return redirect()->route('news.index');
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

    public function removeFile($filePathOrName)
    {
        $this->filePathOrName = $filePathOrName;
        $this->dispatch('swal:filepond', [
            'title' => 'File',
        ]);
    }

    private function storeFiles()
    {
        if ($this->file_path) {
            $objName = Str::slug($this->news->title); // Menggunakan slug agar aman untuk nama file
        
            $timestamp = now()->format('H:i_d-m-Y');
            $extension = $this->file_path->getClientOriginalExtension(); // Mendapatkan ekstensi file

            // Membuat format nama file
            $filename = "{$this->news->id}_{$objName}_{$timestamp}.{$extension}";

            // Menyimpan file dengan nama yang telah diformat
            $path = $this->file_path->storeAs('news/cover', $filename);

            $storedPath = "storage/" . $path;

            FileNews::create([
                'file_path' => $storedPath,
                'news_id' => $this->news->id
            ]);
        }
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

    private function processDescriptionImages()
    {
        $content = $this->body;
        $dom = new DOMDocument();
        $dom->loadHTML($content, 9);
        $images = $dom->getElementsByTagName('img');

        $directoryPath = public_path('storage/news/detail/');

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
                $image_name = "/storage/news/detail/{$title}_detail-{$key}_{$timestamp}.png";
                \file_put_contents(\public_path() . $image_name, $data);
                $img->removeAttribute('src');
                $img->setAttribute('src', $image_name);
            }
        }
        $this->body = $dom->saveHTML();
    }

    #[On('filepondDeleteConfirmed')]
    public function seriouslyRemoveFile()
    {
        $targetFile = FileNews::where('file_path', 'like', '%' . $this->filePathOrName . '%')->first();
        if ($targetFile) {
            // dd($targetFile);
            // Ini adalah file yang sudah ada, jadi kita hapus dari database dan penyimpanan
            Storage::delete(str_replace('storage/', '', $targetFile->file_path));
            $targetFile->delete();
        }
    }
}
