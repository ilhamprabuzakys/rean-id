<?php

namespace App\Livewire\Auth;

use App\Livewire\Dashboard\Chats\ChatCreate;
use App\Livewire\Dashboard\Chats\ChatList;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class Logout extends Component
{
    public function render()
    {
        return view('livewire.auth.logout');
    }

    public function logout()
    {
        // Update status user ke 'offline'
        Auth::user()->update(['status' => 'offline']);

        // Logout user
        Auth::logout();

        // Invalidasi sesi dan regenerasi token
        session()->invalidate();
        session()->regenerateToken();

        // Mengirimkan notifikasi ke frontend (jika diperlukan)

        // Redirect ke halaman login
        $this->redirect('/login');

        // Kemudian, kirim event ke komponen lain
        /* $this->dispatch('refresh')->to(ChatList::class);
        $this->dispatch('refresh')->to(ChatCreate::class); */
    }
}
