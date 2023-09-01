<?php

namespace App\Livewire\Dashboard\Partials;

use Livewire\Attributes\On;
use Livewire\Component;

class HeaderNotification extends Component
{
    #[On('refresh')]
    public function render()
    {
        $userId = auth()->id();
        $notifications = \Spatie\Activitylog\Models\Activity::causedBy(auth()->user())
        ->orWhereJsonContains('properties->post_author', $userId)  // Jika disimpan sebagai integer
        ->latest('created_at')
        ->get();
        $banyakNotifikasi = $notifications->count();
        return view('livewire.dashboard.partials.header-notification', compact('notifications', 'banyakNotifikasi'));
    }

    public function bersihkanNotifikasi()
    {
        $userId = auth()->id();

        $notifications = \Spatie\Activitylog\Models\Activity::causedBy(auth()->user())
            ->orWhereJsonContains('properties->post_author', $userId)  // Jika disimpan sebagai integer
            ->latest('created_at')
            ->get();
        
        foreach ($notifications as $notification) {
            $notification->delete();
        }
        $this->dispatch('alert', [
            'title' => 'Berhasil',
            'message' => 'Notifikasi berhasil dibersihkan',
            'type' => 'success',
        ]);
        $this->dispatch('refresh');
    }
}
