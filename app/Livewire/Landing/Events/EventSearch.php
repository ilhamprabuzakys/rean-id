<?php

namespace App\Livewire\Landing\Events;

use App\Models\Event;
use Livewire\Attributes\On;
use Livewire\Component;

class EventSearch extends Component
{
    public $filter_location, $filter_date;
    public $paginate = 5;

    // protected $updatesQueryString = ['filter_location', 'filter_date'];
    // protected $queryString = [
    //     'filter_location' => ['except' => ''],
    //     'filter_date' => ['except' => ''],
    // ];

    public function render()
    {
        $results = [];
        if (strlen($this->filter_date) > 0 || strlen($this->filter_location) > 0)
        {
            $results = Event::latest('created_at')->when($this->filter_date, function ($query) {
                $dateRange = explode(' to ', $this->filter_date);
                $startDate = $dateRange[0];
                $endDate = $dateRange[1] ?? $dateRange[0];
    
                return $query->whereDate('created_at', '>=', $startDate)
                    ->whereDate('created_at', '<=', $endDate);
            })->when($this->filter_location, function ($query) {
                return $query->globalSearch($this->filter_location);
            })
            ->limit(10)->get();
        }
        return view('livewire.landing.events.event-search', [
            'events' => $results
        ]);
    }

}
