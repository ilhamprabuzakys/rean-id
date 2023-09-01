<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class UserRegistrationMail extends Mailable
{
    use Queueable, SerializesModels;
    public $data = [];

    /**
     * Create a new message instance.
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Get the message envelope.
     */
    public function envelope()
    {
        return new Envelope(
            from: new Address("callcenter@bnn.go.id", "REAN.ID"),
            subject: "Informasi Akun anda untuk REAN.ID",
            // subject: "Permintaan",
            // replyTo: [
            //     new Address($this->data['user_email'], $this->data['user_nama']),
            // ],
        );
    }

    /**
     * Get the message content definition.
     */
    public function content()
    {
        return new Content(
            view: 'mails.registration',
            with: [
                'name' => $this->data['name'],
                'email' => $this->data['email'],
                'username' => $this->data['username'],
                'password' => $this->data['password'],
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments()
    {
        return [];
    }
}
