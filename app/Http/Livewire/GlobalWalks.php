<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Walk;
use DateTime;
use Redirect;

class GlobalWalks extends Component
{
    public $maxdate;
    public $max_aantal_personen;
    public $prijs;

    public function editWalks() 
    {
        $walks = Walk::all();
        foreach($walks as $walk) {
            $walk->max_boekings_datum = DateTime::createFromFormat('Y-m-d', $this->maxdate);
            $walk->max_aantal_personen = $this->max_aantal_personen;
            $walk->prijs = $this->prijs;
            $walk->save();
        }
        $this->emit('saved');
        return Redirect::back();
    }

    public function render()
    {
        $walk = Walk::where('id', 1)->first();
        $this->maxdate = $walk->max_boekings_datum->format("Y-m-d");
        $this->max_aantal_personen = $walk->max_aantal_personen;
        $this->prijs = $walk->prijs;
        return view('livewire.global-walks');
    }
}
