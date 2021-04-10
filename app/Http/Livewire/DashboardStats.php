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
            if ($boeking->status === "Betaald") {
                $omzet += $boeking->prijs_boeking;
            }
        }
        $afgerondeTransacties = $boekingen->where('status', '==', 'Betaald');
        $afgebrokenTransacties = $boekingen->where('status', '!=', 'Betaald');

        return view('livewire.dashboard-stats', [
            'customers' => Customer::all(),
            'omzet' => $omzet,
            'afgerondeTransacties' => $afgerondeTransacties->count(),
            'afgebrokenTransacties' => $afgebrokenTransacties->count()
        ]);
    }
}
