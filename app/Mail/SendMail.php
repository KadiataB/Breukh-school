<?php

namespace App\Mail;

use Faker\Provider\hu_HU\Address;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
     public $message;
     public $subject;
    public function __construct($subject, $message)
    {
        $this->message =$message;
        $this->subject= $subject;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(


        );
    }

    /**
     * Build the message.
     *
     * @return $this
     */

    /**
     * Get the message content definition.
     */
    public function build()
    {
        $libelle=$this->message;
        return $this->view('send', ['libelle'=> $libelle]);

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
