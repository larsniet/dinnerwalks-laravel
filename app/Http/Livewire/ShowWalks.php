<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Walk;
use App\Models\Booking;
use App\Models\Podcast;
use App\Models\Location;
use Illuminate\Support\Facades\File; 
use Illuminate\Support\Facades\Storage;

class ShowWalks extends Component
{
    use WithFileUploads;

    public $location_id;
    public $name;
    public $description;
    public $preview;
    public $pdf;
    public $inputFields;
    public $podcast;
    public $currentWalkId;
    public $isOpen = false;

    protected $rules = [
        'location_id' => 'required',
        'name' => 'required',
        'description' => 'required|max:2000',
        'preview' => 'required',
        'pdf' => 'required',
        'inputFields' => 'required',
        'podcast.*' => 'max:40000',
    ];

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
        $this->inputFields = 0;
    }

    public function remove(Walk $walk)
    {
        Storage::deleteDirectory("public/walks/".$walk->location->name.$walk->name);
        Podcast::where('walk_id', $walk->id)->delete();
        Booking::where("walk_id", $walk->id)->delete();
        $walk->delete();
    }

    public function editWalk(Walk $walk)
    {
        $this->currentWalkId = $walk->id;
        $this->location_id = $walk->location_id;
        $this->name = $walk->name;
        $this->description = $walk->description;
        $this->preview = $walk->preview;
        $this->pdf = $walk->pdf;

        $podcasts = Podcast::where('walk_id', $walk->id)->get();
        foreach ($podcasts as $key => $podcast) {
            $this->inputFields += 1;
        }

        $this->openModal();
    }

    public function saveWalk($walkID)
    {
        $this->validate();   

        $walk = Walk::where('id', $walkID)->first();
        $walk->name = strtolower($this->name);
        $walk->description = $this->description;

        if ($this->preview !== $walk->preview) {  
            Storage::delete(str_replace('storage/', 'public/', $walk->preview));
            $preview = $this->preview->store('public/walks/'.$walk->location->name.$walk->name);
            $walk->preview = str_replace('public/', 'storage/', $preview);
        }
        if ($this->pdf !== $walk->pdf) {
            Storage::delete(str_replace('storage/', 'public/', $walk->pdf));
            $pdf = $this->pdf->store('public/walks/'.$walk->location->name.$walk->name);
            $walk->pdf = str_replace('public/', 'storage/', $pdf);
        }

        // Als er wel bestanden zijn ingevuld
        if ($this->podcast !== null) {
            // Check dan of de walk al podcasts heeft
            if (Podcast::where('walk_id', $walk->id)->get()) {
                // Heeft de walk al podcasts, verwijder ze dan
                Podcast::where('walk_id', $walk->id)->delete();
                Storage::deleteDirectory("public/walks/".$walk->location->name.$walk->name.'/podcasts');
            }
            // Loop door alle podcasts die binnen zijn gekomen
            foreach ($this->podcast as $key => $pod) {
                // En sla ze op
                $podcast = $pod->store('public/walks/'. $walk->location->name . $walk->name.'/podcasts');
                Podcast::create([
                    'walk_id' => $walk->id, 
                    'stored_location' => 'storage/walks/' . $walk->location->name . $walk->name . '/podcasts/' . $podcast
                ]);
            }
        } else {
            // Als er 0 is geselecteerd of er geen bestanden zijn ingevuld
            // Check dan of de walk podcasts heeft
            if (Podcast::where('id', $walk->id)->get()) {
                // Heeft de walk podcasts, verwijder ze dan
                Podcast::where('walk_id', $walk->id)->delete();
                Storage::deleteDirectory("public/walks/".$walk->location->name.$walk->name.'/podcasts');
            }
        }

        $walk->save();
        $this->closeModal();
    }

    public function toggleStatus(Walk $walk)
    {
        if ($walk->status === "Active") {
            $walk->status = "Passive";
        } else {
            $walk->status = "Active";
        }
        $walk->save();
    }

    public function render()
    {
        $walks = Walk::all();        
        return view('livewire.show-walks', [
            "walks" => $walks,
            'locations' => Location::all()
        ]);
    }
}
