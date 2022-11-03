    <?php

    namespace App\Http\Controllers;

    use Illuminate\Support\Facades\Http;
    use App\Events\ChatMessageSent;
    use App\Jobs\ProcessTrippboOrder;
    use App\Jobs\scrapCity;
    use App\Mail\FlightBookingConfirmation;
    use App\Mail\FundMyTripJoinRequestAccepted as MailFundMyTripJoinRequestAccepted;
    use App\Mail\welcome;
    use App\Models\ActivityBooking;
    use App\Models\BookActivityOrder;
    use App\Models\BookFlightOrder;
    use App\Models\BookHotelOrder;
    use App\Models\BookTripOrder;
    use App\Models\ChatMessage;
    use App\Models\Country;
    use App\Models\FundMyTripFlightOrderPlan;
    use App\Models\FundMyTripHotelOrderPlan;
    use App\Models\FundMyTripMemberPersonalInformation;
    use App\Models\FundMyTripOrder;
    use App\Models\FundMyTripPassenger;
    use App\Models\GiftCard;
    use App\Models\HotelPendingReservation;
    use App\Models\HotelsAPICity;
    use App\Models\TravelomatixHotel;
    use App\Models\Trip;
    use App\Models\internalAutocompleteItem;
    use App\Models\SriggleCity;
    use App\Models\TripJoinRequest;
    use App\Models\User;
    use App\Notifications\FundMyTripJoinRequestAccepted;
    use App\Notifications\FundMyTripNewJoinRequest;
    use App\Notifications\PhoneNumberVerificationCodeNotification;
    use App\Notifications\SingleTripFinalized;
    use App\Nova\BookFlightOrder as NovaBookFlightOrder;
    use App\Services\Amadeus;
    use App\Services\Hotelbeds\HotelbedsAuthManager;

    use App\Services\Klarna\Klarna;
    use App\Services\Sriggle\FlightService;
    use App\Services\Sriggle\HolidayService;
    use App\Services\Sriggle\HotelService;
    use App\Services\Sriggle\SriggleGeneralService;
    use App\Services\Travelomatix\Activities;
    use App\Services\Travelomatix\Autocomplete;
    use App\Services\Travelomatix\Flights;
    use App\Services\Travelomatix\Hotels;
    use App\Services\Trippbo\CurrencyManagement;
    use App\Services\Trippbo\FundMyTripFlightBookingBot;
    use App\Services\Trippbo\FundMyTripHotelBookingBot;
    use App\Services\Trippbo\GiftCardManager;
    use App\Services\Trippbo\TrippboOrder;
    use Illuminate\Http\Request;
    use Illuminate\Notifications\Messages\VonageMessage;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Cache;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Log;
    use Illuminate\Support\Facades\Mail;
    use Illuminate\Support\Facades\Notification;
    use Laravel\Cashier\Cashier;
    use Laravel\Cashier\Exceptions\IncompletePayment;
    use Laravel\Cashier\Payment as LaravelPayment;
    use Laravel\Nova\Fields\Currency;
    use PHPUnit\Framework\Constraint\Count;
    use Stripe\PaymentIntent as StripePaymentIntent;
    use Stripe\Stripe;
    use Illuminate\Support\Facades\Storage;

    class TripsController extends Controller
    {
        public function test2(Request $r)
        {

            /*    Mail::to('noura.makhzoum@gmail.com')->send(new FlightBookingConfirmation());
    */

            /*         $f = new Flights();
            return dd($f->issueHold());
    */
            /*   return dd($r->session()->all()) ; */
            /*     $api = new Hotels();
        return dd($api->commitBooking(BookHotelOrder::find(2))); */

            /*       $request = TripJoinRequest::find(2);
        return new MailFundMyTripJoinRequestAccepted($request); */

            /*   $order = BookTripOrder::find(3);
            $trippbo_order = new TrippboOrder($order);
            $trippbo_order->processOrder(); */

            /*   $all = TravelomatixHotel::all();

                $facilities = [];

                foreach($all as $hotel)
                {
                    $break_down = json_decode($hotel->hotel_facilities);
                    $break_down = array_slice($break_down,0,1,true);
                    foreach($break_down as $facility => $facilityName)
                    {

                        if (array_key_exists($facilityName, $facilities))
                        {
                            $facilities[$facilityName] +=1;
                        }
                        else
                        {
                            $facilities[$facilityName] = 1;
                        }
                    }
                }

                asort($facilities);
                return dd($facilities); */
        }

        public function test(Request $r)
        {


            $response = Http::timeout(60)->post('https://apidemo.sriggle.tech/SIGNIX/B2B/Hotel/Search', [
                "Credential" => [
                    'Type' => 'C',
                    'Module' => 'B',
                    'Domain' => 'TRI',
                    'LoginID' => 'SWETRI00',
                    'Password' => 'Test@1234',
                    'LanguageLocale' => 'en-US',
                    'IpAddress' => '122.180.17.226'
                ],
                'CityId' => '9798',
                'HotelId' => '1032121',
                'CheckInDate' => '2022-12-15',
                'CheckOutDate' => '2022-12-20',
                'Currency' => 'USD',
                'TravellerNationality' => 'IN',
                'PageSize' => 10,

                'Rooms' =>  [
                    [
                        'RoomNo' => 1,
                        'Adults' => '1',
                        'Children' => '0',
                        'Paxs' => null
                    ]


                ],


            ]);


            return dd($response->json());
            /*    $t = SriggleCity::where("city_id", 31423)->first();

            return $t; */
            /*         $a = new  HolidayService();
            return dd($a->getHolidays([])); */

            /*     $plan = FundMyTripFlightOrderPlan::findOrFail(2);
            $test = new FundMyTripFlightBookingBot();
        return dd($test->updateFlightPrice($plan)); */
            /*   return dd(Storage::disk('s3')->exists('test.json')); */

            /*   $fs = new SriggleGeneralService(); */


            /*  return view('test'); */



            /*    $x = Country::all();
            return dd($x[1]); */



            /*             $o = BookFlightOrder::find(3);
                return new FlightBookingConfirmation(json_decode($o->commit_book_response, true), $o); */

            //  $o = BookTripOrder::find($r['order_id']);
            //    $t = new TrippboOrder($o);
            //    $t->processOrder();
            /*         $flight = new Flights();
            $flight_order = BookFlightOrder::find($r['order_id']);
            return    dd($flight->commitBooking($flight_order)); */
            /*    return new FlightBookingConfirmation; */
            /*         $h  = new HotelService();
            return dd($h->updateRateComments()); */
            /*   $order = BookTripOrder::find(1);
            $trippbo_order = new TrippboOrder($order);
            $trippbo_order->processOrder(); */
            /*       $x = new HotelService();

            return dd($x->updateRateComments());
    */
            /*        $x = new HotelService();
            return dd($x->populateRoomTypes()); */
            /*
            $x = new HotelService();
            return dd($x->updateFacilites()); */
            /*
            $key = config('services.hotelbeds.API_KEY');
            $secret = config('services.hotelbeds.API_SECRET');
            $timestamp =  time();

            $output = hash('sha256', $key . $secret . $timestamp);
            return $output;

            $x = new    HotelService();
        return  $x->getHotels([]); */
            /*       $hotels = TravelomatixHotel::where('city_id', 5)->get();
            $hotelModel = $hotels->where('hotel_code', '6716')->take(1)[0];

            return dd($hotelModel); */
            /*
                            $manager = new GiftCardManager();
                    $manager->generateGIftCard('EUR', 100, '22-10-2023',true); */
            /*      $hotelsCityIds = HotelsAPICity::all();
            $batch = $r->input("batch");
            if (Cache::has('scrapbatch_new' . $batch)) {
                return 'already scraped';
            } else {
                Cache::put('scrapbatch_new' . $batch, 'scraped');

                foreach ($hotelsCityIds as $city) {

                    $city_id =  $city->city_code;
                    if ($city->id <= $batch * 1000 && $city_id > $batch * 10 - 1000) {
                        $scraper = new scrapCity((int) $city_id);
                        dispatch($scraper);
                    }
                }
            }
            return "ok";
    */
            /*       $flightOrder = FundMyTripFlightOrderPlan::find(1);


            $result =  [

                'event' => 'fundmytrip.single-trip-finalized-hotel',
                'user_id' => 1,
                'hotel_price' => '550',
                'hotel_price_currency' => 'MSD',


            ];
            Notification::send(User::find(1), new SingleTripFinalized($result)); */
            /*       $flightOrder = FundMyTripFlightOrderPlan::find(1);

            $bot = new  FundMyTripFlightBookingBot();
        return dd($bot->getFlightOrderInformation($flightOrder)); */
            /*      $trip = Trip::find(1);
            $trip->finalizeTrip(); */

            /*         $trip_order =  BookTripOrder::find(1);
            $order = new TrippboOrder($trip_order);
            $order->processOrder(); */
            /*    $order = BookFlightOrder::find(1);
            $ord = new Flights();
            return dd($ord->commitBooking($order)); */

            /*         $rapid_api = CurrencyManagement::getPriceRapidApi('USD', 'SEK', 100);
            $another_api = CurrencyManagement::getPrice('USD', 'SEK', 100);


            return ' rapid: ' . $rapid_api . ' another: ' . $another_api; */
            /*       $order = BookFlightOrder::find(1);

            $h = new Flights();

            return dd($h->commitBooking($order)); */
            /*       return dd(CurrencyManagement::getPrice('USD', 'SEK' , 100));
            return dd(CurrencyManagement::determine_user_currency());
    */
            /*   $trippbo_order =  new TrippboOrder(BookTripOrder::find(1));

            $trippbo_order->processOrder(); */

            /*     $x = new Hotels();
        return $x->populateCityID();
    */
            /*       $TEST = new Klarna();
            return $TEST->createOrder();
    */
            /*     $hotels = new Hotels();
        $hotels->test2();
        */

            /*   $user =   Auth::user();
        $user->redeemBalanceAsGiftCard(100); */
        }

        //
        public function BrowseTrips(Amadeus $a, Request $r)
        {
            $toPass = [];

            if ($r->has('destination_country') && $r->input('destination_country') != 1) {
                $trips = Trip::where('destination_country_id', $r->input('destination_country'))->paginate(12);
                $toPass['trips'] = $trips;
                $toPass['destination_country_id'] = $r->input('destination_country');
            } else {
                $trips = Trip::where('completed', false)->paginate(12);
                $toPass['trips'] = $trips;
            }
            $countries = Country::all();
            $toPass['countries'] = $countries;

            return view('fund-my-trip.main', $toPass);
        }

        public function getRecentChats(Request $r)
        {
            if (!Auth::check()) {
                abort(500);
            }
            $user = $r->user();
            $messages = $user->recentChats();

            return $messages;
        }


        public function sendChatMessage(Request $r)
        {
            $r->validate([
                'receiver_id' => 'required|numeric',
            ]);

            $m = new ChatMessage();
            $m->user_id = Auth::id();
            $m->message = $r['message'];
            $m->receiver_id = $r['receiver_id'];

            if (Auth::id() < $r['receiver_id']) {
                $m->conversation_id = Auth::id() . '_' . $r['receiver_id'];
            } elseif (Auth::id() > $r['receiver_id']) {
                $m->conversation_id = $r['receiver_id'] . '_' . Auth::id();
            } else {
                abort(403);
            }

            /*    Cache::forget('user-' . Auth::id() . '-recent_chat_messages');
            Cache::forget('user-' . $r['receiver_id'] . '-recent_chat_messages');
        */
            $m->save();
            ChatMessageSent::dispatch($m);
        }

        public function CreateTrip(Request $request)
        {
            $request->validate([

                'title' => 'required|string|max:255',
                'description' => 'required|string|max:50000',
                'trip_img' => 'nullable|image',
                //       'destination_city_code' => 'required|string|max:10',
                'trip_id' => 'nullable|numeric',
                'duration' => 'required|numeric',
                'date' => 'required|string',
                'type_of_trip' => 'required|string',
            ]);



            $trip = new Trip();
            $editing = false;
            if ($request->has('trip_id')) {
                $trip = Trip::findOrFail($request->input('trip_id'));
                if ($trip->user->id !== Auth::id()) {
                    if (Auth::user()->isAdmin === false) {
                        abort(403);
                    }
                }

                $editing = true;
            }
            if ($editing === false) {
                $trip->user_id = Auth::id();
            }

            $trip->type_of_trip = $request['type_of_trip'];
            $trip->description = $request['description'];
            $trip->title = $request['title'];
            $trip->duration = $request['duration'];
            $trip->destination_city_code = $request['destination_city_code'];
            $trip->start_month = $request['date'];
            $trip->destination_country_id = $request['destination_country_id'];
            $trip->destination_city_id = $request['destination_city_id'];

            if ($request->hasFile('trip_img')) {
                $img = $request->file('trip_img')->storePublicly('trips/images', 'public');
                $trip->trip_img = $img;
            }
            $trip->destination_city_code = $request['destination_city_code'];

            if ($request['type_of_trip'] == 'host') {
                $trip->host_id = Auth::id();
            }
            $trip->save();

            if ($editing === false) {
                $j = new TripJoinRequest();
                $j->user_id = Auth::id();
                $j->trip_id = $trip->id;
                $j->accepted = true;
                $j->save();
            }

            return route('trip-browse', [$trip->id]);
        }

        public function ViewTrip(Request $request, $id)
        {
            $trip = Trip::with('user.profile')->findOrFail($id);

            $unanswered_requests = $trip->unansweredRequests();
            $trip_members = $trip->members();

            $user_applied = false;
            $user_is_trip_member = false;
            $user_trip_reservation = null;

            if (Auth::check() && $unanswered_requests->contains('user_id', Auth::id())) {
                $user_applied = true;
            }
            if ($trip_members->contains('user_id', Auth::id())) {
                $user_is_trip_member = true;
                $user_trip_reservation = HotelPendingReservation::where('user_id', Auth::id())->where('for_trip_id', $trip->id)->first();
            }



            if (Auth::check() && $trip->user->id === Auth::id()) {
                $countries = new Country();
                $all = $countries->getAllCountriesCached();
                $user = User::findOrFail(Auth::id());
                $paymentMethods = $user->paymentMethods();

                return view('fund-my-trip.sub', ['user_id' => Auth::id(), 'payment_methods' => $paymentMethods, 'is_member' => true, 'countries' => $all, 'trip' => $trip, 'trip_members' => $trip_members, 'unanswered_requests' => $unanswered_requests, 'owner' => true, 'user_applied' => $user_applied]);
            } elseif (Auth::check() && $user_is_trip_member) {
                $countries = new Country();
                $all = $countries->getAllCountriesCached();
                $user = User::findOrFail(Auth::id());
                $paymentMethods = $user->paymentMethods();

                return view('fund-my-trip.sub', ['user_id' => Auth::id(), 'payment_methods' => $paymentMethods, 'countries' => $all, 'trip' => $trip, 'trip_members' => $trip_members, 'owner' => false, 'is_member' => true, 'user_trip_reservation' => $user_trip_reservation, 'user_applied' => $user_applied, 'unanswered_requests' => $unanswered_requests]);
            } else {
                return view('fund-my-trip.sub', ['user_id' => null, 'trip' => $trip, 'owner' => false, 'is_member' => false, 'user_applied' => false, 'countries' => null, 'trip_members' => [], 'owner' => false, 'is_member' => false, 'unanswered_requests' => [], 'countries' => []]);
            }
        }

        public function askToJoin(Request $request, $id)
        {
            return view('trips.create-join-request', ['id' => $id]);
        }

        public function addPassenger(Request $r)
        {
            $trip = Trip::findOrFail($r['trip_id']);
            if ($trip->completed) {
                return;
            }

            if (!$trip->members()->contains('user_id', Auth::id())) {
                return "you're not a member.";
            }

            $month = $r->input('DateOfBirthMonth');
            $day = $r->input('DateOfBirthDay');
            $length = 2;
            $month = substr(str_repeat(0, $length) . $month, -$length);
            $day = substr(str_repeat(0, $length) . $day, -$length);
            $passenger = FundMyTripPassenger::where('user_id', Auth::id())->first();
            if ($passenger == null) {
                $passenger = new FundMyTripPassenger();
                $passenger->user_id = Auth::id();
                $passenger->trip_id = $trip->id;
            }
            $passenger->IsLeadPax = 1;
            $passenger->FirstName = $r->input('FirstName');
            $passenger->LastName = $r->input('LastName');
            $passenger->Gender = $r->input('Gender');
            $passenger->DateOfBirth = $r->input('DateOfBirthYear') . '-' . $month . '-' . $day;
            $passenger->CountryCode = $r->input('Country');
            $passenger->CountryName = Country::where('code', $r->input('Country'))->first()->name;
            $passenger->ContactNo = $r->input('ContactNo');
            $passenger->City = $r->input('City');
            $passenger->PinCode = $r->input('PinCode');
            $passenger->AddressLine1 = $r->input('AddressLine1');
            $passenger->Email = $r->input('Email');
            $passenger->PaxType = 1;
            $passenger->Title = $r->input('Gender') == 1 ? 'Mr' : 'Ms';

            $passenger->save();
        }

        public function acceptJoinRequest(Request $request)
        {
            $request->validate([
                'join_request_id' => 'required',

            ]);
            if (isset($request['join_request_id'])) {
                $join_request_id = $request['join_request_id'];
                $join_request = TripJoinRequest::findOrFail($join_request_id);
                if ($join_request->trip->completed) {
                    return;
                }
                if ($join_request->trip->user->id == Auth::id()) {
                    $reservation = new HotelPendingReservation();
                    $reservation->user_id = Auth::id();
                    $reservation->for_trip_id = $join_request->trip->id;
                    if ($join_request->fund_hotel) {
                        $reservation->payer_for_hotel_user_id = $join_request->trip->user->id;
                    }
                    if ($join_request->fund_flight) {
                        $reservation->payer_for_flight_user_id = $join_request->trip->user->id;
                    }

                    $join_request->accepted = true;

                    DB::beginTransaction();

                    try {
                        $reservation->save();
                        $join_request->save();
                    } catch (\Exception $e) {
                        DB::rollback();
                        throw $e;
                    }

                    DB::commit();

                    $join_request->user->notify(new FundMyTripJoinRequestAccepted($join_request));
                    Mail::to($join_request->user)->queue(new MailFundMyTripJoinRequestAccepted($join_request));


                    return Trip::findOrFail($join_request->trip->id)->members();
                }
            }
        }

        public function rejectJoinRequest(Request $request)
        {
            $request->validate([
                'join_request_id' => 'required',

            ]);

            $join_request_id = $request['join_request_id'];
            $join_request = TripJoinRequest::findOrFail($join_request_id);
            if ($join_request->trip->user->id == Auth::id()) {
                $join_request->declined = true;
                $join_request->save();

                return 'success';
            }

            return abort(503);
        }

        public function deleteJoinRequest(Request $request)
        {
            $request->validate([
                'join_request_id' => 'required',

            ]);
            $join_request_id = $request['join_request_id'];
            $join_request = TripJoinRequest::findOrFail($join_request_id);

            if ($join_request->trip->completed) {
                return;
            }
            if ($join_request->trip->user->id == Auth::id()) {
                $join_request->delete();

                return 'success';
            }

            return abort(503);
        }

        public function deleteHotel(Request $request)
        {
            $request->validate([
                'trip_id' => 'required',

            ]);

            $trip = Trip::findOrFail($request['trip_id']);
            if ($trip->completed == true) {
                return;
            }

            $user_id = Auth::id();

            FundMyTripHotelOrderPlan::where('user_id', $user_id)->where('fund_my_trip_order_id', $trip->tripOrder->id)->delete();
        }

        public function deleteFlight(Request $request)
        {
            $trip = Trip::findOrFail($request['trip_id']);
            if ($trip->completed == true) {
                return;
            }

            $user_id = Auth::id();

            FundMyTripFlightOrderPlan::where('user_id', $user_id)->where('fund_my_trip_order_id', $trip->tripOrder->id)->delete();
        }

        public function sendRequest(Request $request)
        {
            $request->validate([
                'trip_id' => 'required',
                'message' => 'string|max:500',
                'country' => 'string|max:50',
                //  'cost' => 'string|max:50',

            ]);
            $trip_id = $request['trip_id'];
            $trip = Trip::findOrFail($trip_id);
            if ($trip->user->id != Auth::id() && $trip->joinRequests->contains('user_id', Auth::id()) == false && $trip->completed == false) {
                $joinRequest = new   TripJoinRequest();
                $joinRequest->user_id = Auth::id();
                $joinRequest->trip_id = $trip_id;
                $joinRequest->message = $request['message'];
                $joinRequest->country = $request['country'];
                //            $joinRequest->cost = $request['cost'];

                $joinRequest->save();

                $joinRequest->trip->user->notify(new FundMyTripNewJoinRequest($joinRequest));

                return route('trip-browse', [$trip_id]);
            } else {
                abort(404);
            }
        }

        public function trip_status_page($trip_id)
        {
            $t = Trip::findOrFail($trip_id);
            if ($t->members()->contains('user_id', Auth::id())) {
                return view('fund-my-trip.sub', ['trip' => $t]);
            }
        }

        public function how_it_works()
        {
            return view('how-it-works.fund-my-trip');
        }

        public function getUserDetails(Request $r)
        {
            $r->validate([
                'user_id' => 'required|numeric',
            ]);
            $user_id = $r->input('user_id');

            $user = User::findOrFail($user_id);

            return response()->json([
                'name' => $user->name,
                'picture_url' => $user->profile->picture_url ? asset('storage/' . $user->profile->picture_url) : 'no-picutre',
            ]);
        }

        public function getUserHistory(Request $r)
        {
            $r->validate([
                'user_id' => 'required|numeric',
            ]);
            $receiver_id = $r->input('user_id');

            $convo_id = ($receiver_id > Auth::id() ? Auth::id() . '_' . $receiver_id : $receiver_id . '_' . Auth::id());



            $messages = new ChatMessage();
            $messages = $messages->getConversation($convo_id);

            return response()->json(['messages' => $messages]);
        }

        public function finalizeTrip(Request $r)
        {
            if (!Auth::check()) {
                return;
            }
            $trip_id = $r['trip_id'];

            $trip = Trip::findOrFail($trip_id);
            if (!Auth::id() == $trip->host_id || $trip->completed == true) {
                abort(403);
            }
            if (!$trip->canFinalize()) {
                abort(403, 'At least one member should have a hotel or flight booking and their personal information entered.');
            }

            $trip->finalizeTrip();
        }

        public function registerUserHotelInTrip(Request $r)
        {
            $tripId = $r->input('tripId');

            $hotelOrderId = $r->input('hotelOrderId');
            $trip = Trip::findOrFail($tripId);

            $trip_members = $trip->members();

            if ($trip_members->contains('user_id', Auth::id())) {
                $hotelOrder = BookHotelOrder::findOrFail($hotelOrderId);
                $hotelOrder->submitted = true;
                $hotelOrder->user_id = Auth::id();
                $hotelOrder->save();
                //   $join_request = $trip->joinRequests->where('user_id', Auth::id())->first();
                //        $join_request->order_id = $orderId;
                //       $join_request->save();
            }
        }

        public function registerUserFlightInTrip(Request $r)
        {
            $tripId = $r->input('tripId');

            $flightOrderId = $r->input('flightOrderId');
            $trip = Trip::findOrFail($tripId);

            $trip_members = $trip->members();

            if ($trip_members->contains('user_id', Auth::id())) {
                $flightOrder = BookFlightOrder::findOrFail($flightOrderId);
                $flightOrder->submitted = true;
                $flightOrder->user_id = Auth::id();
                $flightOrder->save();

                //   $join_request = $trip->joinRequests->where('user_id', Auth::id())->first();
                //      $join_request->order_id = $orderId;
                //    $join_request->save();
            }
        }

        public function getPaymentIntentSecret(Request $r)
        {
            if (Auth::check()) {
                $r->validate([
                    'trip_id' => 'required|numeric',
                    'paymentMethodRadio' => 'required',
                ]);
            } else {
                abort(403);
            }
            $stripe = new \Stripe\StripeClient(
                config('services.stripe.secret')
            );
            $trip = Trip::findOrFail($r->input('trip_id'));
            if ($r->input('paymentMethodRadio') == 'new_payment_method') {
                $options = [
                    'amount' => $trip->tripOrder->getTotalPriceInUSD() * 100,
                    'currency' => 'usd',
                    'automatic_payment_methods' => [
                        'enabled' => 'true',
                    ],
                    'metadata' => ['type' => 'fund_my_trip'],
                ];

                $intent = '';
                $future_payments = false;
                if (Auth::check() && $r->has('future_payments')) {
                    $future_payments = true;
                    $user = User::findOrFail(Auth::id());
                    $user->createOrGetStripeCustomer();

                    $intent = $stripe->paymentIntents->create([
                        'amount' => $trip->tripOrder->getTotalPriceInUSD() * 100,
                        'currency' => 'usd',
                        'automatic_payment_methods' => [
                            'enabled' => 'true',
                        ],
                        'customer' => $user->stripeId(),
                        'metadata' => ['type' => 'fund_my_trip'],
                    ]);
                    /*       $intent =  \Stripe\PaymentIntent::create($options, Cashier::stripeOptions(['SETUP_FUTURE_USAGE' => 'on_session' , 'customer' => $user->stripeId()]));
            */
                } else {
                    $intent = $stripe->paymentIntents->create($options);
                }
                $client_secret = $intent->client_secret;
                $tripOrder = FundMyTripOrder::where('trip_id', $trip->id)->first();
                $tripOrder->stripe_intent_id = $intent->id;
                $tripOrder->save();

                return response()->json(['status' => 'success', 'client_secret' => $client_secret, 'trip_order_id' => $trip->tripOrder->id, 'future_payments' => $future_payments]);
            } else {
                $tripOrder = FundMyTripOrder::where('trip_id', $trip->id)->first();

                try {
                    $user_payment_method = $r->user()->findPaymentMethod($r->input('paymentMethodRadio'));
                    $payment = $r->user()->charge($tripOrder->getTotalPriceInUSD() * 100, $user_payment_method->id, ['currency' => 'usd', 'metadata' => ['type' => 'fund_my_trip']]);
                    $tripOrder->payment_intent_id = $payment->id;
                    if ($payment->status == 'succeeded') {
                        $tripOrder->submittedSuccessfully = true;
                    }
                    $tripOrder->save();

                    return response()->json(['status' => 'done', 'trip_order_id' => $trip->id]);
                } catch (IncompletePayment $e) {
                    $tripOrder->stripe_intent_id = $e->payment->id;
                    $tripOrder->save();

                    return response()->json(['status' => 'verification', 'trip_order_id' => $trip->tripOrder->id]);
                }
            }
        }

        public function verification(Request $r, $id)
        {
            $order = FundMyTripOrder::where('trip_id', $id)->first();
            $stripe = new \Stripe\StripeClient(
                config('services.stripe.secret')
            );
            $payment_intent = $stripe->paymentIntents->retrieve($order->stripe_intent_id);
            $laravel_payment_intent = new LaravelPayment($payment_intent);

            return view('verification-fund-my-trip', ['order' => $order, 'payment' => $laravel_payment_intent, 'redirect' => route('trip-browse', $order->trip_id)]);
        }

        public function checkPaymentSuccess(Request $r)
        {
            $r->validate([
                'trip_order_id' => 'required|numeric',

            ]);
            $stripe = new \Stripe\StripeClient(
                config('services.stripe.secret')
            );
            $order_id = $r->input('trip_order_id');
            $tripOrder = FundMyTripOrder::findOrFail($order_id);
            $payment_intent = $stripe->paymentIntents->retrieve($tripOrder->stripe_intent_id);

            $succeeded = false;

            if ($payment_intent->status == 'succeeded' && $payment_intent->amount >= ($tripOrder->getTotalPriceInUSD() * 100)) {
                $tripOrder->successfully_paid = true;
                $tripOrder->save();
                $tripOrder->trip->completed = true;
                $tripOrder->trip->save();

                return redirect()->route('trip-browse', $tripOrder->trip_id)->with('success', 'Payment has been done successfully !');
            } else {
                return redirect()->route('trip-browse', $tripOrder->trip_id)->with('error', 'Something Went Wrong! Please Contact Our Customer Service For Assistance.');
            }
        }

        public function addMemberPersonalInformation(Request $r)
        {
            if (!Auth::check()) {
                return;
            }

            $trip_id = $r['trip_id'];
            $trip = Trip::findOrFail($trip_id);
            if ($trip->isMember(Auth::id())) {
                $info = json_decode($r['data'], true);
                $personal_information = FundMyTripMemberPersonalInformation::firstOrNew(['user_id' => Auth::id(), 'trip_id' => $trip_id]);
                $personal_information->personal_information = $info;
                $personal_information->save();
            }



            return $trip->members();
        }
    }
