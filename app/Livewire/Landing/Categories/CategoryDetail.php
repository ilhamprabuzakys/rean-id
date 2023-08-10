<?php

namespace App\Livewire\Landing\Categories;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class CategoryDetail extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    protected $listeners = [
        "swalS",
        "swalE",
    ];

    public $category;
    public $paginate = 5;
    public $search, $filter_date;

    protected $updatesQueryString = ['search', 'filter_date'];
    protected $queryString = [
        'search' => ['except' => ''],
        'filter_date' => ['except' => ''],
    ];

    public function mount($category)
    {
        // $this->search = request()->query('search');
        // $this->filter_date = request()->query('filter_date');
        $this->category = $category;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatedFilterDate(){
        $this->resetPage();
    }

    public function render()
    {
        $query = Post::with(['tags', 'user', 'category'])
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

        $posts = $query;

        $this->emit('refreshAOS');
        return view('livewire.landing.categories.category-detail', compact('posts'));
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
