<?php

namespace App\Livewire\Dashboard\Partials;

use Livewire\Attributes\On;
use Livewire\Component;

class HeaderNotification extends Component
{
    #[On('refresh')]
    public function render()
    {
        $notifications = \Spatie\Activitylog\Models\Activity::causedBy(auth()->user())->latest('created_at')->get();
        $banyakNotifikasi = $notifications->count();
        return view('livewire.dashboard.partials.header-notification', compact('notifications', 'banyakNotifikasi'));
    }

    public function bersihkanNotifikasi()
    {
        $notifications = \Spatie\Activitylog\Models\Activity::causedBy(auth()->user())->latest('created_at')->get();
        foreach ($notifications as $notification) {
            $notification->delete();
        }
        $this->dispatch('alert', [
            'title' => 'Berhasil',
            'message' => 'Notifikasi berhasil dibersihkan',
            'type' => 'success',
        ]);
        $this->dispatch('refresh')->self();
    }

}
