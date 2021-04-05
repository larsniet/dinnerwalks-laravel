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

    protected $rules = [
        'locatie' => 'required',
        'beschrijving' => 'required|max:50',
    ];

    public function addWalk()
    {
        $this->validate();

        // if (!Team::where('name', $this->locatie)->first()) {
        //     Team::create([
        //         'user_id' => 1,
        //         'name' => $this->locatie,
        //         'personal_team' => false
        //     ]);
        // };
        
        $date = strtotime('10/10/2021');

        Walk::create([
            'locatie' => $this->locatie,
            'beschrijving' => $this->beschrijving,
            "max_aantal_personen" => 2,
            "max_boekings_datum" => date('Y-m-d', $date),
            "prijs" => 3.50
        ]);
        $this->emit('saved');
        return Redirect::back();
    }

    public function render()
    {
        return view('livewire.add-walk');
    }
}
