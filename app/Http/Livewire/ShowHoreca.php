<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Horeca;

class ShowHoreca extends Component
{

    public function remove(Horeca $horeca)
    {
        $horeca->delete();
    }

    public function render()
    {
        $horecas = Horeca::all();

        return view('livewire.show-horeca', [
            "horecas" => $horecas
        ]);
    }
}
