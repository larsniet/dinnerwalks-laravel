<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Stripe\Checkout\Session as CheckoutSession;
use App\Mail\sendContactForm;
use App\Models\Customer;
use App\Models\Boeking;
use App\Models\Walk;
use App\Models\Faq;
use App\Models\Horeca;
use DateTime;
use Mail;

class ApiController extends Controller
{
    public function getWalks()
    {
        return response()->json(Walk::all());
    }

    public function getHoreca() 
    {
        return response()->json(Horeca::all());
    }

    public function getFaqs()
    {
        return response()->json(Faq::all());
    }

    public function getCustomers() 
    {
        return response()->json(Customer::all());
    }

    public function sendContactForm(Request $request) 
    {
        Mail::to('info@dinnerwalks.nl')->send(new sendContactForm($request->naam, $request->email, $request->bericht));
        return response()->json(200);
    }

    public function test(Request $request)
    {
        $url = $request->all();
        return response()->json($url);
    }

    public function createSession(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'phone' => 'required|numeric|max:12',
            'email' => 'required|email|max:255',
            'walkId' => 'required|numeric',
            'aantalPersonen' => 'required|numeric|max:3',
            'prijs' => 'required|numeric',
            'datum' => 'required|date|max:10'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ]);
        }

        \Stripe\Stripe::setApiKey('sk_test_51ISUAIEK50IisyE6xV7UFnL11Z05NSIpVhWQGf0JaVZ22RplwxNAq1nJtH3sPHpo7ZwOMvT8BKafgUZKJz0D3WF900YtacdP5F');

        $walk = Walk::where('id', $request->walkId)->first();
        $line_items = array(
                'price_data' => [
                    'currency' => 'eur',
                    'product_data' => [
                        'name' => $walk->locatie,
                        // 'images' => ["http://127.0.0.1:8000/$product->image"],
                    ],
                    'unit_amount' => $walk->prijs * 100,
                ],
                'quantity' => $request->aantalPersonen,
        );

        $customer = Customer::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email
        ]);
        
        $boeking = Boeking::create([
            'datum' => DateTime::createFromFormat('Y-m-d', $request->datum),
            'kortingscode' => 'EENVIS-2',
            'personen' => $request->aantalPersonen,
            'prijs_boeking' => floatval($request->prijs),
            'walk_id' => $walk->id,
            'customer_id' => $customer->id
        ]);

        return CheckoutSession::create([
            'success_url' => 'http://localhost:3000?betaald=success&boeking='.$boeking->id,
            'cancel_url' => 'http://localhost:3000?betaald=failure',
            // 'success_url' => env('BETA_APP_URL').'?betaald=success?customer='.$customer->id,
            // 'cancel_url' => env('BETA_APP_URL').'?betaald=failure',
            'payment_method_types' => ['ideal', 'card'],
            'client_reference_id' => $customer->id,
            'customer_email' => $customer->email,
            'mode' => 'payment',
            'locale' => 'nl',
            'line_items' => [$line_items],
          ]);        
    }

    public function updateCustomer(Request $request)
    {
        $boeking = Boeking::where('id', $request->boekingId)->first();

        if ($boeking->status !== "Betaald") {
            $boeking->status = "Betaald";
            $boeking->save();
    
            $walk = Walk::where('id', $boeking->walk_id)->first();
            $walk->omzet += $boeking->prijs_boeking;
            $walk->aantal_geboekt = $walk->aantal_geboekt + 1;
            $walk->save();
        }
    }
}
