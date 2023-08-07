<?php

namespace App\Livewire\Dashboard\Profile;

use Livewire\Component;

class ProfileIndex extends Component
{
    public $user;
    public function render()
    {
        $this->user = auth()->user();
        return view('livewire.dashboard.profile.profile-index');
    }
}
