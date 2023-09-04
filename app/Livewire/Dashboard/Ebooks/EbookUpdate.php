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
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class EbookUpdate extends Component
{
    use WithFileUploads;

    public $ebook;
    public $title, $slug, $description, $author, $published_at, $body, $user_id, $file_path;
    public $files = [];
    public $existingFiles = [];
    public $existingPDF;
    public $existingPDF_ID;
    public $filePathOrName = '';

    public function mount($user, $ebook)
    {
        $this->user_id = $user;
        $this->ebook = $ebook;
        $this->title = $ebook->title;
        $this->description = $ebook->description;
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
        if ($ebook->pdf) {
            $file = $ebook->pdf; // Mengambil file yang terkait dengan Ebook
            $extension = pathinfo($file->file_path, PATHINFO_EXTENSION);
            $allowedExtensions = ['pdf'];  // Anda bisa menambahkan ekstensi lain jika diperlukan
        
            if (in_array($extension, $allowedExtensions)) {
                $filePath = public_path($file->file_path);
        
                // Tambahkan pengecekan ini untuk memastikan file memang ada
                if (!file_exists($filePath)) {
                    $this->existingPDF = null;
                    FileEbookPDF::find($file->id)->delete();
                    return; // atau Anda bisa memberikan feedback tertentu ke pengguna
                }
        
                $fileSizeBytes = filesize($filePath);
                if ($fileSizeBytes < 1024 * 1024) { // Jika kurang dari 1MB
                    $fileSize = round($fileSizeBytes / 1024, 2) . "KB";
                } else {
                    $fileSize = round($fileSizeBytes / (1024 * 1024), 2) . "MB";
                }
        
                $this->existingPDF = (object) [
                    'source_path' => asset($file->file_path),
                    'extension' => $extension,
                    'file_name' => basename($file->file_path),
                    'file_size' => $fileSize,
                    'mime_type' => mime_content_type($filePath),
                    'id' => $file->id
                ];
            }
        }
    }

    public function rules()
    {
        return [
            'title' => ['required', 'min:4', 'max:50', Rule::unique('ebooks')->ignore($this->ebook->id)],
            'description' => ['required', 'min:4', 'max:100'],
            'author' => ['required'],
            'published_at' => ['required'],
            'body' => ['required', 'min:4'],
            'files.*' => ['required', 'max:20000', 'mimes:jpg,jpeg,png,webp'],
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
        'author.required' => 'Author itu harus diisi',
        'cover_path.max' => 'Ukuran file terlalu besar, maksimal hanya 6MB',
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
            $rules = $this->rules();
            if ($this->file_path !== null) {
                $rules['file_path'] = 'max:20000|mimes:pdf';
                $this->messages['file_path.mimes'] = 'File harus berformat PDF';
                $this->messages['file_path.max'] = 'Ukuran PDF tidak boleh lebih besar dari 20MB';
            }
            $this->slug = Str::slug($this->title);
            $this->title = Str::of($this->title)->title();
            $this->validate($this->rules(), $this->messages);
            $this->deleteRemovedImages();
            $this->processDescriptionImages();
            $this->storePDF();
            $this->storeFiles();
            $this->ebook->update($this->all());

            $this->dispatch('swal:modal', [
                'icon' => 'success',
                'title' => 'Update Berhasil',
                'text' => 'Berhasil memperbarui data Ebook',
            ]);
            return redirect()->route('ebooks.index');
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

    private function storeFiles()
    {
        if ($this->files) {
            $objName = Str::slug($this->title); // Menggunakan slug agar aman untuk nama file

            foreach ($this->files as $index => $file) {
                $timestamp = now()->format('H:i_d-m-Y');
                $extension = $file->getClientOriginalExtension(); // Mendapatkan ekstensi file

                // Membuat format nama file
                $filename = "{$this->ebook->id}_{$objName}_file-" . ($index + 1) . "_{$timestamp}.{$extension}";

                // Menyimpan file dengan nama yang telah diformat
                $path = $file->storeAs('ebooks/cover', $filename);

                $storedPath = "storage/" . $path;
                FileEbook::create([
                    'file_path' => $storedPath,
                    'ebook_id' => $this->ebook->id
                ]);
            }
        }
    }

    public function storePDF()
    {
        if ($this->file_path) {
            if ($this->ebook->pdf) {
                $oldFilePath = str_replace('storage/', '', $this->ebook->pdf->file_path);
                Storage::delete($oldFilePath);
            }
            $timestamp = now()->format('H:i_d-m-Y');
            // $extension = $this->file_path->getClientOriginalExtension(); // Mendapatkan ekstensi file
            // Membuat format nama file
            $objName = Str::slug($this->title); // Menggunakan slug agar aman untuk nama file
            $filename = "{$this->ebook->id}_{$objName}_{$timestamp}.pdf";
            $path = $this->file_path->storeAs('ebooks/pdf', $filename);
            $storedPath = "storage/" . $path;
            FileEbookPDF::create([
                'file_path' => $storedPath,
                'ebook_id' => $this->ebook->id
            ]);
        }
    }

    public function removePDFFile($id)
    {
        $this->existingPDF_ID = $id;
        $this->dispatch('swal:ebookpdf', [
            'title' => 'File',
        ]);
    }

    #[On('pdfDeleteConfirmed')]
    public function seriouslyPDFRemoveFile()
    {
        // Coba temukan file berdasarkan path di database
        $file = FileEbookPDF::find($this->existingPDF_ID);

        if ($file) {
            // Ini adalah file yang sudah ada, jadi kita hapus dari database dan penyimpanan
            Storage::delete(str_replace('storage/', '', $file->file_path));
            $file->delete();
            $this->existingPDF = null; // Setelah penghapusan berhasil, set properti ini ke null
        }
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

    private function processDescriptionImages()
    {
        $content = $this->body;
        $dom = new DOMDocument();
        $dom->loadHTML($content, 9);
        $images = $dom->getElementsByTagName('img');

        $directoryPath = public_path('storage/ebooks/detail/');

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
                $image_name = "/storage/ebooks/detail/{$title}_detail-{$key}_{$timestamp}.png";
                \file_put_contents(\public_path() . $image_name, $data);
                $img->removeAttribute('src');
                $img->setAttribute('src', $image_name);
            }
        }
        $this->body = $dom->saveHTML();
    }

    public function resetInput()
    {
        $this->title = null;
        $this->description = null;
        $this->author = null;
        $this->published_at = null;
        $this->body = null;
    }
}
