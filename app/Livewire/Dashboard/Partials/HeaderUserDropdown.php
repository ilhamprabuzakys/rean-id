<?php

namespace App\Livewire\Dashboard\Partials;

use Livewire\Attributes\On;
use Livewire\WithPagination;
use Livewire\Component;

class HeaderUserDropdown extends Component
{
    #[On('user-updated')]
    public function render()
    {
        return view('livewire.dashboard.partials.header-user-dropdown');
    }
}
