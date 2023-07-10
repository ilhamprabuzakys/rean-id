<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MailOtp extends Mailable
{
    use Queueable, SerializesModels;
    public $data = [];
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            from: new Address("callcenter@bnn.go.id", "REAN.ID"),
            subject: "Kode OTP untuk verifikasi Email",
            // subject: "Permintaan",
            // replyTo: [
            //     new Address($this->data['user_email'], $this->data['user_nama']),
            // ],
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'mails.otp',
            with: [
                'otp' => $this->data['otp'],
                'user_nama' => $this->data['user_nama'],
                'user_email' => $this->data['user_email'],
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
