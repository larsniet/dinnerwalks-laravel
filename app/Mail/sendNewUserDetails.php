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
    public $companyName;
    public $email;
    public $location;
    public $password;
    public $link;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($userName, $companyName, $email, $location, $password, $link)
    {
        $this->userName = $userName;
        $this->companyName = $companyName;
        $this->email = $email;
        $this->location = $location;
        $this->password = $password;
        $this->link = $link;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('info@dinnerwalks.nl')
                    ->markdown('emails.userDetails')
                    ->subject("U bent aangemeld bij Dinnerwalks");
    }
}
