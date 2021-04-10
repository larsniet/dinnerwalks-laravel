<?php

namespace App\Http\Livewire;

use Livewire\WithFileUploads;
use Livewire\Component;
use App\Models\Walk;
use App\Models\Team;
use Redirect;

class AddWalk extends Component
{
    use WithFileUploads;

    public $locatie;
    public $beschrijving;
    public $kosten;
    public $personen;
    public $preview;

    protected $rules = [
        'locatie' => 'required|unique:walks',
        'beschrijving' => 'required|max:50',
        'kosten' => 'required',
        'personen' => 'required',
        'preview' => 'required'
    ];

    public function addWalk()
    {
        $this->validate();
        
        $date = strtotime('15/10/2021');

        $preview = $this->preview->store('public/walks/'.$this->locatie);

        Walk::create([
            'locatie' => $this->locatie,
            'beschrijving' => $this->beschrijving,
            'preview' => "storage/".trim($preview, "public/"),
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
