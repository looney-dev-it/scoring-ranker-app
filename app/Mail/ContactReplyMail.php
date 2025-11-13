<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;
class ContactReplyMail extends Mailable
{
    use Queueable, SerializesModels;

    public $originalMessage;
    public $reply;

    /**
     * Create a new message instance.
     */
    public function __construct($originalMessage, $reply)
    {
        $this->originalMessage = $originalMessage;
        $this->reply   = $reply;
    }
    
    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Contact Request Reply Mail',
            from: new Address('no-reply-scoring-ranker@gmail.com', 'Scoring Contact Answer'),
        );

    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.contact-reply',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
