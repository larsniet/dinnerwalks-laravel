<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class sendBoekingDetails extends Mailable
{
    use Queueable, SerializesModels;
    
    public $naam;
    public $email;
    public $datum;
    public $kortingscode;
    public $personen;
    public $prijs;
    public $url;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($naam, $email, $datum, $kortingscode, $personen, $prijs, $url)
    {
        $this->naam = $naam;
        $this->email = $email;
        $this->datum = $datum;
        $this->kortingscode = $kortingscode;
        $this->personen = $personen;
        $this->prijs = $prijs;
        $this->url = $url;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.sendBoekingDetails')->subject("Uw boeking bij Dinnerwalks");
    }
}
