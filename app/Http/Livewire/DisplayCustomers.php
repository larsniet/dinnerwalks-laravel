<?php

namespace App\Http\Livewire;

use Illuminate\Http\Request;
use Livewire\Component;
use App\Models\Customer;
use App\Models\Walk;
use App\Models\Boeking;
use App\Models\Horeca;
use Auth;
use Date;

class DisplayCustomers extends Component
{
    public $term = "";

    public function render()
    {
        if (Auth::user()->email === "admin@dinnerwalks.nl") {
            sleep(1);
            $customers = Customer::where('id', '!=', NULL)->paginate(20);

            if (!empty($this->term)) {
                $customers = Customer::search($this->term)->paginate(20);
            }

            return view('livewire.display-customers', ['customers' => $customers]);
        }

        $horecaOnderneming = Horeca::where('id', Auth::user()->id)->first();
        $walk = Walk::where('id', $horecaOnderneming->walk_id)->first();
        $boekingen = Boeking::whereBetween('datum', [
            date('Y-m-d'),
            date('Y-m-d', strtotime("+1 week"))])->get();
        $boekingen = $boekingen->where('walk_id', $walk->id);
        $boekingen = $boekingen->where('status', "Betaald")->sortBy('datum');
        
        return view('livewire.display-customers', [
            'customers' => $boekingen,
        ]);

    }
}
