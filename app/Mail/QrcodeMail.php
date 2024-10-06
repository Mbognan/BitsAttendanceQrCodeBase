<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class QrcodeMail extends Mailable
{
    use Queueable, SerializesModels;


    public $qrCodeBinary;
    public $fileName;
    public $studentId;

    public function __construct($qrCodeBinary, $fileName,$studentId)
    {

        $this->qrCodeBinary = $qrCodeBinary;
        $this->fileName = $fileName;
        $this->studentId = $studentId;
    }

    public function build()
    {
        return $this->subject('Your Generated QR Code')
                    ->view('emails.qr-code')
                    ->attachData($this->qrCodeBinary, $this->fileName, [
                        'mime' => 'image/png',
                    ]);
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Qrcode Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.qr-code',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */




}
