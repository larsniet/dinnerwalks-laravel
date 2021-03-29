<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class ApiController extends Controller
{
    public function getCustomers() 
    {
        return response()->json(Customer::all());
    }
}
