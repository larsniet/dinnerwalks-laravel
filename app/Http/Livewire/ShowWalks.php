<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Walk;
use App\Models\Boeking;
use Illuminate\Support\Facades\File; 
use Illuminate\Support\Facades\Storage;

class ShowWalks extends Component
{
    use WithFileUploads;

    public $locatie, $beschrijving, $preview, $pdf, $podcast1, $podcast2, $podcast3, $podcast4, $podcast5;
    public $currentWalkId;
    public $isOpen = false;

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    public function remove(Walk $walk)
    {
        Boeking::where("walk_id", $walk->id)->delete();
        $walk->delete();
    }

    public function editWalk(Walk $walk)
    {
        $this->currentWalkId = $walk->id;
        $this->locatie = $walk->locatie;
        $this->beschrijving = $walk->beschrijving;
        $this->preview = $walk->preview;
        $this->pdf = $walk->pdf;
        $this->podcast1 = $walk->podcast1;
        $this->podcast2 = $walk->podcast2;
        $this->podcast3 = $walk->podcast3;
        $this->podcast4 = $walk->podcast4;
        $this->podcast5 = $walk->podcast5;
        $this->openModal();
    }

    public function saveWalk($walkID)
    {
        $walk = Walk::where('id', $walkID)->first();
        $this->locatie = strtolower($this->locatie);
        $walk->locatie = $this->locatie;
        $walk->beschrijving = $this->beschrijving;

        if ($this->preview !== $walk->preview) {  
            Storage::delete(str_replace('storage/', 'public/', $walk->preview));
            $preview = $this->preview->store('public/walks/'.$this->locatie);
            $walk->preview = str_replace('public/', 'storage/', $preview);
        }
        if ($this->pdf !== $walk->pdf) {
            Storage::delete(str_replace('storage/', 'public/', $walk->pdf));
            $pdf = $this->pdf->store('public/walks/'.$this->locatie);
            $walk->pdf = str_replace('public/', 'storage/', $pdf);
        }

        if ($this->podcast1 !== $walk->podcast1) {
            Storage::delete(str_replace('storage/', 'public/', $walk->podcast1));
            $podcast1 = $this->podcast1->store('public/walks/'.$this->locatie.'/podcasts');
            $walk->podcast1 = str_replace('public/', 'storage/', $podcast1);
        }
        if ($this->podcast2 !== $walk->podcast2) {
            Storage::delete(str_replace('storage/', 'public/', $walk->podcast2));
            $podcast2 = $this->podcast2->store('public/walks/'.$this->locatie.'/podcasts');
            $walk->podcast2 = str_replace('public/', 'storage/', $podcast2);
        }
        if ($this->podcast3 !== $walk->podcast3) {
            Storage::delete(str_replace('storage/', 'public/', $walk->podcast3));
            $podcast3 = $this->podcast3->store('public/walks/'.$this->locatie.'/podcasts');
            $walk->podcast3 = str_replace('public/', 'storage/', $podcast3);
        }
        if ($this->podcast4 !== $walk->podcast4) {
            Storage::delete(str_replace('storage/', 'public/', $walk->podcast4));
            $podcast4 = $this->podcast4->store('public/walks/'.$this->locatie.'/podcasts');
            $walk->podcast4 = str_replace('public/', 'storage/', $podcast4);
        }
        if ($this->podcast5 !== $walk->podcast5) {
            Storage::delete(str_replace('storage/', 'public/', $walk->podcast5));
            $podcast5 = $this->podcast5->store('public/walks/'.$this->locatie.'/podcasts');
            $walk->podcast5 = str_replace('public/', 'storage/', $podcast5);
        }

        $walk->save();
        $this->closeModal();
    }

    public function render()
    {
        $walks = Walk::all();        
        return view('livewire.show-walks', [
            "walks" => $walks,
        ]);
    }
}
