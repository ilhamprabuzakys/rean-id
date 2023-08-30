<?php

namespace App\Livewire\Dashboard\Settings;

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

    public $name, $description, $email, $username, $avatar, $old_avatar, $user;
    public $firstTimeUpdate = true;

    public function mount()
    {
        $this->name = auth()->user()->name;
        $this->old_avatar = auth()->user()->avatar;
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
        'avatar.mimes' => 'Avatar file yang kamu upload harus berformat image (PNG, JPG, JPEG).',
        'avatar.file' => 'Avatar harus berupa file.',
        'avatar.image' => 'Avatar harus berupa file image',
        'username.required' => 'Username tidak boleh kosong, username harus diisi.',
        'username.min' => 'Username terlalu pendek, minimal itu hanya 3 karakter.',
        'username.max' => 'Username terlalu panjang, maksimal itu hanya 20 karakter.',
        'username.regex' => 'Format username tidak valid, format yang valid: a-z / 0-9 / _ /',
        'username.unique' => 'Username ini tidak tersedia, silahkan ganti ke yang lain.',
        'description.max' => 'Deskripsi terlalu panjang, maksimal itu hanya 100 karakter.',
    ];

    #[On('refresh')]
    public function render()
    {
        return view('livewire.dashboard.settings.profile-basic');
    }

    #[On('initializeUser')]
    public function initializeUser()
    {
        $this->user = auth()->user();
    }

    #[On('cancelAvatar')]
    public function cancelAvatar()
    {
        $this->avatar = null;
    }

    #[On('file-upload')]
    public function update()
    {
        // dd(is_object($this->avatar));
        if ($this->name === $this->user->name && $this->email === $this->user->email && $this->username === $this->user->username && !is_object($this->avatar) && $this->old_avatar === $this->user->avatar && $this->description === $this->user->description) {
            $this->dispatch('alert', [
                'title' => 'Tidak Ada Perubahan',
                'message' => 'Data profil tidak berubah.',
                'type' => 'info',
            ]);
            return;
        } else {
            try {
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
                    $this->old_avatar = $validatedData['avatar'];
                    $this->avatar = null;
                } else {
                    // Jika tidak ada avatar baru yang diunggah, hapus `avatar` dari `$validatedData`
                    unset($validatedData['avatar']);
                }


                // Langkah 4: Perbarui data pengguna
                $this->user->disableLogging();
                $this->user->update($validatedData);
                $this->firstTimeUpdate = false;
                // Log aktivitas
                activity('Profile')
                    ->causedBy($this->user)
                    ->withProperties([
                        'action' => 'update',
                        'action_user' =>  $this->user->id,
                        'message' => 'Berhasil memperbarui Data Profile anda',
                    ])
                    ->event('profile')
                    ->log('Profile anda berhasil diperbarui');

                $this->dispatch('initializeUser');
                $this->dispatch('user-updated')->to(HeaderUserDropdown::class);
                // $this->dispatch('refresh')->to(ChatList::class);
                // $this->dispatch('refresh')->to(ChatCreate::class);
                $this->dispatch('refresh');
                $this->dispatch('alert', [
                    'title' => 'Berhasil',
                    'message' => 'Data Profile berhasil diperbarui',
                    'type' => 'success',
                ]);
            } catch (\Illuminate\Validation\ValidationException $e) {
                $this->dispatch('alert', [
                    'title' => 'Gagal Memperbarui',
                    'message' => 'Data Profile gagal diperbarui',
                    'type' => 'error',
                ]);
                $this->dispatch('swal:modal', [
                    'title' => 'Gagal Memperbarui',
                    'text' => 'Data Profile gagal diperbarui: ' . \getErrorsString($e),
                    'icon' => 'error',
                ]);
            }
        }
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
