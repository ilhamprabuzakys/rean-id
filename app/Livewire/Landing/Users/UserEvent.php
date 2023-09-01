<?php

namespace App\Livewire\Landing\Users;

use App\Models\Event;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class UserEvent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $paginate = 5;
    public $user;
    public function mount($user)
    {
        $this->user = $user;
    }

    public function render()
    {
        $query = Event::where('user_id', $this->user->id)
        ->latest('updated_at')->when($this->paginate, function ($query) {
            return $query->paginate($this->paginate);
        });
        
        $events = $query;
        return view('livewire.landing.users.user-event', compact('events'));
    }

}
