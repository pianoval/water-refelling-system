<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class TestMail extends Mailable
{
    use Queueable, SerializesModels;

    public string $emailSubject;
    public string $emailMessage;

    public function __construct(
        string $emailSubject,
        string $emailMessage
    ) {
        $this->emailSubject = $emailSubject;
        $this->emailMessage = $emailMessage;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Water Refilling Station - ' . $this->emailSubject,
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'email.testblade',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}