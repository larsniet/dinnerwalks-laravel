<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Walk;
use App\Models\Team;
use Redirect;

class AddWalk extends Component
{
    public $locatie;
    public $beschrijving;
    public $kosten;
    public $personen;

    protected $rules = [
        'locatie' => 'required',
        'beschrijving' => 'required|max:50',
        'kosten' => 'required',
        'personen' => 'required'
    ];

    public function addWalk()
    {
        $this->validate();
        
        $date = strtotime('15/10/2021');

        Walk::create([
            'locatie' => $this->locatie,
            'beschrijving' => $this->beschrijving,
            "max_aantal_personen" => $this->personen,
            "max_boekings_datum" => date('Y-m-d', $date),
            "prijs" => $this->kosten
        ]);
        $this->emit('saved');
        return Redirect::back();
    }

    public function render()
    {
        return view('livewire.add-walk');
    }
}
