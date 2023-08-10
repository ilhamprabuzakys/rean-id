<?php

namespace App\Livewire\Dashboard\Ebooks;

use App\Models\Ebook;
use Livewire\Component;
use Livewire\WithPagination;

class EbookIndex extends Component
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
    public $search, $filter_date;
    public $paginate;
    public $user;
    public $ebook_id;
    public $statusUpdate = false;

    protected $updatesQueryString = ['search', 'filter_date'];
    protected $queryString = [
        'search' => ['except' => ''],
        'filter_date' => ['except' => ''],
    ];

    public function mount($user)
    {
        $this->paginate = 5;
        $this->user = $user;
    }

    public function render()
    {
        $query = Ebook::latest('updated_at')->when($this->search, function ($query) {
            return $query->globalSearch($this->search);
        })
        ->when($this->filter_date, function ($query) {
            $dateRange = explode(' to ', $this->filter_date);
            $startDate = $dateRange[0];
            $endDate = $dateRange[1] ?? $dateRange[0];

            return $query->whereDate('published_at', '>=', $startDate)
                         ->whereDate('published_at', '<=', $endDate);
        })->paginate($this->paginate);
        $ebooks = $query;
        return view('livewire.dashboard.ebooks.ebook-index', [
            'ebooks' => $ebooks,
        ]);
    }

    public function editEbook($id)
    {
        $ebook = Ebook::findOrFail($id);
        $this->statusUpdate = true;
        $this->emit('edit', $ebook);
    }

    public function findEbook($id)
    {
        $this->ebook_id = $id;
    }
    
    public function deleteConfirmation($id)
    {
        $this->ebook_id = $id;
        $this->emit('swalD', 'Ebook');
        // $this->dispatchBrowserEvent('swal-delete');

    }

    public function destroy()
    {
        $ebook = Ebook::findOrFail($this->ebook_id);
        $name = $ebook->title;
        $ebook->delete();
        $this->emit('swalS', 'Penghapusan Ebook', 'Data Ebook ' . $name . ' berhasil dihapus');

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
