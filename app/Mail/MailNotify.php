<?php

namespace App\Mail;

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
    public Message $message;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Message $message)
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
        return new Envelope(
            from: new Address($this->message->email_pengirim, $this->message->nama_pengirim . ' ' . $this->message->jabatan_pengirim),
            subject: $this->message->sekolah_nama . ' - ' . $this->message->magang_bidang,
            // subject: "Permintaan",
            replyTo: [
                new Address($this->message->email_pengirim, $this->message->nama_pengirim),
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
                'sekolah' => $this->message->sekolah_nama,
                'sekolah_jurusan' => $this->message->sekolah_jurusan,
                'sekolah_kelas' => $this->message->sekolah_kelas . '-' . $this->message->sekolah_jurusan . '-' . $this->message->sekolah_tingkat,
                'magang_bidang' => $this->message->magang_bidang,
                'body' => $this->message->pesan_utama,
                'jabatan_pengirim' => $this->message->jabatan_pengirim,
                'nama_pengirim' => $this->message->nama_pengirim,
                'email_pengirim' => $this->message->email_pengirim,
                'phone_pengirim' => $this->message->phone_pengirim,

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
