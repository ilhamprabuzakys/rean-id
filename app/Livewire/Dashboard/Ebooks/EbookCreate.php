<?php

namespace App\Livewire\Dashboard\Ebooks;

use Livewire\Component;

class EbookCreate extends Component
{
    protected $listeners = [
        "swalS",
        "swalE",
    ];

    public function mount()
    {

    }

    public function render()
    {
        return view('livewire.dashboard.ebooks.ebook-create');
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
