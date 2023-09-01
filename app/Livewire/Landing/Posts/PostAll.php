<?php

namespace App\Livewire\Landing\Posts;

use App\Models\Category;
use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class PostAll extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $paginate = 5;
    public $search, $filter_date, $filter_category;

    protected $updatesQueryString = ['search', 'filter_date', 'filter_category'];
    protected $queryString = [
        'search' => ['except' => ''],
        'filter_date' => ['except' => ''],
        'filter_category' => ['except' => ''],
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
        $categories = Category::oldest('name')->get();
        $query = Post::with(['tags', 'user', 'category'])->where('status', 'approved')
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
        ->when($this->filter_category, function($query) {
            $query->whereHas('category', function ($query) {
                $query->where('slug', $this->filter_category);
            });
        })->when($this->paginate, function ($query) {
            return $query->paginate($this->paginate);
        });
        
        $posts = $query;
        $this->dispatch('refreshAOS');
        return view('livewire.landing.posts.post-all', compact('posts', 'categories'));
    }

    public function resetFilter()
    {
        $this->search = null;
        $this->filter_date = null;
        $this->filter_category = null;
    }
}
