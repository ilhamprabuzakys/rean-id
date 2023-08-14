<?php

namespace App\Livewire\Dashboard\Ebooks;

use DOMDocument;
use App\Models\Ebook;
use App\Models\FileEbook;
use App\Models\FileEbookPDF;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\Attributes\On;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class EbookCreate extends Component
{
    use WithFileUploads;
    public $title, $description, $pages, $author, $published_at, $user_id, $body, $file_path;
    public $files = [];

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
            'files.*' => ['max:20000'],
            'file_path' => ['max:40000', 'file', 'mimes:pdf'],
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
        'published_at.required' => 'Tanggal dipublish itu harus diisi',
        'author.required' => 'Author itu harus diisi',
        'file.*.max' => 'Ukuran file terlalu besar, maksimal hanya 20MB',
        'file_path.max' => 'Ukuran file terlalu besar, maksimal hanya 40MB',
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
        // dd($this->all());
        try {
            $this->validate($this->rules(), $this->messages);
            $this->processDescriptionImages();

            // Simpan data ke variabel
            $ebook = Ebook::create($this->all());
            // Simpan files
            $this->storePDF($ebook, $ebook->id);
            $this->storeFiles($ebook);  // Mengirim id ebook ke fungsi storeFiles

            $this->resetInput();
            $this->dispatch('stored');
            $this->dispatch('swal:modal', [
                'icon' => 'success',
                'title' => 'Berhasil dibuat',
                'text' => 'Berhasil menambahkan data Ebook',
            ]);
        } catch (ValidationException $e) {
            $this->dispatch('swal:modal', [
                'icon' => 'error',
                'title' => 'Terjadi Kesalahan',
                'text' => 'Ada beberapa kesalahan pada input Anda \n' . $e->validator->errors(),
            ]);

            // Mengirim error bag ke komponen Livewire
            $this->setErrorBag($e->validator->getMessageBag());
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
            $image_name = "/storage/ebooks/detail/" . time() . $key . '.png';
            \file_put_contents(\public_path() . $image_name, $data);
            $img->removeAttribute('src');
            $img->setAttribute('src', $image_name);
        }

        $this->body = $dom->saveHTML();
    }

    private function storeFiles($ebook)
    {
        if ($this->files) {
            $objName = Str::slug($ebook->title); // Menggunakan slug agar aman untuk nama file

            foreach ($this->files as $index => $file) {
                $timestamp = now()->format('H:i_d-m-Y');
                $extension = $file->getClientOriginalExtension(); // Mendapatkan ekstensi file

                // Membuat format nama file
                $filename = "{$ebook->id}_{$objName}_file-" . ($index + 1) . "_{$timestamp}.{$extension}";

                // Menyimpan file dengan nama yang telah diformat
                $path = $file->storeAs('ebooks/cover', $filename);

                $storedPath = "storage/" . $path;
                FileEbook::create([
                    'file_path' => $storedPath,
                    'ebook_id' => $ebook->id
                ]);
            }
        }
    }

    public function storePDF($ebook)
    {
        if (is_array($this->file_path)) {
            dd('file_path adalah array', $this->file_path);
        }
        if (is_array($ebook->title)) {
            dd('title adalah array', $ebook->title);
        }
        
        if ($this->file_path) {
            $timestamp = now()->format('H:i_d-m-Y');
            // $extension = $this->file_path->getClientOriginalExtension(); // Mendapatkan ekstensi file
            // Membuat format nama file
            $objName = Str::slug($ebook->title); // Menggunakan slug agar aman untuk nama file
            $filename = "{$ebook->id}_{$objName}_{$timestamp}.pdf";
            $path = $this->file_path->storeAs('ebooks/pdf', $filename);
            $storedPath = "storage/" . $path;
            FileEbookPDF::create([
                'file_path' => $storedPath,
                'ebook_id' => $ebook->id
            ]);
        }
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
        $this->files = null;
    }
}
