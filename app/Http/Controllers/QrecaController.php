<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catering;
use App\Models\User;
use Redirect;
use Auth;

class QrecaController extends Controller
{
    public function getLinkToQreca()
    {
        return Redirect::to('https://qreca.nl/dinnerwalks/'.base64_encode(Auth::user()->email));
    }

    public function getUserData(Request $request)
    {
        $email = base64_decode($request->email);
        $user = User::where('email', $email)->first();
        $catering = Catering::where('user_id', $user->id)->first();
        $obj = json_encode(array(
            "name" => base64_encode($user->name),
            "email" => base64_encode($user->email),
            'horecaNaam' => base64_encode($catering->name),
        ));
        return response($obj);
        return response()->json(base64_encode($user));
    }

}
