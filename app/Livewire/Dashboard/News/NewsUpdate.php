<?php

namespace App\Livewire\Dashboard\News;

use App\Models\News;
use DOMDocument;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Livewire\WithPagination;
use Livewire\Component;
use Livewire\WithFileUploads;

class NewsUpdate extends Component
{
    use WithPagination, WithFileUploads;
    protected $paginationTheme = 'bootstrap';

    protected $listeners = [
        "swalS",
        "swalE",
    ];

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
        $validatedData = $this->validate();

        if ($this->file_path) {
            // Jika ada file_path baru yang diunggah...
            $path = $this->file_path->store('file_path');  
            $validatedData['file_path'] = "storage/" . $path;
            
            // Jika user memiliki file_path lama, hapus dari storage
            if ($this->news->file_path) {
                $oldFilePath = str_replace('storage/', '', $this->news->file_path); 
                Storage::delete($oldFilePath);
            }
        } else {
            // Jika tidak ada file_path baru yang diunggah, hapus `file_path` dari `$validatedData`
            unset($validatedData['file_path']);
        }

        $content = $this->body;
        $dom = new DOMDocument();
        $dom->loadHTML($content, 9);
        $images = $dom->getElementsByTagName('img');

        foreach ($images as $key => $img) {
           if (strpos($img->getAttribute('src'), 'data:image/') === 0) {

                $data = \base64_decode(explode(',', explode(';', $img->getAttribute('src'))[1])[1]);
                $image_name = "/storage/summernotes/" . time() . $key . '.png';
                \file_put_contents(\public_path() . $image_name, $data);
                $img->removeAttribute('src');
                $img->setAttribute('src', $image_name);
           }
        }
        $content = $dom->saveHTML();
        $this->body = $content;

        $validatedData['user_id'] = $this->user_id;
        $this->news->update($validatedData);
        $this->emit('swalS', 'Update Data', 'Data berhasil diperbarui');
        // sleep(5);
        
        // return redirect()->route('news.index');
    }

    public function swalS($title, $text)
    {
        $this->emit('swalBasic', [
            'icon' => 'success',
            'title' => $title,
            'text' => $text,
        ]);
    }
    
    public function swalE($title, $text)
    {
        $this->emit('swalBasic', [
            'icon' => 'error',
            'title' => $title,
            'text' => $text,
        ]);
    }
}
 