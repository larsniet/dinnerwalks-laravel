<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Catering;
use App\Models\Walk;
use App\Models\User;
use App\Models\Location;

class ShowCatering extends Component
{
    use WithFileUploads;

    public $name, $email, $address, $location_id, $status, $logo;
    public $editedCateringIndex = null;
    public $caterings = [];
    public $locations = [];

    protected $rules = [
        'caterings.*.name' => 'required',
        'caterings.*.address' => 'required',
        'caterings.*.location_id' => 'required',
        'caterings.*.status' => 'required'
    ];

    public function render()
    {
        $this->caterings = Catering::all();
        $this->locations = Location::all();
        return view('livewire.show-catering', [
            'caterings' => $this->caterings,
            'locations' => $this->locations        
        ]);
    }

    public function removeCatering($cateringIndex)
    {
        $catering = $this->caterings->toArray()[$cateringIndex] ?? NULL;
        if (!is_null($catering)) {
            $editedCatering = Catering::find($catering['id']);
            if ($editedCatering) {
                $catering = Catering::where("id", $editedCatering)->first();
                $editedCatering->delete($catering);
                User::where('id', $editedCatering->user_id)->first()->delete();
            }
        }
        $this->editedCateringIndex = null;
    }

    public function editCatering($cateringIndex) 
    {
        $this->editedCateringIndex = $cateringIndex;
    }

    public function saveCatering($cateringIndex) 
    {
        $this->validate();

        $catering = $this->caterings->toArray()[$cateringIndex] ?? NULL;
        if (!is_null($catering)) {
            $editedCatering = Catering::find($catering['id']);
            if ($editedCatering) {
                $editedCatering->update($catering);
                if ($this->logo) {
                    $logo = $this->logo->store('public/horeca_images');
                    $editedCatering['logo'] = "storage/".trim($logo, "public/");
                    $editedCatering->save();
                }
            }
        }
        $this->editedCateringIndex = null;
    }
}
