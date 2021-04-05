<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class sendNewUserDetails extends Mailable
{
    use Queueable, SerializesModels;

    public $userName;
    public $naam;
    public $email;
    public $locatie;
    public $password;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($userName, $naam, $email, $locatie, $password)
    {
        $this->userName = $userName;
        $this->naam = $naam;
        $this->email = $email;
        $this->locatie = $locatie;
        $this->password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.userDetails')->subject("U bent aangemeld bij Dinnerwalks");
    }
}
