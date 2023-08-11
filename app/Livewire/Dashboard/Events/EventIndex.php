<?php

namespace App\Livewire\Dashboard\Events;

use App\Models\Event;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class EventIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search, $filter_date;
    public $paginate = 5;

    public $event_id;

    protected $updatesQueryString = ['search', 'filter_date'];
    protected $queryString = [
        'search' => ['except' => ''],
        'filter_date' => ['except' => ''],
    ];

    public function mount()
    {
        $this->search = request()->query('search');
        $this->filter_date = request()->query('filter_date');
    }

    public function render()
    {
        $query = Event::latest('updated_at')
        ->when($this->search, function ($query) {
            return $query->globalSearch($this->search);
        })
        ->when($this->filter_date, function ($query) {
            $dateRange = explode(' to ', $this->filter_date);
            $startDate = $dateRange[0];
            $endDate = $dateRange[1] ?? $dateRange[0];

            return $query->whereDate('created_at', '>=', $startDate)
                         ->whereDate('created_at', '<=', $endDate);
        });
        $events = $query->paginate($this->paginate);
        return view('livewire.dashboard.events.event-index', [
            'events' => $events,
        ]);
    }

    public function swalS($title, $text)
    {
        $this->emit('swalBasic', [
            'icon' => 'success',
            'title' => $title,
            'text' => $text,
        ]);
    }

    public function swalE($title, $text)
    {
        $this->emit('swalBasic', [
            'icon' => 'error',
            'title' => $title,
            'text' => $text,
        ]);
    }
}
