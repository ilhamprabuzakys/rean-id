<?php

namespace App\Livewire\Dashboard\Settings\Security;

use Illuminate\Support\Facades\Password;
use Livewire\Attributes\On;
use Livewire\Component;

class ResetPasswordLink extends Component
{
    public $email;

    public function mount()
    {
        // Ambil email dari user yang sedang masuk
        $this->email = auth()->user()->email;
    }

    public function sendResetPasswordLink()
    {
        $response = Password::sendResetLink(['email' => $this->email]);

        if ($response === Password::RESET_LINK_SENT) {
            // Anda dapat menampilkan pesan sukses ke pengguna menggunakan flash message
            $this->dispatch('swal:modal', [
                'title' => 'Berhasil',
                'text' => 'Link untuk reset password berhasil dikirim ke email <b>' . $this->email . '</b>',
                'icon' => 'success',
            ]);
            $this->dispatch('close:modal');
        } else {
            // Pesan error jika link gagal dikirim
            $this->dispatch('alert', [
                'title' => 'Gagal',
                'message' => 'Gagal mengirim link reset password, tolong coba lagi.',
                'type' => 'error',
            ]);
        }
    }


    public function render()
    {
        return view('livewire.dashboard.settings.security.reset-password-link');
    }

}
