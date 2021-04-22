<?php

namespace App\Http\Livewire;

use Livewire\WithFileUploads;
use Livewire\Component;
use App\Models\Walk;
use App\Models\Team;
use Redirect;

class AddWalk extends Component
{
    use WithFileUploads;

    public $locatie;
    public $beschrijving;
    public $kosten;
    public $personen;
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
        'kosten' => 'required',
        'personen' => 'required',
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

        $preview = $this->preview->store('public/walks/'.$this->locatie);
        $pdf = $this->pdf->store('public/walks/'.$this->locatie);

        $podcast1 = $this->podcast1->store('public/walks/'.$this->locatie.'/podcasts');
        $podcast2 = $this->podcast2->store('public/walks/'.$this->locatie.'/podcasts');
        $podcast3 = $this->podcast3->store('public/walks/'.$this->locatie.'/podcasts');
        $podcast4 = $this->podcast4->store('public/walks/'.$this->locatie.'/podcasts');
        $podcast5 = $this->podcast5->store('public/walks/'.$this->locatie.'/podcasts');

        Walk::create([
            'locatie' => $this->locatie,
            'beschrijving' => $this->beschrijving,
            'preview' => "storage/".trim($preview, "public/"),
            'pdf' => "storage/".trim($pdf, "public/"),

            'podcast1' => "storage/".trim($podcast1, "public/"),
            'podcast2' => "storage/".trim($podcast2, "public/"),
            'podcast3' => "storage/".trim($podcast3, "public/"),
            'podcast4' => "storage/".trim($podcast4, "public/"),
            'podcast5' => "storage/".trim($podcast5, "public/"),

            "max_aantal_personen" => $this->personen,
            "max_boekings_datum" => Walk::all()->random()->max_boekings_datum,
            "prijs" => $this->kosten
        ]);
        $this->emit('saved');
        return Redirect::back();
    }

    public function render()
    {
        return view('livewire.add-walk');
    }
}
