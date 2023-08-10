<?php

namespace App\Livewire\Dashboard\Ebooks;

use App\Models\Ebook;
use Livewire\Component;

class EbookIndex extends Component
{
    protected $listeners = [
        "swalS",
        "swalE",
    ];
    public $search, $filter_date;
    public $paginate = 5;
    public $user;

    protected $updatesQueryString = ['search', 'filter_date'];
    protected $queryString = [
        'search' => ['except' => ''],
        'filter_date' => ['except' => ''],
    ];

    public function mount($user)
    {
        $this->user = $user;
    }

    public function render()
    {
        $query = Ebook::with('user')->latest('updated_at')
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
        return view('livewire.dashboard.ebooks.ebook-index', [
            'ebooks' => $query->paginate(5),
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
