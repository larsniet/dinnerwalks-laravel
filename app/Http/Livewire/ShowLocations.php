<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Location;
use Redirect;

class ShowLocations extends Component
{
    public $editedLocIndex = null;
    public $locations = [];

    protected $rules = [
        'locations.*.name' => 'required',
    ];

    public function render()
    {
        $this->locations = Location::all()->toArray();
        return view('livewire.show-locations', [
            'locations' => $this->locations
        ]);
    }

    public function removeLocation($locIndex)
    {
        $location = $this->locations[$locIndex] ?? NULL;
        if (!is_null($location)) {
            $editedLocation = Location::find($location['id']);
            if ($editedLocation) {
                $editedLocation->delete($location);
            }
        }
        $this->editedLocIndex = null;
    }

    public function editLocation($locIndex) 
    {
        $this->editedLocIndex = $locIndex;
    }

    public function saveLocation($locIndex) 
    {
        $this->validate();
        $location = $this->locations[$locIndex] ?? NULL;
        if (!is_null($location)) {
            $editedLocation = Location::find($location['id']);
            if ($editedLocation) {
                $editedLocation->update($location);
            }
        }
        $this->editedLocIndex = null;
    }
}
