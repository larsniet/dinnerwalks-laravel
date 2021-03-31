<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\sendContactForm;
use App\Models\Customer;
use App\Models\Walk;
use App\Models\Horeca;
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

    public function getCustomers() 
    {
        return response()->json(Customer::all());
    }

    public function sendContactForm(Request $request) 
    {
        Mail::to('info@dinnerwalks.nl')->send(new sendContactForm($request->naam, $request->email, $request->bericht));
        return response()->json(200);
    }
}
