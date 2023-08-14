<?php

namespace App\Livewire\Dashboard\Events;

use App\Models\Event;
use DOMDocument;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class EventIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search, $filter_date;
    public $paginate = 5;

    public $event_id;

    protected $updatesQueryString = ['search', 'filter_date'];
    protected $queryString = [
        'search' => ['except' => ''],
        'filter_date' => ['except' => ''],
    ];

    public function mount()
    {
        $this->search = request()->query('search');
        $this->filter_date = request()->query('filter_date');
    }

    public function render()
    {
        $query = Event::latest('created_at')
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
        $events = $query->paginate($this->paginate);
        return view('livewire.dashboard.events.event-index', [
            'events' => $events,
        ]);
    }

    public function deleteConfirmation($id)
    {
        $this->event_id = $id;
        $this->dispatch('swal:confirmation', [
            'title' => 'Event',
        ]);
    }

    #[On('deleteConfirmed')]
    public function destroy()
    {
        $event = Event::findOrFail($this->event_id);

        // Hapus image yang diupload sama Summernote.
        $dom = new DOMDocument();
        $dom->loadHTML($event->description, 9);
        $images = $dom->getElementsByTagName('img');

        foreach ($images as $key => $img) {
            $path = \public_path();
            $path .= $img->getAttribute('src');
            if (File::exists($path)) {
                File::delete($path);
            }
        }
        // Menghapus file yang terkait dengan event
        foreach ($event->files as $fileEvent) {
            // Hapus file fisik
            Storage::delete(str_replace('storage/', '', $fileEvent->file_path));
            // Hapus entri dari database
            $fileEvent->delete();
        }

        // Menghapus event
        $event->delete();
        $this->dispatch('alert', [
            'title' => 'Berhasil',
            'message' => 'Data berhasil dihapus',
            'type' => 'success',
        ]);
    }

    public function deactivate($id)
    {
        Event::find($id)->update(['status' => FALSE]);
    }
    
    public function activate($id)
    {
        Event::find($id)->update(['status' => TRUE]);
    }

    public function changeStatus($id)
    {
        $event = Event::find($id);
        if ($event->status == TRUE) {
            $event->update(['status' => FALSE]);
        } else {
            $event->update(['status' => TRUE]);
        }
    }
}
