<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Horeca;
use App\Models\Walk;

class ShowHoreca extends Component
{
    use WithFileUploads;

    public $editedHorecaIndex = null;
    public $horecas = [];
    public $walks = [];

    public $logo;

    protected $rules = [
        'horecas.*.naam' => 'required',
        'horecas.*.email' => 'required',
        'horecas.*.adres' => 'required',
        // 'horecas.*.logo' => 'required',
        'horecas.*.walk_id' => 'required',
        'horecas.*.status' => 'required'
    ];

    public function render()
    {
        $this->horecas = Horeca::all();
        $this->walks = Walk::all();
        return view('livewire.show-horeca', [
            'horecas' => $this->horecas,
            'walks' => $this->walks
        ]);
    }

    public function removeHoreca($horecaIndex)
    {
        $horeca = $this->horecas->toArray()[$horecaIndex] ?? NULL;
        if (!is_null($horeca)) {
            $editedHoreca = Horeca::find($horeca['id']);
            if ($editedHoreca) {
                $editedHoreca->delete($horeca);
            }
        }
        $this->editedHorecaIndex = null;
    }

    public function editHoreca($horecaIndex) 
    {
        $this->editedHorecaIndex = $horecaIndex;
    }

    public function saveHoreca($horecaIndex) 
    {
        $this->validate();
        $horeca = $this->horecas->toArray()[$horecaIndex] ?? NULL;
        if (!is_null($horeca)) {
            $editedHoreca = Horeca::find($horeca['id']);
            if ($editedHoreca) {
                $editedHoreca->update($horeca);
                if ($this->logo) {
                    $logo = $this->logo->store('public/horeca_images');
                    $editedHoreca['logo'] = "storage/".trim($logo, "public/");
                    $editedHoreca->save();
                }
            }
        }
        $this->editedHorecaIndex = null;
    }
}
