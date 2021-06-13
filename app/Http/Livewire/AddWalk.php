<?php

namespace App\Http\Livewire;

use Livewire\WithFileUploads;
use Livewire\Component;
use App\Models\Walk;
use App\Models\Team;
use App\Models\Kortingscode;
use Redirect;

class AddWalk extends Component
{
    use WithFileUploads;

    public $locatie;
    public $beschrijving;
    public $preview;
    public $pdf;

    public $podcast1;
    public $podcast2;
    public $podcast3;
    public $podcast4;
    public $podcast5;

    protected $rules = [
        'locatie' => 'required|unique:walks',
        'beschrijving' => 'required|max:50',
        'preview' => 'required',
        'pdf' => 'required',
        'podcast1' => 'required|max:40000',
        'podcast2' => 'required|max:40000',
        'podcast3' => 'required|max:40000',
        'podcast4' => 'required|max:40000',
        'podcast5' => 'required|max:40000',
    ];

    public function addWalk()
    {
        $this->validate();    
        
        $kortingscodes = Kortingscode::all()->random(20);
        $walks = Walk::all();
        $kortingscode = "";
        foreach ($walks as $walk) {
            foreach ($kortingscodes as $code) {
                if ($walk->kortingscode !== $code->code) {
                    $kortingscode = $code->code;
                }
            }
        }

        $preview = $this->preview->store('public/walks/'.$this->locatie);
        $pdf = $this->pdf->store('public/walks/'.$this->locatie);

        $podcast1 = $this->podcast1->store('public/walks/'.$this->locatie.'/podcasts');
        $podcast2 = $this->podcast2->store('public/walks/'.$this->locatie.'/podcasts');
        $podcast3 = $this->podcast3->store('public/walks/'.$this->locatie.'/podcasts');
        $podcast4 = $this->podcast4->store('public/walks/'.$this->locatie.'/podcasts');
        $podcast5 = $this->podcast5->store('public/walks/'.$this->locatie.'/podcasts');

        $randomWalk = Walk::where('id', 1)->first();

        Walk::create([
            'locatie' => $this->locatie,
            'beschrijving' => $this->beschrijving,
            'kortingscode' => $kortingscode,
            'preview' => str_replace('public/', 'storage/', $preview),
            'pdf' => str_replace('public/', 'storage/', $pdf),

            'podcast1' => str_replace('public/', 'storage/', $podcast1),
            'podcast2' => str_replace('public/', 'storage/', $podcast2),
            'podcast3' => str_replace('public/', 'storage/', $podcast3),
            'podcast4' => str_replace('public/', 'storage/', $podcast4),
            'podcast5' => str_replace('public/', 'storage/', $podcast5),

            "max_aantal_personen" => $randomWalk->max_aantal_personen,
            "max_boekings_datum" => Walk::all()->random()->max_boekings_datum,
            "prijs" => $randomWalk->prijs
        ]);
        $this->emit('saved');
        return Redirect::back();
    }

    public function render()
    {
        return view('livewire.add-walk');
    }
}
