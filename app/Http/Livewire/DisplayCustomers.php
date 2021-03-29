<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Customer;
use App\Models\Boeking;

class DisplayCustomers extends Component
{
    public function render()
    {
        return view('livewire.display-customers', [
            'customers' => Customer::all(),
            'boekingen' => Boeking::all()
        ]);
    }
}
