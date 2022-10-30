<?php

use App\Http\Controllers;
use App\Http\Controllers\Activities;
use App\Http\Controllers\ActivitiesController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AutocompleteController;
use App\Http\Controllers\BookPackageController;
use App\Http\Controllers\BookTripCheckoutController;
use App\Http\Controllers\Checkout;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\GiftCardController;
use App\Http\Controllers\HolidayController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NotificationsController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\SoloTripController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\TicketLotteryCheckoutController;
use App\Http\Controllers\TicketLotteryController;
use App\Http\Controllers\TripsController;
use App\Http\Controllers\UsersProfile;
use App\Http\Controllers\UserDashboardController;
use App\Services\Trippbo\CurrencyManagement;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

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

Route::get('/preview_email', function () {
    $email = new App\Mail\BooktripOrderConfirmation();
    Mail::to('tarek.aldwiri@gmail.com')->send($email);

    return $email;
});
Route::get('/getExchangeRate', [HomeController::class, 'getExchangeRateUSD']);


Route::get("/holidays", [HolidayController::class, "index"]);
Route::post("/holidays/get", [HolidayController::class, "getAvailableHolidays"]);
Route::get("/holidays/view", [HolidayController::class, "getPackageDetailsIndex"]);
Route::post("/holidays/view/get", [HolidayController::class, "getPackageDetails"]);
Route::get("/holiday/select", [HolidayController::class, "selectHolidayIndex"]);
Route::post("/holiday/hotels/fetch", [HolidayController::class, "getHotelsDetails"]);
Route::post("/holiday/book", [HolidayController::class, 'bookHoliday']);
Route::get("/holiday/featured", [HolidayController::class, 'getFeaturedPackages']);


Route::get('/testx', [TripsController::class, 'test']);
Route::get('/test2', [TripsController::class, 'test2']);
Route::get('/activities', [ActivitiesController::class, 'index']);
Route::get('/activities/view', [ActivitiesController::class, 'subpageIndex']);
Route::get('/activities/get/{city_id}', [ActivitiesController::class, 'getActivities']);
Route::get('/activities/getTourGrade', [ActivitiesController::class, 'getTourGrade']);
Route::get('/activities/reserve', [ActivitiesController::class, 'reserve']);

Route::get('/checkout', [BookTripCheckoutController::class, 'index']);
Route::post('/checkout/add_gift_card', [BookTripCheckoutController::class, 'addGiftCard']);
Route::post('/checkout/remove_gift_card', [BookTripCheckoutController::class, 'removeGiftCard']);
Route::post('/checkout/add_coupon', [BookTripCheckoutController::class, 'addCoupon']);
Route::post('/checkout/remove_coupon', [BookTripCheckoutController::class, 'removeCoupon']);

Route::post('/checkout/process_order', [BookTripCheckoutController::class, 'processOrder']);
Route::get('/checkout/confirmation', [BookTripCheckoutController::class, 'confirmation']);




Route::post('/checkout/verifyCoupon', [CouponController::class, 'verifyCoupon']);
Route::post('/checkout/verifyGiftCard', [GiftCardController::class, 'verifyGiftCard']);



Route::get('/autocompleteActivity', [\App\Http\Controllers\AutocompleteController::class, 'autocomplete_activity'])->name('autocomplete_activity');
Route::get('/autocompleteActivity_2', [\App\Http\Controllers\AutocompleteController::class, 'autocomplete_activity_2']);
Route::get('/autocomplete/byCity', [\App\Http\Controllers\AutocompleteController::class, 'byCity']);

Route::get('/autocomplete_airport', [\App\Http\Controllers\AutocompleteController::class, 'autocomplete_airport']);

Route::get('/autocompleteAirport/{keyword}', [\App\Http\Controllers\AmadeusController::class, 'autocompleteAirport'])->name('autocompleteAirport');
Route::post('/autocomplete/airport/id', [AutocompleteController::class, 'airport_by_id']);




Route::get('/suggest_locations', [\App\Http\Controllers\AutocompleteController::class, 'new_autocomplete']);
Route::get('/hotel/suggest_locations', [\App\Http\Controllers\AutocompleteController::class, 'SriggleAutocompleteCity']);
Route::post('/hotel/suggest_location_by_city_id', [\App\Http\Controllers\AutocompleteController::class, 'SriggleAutocompleteByCityId']);
Route::post('/hotel/book', [HotelController::class, 'bookHotel']);



Route::get('/.well-known/apple-developer-merchantid-domain-association', [HomeController::class, 'StripeApplePayVerification']);

