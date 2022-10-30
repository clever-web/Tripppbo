<?php

use App\Http\Controllers\ActivitiesController;
use App\Http\Controllers\BookTripCheckoutController;
use App\Http\Controllers\Checkout;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\HotelController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

/*
Route::get("/hotels/get/{destination}" , [HotelController::class , "getHotels"])->name("hotels-by-city");
Route::post("/get/from-link" , [HotelController::class , "getPageFromLink"]);
 */

/* Route::post('/checkout/charge_succeeded', [Checkout::class, 'handleChargeSuccess']);
 */

Route::post('/klarna_push', [BookTripCheckoutController::class, 'klarnaPush']);
Route::post('/stripe_push', [BookTripCheckoutController::class, 'stripePush']);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
