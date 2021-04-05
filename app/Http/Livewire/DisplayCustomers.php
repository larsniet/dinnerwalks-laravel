<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Customer;
use App\Models\Boeking;
use Auth;
use Date;

class DisplayCustomers extends Component
{
    public function render()
    {
        if (Auth::user()->email === "admin@dinnerwalks.nl") {
            return view('livewire.display-customers', [
                'customers' => Customer::all(),
                'boekingen' => Boeking::all()
            ]);
        }

        return view('livewire.display-customers', [
            'boekingen' => Boeking::whereBetween('datum', [
                date('Y-m-d', strtotime("-1 week")), 
                date('Y-m-d')])->get()
        ]);

    }
}
