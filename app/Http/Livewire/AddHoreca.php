<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Horeca;
use App\Models\Walk;
use App\Models\User;
use Livewire\WithFileUploads;
use App\Actions\Jetstream\CreateTeam;
use Faker\Factory as Faker;
use Redirect;
use Hash;
use Str;
use App\Mail\sendNewUserDetails;
use Mail;

class AddHoreca extends Component
{
    use WithFileUploads;

    public $userName;
    public $naam;
    public $email;
    public $logo;
    public $adres;
    public $instagram;
    public $facebook;
    public $website;
    public $walk; 

    protected $rules = [
        'userName' => 'required',
        'naam' => 'required',
        'email' => 'required|max:50|email',
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
        $faker = Faker::create();

        $logo = $this->logo->store('images');
        $walk = Walk::where("locatie", $this->walk)->first();

        $password = $faker->password();

        $user = User::create([
            'name' => $this->userName,
            'email' => $this->email,
            'email_verified_at' => now(),
            'password' => Hash::make($password),
            'remember_token' => Str::random(10),
        ]);

        $horeca = Horeca::create([
            'naam' => $this->naam,
            'email' => $this->email,
            'logo' => $logo,
            'adres' => $this->adres,
            'website' => $this->website,
            'instagram' => $this->instagram,
            'facebook' => $this->facebook,
            'walk_id' => $walk->id,
        ]);

        if ($horeca && $user) {
            Mail::to($this->email)->send(new sendNewUserDetails($this->userName, $this->naam, $this->email, $walk->locatie, $password));
        } else {
            return $this->emit('error');
        }

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
