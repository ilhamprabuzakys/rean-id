<?php

namespace App\Livewire\Landing\Ebooks;

use App\Models\Ebook;
use Livewire\Attributes\On;
use Livewire\Component;

class EbookSearch extends Component
{
    public $search, $filter_date;
    public $paginate = 5;
    // protected $updatesQueryString = ['kota', 'provinsi', 'filter_date'];
    // protected $queryString = [
    //     'kota' => ['except' => ''],
    //     'provinsi' => ['except' => ''],
    //     'filter_date' => ['except' => ''],
    // ];

    public function render()
    {
        $results = [];
        if (strlen($this->search) > 0)
        {
            $results = Ebook::with(['user'])->latest('created_at')
            ->when($this->search, function ($query) {
                return $query->globalSearch($this->search);
            })
            ->limit(5)->get();
        }
        return view('livewire.landing.ebooks.ebook-search', [
            'ebooks' => $results
        ]);
    }

}
