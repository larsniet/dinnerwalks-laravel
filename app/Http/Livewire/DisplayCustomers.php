<?php

namespace App\Http\Livewire;

use Illuminate\Http\Request;
use Livewire\Component;
use App\Models\Customer;
use App\Models\Walk;
use App\Models\Booking;
use App\Models\Catering;
use Auth;
use Date;

class DisplayCustomers extends Component
{
    public $term = "";

    public function toggleStatus(Customer $customer)
    {
        if ($customer->booking->status === "Betaald") {
            $customer->booking->status = "Afgebroken";
        } else if ($customer->booking->status === "Afgebroken") {
            $customer->booking->status = "Betaald";
        }
        $customer->booking->save();
    }

    public function render()
    {
        if (Auth::user()->roles[0]->name === 'admin') {
            sleep(1);
            $customers = Customer::where('id', '!=', NULL)->paginate(20);

            if (!empty($this->term)) {
                $customers = Customer::search($this->term)->paginate(20);
            }

            return view('livewire.display-customers', [
                'customers' => $customers
            ]);
        }

        $catering = Catering::where('user_id', Auth::user()->id)->first();
        $location = $catering->location;
        $bookings = Booking::whereBetween('date', [
            date('Y-m-d'),
            date('Y-m-d', strtotime("+1 week"))])->get();
        $bookings = $bookings->where('locatie', $location->name);
        $bookings = $bookings->where('status', "Betaald")->sortBy('date');
        
        return view('livewire.display-customers', [
            'customers' => $bookings,
        ]);

    }
}
