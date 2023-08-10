<?php

namespace App\Livewire\Dashboard\News;

use App\Models\News;
use Livewire\WithPagination;
use Livewire\Component;

class NewsIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    protected $listeners = [
        "swalS",
        "swalD",
        "swalE",
        'statusUpdated' => 'handleStatusUpdate',
        'deleteConfirmed' => 'destroy',
        'dataAdded' => 'checkRefresh'
    ];

    public $paginate = 5;
    public $search, $filter_date;
    public $model_id;
    public $statusUpdate = false;

    protected $updatesQueryString = ['search', 'filter_date'];
    protected $queryString = [
        'search' => ['except' => ''],
        'filter_date' => ['except' => ''],
    ];

    public function mount()
    {
    }

    public function render()
    {
        $query = News::with('user')->latest('updated_at')->when($this->search, function ($query) {
            return $query->globalSearch($this->search);
        })->when($this->filter_date, function ($query) {
            $dateRange = explode(' to ', $this->filter_date);
            $startDate = $dateRange[0];
            $endDate = $dateRange[1] ?? $dateRange[0];

            return $query->whereDate('created_at', '>=', $startDate)
                ->whereDate('created_at', '<=', $endDate);
        })->paginate($this->paginate);
        $news = $query;
        return view('livewire.dashboard.news.news-index', [
            'news' => $news,
        ]);
    }

    public function checkRefresh()
    {
        dd('This is called!');
    }


    public function deleteConfirmation($id)
    {
        $this->model_id = $id;
        $this->emit('swalD', 'Berita');
    }

    public function destroy()
    {
        $model = News::findOrFail($this->model_id);
        $name = $model->title;
        $model->delete();
        $this->emit('swalS', 'Penghapusan Berita', 'Data News ' . $name . ' berhasil dihapus');
    }

    public function handleStatusUpdate($statusUpdate)
    {
        $this->statusUpdate = $statusUpdate;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatedFilterDate()
    {
        $this->resetPage();
    }

    public function swalD($title)
    {
        $this->emit('swalDelete', [
            'title' => $title,
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
