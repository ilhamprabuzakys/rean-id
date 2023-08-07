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
        "alertSuccess",
        "alertError",
        "alertInfo",
        'fileUpload' => 'update',
    ];
    public $name, $phone, $address, $email, $username, $avatar, $user;

    public function mount()
    {
        $this->name = auth()->user()->name;
        $this->avatar = auth()->user()->avatar;
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
        // dd($this->all());
        $validator = Validator::make($this->all(), [
            'name' => 'required',
            'avatar' => 'max:2048',
            'username' => ['required', Rule::unique('users')->ignore(auth()->user()->id)],
        ], [
            'avatar.mimes' => 'File yang kamu upload harus berformat image (PNG, JPG, JPEG).',
            'username.unique' => 'Username ini tidak tersedia, silahkan ganti ke yang lain.'
        ]);
        if ($validator->fails()) {
            dd($this->avatar, $validator->errors());
            // return redirect()->back()->withErrors($validator)->withInput();
        }
        $validatedData = $validator->validated();

        // $validatedData = $this->validate([
        //     'name' => 'required',
        //     'avatar' => 'file|image|mimes:jpg,jpeg,png,svg|max:2048',
        //     'username' => ['required', Rule::unique('users')->ignore(auth()->user()->id)],
        // ], [
        //     'avatar.mimes' => 'File yang kamu upload harus berformat image (PNG, JPG, JPEG).',
        //     'username.unique' => 'Username ini tidak tersedia, silahkan ganti ke yang lain.'
        // ]);
        
        $originalName = $this->avatar->getClientOriginalName();
        $timestamp = Carbon::now()->format('H:i:s_l_Y');
        $newFileName = $timestamp . '_' . $originalName;
            
        $data = [
            "name" => $this->name,
            "email" => $this->email,
            "username" => $this->username,
            "phone" => $this->phone,
            "address" => $this->address,
            "avatar" => $this->avatar,
        ];
        $user = User::where("slug",$this->email)->first();

        $edit = new EditProfile();
        $status = $edit->storeDataUpdate($data,$user);
        if ($status == true) {
            $this->emit("handleUpdate",$status);
        } else{
            $this->emit("handleUpdate",$status);
        }

        // dd($this->avatar->storeAs('profile-picture', $newFileName));
        /* try {
            Storage::putFileAs("avatar",$this->avatar,$newFileName);
            // $this->avatar->storeAs('profile-picture', $newFileName);
        } catch (\Throwable $th) {
            dd($th);
        }
        // dd($this->all());
        $this->user->update([
            'name' => $this->name,
            'phone' => $this->phone,
            'address' => $this->address,
            'username' => $this->username,
            'avatar' => 'storage/avatar/' . $newFileName
        ]); */

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
  
    public function alertError($message, $title = 'Error')
    {
        $this->dispatchBrowserEvent('alert', ['type' => 'error',  'title' => $title, 'message' => $message]);
    }
  
    public function alertInfo($message, $title = 'Informasi')
    {
        $this->dispatchBrowserEvent('alert', ['type' => 'info',  'title' => $title, 'message' => $message]);
    }
}
