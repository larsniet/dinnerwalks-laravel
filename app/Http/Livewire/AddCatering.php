<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Catering;
use App\Models\Location;
use App\Models\Walk;
use App\Models\User;
use Livewire\WithFileUploads;
use App\Actions\Jetstream\CreateTeam;
use App\Mail\sendNewUserDetails;
use Faker\Factory as Faker;
use Redirect;
use Hash;
use Str;
use Mail;

class AddCatering extends Component
{
    use WithFileUploads;

    public $location_id;
    public $userName;
    public $companyName;
    public $email;
    public $logo;
    public $address;
    public $instagram;
    public $facebook;
    public $website;

    protected $rules = [
        'location_id' => 'required',
        'userName' => 'required',
        'companyName' => 'required',
        'email' => 'required|max:50|email',
        'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'address' => 'required|max:50',
        'instagram' => 'required|max:255',
        'facebook' => 'required|max:255',
        'website' => 'required|max:255',
    ];

    public function addCatering()
    {
        $this->validate();

        $faker = Faker::create();
        $logo = $this->logo->store('public/horeca_images');
        $password = $faker->password();

        $user = User::create([
            'name' => $this->userName,
            'email' => $this->email,
            'email_verified_at' => now(),
            'password' => Hash::make($password),
            'remember_token' => Str::random(10),
        ]);

        $horeca = Catering::create([
            'location_id' => $this->location_id,
            'user_id' => $user->id,
            'name' => $this->companyName,
            'logo' => "storage/".trim($logo, "public/"),
            'address' => $this->address,
            'website' => "https://".$this->website,
            'instagram' => "https://".$this->instagram,
            'facebook' => "https://".$this->facebook,
        ]);

        if ($horeca && $user) {
            Mail::to($this->email)->send(new sendNewUserDetails($this->userName, $this->companyName, $this->email, Location::where('id', $this->location_id)->first()->name, $password, "https://".$this->website));
        } else {
            return $this->emit('error');
        }

        $this->emit('saved');
        return Redirect::back();
    }

    public function render()
    {
        $locations = Location::all();
        return view('livewire.add-catering', [
            'locations' => $locations
        ]);
    }
}
