<?php

namespace App\Http\Livewire;

use Livewire\WithFileUploads;
use Livewire\Component;
use App\Models\Walk;
use App\Models\Location;
use App\Models\DiscountCode;
use App\Models\Podcast;
use Redirect;

class AddWalk extends Component
{
    use WithFileUploads;

    public $location_id;
    public $name;
    public $description;
    public $preview;
    public $pdf;
    public $inputFields;
    public $podcast;

    protected $rules = [
        'location_id' => 'required',
        'name' => 'required',
        'description' => 'required|max:50',
        'preview' => 'required',
        'pdf' => 'required',
        'inputFields' => 'required',
        'podcast.*' => 'max:40000',
    ];

    public function addWalk()
    {
        $this->validate();    
        
        $kortingscodes = DiscountCode::all()->random(20);
        $walks = Walk::all();
        $kortingscode = "";
        foreach ($walks as $walk) {
            foreach ($kortingscodes as $code) {
                if ($walk->kortingscode !== $code->code) {
                    $kortingscode = $code;
                }
            }
        }

        $this->name = strtolower($this->name);

        $preview = $this->preview->store('public/walks/'.Location::where('id', $this->location_id)->first()->name.$this->name);
        $pdf = $this->pdf->store('public/walks/'.Location::where('id', $this->location_id)->first()->name.$this->name);

        $randomWalk = Walk::where('id', 1)->first();

        $walk = Walk::create([
            'name' => $this->name,
            'location_id' => $this->location_id,
            'discount_code_id' => $kortingscode->id,
            'description' => $this->description,
            'preview' => str_replace('public/', 'storage/', $preview),
            'pdf' => str_replace('public/', 'storage/', $pdf),
            'status' => "Active",

            "max_people" => $randomWalk->max_people,
            "max_booking_date" => Walk::all()->random()->max_booking_date,
            "price" => $randomWalk->price
        ]);

        if ($this->podcast) {
            foreach ($this->podcast as $key => $pod) {
                $podcast = $pod->store('public/walks/'. $walk->location->name . $walk->name.'/podcasts');
                Podcast::create([
                    'walk_id' => $walk->id, 
                    'stored_location' => 'storage/walks/' . $walk->location->name . $walk->name . '/podcasts/' . $podcast
                ]);
            }
        }

        $this->emit('saved');
        return Redirect::back();
    }

    public function updatedInputFields($value)
    {
        $this->inputFields = intval($value);
    }

    public function render()
    {
        return view('livewire.add-walk', [
            'locations' => Location::all()
        ]);
    }
}
