<?php

namespace App\Livewire\Dashboard\Security;

use App\Models\User;
use Livewire\Component;

class SocialMedia extends Component
{
    protected $listeners = [
        "alertSuccess",
        "alertError",
        "alertInfo",
    ];
    
    public $facebook, $twitter, $instagram, $youtube, $gmail;

    public function rules()
    {
        return [
            'facebook' => $this->facebook == null ? '' : ['min:6', 'regex:/^[^-]*$/'],
            'twitter' => $this->twitter == null ? '' : ['min:6', 'regex:/^[^-]*$/'],
            'instagram' => $this->instagram == null ? '' : ['min:6', 'regex:/^[^-]*$/'],
            'youtube' => $this->youtube == null ? '' : ['min:6', 'regex:/^[^-]*$/'],
            'gmail' => $this->gmail == null ? '' : ['min:6', 'regex:/^[^-]*$/'],
        ];
    }
    

    protected $messages = [
        'facebook.min' => 'Username facebook minimal harus 6 karakter.',
        'facebook.regex' => 'Username facebook tidak boleh mengandung karakter "-".',
        'twitter.min' => 'Username twitter minimal harus 6 karakter.',
        'twitter.regex' => 'Username twitter tidak boleh mengandung karakter "-".',
        'instagram.min' => 'Username instagram minimal harus 6 karakter.',
        'instagram.regex' => 'Username instagram tidak boleh mengandung karakter "-".',
        'youtube.min' => 'Channel youtube minimal harus 6 karakter.',
        'youtube.regex' => 'Channel youtube tidak boleh mengandung karakter "-".',
        'gmail.min' => 'Username gmail minimal harus 6 karakter.',
        'gmail.regex' => 'Username gmail tidak boleh mengandung karakter "-".',
    ];
    
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    
    public function mount()
    {
        $this->facebook = auth()->user()->facebook;
        $this->twitter = auth()->user()->twitter;
        $this->instagram = auth()->user()->instagram;
        $this->youtube = auth()->user()->youtube;
        $this->gmail = auth()->user()->gmail;
    }

    public function render()
    {
        $user = auth()->user();
        return view('livewire.dashboard.security.social-media', compact('user'));
    }
    public function update($id)
    {
        $this->validate();
        $user = User::findOrFail($id);
        $user->update([
            'facebook' => $this->facebook,
            'twitter' => $this->twitter,
            'instagram' => $this->instagram,
            'youtube' => $this->youtube,
            'gmail' => $this->gmail,
        ]);

        $this->emit('alertSuccess', 'Berhasil memperbarui tautan media sosial');
        // \session()->flash("success","Berhasil memperbarui tautan media sosial");
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
