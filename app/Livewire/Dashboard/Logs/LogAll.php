<?php

namespace App\Livewire\Dashboard\Logs;

use App\Models\EventLog;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class LogAll extends Component
{
    use WithPagination;
    public $search, $filter_date;
    public $paginate = 10;


    public function render()
    {
        $query = EventLog::with(['subject', 'user'])->latest('created_at')
        ->when($this->search, function ($query) {
            return $query->globalSearch($this->search);
        })->when($this->filter_date, function ($query) {
            $dateRange = explode(' to ', $this->filter_date);
            $startDate = $dateRange[0];
            $endDate = $dateRange[1] ?? $dateRange[0];
            return $query->whereDate('created_at', '>=', $startDate)
                ->whereDate('created_at', '<=', $endDate);
        });
        $logs = $query->paginate($this->paginate);
        return view('livewire.dashboard.logs.log-all', compact('logs'));
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

}
