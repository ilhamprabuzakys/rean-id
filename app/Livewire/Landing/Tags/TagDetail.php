<?php

namespace App\Livewire\Landing\Tags;

use App\Models\Post;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class TagDetail extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $tag;
    public $paginate = 5;
    public $search, $filter_date;

    protected $updatesQueryString = ['search', 'filter_date'];
    protected $queryString = [
        'search' => ['except' => ''],
        'filter_date' => ['except' => ''],
    ];

    public function mount($tag)
    {
        // $this->search = request()->query('search');
        // $this->filter_date = request()->query('filter_date');
        $this->tag = $tag;
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
        ->whereHas('tags', function ($q) {
           return $q->where('tags.id', $this->tag->id);  // Perhatikan perubahan di sini
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

        $this->dispatch('refreshAOS');

        return view('livewire.landing.tags.tag-detail', compact('posts'));
    }

}
