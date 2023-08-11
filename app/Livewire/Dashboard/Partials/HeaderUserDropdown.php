<?php

namespace App\Livewire\Dashboard\Partials;

use Livewire\WithPagination;
use Livewire\Component;

class HeaderUserDropdown extends Component
{
    protected $listener = [
        'updatedUser' => 'loadUser',
        'refresh-me' => '$refresh',
        'forceRefreshDropdown' => '$refresh',
        
    ];

    public $user;

    public function loadUser()
    {
        $this->dispatch('refresh-me');
        // dd('helo');
        // $this->user = auth()->user()->fresh();  // Muat ulang data pengguna dari database
        $this->user = \App\Models\User::find(auth()->id());
    }

    public function mount()
    {
        $this->loadUser();
    }

    public function render()
    {
        return view('livewire.dashboard.partials.header-user-dropdown');
    }
}
