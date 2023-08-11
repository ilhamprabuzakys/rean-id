<?php

namespace App\Livewire\Dashboard\Ebooks;

use App\Models\Ebook;
use DOMDocument;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithFileUploads;

class EbookCreate extends Component
{
    use WithFileUploads;
    public $title, $description, $pages, $author, $published_at, $user_id, $body, $cover_path, $file_path;

    public function mount($user)
    {
        $this->user_id = $user;
    }

    public function rules()
    {
        return [
            'title' => ['required', 'min:4', 'max:50', Rule::unique('ebooks')],
            'description' => ['required', 'min:4', 'max:100'],
            'pages' => ['required'],
            'author' => ['required'],
            'published_at' => ['required'],
            'cover_path' => ['max:6000'],
            'file_path' => ['max:20000', 'file', 'mimes:pdf'],
            'body' => ['required', 'min:4'],
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
        'file_path.file' => 'Harap mengupload tipe file',
        'body.required' => 'Body itu harus diisi',
        'body.min' => 'Konten body terlalu pendek',
    ];

    // protected $validationAttributes = [
    //     'title' => 'Judul',
    //     'description' => 'Deskripsi',
    //     'pages' => 'Pages',
    //     'author' => 'author',
    // ];

    public function render()
    {
        return view('livewire.dashboard.ebooks.ebook-create');
    }

    public function store()
    {
        $this->validate();
        // dd($this->all());

        if ($this->file_path) {
            // Jika ada file cover baru yang diunggah...
            $path = $this->file_path->store('ebooks');
            $this->file_path = "storage/" . $path;
        }

        if ($this->cover_path) {
            // Jika ada file cover baru yang diunggah...
            $path = $this->cover_path->store('cover');
            $this->cover_path = "storage/ebooks/" . $path;
        }

        $content = $this->body;
        $dom = new DOMDocument();
        $dom->loadHTML($content, 9);
        $images = $dom->getElementsByTagName('img');

        foreach ($images as $key => $img) {
            $data = \base64_decode(explode(',', explode(';', $img->getAttribute('src'))[1])[1]);
            $image_name = "/storage/ebooks/detail/" . time() . $key . '.png';
            \file_put_contents(\public_path() . $image_name, $data);
            $img->removeAttribute('src');
            $img->setAttribute('src', $image_name);
        }
        $content = $dom->saveHTML();
        $this->body = $content;
        // dd($this->all());
        Ebook::create($this->all());
        $this->dispatch('data-changed');

        // $this->resetInput();
        $this->dispatch('swal:modal', [
            'icon' => 'success',
            'title' => 'Penambahan Data',
            'text' => 'Data berhasil ditambahkan',
        ]);
    }

    public function resetInput()
    {
        $this->title = null;
        $this->description = null;
        $this->pages = null;
        $this->author = null;
        $this->published_at = null;
        $this->body = null;
        $this->file_path = null;
        $this->cover_path = null;
    }
}
