<?php

namespace App\Livewire\Dashboard\Security;

use App\Models\User;
use App\Rules\MatchingPassword;
use Livewire\Component;

class PasswordChange extends Component
{
    protected $listeners = [
        "alertSuccess",
        "alertError",
        "alertInfo",
    ];
    
    public $current_password, $new_password, $confirmation_password;

    protected function rules()
    {
        return [
            'current_password' => ['min:6', 'required', new MatchingPassword],
            'new_password' => ['min:6', 'required'],
            'confirmation_password' => ['same:new_password'],
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
        $user_id = auth()->user()->id;
        return view('livewire.dashboard.security.password-change', compact('user_id'));
    }

    public function update($id)
    {
        $this->validate([
            'current_password' => ['min:6', 'required', new MatchingPassword],
            'new_password' => ['min:6', 'required'],
            'confirmation_password' => ['same:new_password'],
        ]);

        User::findOrFail($id)->update(['password' => bcrypt($this->new_password)]);

        $this->emit('alertSuccess', 'Password anda berhasil diperbarui');
        \session()->flash("success", "Password anda berhasil diperbarui");
    }

    public function resetForm()
    {
        $this->current_password = null;
        $this->new_password = null;
        $this->confirmation_password = null;
    }

    public function alertSuccess($message, $title = 'Berhasil')
    {
        $this->dispatchBrowserEvent('alert', ['type' => 'success', 'title' => $title, 'message' => $message]);
    }
  
    public function alertError($message, $title = 'Error')
    {
        $this->dispatchBrowserEvent('alert', ['type' => 'error',  'title' => $title, 'message' => $message]);
    }
  
    public function alertInfo($message, $title = 'Informasi')
    {
        $this->dispatchBrowserEvent('alert', ['type' => 'info',  'title' => $title, 'message' => $message]);
    }
}
