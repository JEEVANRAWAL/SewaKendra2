<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class UserCredentialsMail extends Mailable
{
    use Queueable, SerializesModels;

    public $username;
    public $password;
    public $recipientEmail;

    /**
     * Create a new message instance.
     */
    public function __construct($username, $password, $recipientEmail)
    {
        $this->username = $username;
        $this->password = $password;
        $this->recipientEmail= $recipientEmail;
    }




    public function build()
    {
        return $this->to($this->recipientEmail)->view('emails.credentials')
                    ->subject('Your Account Credentials');
    }

    /**
     * Get the message envelope.
     */
    // public function envelope(): Envelope
    // {
    //     return new Envelope(
    //         subject: 'User Credentials Mail',
    //     );
    // }

    /**
     * Get the message content definition.
      */
    // public function content(): Content
    // {
    //     return new Content(
    //         view: 'view.name',
    //     );
    // }

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
