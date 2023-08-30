<?php

namespace App\Livewire\Dashboard\Settings;

use App\Models\User;
use Livewire\Component;

class SocialMedia extends Component
{
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
        return view('livewire.dashboard.settings.social-media', compact('user'));
    }

    public function update()
    {
        if ($this->facebook == null && $this->twitter == null && $this->instagram == null && $this->youtube == null && $this->gmail == null) {
            $this->dispatch('swal:modal', [
                'icon' => 'error',
                'title' => 'Terjadi Kesalahan',
                'text' => 'Jika anda ingin menautkan social media harap isi data dengan benar',
            ]);
        } else {
            try {
                $this->validate();
                auth()->user()->update([
                    'facebook' => $this->facebook,
                    'twitter' => $this->twitter,
                    'instagram' => $this->instagram,
                    'youtube' => $this->youtube,
                    'gmail' => $this->gmail,
                ]);
                $this->dispatch('alert', [
                    'title' => 'Berhasil',
                    'message' => 'Berhasil memperbarui tautan media sosial anda',
                    'type' => 'success',
                ]);
            } catch (\Illuminate\Validation\ValidationException $e) {
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
}
