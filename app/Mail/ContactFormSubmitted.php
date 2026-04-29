<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactFormSubmitted extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @param array{first_name:string,last_name:string,email:string,subject:string,message:string,phone?:string|null} $data
     */
    public function __construct(public array $data)
    {
    }

    public function build(): self
    {
        return $this
            ->subject('Contact Form: ' . ($this->data['subject'] ?? 'New Message'))
            ->replyTo($this->data['email'] ?? config('mail.from.address'))
            ->view('emails.contact-form-submitted', [
                'data' => $this->data,
            ]);
    }
}

