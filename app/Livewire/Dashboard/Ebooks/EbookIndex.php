<?php

namespace App\Livewire\Dashboard\Ebooks;

use App\Models\Ebook;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;

class EbookIndex extends Component
{
    use WithPagination;

    public $search, $filter_date, $filter_status;
    public $paginate = 5;
    public $user;
    public $ebook_id;
    public $statusUpdate = false;

    public function mount($user)
    {
        $this->user = $user;
    }

    #[On('data-changed')]
    public function render()
    {
        $query = Ebook::latest('updated_at')
        ->when($this->search, function ($query) {
            return $query->globalSearch($this->search);
        })->when($this->filter_status, function($query) {
            return $query->where('status', $this->filter_status);
        })
        ->when($this->filter_date, function ($query) {
            $dateRange = explode(' to ', $this->filter_date);
            $startDate = $dateRange[0];
            $endDate = $dateRange[1] ?? $dateRange[0];

            return $query->whereDate('published_at', '>=', $startDate)
                         ->whereDate('published_at', '<=', $endDate);
        });
        $ebooks = $query->paginate($this->paginate);
        $statuses = collect([
            (object) ['key' => 'pending', 'label' => 'Pending'],
            (object) ['key' => 'approved', 'label' => 'Approved'],
            (object) ['key' => 'rejected', 'label' => 'Rejected'],
        ]);

        return view('livewire.dashboard.ebooks.ebook-index', [
            'ebooks' => $ebooks,
            'statuses' => $statuses,
        ]);
    }

    public function deleteConfirmation($id)
    {
        $this->ebook_id = $id;
        $this->dispatch('swal:confirmation', [
            'title' => 'Ebook',
        ]);
    }

    #[On('deleteConfirmed')]
    public function destroy()
    {
        $ebook = Ebook::findOrFail($this->ebook_id);
        $ebook->delete();
    }

    #[On('statusUpdated')]
    public function handleStatusUpdate($statusUpdate)
    {
        $this->statusUpdate = $statusUpdate;
    }

    public function pending($id)
    {
        $ebook = Ebook::findOrFail($id);
        $ebook->update(['status' => 'pending']);
        $ebook->disableLogging();
        activity('Ebook')
            ->performedOn($ebook)
            ->causedBy(auth()->user())
            ->withProperties([
                'action' => 'pending',
                'post_target' => $ebook->id,
                'action_user' => auth()->user()->id,
                'post_author' => $ebook->user->id,
                'message' => auth()->user()->name . ' mengembalikan ebook ' . $ebook->title . ' ke dalam review',
            ])
            ->event('pending')
            ->log('Ebook anda dalam review');
        $this->dispatch('refresh');
        $this->dispatch('alert', [
            'title' => 'Berhasil',
            'message' => 'Data berhasil diubah ke <b>Pending</b>',
            'type' => 'success',
        ]);
    }
    
    public function reject($id)
    {
        $ebook = Ebook::findOrFail($id);
        $ebook->update(['status' => 'rejected']);
        $ebook->disableLogging();
        activity('Ebook')
            ->performedOn($ebook)
            ->causedBy(auth()->user())
            ->withProperties([
                'action' => 'rejected',
                'post_target' => $ebook->id,
                'action_user' => auth()->user()->id,
                'post_author' => $ebook->user->id,
                'message' => auth()->user()->name . ' tidak menyetujui ebook ' . $ebook->title,
            ])
            ->event('rejected')
            ->log('Ebook anda ditolak');
        $this->dispatch('refresh');
        $this->dispatch('alert', [
            'title' => 'Berhasil',
            'message' => 'Data berhasil diubah ke <b>Rejected</b>',
            'type' => 'success',
        ]);
    }
    
    public function approve($id)
    {
        $ebook = Ebook::findOrFail($id);
        $ebook->update(['status' => 'approved']);
        $ebook->disableLogging();
        activity('Ebook')
            ->performedOn($ebook)
            ->causedBy(auth()->user())
            ->withProperties([
                'action' => 'approved',
                'post_target' => $ebook->id,
                'action_user' => auth()->user()->id,
                'post_author' => $ebook->user->id,
                'message' => auth()->user()->name . ' menyetujui ebook ' . $ebook->title,
            ])
            ->event('approved')
            ->log('Ebook anda disetujui');
        $this->dispatch('alert', [
            'title' => 'Berhasil',
            'message' => 'Data berhasil diubah ke <b>Approved</b>',
            'type' => 'success',
        ]);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
    
    public function updatedFilterDate()
    {
        $this->resetPage();
    }
}
