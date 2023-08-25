<?php

namespace App\Livewire\Dashboard\Profile;

use App\Http\Controllers\EditProfile;
use App\Livewire\Dashboard\Chats\ChatCreate;
use App\Livewire\Dashboard\Chats\ChatList;
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

    public $name, $description, $email, $username, $avatar, $user;

    public function mount()
    {
        $this->name = auth()->user()->name;
        // $this->avatar = auth()->user()->avatar;
        $this->description = auth()->user()->description;
        $this->email = auth()->user()->email;
        $this->username = auth()->user()->username;
        $this->user = auth()->user();
    }

    public function rules()
    {
        return [
            'name' => ['required', 'min:3', 'max:50'],
            'avatar' => 'nullable|file|image|mimes:jpg,jpeg,png|max:3069',
            'username' => [
                'required', 
                'min:3', 
                'max:30', 
                'regex:/^[a-z][a-z0-9_]*[a-z0-9]+$/',
                Rule::unique('users')->ignore(auth()->user()->id)
            ],
            'description' => ['nullable', 'max:100'],
        ];
    }

    protected $messages = [
        'name.required' => 'Nama harus diisi.',
        'name.min' => 'Nama yang anda masukan terlalu pendek, minimal 3 karakter.',
        'name.max' => 'Nama yang anda masukan terlalu panjang, maksimal hanya 50 karakter.',
        'avatar.mimes' => 'File yang kamu upload harus berformat image (PNG, JPG, JPEG).',
        'username.required' => 'Username tidak boleh kosong, username harus diisi.',
        'username.min' => 'Username terlalu pendek, minimal itu hanya 3 karakter.',
        'username.max' => 'Username terlalu panjang, maksimal itu hanya 20 karakter.',
        'username.regex' => 'Format username tidak valid, format yang valid: a-z / 0-9 / _ /',
        'username.unique' => 'Username ini tidak tersedia, silahkan ganti ke yang lain.',
        'description.max' => 'Deskripsi terlalu panjang, maksimal itu hanya 100 karakter.',
    ];

    public function render()
    {
        return view('livewire.dashboard.profile.profile-basic');
    }

    #[On('file-upload')]
    public function update()
    {
        // // Langkah 2: Validasi data masukan
        $validatedData = $this->validate($this->rules(), $this->messages);

        // dd($validatedData);
        // dd($this->user->avatar);
        // Langkah 3: Jika ada avatar baru yang diunggah
        if ($this->avatar) {
            // Jika ada avatar baru yang diunggah...
            $path = $this->avatar->store('avatar');  
            $validatedData['avatar'] = "storage/" . $path;
            
            // Jika user memiliki avatar lama, hapus dari storage
            if ($this->user->avatar) {
                // Cek apakah avatar lama berasal dari Google
                if (strpos($this->user->avatar, 'lh3.googleusercontent.com') === false) {
                    // Jika bukan dari Google, hapus avatar lama dari storage
                    $oldAvatarPath = str_replace('storage/', '', $this->user->avatar); 
                    Storage::delete($oldAvatarPath);
                }
            }
        } else {
            // Jika tidak ada avatar baru yang diunggah, hapus `avatar` dari `$validatedData`
            unset($validatedData['avatar']);
        }
        
    
        // Langkah 4: Perbarui data pengguna
        $this->user->update($validatedData);

        $this->dispatch('user-updated')->to(HeaderUserDropdown::class);
        $this->dispatch('refresh')->to(ChatList::class);
        $this->dispatch('refresh')->to(ChatCreate::class);
        
        $this->dispatch('alert', [
            'title' => 'Berhasil',
            'message' => 'Data Profile berhasil diperbarui',
            'type' => 'success',
        ]);
    }
    

    public function resetField()
    {
        $this->name = auth()->user()->name;
        $this->description = auth()->user()->description;
        $this->email = auth()->user()->email;
        $this->username = auth()->user()->username;
        $this->avatar = null;
    }
}
