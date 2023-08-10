<?php

namespace App\Livewire\Dashboard\Events;

use Livewire\Component;

class EventUpdate extends Component
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
        return view('livewire.dashboard.events.event-update');
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
