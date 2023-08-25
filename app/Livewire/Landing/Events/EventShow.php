<?php

namespace App\Livewire\Landing\Events;

use App\Models\Event;
use Livewire\Attributes\On;
use Livewire\Component;

class EventShow extends Component
{
    public $event;
    public function mount(Event $event)
    {
        $this->event = $event;
    }

    public function render()
    {
        return view('livewire.landing.events.event-show');
    }

}
