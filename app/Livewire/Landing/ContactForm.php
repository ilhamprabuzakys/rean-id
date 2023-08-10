<?php

namespace App\Livewire\Landing;

use App\Mail\MailNotify;
use App\Models\ContactMessage;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class ContactForm extends Component
{
    protected $listeners = [
        "alertS",
        "alertE",
    ];

    public $name, $email, $subject, $message;

    public function rules()
    {
        return [
            'name' => ['required', 'min:2'],
            'email' => ['required', 'min:4', 'email'],
            'subject' => ['required', 'min:4'],
            'message' => ['required', 'min:10', 'max:255'],
        ];
    }

    protected $messages = [
        'name.required' => 'Nama harus diisi.',
        'name.min' => 'Nama yang kamu masukkan terlalu pendek.',
        'email.required' => 'Email itu wajib diisi.',
        'email.email' => 'Format email tidak valid, tolong gunakan @',
        'subject.required' => 'Subjek itu wajib diisi.',
        'subject.min' => 'Subjek kamu terlalu pendek.',
        'message.min' => 'Pesan yang kamu masukkan terlalu pendek.',
    ];
 
    protected $validationAttributes = [
        'email' => 'email address',
        'subject' => 'subjek',
        'message' => 'pesan',
    ];

    public function updated($propertyName)
    {
        if ($propertyName == $this->email) {
            $this->validateOnly($propertyName);
        }
    }

    public function render()
    {
        return view('livewire.landing.contact-form');
    }

    public function store()
    {
        $this->validate();
        $message = ContactMessage::create($this->all());

        try {
            Mail::to(\env('MAIL_USERNAME'))->send(new MailNotify($message));
            session()->flash('success', 'Pesan yang kamu tulis <b>berhasil</b> dikirim!');
        } catch (\Throwable $th) {
            session()->flash('fails', 'Terjadi <b>kesalahan</b>, periksa kembali pesanmu.');
        }

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
