<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

function translate_names($eng) {
    $names = array (
        'January' => 'January',
        'Februari' => 'February',
        'Maart' => 'March',
        'April' => 'April',
        'Mei' => 'May',
        'Juni' => 'June',
        'Juli' => 'July',
        'Augustus' => 'August',
        'September' => 'September',
        'Oktober' => 'October',
        'November' => 'November',
        'December' => 'December',
    );
    return array_search($eng, $names);
}

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
    public $plaats;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($naam, $email, $datum, $kortingscode, $personen, $prijs, $url, $plaats)
    {
        $month = addcslashes(translate_names(date('F', strtotime($datum))), 'a..zA..Z');
        $string = "d $month Y";
        $datum = date($string, strtotime($datum));

        $this->naam = $naam;
        $this->email = $email;
        $this->datum = $datum;
        $this->kortingscode = $kortingscode;
        $this->personen = $personen;
        $this->prijs = $prijs;
        $this->url = $url;
        $this->plaats = $plaats;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.sendBoekingDetails')
                    ->subject("Uw boeking bij Dinnerwalks");
    }
}
