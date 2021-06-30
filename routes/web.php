<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckIfAdmin;
use App\Http\Controllers\ApiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Standaard naar loginpagina
Route::get('/', function () {
    return view('auth/login');
});

// Stripe webhook call bij betaling
Route::stripeWebhooks('charge_customer');


Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {

    // Ook toegankelijk voor Horeca
    Route::view('dashboard', 'dashboard')->name('dashboard');

    // Niet toegankelijk voor Horeca
    Route::group(['middleware' => CheckIfAdmin::class], function () {
        Route::view('walk', 'walk')->name('walk');
        Route::view('locations', 'locations')->name('locations');
        Route::view('catering', 'catering')->name('catering');
        Route::view('kortingscodes', 'kortingscodes')->name('kortingscodes');
        Route::view('faq', 'faq')->name('faq');

        Route::view('forms', 'forms')->name('forms');
        Route::view('cards', 'cards')->name('cards');
        Route::view('charts', 'charts')->name('charts');
        Route::view('buttons', 'buttons')->name('buttons');
        Route::view('modals', 'modals')->name('modals');
        Route::view('tables', 'tables')->name('tables');
        Route::view('calendar', 'calendar')->name('calendar');
    });
});
