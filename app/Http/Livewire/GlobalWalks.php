<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Walk;
use DateTime;
use Redirect;

class GlobalWalks extends Component
{
    public $max_booking_date;
    public $max_people;
    public $price;

    public function editWalks() 
    {
        $walks = Walk::all();
        foreach($walks as $walk) {
            $walk->max_booking_date = DateTime::createFromFormat('Y-m-d', $this->max_booking_date);
            $walk->max_people = $this->max_people;
            $walk->price = $this->price;
            $walk->save();
        }
        $this->emit('saved');
        return Redirect::back();
    }

    public function render()
    {
        $walk = Walk::where('id', 1)->first();
        $this->max_booking_date = $walk->max_booking_date->format("Y-m-d");
        $this->max_people = $walk->max_people;
        $this->price = $walk->price;
        return view('livewire.global-walks');
    }
}