Route::get('/', [HomeController::class, 'getHomepage'])->name('home');

Route::get('/how-it-works/solo', [SoloTripController::class, 'how_it_works'])->name('how-it-works-solo');
Route::get('/how-it-works/tickets-lottery', [TicketLotteryController::class, 'how_it_works'])->name('how-it-works-tickets-lottery');
Route::get('/how-it-works/fund-my-trip', [TripsController::class, 'how_it_works'])->name('how-it-works-fund-my-trip');
Route::get('/privacy-policy', [HomeController::class, 'privacy_policy'])->name('privacy-policy');
Route::get('/terms-and-conditions', [HomeController::class, 'terms_and_conditions'])->name('terms-and-conditions');
Route::get('/about-us', [HomeController::class, 'about_us'])->name('about-us');
Route::get('/faqs', function() {
return view('how-it-works.faqs');
})->name('faqs');
Route::get('/trips', [TripsController::class, 'BrowseTrips'])->name('trips-browse');

Route::get('/trips/trip/{id}', [TripsController::class, 'ViewTrip'])->name('trip-browse');

//FundMyTrip Solo Routes
Route::get('/solo', [SoloTripController::class, 'index'])->name('solos-browse');
Route::get('/solo/view/{id}', [SoloTripController::class, 'show'])->name('solo-browse');
Route::get('/profile/view/{id}', [UsersProfile::class, 'index'])->name('profile-home');

Route::get('/ticket-lottery', [TicketLotteryController::class, 'index'])->name('ticket-lottery-home');
Route::get('/ticket-lottery/view/{id}', [TicketLotteryController::class, 'view_lottery'])->name('ticket-lottery-view');

Route::post('/activities/addPassengers', [ActivitiesController::class, 'addPassengers']);
Route::post('/hotels/prepare_search', [HotelController::class, 'prepare_search']);
Route::get('/hotels/search', [HotelController::class, 'index'])->name('hotels-search-page');
Route::post('/hotels/get', [HotelController::class, 'getHotels']);
Route::get('/hotel/view', [HotelController::class, 'getHotelDetailsIndex']);
Route::get('/hotel/get_details', [HotelController::class, 'getHotelDetails']);
Route::get('/hotel/get_rooms', [HotelController::class, 'getHotelRooms']);
Route::get('/hotels/checkout', [HotelController::class, 'hotel_checkout']);
Route::post('/hotel/reserve', [HotelController::class, 'reserve']);
Route::post('/hotel/prepare_room_booking', [HotelController::class, 'prepare_room_booking']);

Route::post('/hotel/reserve_2', [HotelController::class, 'reserve_2']);
Route::post('/hotel/addPassengers', [HotelController::class, 'addPassengers']);
Route::post('/hotel/addPassengers_2', [HotelController::class, 'addPassengers_2']);
Route::post('/hotel/prepare_payment', [HotelController::class, 'preparePayment']);

Route::post('/hotel/checkRate', [HotelController::class , 'checkRate'] );
/* Route::get("/hotels/search-results/", [HotelController::class, "index"])->name("hotels-search-results");
Route::get('/hotels/view-hotel/{id}', [HotelController::class , "view"])->name("hotel-view");
 */
Route::get('/flights/search', [FlightController::class, 'index'])->name('flights-search-results');
Route::get('/flights/reserve', [FlightController::class, 'reserveFlight']);
Route::get('/flights/review', [FlightController::class, 'reviewFlightIndex']);
Route::get('/flights/passengers', [FlightController::class, 'passengers']);
Route::post('/flights/addPassengers', [FlightController::class, 'addPassengers']);
Route::get('/flights/get/', [FlightController::class, 'getFlights']);
Route::post('/flights/add_meal', [FlightController::class, 'addMeal']);
Route::post('/flights/add_baggage', [FlightController::class, 'addBaggage']);
Route::post('/flights/select_meal', [FlightController::class, 'selectMeal']);
Route::get('/flights/checkout', [FlightController::class, 'flight_checkout']);
Route::post('/flights/search_for_flights', [FlightController::class, 'searchForFlights']);
Route::post('/flights/prepare_flight', [FlightController::class, 'prepareFlight']);
Route::post('/flights/prepare_payment', [FlightController::class, 'preparePayment']);
Route::get('/flight/suggest_locations', [AutocompleteController::class, 'airportAutocomplete']);
Route::post('/flight/suggest_airport_by_id', [AutocompleteController::class, 'getAirportById']);
Route::post('/flight/prepare_flight_search', [FlightController::class, 'prepareFlightSearch']);
Route::post('/flight/validate_price', [FlightController::class, 'validatePrice']);
Route::post('/flight/book', [FlightController::class, 'bookFlight']);

