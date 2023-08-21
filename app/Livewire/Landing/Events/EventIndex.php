<?php

namespace App\Livewire\Landing\Events;

use Livewire\Attributes\On;
use Livewire\Component;

class EventIndex extends Component
{
    public $kota, $provinsi, $tanggal;

    public function render()
    {
        return view('livewire.landing.events.event-index');
    }

}
