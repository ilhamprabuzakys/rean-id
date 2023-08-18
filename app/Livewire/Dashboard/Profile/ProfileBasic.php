<?php

namespace App\Livewire\Dashboard\Profile;

use App\Http\Controllers\EditProfile;
use App\Livewire\Dashboard\Partials\HeaderUserDropdown;
use App\Livewire\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Livewire\Attributes\On;
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

    #[On('file-upload')]
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
        $this->dispatch('user-updated');
        // $this->dispatch('user-updated')->to(HeaderUserDropdown::class);
        $this->dispatch('alert', [
            'title' => 'Berhasil',
            'message' => 'Data Profile berhasil diperbarui',
            'type' => 'success',
        ]);
    }
    

    public function resetField()
    {
        $this->name = auth()->user()->name;
        $this->phone = auth()->user()->phone;
        $this->address = auth()->user()->address;
        $this->email = auth()->user()->email;
        $this->username = auth()->user()->username;
    }
}
