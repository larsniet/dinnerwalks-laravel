<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Stripe\Checkout\Session as CheckoutSession;
use App\Mail\sendContactForm;
use App\Models\Customer;
use App\Models\Booking;
use App\Models\Location;
use App\Models\Walk;
use App\Models\Faq;
use App\Models\DiscountCode;
use App\Models\Catering;
use DateTime;
use Mail;

class ApiController extends Controller
{
    public function getWalks()
    {
        return response()->json([
            "walks" => Walk::where('status', "Active")->get(),
            "locations" => Location::all()
        ]);
    }

    public function getSingleWalk(Request $request)
    {
        return response()->json(Walk::where('locatie', $request->walkLocatie)->first());
    }

    public function getCatering() 
    {
        return response()->json([
            "catering" => Catering::where('status', "Active")->get(),
            "walks" => Walk::all(),
            "locations" => Location::all()
        ]);
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
        Mail::to('larsvanderniet@gmail.com')->send(new sendContactForm($request->name, $request->email, $request->message));
        return response()->json(200);
    }

    public function checkUniekeCode(Request $request)
    {
        
        if ($booking = Booking::where('unieke_code', $request->code)->first()) {
            if ($booking->walk->locatie === $request->walk) {
                if ($booking->status === "Betaald") {
                    return response()->json(['status', 'success'], 200);
                }
                return response()->json(['status', 'failed'], 401);
            }
            return response()->json(['status', 'failed'], 401);
        } else {
            return response()->json(['status', 'failed'], 401);
        }
    }

    public function createSession(Request $request)
    {
        // Valideer de aanvraag
        $validator = Validator::make($request->all(), [
            'naam' => 'required|max:255',
            'telefoonnummer' => 'required|phone:US,BE,NL,DE,FR,ES,EN,GB,mobile',
            'email' => 'required|email|max:255',
            'walkId' => 'required|numeric',
            'aantalPersonen' => 'required|numeric',
            'prijs' => 'required|numeric',
            'datum' => 'required|date|max:10'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 400);
        }
        

        // Setup voor Stripe Checkout
        \Stripe\Stripe::setApiKey('sk_test_51ISUAIEK50IisyE6xV7UFnL11Z05NSIpVhWQGf0JaVZ22RplwxNAq1nJtH3sPHpo7ZwOMvT8BKafgUZKJz0D3WF900YtacdP5F');
        $walk = Walk::where('id', $request->walkId)->first();
        $line_items = array(
                'price_data' => [
                    'currency' => 'eur',
                    'product_data' => [
                        'name' => $walk->locatie,
                        'images' => ["https://admin.dinnerwalks.nl/$walk->preview"],
                    ],
                    'unit_amount' => $walk->prijs * 100,
                ],
                'quantity' => $request->aantalPersonen,
        );

        // Aanmaken klant
        $customer = Customer::create([
            'naam' => $request->naam,
            'telefoonnummer' => $request->telefoonnummer,
            'email' => $request->email
        ]);

        // Aanmaken van kortingscode gebaseerd op aantal personen en customer id
        $kortingscode = $walk->kortingscode . '-' . $request->aantalPersonen . $customer->id;

        // Aanmaken boeking
        $booking = Booking::create([
            'datum' => DateTime::createFromFormat('Y-m-d', $request->datum),
            'kortingscode' => $kortingscode,
            'personen' => $request->aantalPersonen,
            'unieke_code' => $this->generateRandomString(12),
            'prijs_boeking' => floatval($request->prijs),
            'walk_id' => $walk->id,
            'customer_id' => $customer->id
        ]);

        // Stripe sessie aanmaken en terug sturen naar de frontend
        return CheckoutSession::create([
            'success_url' => env("FRONTEND_APP_URL", "https://beta.dinnerwalks.nl").'?betaald=success',
            'cancel_url' => env("FRONTEND_APP_URL", "https://beta.dinnerwalks.nl").'?betaald=failure',
            'payment_method_types' => ['ideal'],
            'client_reference_id' => $booking->id,
            'customer_email' => $customer->email,
            'mode' => 'payment',
            'locale' => 'nl',
            'line_items' => [$line_items],
        ]);        
    }
    
    public function generateRandomString($length = 20) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    // public function sendData(Request $request)
    // {
    //     $user = Auth::user();
    //     $catering = $user->catering;
    //     $client = new Client;
    //     $response = $client->post('https://somewhere.com/api/thing', ['user_details' => $user, 'catering' => $catering]);
    // }
    // public function retrieveData(Request $request)
    // {
    //     $request->user_details->email;
    // }
}
