<?php

namespace App\Mail;

use App\Models\ContactMessage;
use App\Models\Message;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MailNotify extends Mailable
{
    use Queueable, SerializesModels;
    private $data = [];
    public ContactMessage $message;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(ContactMessage $message)
    {
        $this->message = $message;
    }

    // public function __construct($data)
    // {
    //     $this->data = $data;
    // }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        $subject = '';
        if (!$this->message->subject == '') {
            $subject = $this->message->subject;
        }
        return new Envelope(
            from: new Address($this->message->email, $this->message->name),
            subject: $subject . ' - ' . $this->message->name,
            // subject: "Permintaan",
            replyTo: [
                new Address($this->message->email, $this->message->name),
            ],
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
            view: 'mails.index',
            with: [
                'nama_pengirim' => $this->message->name,
                'body' => $this->message->message,
                'email_pengirim' => $this->message->email,
                'subjek_pengirim' => $this->message->subject,

            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        // return [
        //     Attachment::fromStorage('storage/' . $this->message->file_path)
        //             ->as('Berkas.pdf')
        //             ->withMime('application/pdf'),
        // ];
    }

    // public function build()
    // {
    //     return $this->from('makerindo.it@gmail.com', 'Makerindo IT')
    //     ->subject($this->data['subject'])
    //     ->view('mails.index')->with('data', $this->data);
    // }
}
