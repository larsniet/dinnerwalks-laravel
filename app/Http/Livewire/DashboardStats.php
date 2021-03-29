<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Customer;
use App\Models\Boeking;

class DashboardStats extends Component
{
    public function render()
    {
        $boekingen = Boeking::all();
        $omzet = 0;
        foreach ($boekingen as $key => $boeking) {
            $omzet += $boeking->bedrag_betaald;
        }
        return view('livewire.dashboard-stats', [
            'customers' => Customer::all(),
            'omzet' => $omzet
        ]);
    }
}
