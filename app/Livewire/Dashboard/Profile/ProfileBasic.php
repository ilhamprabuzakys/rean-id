<?php

namespace App\Livewire\Dashboard\Profile;

use App\Http\Controllers\EditProfile;
use App\Livewire\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProfileBasic extends Component
{
    use WithFileUploads;

    protected $listeners = [
        "swalS",
        "alertSuccess",
        "alertError",
        "alertInfo",
        'fileUpload' => 'update',
        'refresh-me' => '$refresh',
    ];
    public $name, $phone, $address, $email, $username, $avatar, $user;

    public function mount()
    {
        $this->name = auth()->user()->name;
        // $this->avatar = auth()->user()->avatar;
        $this->phone = auth()->user()->phone;
        $this->address = auth()->user()->address;
        $this->email = auth()->user()->email;
        $this->username = auth()->user()->username;
        $this->user = auth()->user();
    }

    public function render()
    {
        return view('livewire.dashboard.profile.profile-basic');
    }

    public function update()
    {
        // // Langkah 2: Validasi data masukan
        $validatedData = $this->validate([
            'name' => 'required',
            'avatar' => 'nullable|file|image|mimes:jpg,jpeg,png,svg|max:2048',
            'username' => ['required', Rule::unique('users')->ignore(auth()->user()->id)],
            'phone' => 'nullable',
            'address' => 'nullable',
        ], [
            'avatar.mimes' => 'File yang kamu upload harus berformat image (PNG, JPG, JPEG).',
            'username.unique' => 'Username ini tidak tersedia, silahkan ganti ke yang lain.'
        ]);

        // dd($validatedData);
        // dd($this->user->avatar);
        // Langkah 3: Jika ada avatar baru yang diunggah
        if ($this->avatar) {
            // Jika ada avatar baru yang diunggah...
            $path = $this->avatar->store('avatar');  
            $validatedData['avatar'] = "storage/" . $path;
            
            // Jika user memiliki avatar lama, hapus dari storage
            if ($this->user->avatar) {
                $oldAvatarPath = str_replace('storage/', '', $this->user->avatar); 
                Storage::delete($oldAvatarPath);
            }
        } else {
            // Jika tidak ada avatar baru yang diunggah, hapus `avatar` dari `$validatedData`
            unset($validatedData['avatar']);
        }
        
    
        // Langkah 4: Perbarui data pengguna
        $this->user->update($validatedData);
        // $this->user->update($this->all());
        // dd('hey');
        
        // Kirim pesan kesuksesan atau apa pun yang Anda perlukan
        $this->emit("handleUpdate", true);
        $this->emitSelf('refresh-me');
        // $this->emit('forceRefreshDropdown');
        $this->emitTo('Dashboard.Partials.HeaderUserDropdown', 'updatedUser');
        $this->emit('swalS', 'Penambahan Data', 'Data berhasil ditambahkan');

    }
    

    public function resetField()
    {
        $this->name = auth()->user()->name;
        $this->phone = auth()->user()->phone;
        $this->address = auth()->user()->address;
        $this->email = auth()->user()->email;
        $this->username = auth()->user()->username;
    }

    public function handleUpdate($status){
        if ($status == true) {
            $this->emit('alertSuccess', 'Profil anda berhasil diperbarui');
        } else {
            $this->emit('alertError', 'Profil anda gagal diperbarui');
        }
    }

    public function alertSuccess($message, $title = 'Berhasil')
    {
        $this->dispatchBrowserEvent('alert', ['type' => 'success', 'title' => $title, 'message' => $message]);
    }
  
    public function swalS($title, $text)
    {
        $this->emit('swalBasic', [
            'icon' => 'success',
            'title' => $title,
            'text' => $text,
        ]);
    }

    public function swalE($title, $text)
    {
        $this->emit('swalBasic', [
            'icon' => 'error',
            'title' => $title,
            'text' => $text,
        ]);
    }
}
