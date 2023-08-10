<?php

namespace App\Livewire\Dashboard\Ebooks;

use App\Models\Ebook;
use Livewire\Component;

class EbookCreate extends Component
{
    protected $listeners = [
        "swalS",
        "swalE",
    ];

    public $title, $description, $pages, $author, $published_at, $user_id, $body;

    public function mount($user)
    {
        $this->user_id = $user;
    }

    public function render()
    {
        return view('livewire.dashboard.ebooks.ebook-create');    
    }

    public function store()
    {
        Ebook::create($this->all());
        $this->resetInput();
        $this->emit('swalS', 'Pembuatan Ebook', 'Berhasil menambah data Ebook');
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
