<?php

namespace App\Livewire\Dashboard\Profile;

use Livewire\Attributes\On;
use Livewire\Component;

class ProfileIndex extends Component
{
    public $tab = '';
    protected $updatesQueryString = ['tab'];
    protected $queryString = [
        'tab' => ['except' => ''],
    ];

    #[On('tab')]
    public function tabChange($tab)
    {
        $this->tab = $tab;
    }
    
    public function render()
    {
        return view('livewire.dashboard.profile.profile-index');
    }
}
