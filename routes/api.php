<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\QrecaController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware(['auth:api'])->group(function () {
    
    Route::get('customers', [ApiController::class, 'getCustomers']);
    Route::get('walks', [ApiController::class, 'getWalks']);
    Route::post('walk', [ApiController::class, 'getSingleWalk']);
    Route::get('faqs', [ApiController::class, 'getFaqs']);
    Route::get('catering', [ApiController::class, 'getCatering']);


    Route::post('koppeling/getUserData', [QrecaController::class, 'getUserData']);
    
    Route::post('contactForm', [ApiController::class, 'sendContactForm']);
    Route::post('checkUniekeCode', [ApiController::class, 'checkUniekeCode']);

    Route::post('/customer/create-session', [ApiController::class, 'createSession']);

// });
