<?php

namespace App\Livewire\Dashboard\Logs;

use App\Models\EventLog;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Activitylog\Models\Activity;

class LogIndex extends Component
{
    use WithPagination;

    public $search, $filter_date;
    public $paginate = 10;
    public $tab = '';
    public $role = '';

    public $isAdmin;
    public $isSuperAdmin;
    public $isMember;

    protected $updatesQueryString = ['tab'];
    protected $queryString = [
        'tab' => ['except' => ''],
    ];

    public function mount()
    {
        $this->isAdmin = auth()->user() && auth()->user()->role == 'admin';
        $this->isSuperAdmin = auth()->user() && auth()->user()->role == 'superadmin';
        $this->isMember = auth()->user() && auth()->user()->role == 'member';
    }

    #[On('tab')]
    public function tabChange($tab)
    {
        $this->tab = $tab;
    }

    #[On('role')]
    public function roleChange($role)
    {
        $this->role = $role;
    }

    #[On('reset-filter')]
    public function resetFilter()
    {
        $this->search = '';
        $this->filter_date = '';
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = Activity::latest('created_at')
        ->when($this->search, function ($query) {
            return $query->globalSearch($this->search);
        })->when($this->filter_date, function ($query) {
            $dateRange = explode(' to ', $this->filter_date);
            $startDate = $dateRange[0];
            $endDate = $dateRange[1] ?? $dateRange[0];
            return $query->whereDate('created_at', '>=', $startDate)
                ->whereDate('created_at', '<=', $endDate);
        });

        if ($this->isSuperAdmin == true) {
            $query = $query->when($this->role, function ($query) {
                $query->whereHas('causer', function ($query) {
                    $query->where('role', $this->role);
                });
            });
        }

        if ($this->isAdmin == true) {
            $query = $query->whereHas('causer', function ($query) {
                $query->where('role', '!=', 'superadmin');
            });
        }

        if ($this->isMember == true) {
            $query = $query->whereHas('causer', function ($query) {
                $query->where('role', 'member');
            });
        }
        $logs = $query->paginate($this->paginate);
        return view('livewire.dashboard.logs.log-index', compact('logs'));
    }
}
