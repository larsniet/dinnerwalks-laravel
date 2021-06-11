<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Customer;
use App\Models\Walk;
use App\Models\Boeking;
use App\Models\Horeca;
use Auth;
use Date;

class DisplayCustomers extends Component
{
    public function render()
    {
        if (Auth::user()->email === "admin@dinnerwalks.nl") {
            return view('livewire.display-customers', [
                'boekingen' => Boeking::where("customer_id", "!=", null)
                                    ->orderBy('datum', 'desc')
                                    ->paginate(20)
            ]);
        }

        $horecaOnderneming = Horeca::where('id', Auth::user()->id)->first();
        $walk = Walk::where('id', $horecaOnderneming->walk_id)->first();
        $boekingen = Boeking::whereBetween('datum', [
            date('Y-m-d'),
            date('Y-m-d', strtotime("+1 week"))])->paginate(10);
        $boekingen = $boekingen->where('walk_id', '==', $walk->id);
        $boekingen = $boekingen->where('status', "==", "Betaald");
        
        return view('livewire.display-customers', [
            'boekingen' => $boekingen,
        ]);

    }
}
