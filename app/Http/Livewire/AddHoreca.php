<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Horeca;
use App\Models\Walk;
use Livewire\WithFileUploads;
use Redirect;

class AddHoreca extends Component
{
    use WithFileUploads;

    public $naam;
    public $email;
    public $logo;
    public $adres;
    public $instagram;
    public $facebook;
    public $website;
    public $walk; 

    protected $rules = [
        'naam' => 'required',
        'email' => 'required|max:50',
        'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'adres' => 'required|max:50',
        'instagram' => 'required|max:255',
        'facebook' => 'required|max:255',
        'website' => 'required|max:255',
        'walk' => 'required|max:50',
    ];

    public function addHoreca()
    {
        $this->validate();

        $logo = $this->logo->store('images');
        $walk = Walk::where("locatie", $this->walk)->first();

        Horeca::create([
            'naam' => $this->naam,
            'email' => $this->email,
            'logo' => $logo,
            'adres' => $this->adres,
            'website' => $this->website,
            'instagram' => $this->instagram,
            'facebook' => $this->facebook,
            'walk_id' => $walk->id,
        ]);

        $this->emit('saved');
        return Redirect::back();
    }

    public function render()
    {
        $walks = Walk::pluck('locatie', 'id');
        // $walks = Walk::all();
        return view('livewire.add-horeca', [
            'walks' => $walks
        ]);
    }
}