Route::get('/flight/terms', [FlightController::class, 'getTerms']);


//Packages
Route::post('/packages/addPassengers', [BookPackageController::class, 'addPackagePassengers']);

//Support Page

Route::get('/support', [SupportController::class, 'index'])->name('support-home');
Route::post('/support/create', [SupportController::class, 'create'])->name('support-create');

Route::post('/prepareCheckout', [Checkout::class, 'getPaymentIntentSecret'])->name('getPaymentIntentSecret');
Route::get('/checkPaymentSuccess', [Checkout::class, 'checkPaymentSuccess'])->name('checkPaymentSuccess');
Route::get('verification/solo/{order_id}', [Checkout::class, 'verification'])->name('card-verification');

Route::post('/prepareCheckout/TicketLottery', [TicketLotteryCheckoutController::class, 'getPaymentIntentSecret'])->name('getPaymentIntentSecret-Ticket-Lottery');
Route::get('/checkPaymentSuccess/TicketLottery', [TicketLotteryCheckoutController::class, 'checkPaymentSuccess'])->name('checkPaymentSuccess-Ticket-Lottery');
Route::get('verification/lottery/{order_id}', [TicketLotteryCheckoutController::class, 'verification']);

Route::post('/prepareCheckout/FundMyTrip ', [TripsController::class, 'getPaymentIntentSecret']);
Route::get('/verification/fund_my_trip/{trip_id}', [TripsController::class, 'verification']);
Route::get('/checkPaymentSuccess/fund_my_trip', [TripsController::class, 'checkPaymentSuccess'])->name('checkPaymentSuccess-fund-my-trip');

