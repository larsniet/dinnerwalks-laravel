<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Walk;
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
        
        Walk::create([
            'locatie' => $this->locatie,
            'beschrijving' => $this->beschrijving,
        ]);
        $this->emit('saved');
        return Redirect::back();
    }

    public function render()
    {
        return view('livewire.add-walk');
    }
}
