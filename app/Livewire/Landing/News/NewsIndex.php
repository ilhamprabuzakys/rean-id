<?php

namespace App\Livewire\Landing\News;

use App\Models\News;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class NewsIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $paginate = 5;
    public $search, $filter_date;

    protected $updatesQueryString = ['search', 'filter_date'];
    protected $queryString = [
        'search' => ['except' => ''],
        'filter_date' => ['except' => ''],
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatedFilterDate(){
        $this->resetPage();
    }
    
    public function updatedFilterCategory(){
        $this->resetPage();
    }

    public function render()
    {
        $query = News::with(['file', 'user'])
        ->latest('updated_at')
        ->when($this->search, function ($query) {
            return $query->globalSearch($this->search);
        })
        ->when($this->filter_date, function ($query) {
            $dateRange = explode(' to ', $this->filter_date);
            $startDate = $dateRange[0];
            $endDate = $dateRange[1] ?? $dateRange[0];

            return $query->whereDate('created_at', '>=', $startDate)
                         ->whereDate('created_at', '<=', $endDate);
        })
        ->when($this->paginate, function ($query) {
            return $query->paginate($this->paginate);
        });
        
        $news = $query;
        $this->dispatch('refreshAOS');
        return view('livewire.landing.news.news-index', compact('news$news'));
    }

    public function resetFilter()
    {
        $this->search = null;
        $this->filter_date = null;
    }

}
