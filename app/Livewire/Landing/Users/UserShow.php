<?php

namespace App\Livewire\Landing\Users;

use Livewire\Attributes\On;
use Livewire\Component;

class UserShow extends Component
{
    public $user;
    public $tab = 'postingan';
    protected $updatesQueryString = ['tab'];
    protected $queryString = [
        'tab' => ['except' => ''],
    ];

    #[On('tab')]
    public function tabChange($tab)
    {
        $this->tab = $tab;
    }

    public function mount($user)
    {
        $this->user = $user;
    }

    public function render()
    {
        return view('livewire.landing.users.user-show');
    }

}
