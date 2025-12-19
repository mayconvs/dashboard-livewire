<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Support\Facades\Storage;

class NewUserConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(
        public $name, public $email, public $confirmation_link
    )
    {
        $this->name = $name;
        $this->email = $email;
        $this->confirmation_link = $confirmation_link;
    }

    public function build()
    {
        return $this->subject('Confirme seu cadastro')
                    ->view('mail.new_user_confirmation')
                    ->with([
                        'name' => $this->name,
                        'confirmation_link' => $this->confirmation_link,
                    ]);
    }


    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address(env('MAIL_ADMIN'), env('APP_NAME')),
            subject: 'Confirme seu e-mail - ' . env('APP_NAME'),
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.new_user_confirmation',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    /* public function attachments(): array
    {
        return [
            Attachment::fromPath(public_path(Storage::url('logo1-horizontal.svg')))
                ->as('logo.png')
                ->withMime('image/png'),
        ];
    } */
}
