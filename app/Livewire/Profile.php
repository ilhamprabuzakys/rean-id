<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class Profile extends Component
{
    use WithFileUploads;
    public $user_id, $name, $address, $notelp, $profile_path;

    public function rules() 
    {
        return [
            'name' => 'required',
            'profile_path' => 'image|max:1024'
        ];
    }
 
    protected $messages = [
        'name.required' => 'Kolom nama harus terisi.',
        'notelp.min:8' => 'Kolom nomor telepon minimal harus 8 karakter.',
        'address.min:10' => 'Kolom alamat minimal harus 10 karakter.',
    ];
 
    protected $validationAttributes = [
        'name' => 'name',
        'notelp' => 'nomor telepon',
        'address' => 'alamat',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function saveChanges()
    {
        $validatedData = $this->validate();
        $this->profile_path->store('photos');
        $user = User::find($this->user_id)->update([
            'name' => $validatedData['name'],
            'notelp' => $validatedData['address'],
            'address' => $validatedData['address'],
            'profile_path' => $validatedData['profile_path'],
        ]);
        
    }

    public function render()
    {
        $user = auth()->user();
        return view('livewire.profile.detail', ['user' => $user]);
    }
}