Route::post('/book-trip/prepareCheckout', [BookTripCheckoutController::class, 'getPaymentIntentSecret'])->name('book-trip-payment-intent-secret');
Route::get('/checkout/confirmation', [BookTripCheckoutController::class, 'showOrderConfirmation']);
Route::post('/getCountries', [UsersProfile::class, 'getCountries']);
Route::middleware('auth')->group(function () {
    Route::get('/trips/create', function () {
        return view('trips.create');
    })->name('trips-create');

    Route::post('/notifications/markAsRead', [NotificationsController::class, 'markAllAsRead'])->name('notifications-mark-all-as-read');
    Route::post('/phone/verification-generate', [UsersProfile::class, 'generateVerificationSMS'])->name('phone-number-generate-verification')->middleware('throttle:3,1');
    Route::post('/phone/verification-notification', [UsersProfile::class, 'verifySMSverificationCode'])->name('phone-number-verify-code');

    Route::post('/report-violation', [ReportsController::class, 'reportObject'])->name('report-violation');
    Route::post('/trips/create', [TripsController::class, 'CreateTrip'])->name('trip-create');
    Route::get('/trips/ask-to-join/{id}', [TripsController::class, 'askToJoin'])->name('trip-request-to-join');
    Route::post('/trips/ask-to-join/', [TripsController::class, 'sendRequest'])->name('trip-request-to-join-post');
    Route::get('/trips/trip-status/{id}', [TripsController::class, 'trip_status_page'])->name('trip-status-view');
    Route::get('/trips/add-hotel/{trip_id}', [HotelController::class, 'fundMyTripAddHotelIndex'])->name('trip-add-hotel');
    Route::post('/trips/register-hotel', [TripsController::class, 'registerUserHotelInTrip']);
    Route::post('/trips/register-flight', [TripsController::class, 'registerUserFlightInTrip']);
    Route::post('/trips/addPassenger', [TripsController::class, 'addPassenger']);
    Route::post('/trips/finalize', [TripsController::class, 'finalizeTrip']);
    Route::post('/trips/add_member_info', [TripsController::class, 'addMemberPersonalInformation']);



    Route::post('/sendchatmessage', [TripsController::class, 'sendChatMessage'])->name('sendchatmessage');
    Route::get('/getChatDetails', [TripsController::class, 'getUserDetails']);
    Route::get('/getChatHistory', [TripsController::class, 'getUserHistory']);
    Route::post('/getRecentChats', [TripsController::class, 'getRecentChats']);


    //Ajax
    Route::post('acceptJoinRequest', [\App\Http\Controllers\TripsController::class, 'acceptJoinRequest']);
    Route::post('rejectJoinRequest', [\App\Http\Controllers\TripsController::class, 'rejectJoinRequest']);
    Route::post('deleteJoinRequest', [\App\Http\Controllers\TripsController::class, 'deleteJoinRequest']);
    Route::post('deleteHotel', [\App\Http\Controllers\TripsController::class, 'deleteHotel']);
    Route::post('deleteFlight', [\App\Http\Controllers\TripsController::class, 'deleteFlight']);

    Route::get('/solo/create', [SoloTripController::class, 'create'])->name('solos-create');
    Route::post('/solo/create', [SoloTripController::class, 'store']);
    Route::get('/solo/{id}/fund', [SoloTripController::class, 'fund'])->name('solo-fund');
    Route::post('/solo/end_funding', [SoloTripController::class, 'endFunding'])->name('solo-end-funding');
    Route::post('/fundtrip', [SoloTripController::class, 'chargeCustomer'])->name('solo-fund-charge');



    Route::post('/profile/updatePersonalInformation', [UsersProfile::class, 'updatePersonalInformation']);
    Route::post('/profile/store/{id}', [UsersProfile::class, 'store'])->name('profile-store');
    Route::get('/profile/edit', [UsersProfile::class, 'editProfile'])->name('profile-personal-information');
    Route::post('/profile/edit/{id}', [UsersProfile::class, 'editProfilePost'])->name('profile-edit-personal-information');
    Route::get('/profile/account-verification', [UsersProfile::class, 'account_verification_view'])->name('profile-account-verification');
    Route::get('/profile/change-password', [UsersProfile::class, 'change_password_view'])->name('profile-change-password');
    Route::get('/profile/my-tickets', [UsersProfile::class, 'my_tickets_view'])->name('profile-my-tickets');
    Route::get('/profile/my-coupons', [UsersProfile::class, 'my_coupons_view'])->name('profile-my-coupons');
    Route::post('/profile/images/upload', [UsersProfile::class, 'uploadImages']);
    Route::post('/profile/profile_pic/upload', [UsersProfile::class, 'uploadProfileImage']);
    Route::post('/profile/wall_pic/upload', [UsersProfile::class, 'uploadWallImage']);
    Route::post('/profile/new_album/upload', [UsersProfile::class, 'uploadNewAlbum']);
    Route::post('/profile/delete_album', [UsersProfile::class, 'deleteAlbum']);


    Route::post('/profile/description/update', [UsersProfile::class, 'updateProfileDescription']);
    Route::post('/profile/interestList/update', [UsersProfile::class, 'updateUserInterestList']);
    Route::post('/profile/languageList/update', [UsersProfile::class, 'updateUserLanguageList']);

    Route::post('/payment/redeem_balance_as_gift_card', [UsersProfile::class, 'redeemBalance']);

    Route::get('ticket-lottery/buy/{id}', [TicketLotteryController::class, 'buyTicket'])->name('ticket-lottery-buy');
    Route::post('/buy-ticket', [TicketLotteryController::class, 'chargeCustomerForTicket'])->name('ticket-lottery-charge');

    /*
        Route::post("/Report/User", [ReportsController::class, 'report_user'])->name("report-user");
        Route::post("/Report/Trip", [ReportsController::class, 'report_trip'])->name("report-trip");
        Route::post("/Report/SoloTrip", [ReportsController::class, 'report_solo_trip'])->name("report_solo_trip");
     */

    Route::get('/payment/methods', [Controllers\PaymentController::class, 'index'])->name('payment-methods-home');
    Route::post('/payment/methods/store', [Controllers\PaymentController::class, 'store'])->name('payment-methods-store');
    Route::post('/payment/methods/delete', [Controllers\PaymentController::class, 'delete'])->name('payment-methods-delete');

    /*
     * User Dashboard
     */
    Route::get('/fascia', [UserDashboardController::class, 'index']);
    Route::get('/fascia/booking/{id}', [UserDashboardController::class, 'booking']);
    Route::post('/flight/update-status/{id}', [FlightController::class, 'updateStatus']);
    /*
     * End User Dashboard
     */
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/auth/googleredirect', function () {
    return Socialite::driver('google')->redirect();
})->name('redirect-to-google');

Route::get('/auth/googlehandler', [LoginController::class, 'registerWithGoogle']);

Route::get('/auth/facebookredirect', function () {
    return Socialite::driver('facebook')->redirect();
})->name('redirect-to-facebook');

Route::get('/auth/facebookhandler', [LoginController::class, 'registerWithFacebook']);







require __DIR__.'/auth.php';
require __DIR__.'/custom-admin.php';

Route::get('*', function () {
    abort(404);
});
