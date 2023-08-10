<?php

namespace App\Livewire\Dashboard\Ebooks;

use App\Models\Ebook;
use Livewire\Component;

class EbookTable extends Component
{
    protected $listeners = [
        "swalS",
        "swalE",
    ];
    
    public function mount($ebooks)
    {
        $this->ebooks = $ebooks;
    }

    public function render()
    {
        return view('livewire.dashboard.ebooks.ebook-table');
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
