<?php

namespace App\Livewire\Dashboard\News;

use Livewire\WithPagination;
use Livewire\Component;

class NewsUpdate extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    protected $listeners = [
        "swalS",
        "swalD",
        "swalE",
        'statusUpdated' => 'handleStatusUpdate',
        'deleteConfirmed' => 'destroy'
    ];

    public $paginate = 5;
    public $search, $filter_date;
    public $user_id, $model_id;
    public $statusUpdate = false;

    protected $updatesQueryString = ['search', 'filter_date'];
    protected $queryString = [
        'search' => ['except' => ''],
        'filter_date' => ['except' => ''],
    ];

    public function mount($user)
    {
        $this->paginate = 5;
        $this->user_id = $user;
    }

    public function render()
    {
        return view('livewire.dashboard.news.news-update');
    }



    public function deleteConfirmation($id)
    {
        $this->ebook_id = $id;
        $this->emit('swalD', 'Model');
    }

    public function destroy()
    {
        $model = Model::findOrFail($this->model_id);
        $name = $model->title;
        $model->delete();
        $this->emit('swalS', 'Penghapusan Model', 'Data Model ' . $name . ' berhasil dihapus');

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
