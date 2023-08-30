<?php

namespace App\Livewire\Dashboard\Settings\Security;

use App\Models\User;
use App\Rules\MatchingPassword;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use Livewire\Component;

class PasswordChange extends Component
{
    public $user, $current_password;

    #[Rule('min:6|required', onUpdate: true)]
    public $new_password;

    #[Rule('same:new_password', onUpdate: true)]
    public $confirmation_password;

    protected function rules()
    {
        return [
            'current_password' => ['min:6', 'required', new MatchingPassword],
        ];
    }

    protected $messages = [
        'current_password.required' => 'Password saat ini diperlukan.',
        'new_password.required' => 'Password baru diperlukan',
        'current_password.min' => 'Password saat ini minimal harus 6 karakter.',
        'new_password.min' => 'Password baru minimal harus 6 karakter',
        'confirmation_password.same' => 'Password baru tidak cocok.',
    ];

    protected $validationAttributes = [
        'current_password' => 'Password saat ini',
        'new_password' => 'Password baru',
        'confirmation_password' => 'Konfirmasi password baru',
    ];

    public function render()
    {
        $this->initializeUser();
        return view('livewire.dashboard.settings.security.password-change');
    }

    #[On('refresh')]
    public function initializeUser()
    {
        $this->user = auth()->user();
    }

    public function update()
    {
        if ($this->current_password == null && $this->new_password == null && $this->confirmation_password == null) {
            $this->dispatch('swal:modal', [
                'icon' => 'error',
                'title' => 'Terjadi Kesalahan',
                'text' => 'Jika anda ingin merubah password harap isi semua data yang diperlukan.'
            ]);
        } else {
            try {
                if ($this->new_password === $this->current_password) {
                    $this->addError('new_password', 'Password baru tidak boleh sama dengan password saat ini');
                    $this->dispatch('swal:modal', [
                        'icon' => 'error',
                        'title' => 'Terjadi Kesalahan',
                        'text' => 'Terjadi kesalahan pada input anda: ' . \getErrorsString($this->getErrorBag())
                    ]);
                    return;
                } 
                $this->validate($this->rules(), $this->messages, $this->validationAttributes);
                $user = User::findOrFail(auth()->user()->id);
                $user->disableLogging();
                $user->update(['password' => bcrypt($this->new_password)]);
                activity('Ganti Password')
                    ->causedBy(auth()->user())
                    ->withProperties([
                        'action' => 'update',
                        'action_user' => auth()->user()->id,
                        'message' => 'Berhasil mengganti password anda',
                    ])
                    ->event('ganti-password')
                    ->log('Password anda berhasil diperbarui');

                $this->dispatch('swal:modal', [
                    'icon' => 'success',
                    'title' => 'Update berhasil',
                    'text' => 'Password anda berhasil diganti',
                ]);

                $this->dispatch('alert', [
                    'title' => 'Berhasil',
                    'message' => 'Perubahan password berhasil diterapkan',
                    'type' => 'success',
                ]);
            } catch (ValidationException $e) {
                $this->dispatch('swal:modal', [
                    'icon' => 'error',
                    'title' => 'Terjadi Kesalahan',
                    'text' => 'Ada beberapa kesalahan pada input Anda:<br>' . \getErrorsString($e),
                ]);

                // Mengirim error bag ke komponen Livewire
                $this->setErrorBag($e->validator->getMessageBag());
            }
        }
    }

    public function resetForm()
    {
        $this->current_password = null;
        $this->new_password = null;
        $this->confirmation_password = null;
    }
}
