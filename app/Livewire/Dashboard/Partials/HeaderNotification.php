<?php

namespace App\Livewire\Dashboard\Partials;

use Livewire\Attributes\On;
use Livewire\Component;
use Spatie\Activitylog\Models\Activity;

class HeaderNotification extends Component
{
    #[On('refresh')]
    public function render()
    {
        $userId = auth()->id();
        // Ambil semua log dengan event bernama 'global'
        $globalNotifications = Activity::where('event', 'global')->latest('created_at')->get();

        // Ambil log yang disebabkan oleh user tertentu
        $userNotifications = Activity::causedBy(auth()->user())
            ->orWhereJsonContains('properties->post_author', auth()->user()->id)
            ->latest('created_at')
            ->get();

        // Gabungkan kedua collections dan filter untuk memastikan tidak ada duplikasi berdasarkan id
        $allNotifications = $globalNotifications->concat($userNotifications)->unique('id');

        // Jika Anda ingin hasilnya tetap diurutkan berdasarkan 'created_at', Anda bisa menambahkan:
        $notifications = $allNotifications->sortByDesc('created_at');
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
