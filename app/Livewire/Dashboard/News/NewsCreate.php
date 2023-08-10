<?php

namespace App\Livewire\Dashboard\News;

use App\Models\News;
use Illuminate\Validation\Rule;
use Livewire\WithPagination;
use Livewire\Component;
use Livewire\WithFileUploads;

class NewsCreate extends Component
{
    use WithPagination, WithFileUploads;
    protected $paginationTheme = 'bootstrap';

    protected $listeners = [
        "swalS",
        "swalE",
    ];

    public $user_id;
    public $title, $about, $file_path, $body;

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
        $this->validate();

        News::create($this->all());
        
        $this->emit('swalS', 'Penambahan Data', 'Data berhasil ditambahkan');
        $this->emitTo('NewsIndex', 'dataAdded');

        if ($action == 'save-and-continue') {
            $this->emitTo('NewsIndex', 'dataAdded');
            return; // Tidak melakukan redirect, hanya menampilkan pesan
        }

        sleep(2);
        return redirect()->route('news.index');
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
