<?php

namespace App\Livewire\Dashboard;

use App\Models\LoginInfo;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class RecentLoginActivity extends Component
{
    use WithPagination;
    public $user;

    public $search;
    public $filter_date, $filter_device;
    public $paginate = 10;
    

    public function mount($user)
    {
        $this->user = $user;
    }

    public function render()
    {
        $query = LoginInfo::latest('created_at')
        ->when($this->search, function ($query) {
            return $query->globalSearch($this->search);
        })->when($this->filter_device, function($query) {
            return $query->where('device', $this->filter_device);
        })->when($this->filter_date, function ($query) {
            $dateRange = explode(' to ', $this->filter_date);
            $startDate = $dateRange[0];
            $endDate = $dateRange[1] ?? $dateRange[0];
            return $query->whereDate('created_at', '>=', $startDate)
                ->whereDate('created_at', '<=', $endDate);
        });

        if (auth()->user()->role == 'member') {
            $query = $query->where('user_id', auth()->user()->id);
        }

        $login_info =  $query->paginate($this->paginate);
        return view('livewire.dashboard.recent-login-activity', compact('login_info'));
    }

}
