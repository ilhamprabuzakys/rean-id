<?php

namespace App\Livewire\Dashboard\News;

use App\Models\FileNews;
use DOMDocument;
use App\Models\News;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\Attributes\On;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Rule as AttributesRule;

class NewsCreate extends Component
{
    use WithFileUploads;

    public $user_id;
    public $title, $about, $file_path, $body;

    public function resetInput()
    {
        $this->title = null;
        $this->about = null;
        $this->file_path = null;
        $this->body = null;
    }

    public function mount($user)
    {
        $this->user_id = $user;
    }

    public function rules()
    {
        return [
            'title' => ['required', 'min:4', 'max:50', Rule::unique('news')],
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
        return view('livewire.dashboard.news.news-create');
    }

    public function store($action = null)
    {
        try {
            $this->validate($this->rules(), $this->messages, $this->validationAttributes);

            $this->processDescriptionImages();

            $news = News::create($this->all());
            $this->storeFile($news);
            $this->dispatch('swal:modal', [
                'icon' => 'success',
                'title' => 'Penambahan Data',
                'text' => 'Data berhasil ditambahkan',
            ]);
            $this->resetInput();
            $this->dispatch('stored');
            if ($action == 'save-and-continue') {
                return; // Tidak melakukan redirect, hanya menampilkan pesan
            }
            return redirect()->route('news.index');
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

    private function storeFile($news)
    {
        if ($this->file_path) {
            $objName = Str::slug($news->title); // Menggunakan slug agar aman untuk nama file

            $timestamp = now()->format('H:i_d-m-Y');
            $extension = $this->file_path->getClientOriginalExtension(); // Mendapatkan ekstensi file

            // Membuat format nama file
            $filename = "{$news->id}_{$objName}_{$timestamp}.{$extension}";

            // Menyimpan file dengan nama yang telah diformat
            $path = $this->file_path->storeAs('news/cover', $filename);

            $storedPath = "storage/" . $path;

            FileNews::create([
                'file_path' => $storedPath,
                'news_id' => $news->id
            ]);
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
            $image_name = "/storage/news/detail/" . time() . $key . '.png';
            \file_put_contents(\public_path() . $image_name, $data);
            $img->removeAttribute('src');
            $img->setAttribute('src', $image_name);
        }
        $this->body = $dom->saveHTML();
    }
}
