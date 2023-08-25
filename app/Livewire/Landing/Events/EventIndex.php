<?php

namespace App\Livewire\Landing\Events;

use App\Models\Event;
use Livewire\Attributes\On;
use Livewire\Component;

class EventIndex extends Component
{
    public function render()
    {
        $query = Event::latest('created_at')->get();
        $events = $query;
        return view('livewire.landing.events.event-index', [
            'events' => $events,
        ]);
    }
}
