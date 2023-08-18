<?php

namespace App\Livewire\Dashboard\Settings;

use Livewire\Attributes\On;
use Livewire\Attributes\Reactive;
use Livewire\Component;

class SettingIndex extends Component
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
        return view('livewire.dashboard.settings.setting-index');
    }

}
