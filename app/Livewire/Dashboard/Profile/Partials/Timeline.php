<?php

namespace App\Livewire\Dashboard\Profile\Partials;

use Illuminate\Support\Carbon;
use Livewire\Attributes\On;
use Livewire\Component;
use Spatie\Activitylog\Models\Activity;

class Timeline extends Component
{
    #[On('refresh')]
    public function render()
    {
        $timelines = Activity::causedBy(auth()->user())->latest('created_at')->get();

        return view('livewire.dashboard.profile.partials.timeline', compact('timelines'));
    }

    public function deleteYesterday()
    {
        $yesterday = Carbon::yesterday();

        $dataCount = Activity::causedBy(auth()->user())
            ->whereDate('created_at', $yesterday)
            ->count();

        if ($dataCount > 0) {
            Activity::causedBy(auth()->user())
                ->whereDate('created_at', $yesterday)
                ->delete();
            $this->dispatch('refresh')->self();
            $this->dispatch('alert', [
                'title' => 'Berhasil dihapus',
                'message' => 'Data 1 hari yang lalu berhasil dihapus.',
                'type' => 'info',
            ]);
        } else {
            $this->dispatch('alert', [
                'title' => 'Tidak Ada Data',
                'message' => 'Tidak ada data dari kemarin.',
                'type' => 'info',
            ]);
        }
    }

    public function delete7DaysAgo()
    {
        $date = Carbon::now()->subDays(7);

        $dataCount = Activity::causedBy(auth()->user())
            ->whereDate('created_at', '<=', $date)
            ->count();

        if ($dataCount > 0) {
            Activity::causedBy(auth()->user())
                ->whereDate('created_at', '<=', $date)
                ->delete();
            $this->dispatch('refresh')->self();
            $this->dispatch('alert', [
                'title' => 'Berhasil dihapus',
                'message' => 'Data 7 hari yang lalu berhasil dihapus.',
                'type' => 'success',
            ]);
        } else {
            $this->dispatch('alert', [
                'title' => 'Tidak Ada Data',
                'message' => 'Tidak ada data dari 7 hari yang lalu.',
                'type' => 'info',
            ]);
        }
    }

    public function delete1MonthAgo()
    {
        $date = Carbon::now()->subMonth();

        $dataCount = Activity::causedBy(auth()->user())
            ->whereDate('created_at', '<=', $date)
            ->count();

        if ($dataCount > 0) {
            Activity::causedBy(auth()->user())
                ->whereDate('created_at', '<=', $date)
                ->delete();
            $this->dispatch('refresh')->self();
            $this->dispatch('alert', [
                'title' => 'Berhasil dihapus',
                'message' => 'Data 1 bulan yang lalu berhasil dihapus.',
                'type' => 'success',
            ]);
        } else {
            $this->dispatch('alert', [
                'title' => 'Tidak Ada Data',
                'message' => 'Tidak ada data dari 1 bulan yang lalu.',
                'type' => 'info',
            ]);
        }
    }
}
