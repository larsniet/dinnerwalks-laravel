<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Walk;
use App\Models\Boeking;

class ShowWalks extends Component
{
    public function remove(Walk $walk)
    {
        Boeking::where("walk_id", $walk->id)->delete();
        $walk->delete();
    }

    public function editWalk(Walk $walk)
    {
        $this->dispatchBrowserEvent('show-form');
    }

    public function render()
    {
        $walks = Walk::all();
        $boekingen = Boeking::all();
        
        return view('livewire.show-walks', [
            "walks" => $walks,
        ]);
    }
}
