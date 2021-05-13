<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class sendContactForm extends Mailable
{
    use Queueable, SerializesModels;

    public $naam;
    public $email;
    public $bericht;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($naam, $email, $bericht)
    {
        $this->naam = $naam;
        $this->email = $email;
        $this->bericht = $bericht;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->email)
                    ->markdown('emails.contactForm')
                    ->subject("Contactformulier is ingevuld");
    }
}
