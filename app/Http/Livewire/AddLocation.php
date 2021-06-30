<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Location;
use Redirect;

class AddLocation extends Component
{
    public $location; 

    protected $rules = [
        'location' => 'required|alpha_dash',
    ];

    public function render()
    {
        return view('livewire.add-location');
    }

    public function addLocation() 
    {
        $this->validate();

        Location::create([
            'name' => $this->location,
        ]);

        $this->emit('saved');
        return Redirect::back();
    }
}
