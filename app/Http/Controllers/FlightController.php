    <?php

    namespace App\Http\Controllers;

    use App\Models\BookFlightOrder;
    use App\Models\BookHotelOrder;
    use App\Models\BookTripOrder;
    use App\Models\Country;
    use App\Models\FlightPassenger;
    use App\Models\FlightSupportPackage;
    use App\Models\FundMyTripFlightOrderPlan;
    use App\Models\FundMyTripOrder;
    use App\Models\HotelPassenger;
    use App\Models\SriggleFlightBooking;
    use App\Models\Trip;
    use App\Models\TripJoinRequest;
    use App\Services\Travelomatix\Flights;
    use App\Services\Travelomatix\Hotels;
    use App\Services\Trippbo\CurrencyManagement;
    use App\Services\Trippbo\SessionController;
    use Carbon\Carbon;
    use Database\Seeders\FlightSupportPackagesSeeder;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Str;
    use App\Services\Sriggle\FlightService;
    use Illuminate\Support\Facades\Cache;
    use App\Services\Trippbo\CacheManager;

    class FlightController extends Controller
    {


        public function bookFlight(Request $r)
        {
            $a = new FlightService();





            $flight = json_decode($r['flight'], true);
            $flight['flight_class'] = $r['flight_class'];
            $flight['flight_type'] = $r['flight_type'];
            $paxes = json_decode($r['paxes'], true);
            $booking_response =  new SriggleFlightBooking();
            $resp = $a->bookFlight($flight, $paxes);
            $booking_response->booking_response = json_encode($resp);
            $booking_response->save();

            return   $resp;
        }

        public function searchForFlights(Request $r)
        {
            $flight_service = new FlightService();
            $data = json_decode($r['search_data'], true);
            $filters = [];
            //  return $data;


            if ($r->has("filters")) {
                $data['filters'] = json_decode($r['filters']);
            }

            //   $searchData = CacheManager::getFlightSearchData($key);


            return $flight_service->searchForFlights2($data);
        }


        public function validatePrice(Request $r)
        {
            $data = json_decode($r['flight'], true);
            $api = new FlightService();
            return   $api->priceValidation($data);
        }
        public function getTerms(Request $r)
        {
            $key = $r['key'];
            $data = CacheManager::getFlightData($key);
            //  return dd($data);
            $api = new FlightService();
            $response =   $api->getTerms($data);


            return view('flights.terms', ['data' => $response]);
        }
        public function prepareFlight(Request $r)
        {

            $flight = json_decode($r['flight'], true);
            $search_data = json_decode($r['search_data'], true);

            $data = array_merge($flight, $search_data);

            $key =   CacheManager::cacheFlight($data);

            return $key;
        }
        public function prepareFlightSearch(Request $r)
        {
            $data = [];
            $data['departure_date'] = $r['departure_date'];
            $data['return_date'] = $r['return_date'];
            $data['departure_airport_id'] = $r['departure_airport_id'];
            $data['destination_airport_id'] = $r['destination_airport_id'];
            $data['flight_class'] = $r['flight_class'];
            $data['flight_type'] = $r['flight_type'];
            $data['departure_date'] = $r['departure_date'];
            $data['flight_passengers'] = $r['flight_passengers'];

            $search_key =  CacheManager::saveFlightSearchData($data);
            return $search_key;
        }

        public function reviewFlightIndex(Request $r)
        {

            $key = $r['data_key'];
            $flight =  CacheManager::getFlightData($key);
            $search_data = CacheManager::getFlightSearchData($r['search_key']);
            if ($r->has('trip')) {
                $plan = FundMyTripFlightOrderPlan::firstOrNew(['user_id' => Auth::id(), 'trip_id' => $r['trip']]);
                $plan->flight = $flight;
                $search_data['flight_passengers'] = json_decode($search_data['flight_passengers'], true);
                $plan->search_data = $search_data;
                $plan->save();
                return redirect("/trips/trip/" . $r['trip']);
            }
            return view('flights.review', ['flight' => $flight, 'data_key' => $key, 'search_data' => $search_data]);
        }
        public function preparePayment(Request $r)
        {
            $options = [
                'amount' => (10000),
                'currency' => 'SEK',

                'automatic_payment_methods' => [
                    'enabled' => 'true',
                ],
            ];
            $stripe = new \Stripe\StripeClient(
                config('services.stripe.secret')
            );
            $intent = $stripe->paymentIntents->create($options);
            $client_secret = $intent->client_secret;

            return $client_secret;
        }
        public function index(Request $r)
        {
            $key = '';
            $data = [];
            if ($r->has('key')) {
                $key  = $r['key'];
            }
            if ($r->has('trip') && $key == '') {
            } else {
                $data = CacheManager::getFlightSearchData($key);
            }

            if ($r->has('trip')) {
                $data['trip'] = $r['trip'];
            }


            return view('flights.main', ['search_data' => $data, 'search_key' => $key]);





            if ($r->has('isPackage')) {
                $package_information = session('package_information');

                return view('flights.main', [
                    'origin' =>        $package_information['originAirportCode'],
                    'destination' =>  $package_information['destinationAirportCode'],
                    'adultCount' => $package_information['adultCount'],
                    'childCount' => $package_information['childCount'],
                    'infantCount' => $package_information['infantCount'],
                    'flight_class' => $package_information['package_class'],
                    'returnDate' =>  $package_information['checkOutDate'],
                    'departureDate' =>   $package_information['checkInDate'],
                    'flightType' =>  'round trip',
                    'tripId' =>  '',
                    'flight_origin_name' => $package_information['originCity'] . ', ' . $package_information['originCountry'],
                    'flight_destination_name' => $package_information['destinationCity'] . ', ' . $package_information['destinationCountry'],
                    'isPackage' => 1,
                    'flightSupportPackages' => FlightSupportPackage::all(),

                ]);
            } else {
                return view('flights.main', [
                    'origin' => $r->has('origin') ? $r['origin'] : '',
                    'destination' =>  $r->has('destination') ? $r['destination'] : '',
                    'adultCount' => $r->has('adultCount') ? $r['adultCount'] : 1,
                    'childCount' => $r->has('childCount') ? $r['childCount'] : 0,
                    'infantCount' => $r->has('infantCount') ? $r['infantCount'] : 0,
                    'flight_class' => $r->has('flight_class') ? $r['flight_class'] : 'Economy',
                    'returnDate' =>  $r->has('returnDate') ? $r['returnDate'] : Carbon::now()->addDays(15)->toDateString(),
                    'departureDate' =>   $r->has('departureDate') ? $r['departureDate'] : Carbon::now()->addDays(1)->toDateString(),
                    'flightType' =>  $r->has('flightType') ? $r['flightType'] : 'round trip',
                    'tripId' => $r->has('tripId') ? $r['tripId'] : '',
                    'flight_origin_name' => $r->has('flight_origin_name') ? $r->input('flight_origin_name') : '',
                    'flight_destination_name' => $r->has('flight_destination_name') ? $r->input('flight_destination_name') : '',
                    'isPackage' => 0,
                    'flightSupportPackages' => FlightSupportPackage::all(),

                ]);
            }
        }

        public function getFlights(Request $r)
        {
            $api = new Flights();
            $params = [];

            $params['origin'] = $r['origin'];
            $params['destination'] = $r['destination'];
            $params['adultCount'] = $r['adultCount'];
            $params['childCount'] = $r['childCount'];
            $params['infantCount'] = $r['infantCount'];
            $params['flight_class'] = $r['flight_class'];
            $params['returnDate'] = $r['returnDate'];
            $params['departureDate'] = $r['departureDate'];
            $params['flightType'] = $r['flightType'];
            $response = $api->roundTripFlightSearch($params);

            return  $response;
        }

        public function reserveFlight(Request $r)
        {
            $trip = null;
            if ($r->has('tripId') && $r->input('tripId') !== '') {
                $trip = Trip::find($r['tripId']);

                if (Auth::check() && $trip !== null && $trip->isMemeber(Auth::id())) {
                    $member = TripJoinRequest::where('user_id', Auth::id())->first();
                    $trip_order = $trip->tripOrder;
                    if ($trip_order == null) {
                        $trip_order = new FundMyTripOrder();
                    }
                    $trip_order->trip_id = $trip->id;
                    $trip_order->save();

                    $order = FundMyTripFlightOrderPlan::where(['user_id' => Auth::id()])->first();
                    if ($order == null) {
                        $order = new FundMyTripFlightOrderPlan();
                    }

                    $order->fund_my_trip_order_id = $trip_order->id;
                    $order->departure_date = $r['departure_date'];
                    $order->return_date = $r['return_date'];
                    $order->origin_airport_code = $r['origin'];
                    $order->destination_airport_code = $r['destination'];
                    $order->flight_number = $r['flight_number'];
                    $order->operator_code = $r['operator_code'];
                    $order->return_flight_number = $r['return_flight_number'];
                    $order->return_operator_code = $r['return_operator_code'];

                    $order->trip_1_time = $r['trip_1_time'];
                    $order->trip_1_arrival_time = $r['trip_1_arrival_time'];
                    $order->trip_2_time = $r['trip_2_time'];
                    $order->trip_2_arrival_time = $r['trip_2_arrival_time'];

                    $order->user_id = Auth::id();

                    $order->save();
                    $order->renew_order();

                    return;
                }
            }

            $resultToken = $r->input('resultToken');
            $flightSupportPackage = $r->input('flightSupportPackage');

            $r->session()->put('pending_review_flight', $resultToken);
            $r->session()->put('flight_support_package', $flightSupportPackage);

            return response('', 200);
        }

        public function reviewFlight(Request $r)
        {
            /*      SessionController::setActivity(null);
            SessionController::regenerateOrder();

            $flight = new Flights();
            $session_data = $r->session()->get('pending_review_flight');

            $response = $flight->updateFareQuote($session_data);

            $order = session('order_id', null);
            if ($order == null) {
                $order = new BookTripOrder();
                $order->save();
                $r->session()->put('order_id', $order->id);
            } else {
                $order = BookTripOrder::firstOrCreate(['id' => $order]);
                $order->save();
                $r->session()->put('order_id', $order->id);
            }

            BookFlightOrder::where('order_id', $order->id)->delete();
            $flightOrder = new BookFlightOrder();
            $flightOrder->ResultToken = $response['resultToken'];
            $flightOrder->AppReference = Str::uuid();
            $flightOrder->order_id = $order->id;
            $flightOrder->flight_service_package_id = session('flight_support_package');
            $flightOrder->save();

            $pending_flight = [];
            $pending_flight['resultToken'] = $response['resultToken'];
            $pending_flight['price'] = $response['price'];
            $pending_flight['flight_order_id'] = $flightOrder->id;
            $pending_flight['passengers_count'] = 0;

            $passengers = [];

            $hotelOrder = '';
            if ($r->has('isPackage')) {
                BookHotelOrder::where('order_id', $order->id)->delete();
                $hotelOrder = new BookHotelOrder();
                $hotelOrder->order_id = $order->id;
                $hotelOrder->save();

                $pending_hotel = SessionController::getHotel();
                $pending_hotel['hotel_order_id'] = $hotelOrder->id;
                SessionController::setHotel($pending_hotel);
            } else {
                SessionController::setHotel(null);
            }
            foreach ($pending_flight['price'] as $passenger_t => $passenger_type) {
                for ($x = 0; $x < $passenger_type['passengers_count']; $x++) {
                    $flight_passenger = new FlightPassenger();
                    $flight_passenger->PaxType = $passenger_type['passengers_type'] == 'Adult' ? 1 : ($passenger_type['passengers_type'] == 'Child' ? 2 : 3);
                    $flight_passenger->flight_order_id = $flightOrder->id;
                    $flight_passenger->save();
                    if ($r->has('isPackage')) {
                        $hotel_passenger = new HotelPassenger();
                        $hotel_passenger->hotel_order_id = $hotelOrder->id;
                        $hotel_passenger->PaxType = $passenger_type['passengers_type'] == 'Adult' ? 1 : 2;
                        $hotel_passenger->save();
                    }
                    $passengers[] = $flight_passenger;
                }
                $pending_flight['passengers_count'] += $passenger_type['passengers_count'];
            }

            $pending_flight['currency'] = $response['currency'];
            $pending_flight['details'] = $response['details'];
            $pending_flight['extras'] = $flight->getExtraServices($response['resultToken']);
            $pending_flight['selectedExtrasPerPassenger'] = [];
            $pending_flight['flightSupportPackage'] = session('flight_support_package');

            $countries = new Country();
            $all = $countries->getAllCountriesCached();

            SessionController::setFlight($pending_flight);

            $supportPackage = FlightSupportPackage::findOrFail($pending_flight['flightSupportPackage']);

            return view('flights.review', ['passengers' => $passengers, 'flight' => $response, 'pendingFlight' => $pending_flight, 'countries' => $all, 'currency' => CurrencyManagement::determine_user_currency(), 'passengers_count' => $pending_flight['passengers_count'], 'isPackage' => $r->has('isPackage'), 'flightSupportPackage' => $supportPackage]);
    */

            return view('flights.review');
        }


        public function passengers()
        {
            return view('flights.passenger-details');
        }

        public function addMeal(Request $r)
        {
            /*   $r->validate([
                'meal_id' => 'required|string'
            ]); */

            $pending_flight = SessionController::getFlight();
            if ($pending_flight == null) {
                abort(404);
            }
            $passenger = FlightPassenger::find($r['passenger_id']);
            $meal_id = $r['meal_id'];
            if (array_key_exists($passenger->id, $pending_flight['selectedExtrasPerPassenger'])) {
                $pending_flight['selectedExtrasPerPassenger'][$passenger->id]['Meal'] = $meal_id;
            } else {
                $pending_flight['selectedExtrasPerPassenger'][$passenger->id] = [];
                $pending_flight['selectedExtrasPerPassenger'][$passenger->id]['Meal'] = $meal_id;
            }

            SessionController::setFlight($pending_flight);
            $passenger->meal_id = $meal_id;
            $passenger->save();
        }

        public function addBaggage(Request $r)
        {
            /*   $r->validate([
                'meal_id' => 'required|string'
            ]); */

            $pending_flight = SessionController::getFlight();
            if ($pending_flight == null) {
                abort(404);
            }
            $passenger = FlightPassenger::find($r['passenger_id']);
            $baggage_id = $r['baggage_id'];
            if (array_key_exists($passenger->id, $pending_flight['selectedExtrasPerPassenger'])) {
                $pending_flight['selectedExtrasPerPassenger'][$passenger->id]['Baggage'] = $baggage_id;
            } else {
                $pending_flight['selectedExtrasPerPassenger'][$passenger->id] = [];
                $pending_flight['selectedExtrasPerPassenger'][$passenger->id]['Baggage'] = $baggage_id;
            }
            SessionController::setFlight($pending_flight);
            $passenger->baggage_id = $baggage_id;
            $passenger->save();
        }

        public function selectMeal(Request $r)
        {
            /*   $r->validate([
                'meal_id' => 'required|string'
            ]); */

            $pending_flight = SessionController::getFlight();
            if ($pending_flight == null) {
                abort(404);
            }
            $passenger = FlightPassenger::find($r['passenger_id']);
            $meal_id = $r['meal_id'];
            if (array_key_exists($passenger->id, $pending_flight['selectedExtrasPerPassenger'])) {
                $pending_flight['selectedExtrasPerPassenger'][$passenger->id]['MealPreference'] = $meal_id;
            } else {
                $pending_flight['selectedExtrasPerPassenger'][$passenger->id] = [];
                $pending_flight['selectedExtrasPerPassenger'][$passenger->id]['MealPreference'] = $meal_id;
            }
            SessionController::setFlight($pending_flight);
            $passenger->meal_id = $meal_id;
            $passenger->save();
        }

        public function addPassengers(Request $r)
        {
            $pending_flight = SessionController::getFlight();
            $month = $r->input('DateOfBirthMonth');
            $day = $r->input('DateOfBirthDay');
            $length = 2;
            $month = substr(str_repeat(0, $length) . $month, -$length);
            $day = substr(str_repeat(0, $length) . $day, -$length);
            $passenger = FlightPassenger::findOrFail($r->input('passenger_id'));
            $passenger->IsLeadPax = $r->input('IsLeadPax');
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
            $passenger->PaxType = $r->input('PaxType');
            $passenger->Title = $r->input('Gender') == 1 ? 'Mr' : 'Ms';
            $passenger->flight_order_id = $pending_flight['flight_order_id'];

            $passenger->save();

            if ($r->has('isPackage')) {
                $pending_hotel = SessionController::getHotel();
                $month = $r->input('DateOfBirthMonth');
                $day = $r->input('DateOfBirthDay');
                $length = 2;
                $month = substr(str_repeat(0, $length) . $month, -$length);
                $day = substr(str_repeat(0, $length) . $day, -$length);
                $passenger = HotelPassenger::findOrFail($r->input('passenger_id'));
                $passenger->IsLeadPax = $r->input('IsLeadPax');
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
                $passenger->PaxType = $r->input('PaxType');
                $passenger->Title = $r->input('Gender') == 1 ? 'Mr' : 'Ms';
                $passenger->hotel_order_id = $pending_hotel['hotel_order_id'];

                $passenger->save();
            }
        }

        public function updateStatus(Request $req)
        {
        }


        public function flight_checkout()
        {
            return view('flights.checkout');
        }


        // Sriggle Integration Starts Here

        // ------------------------------------------------------------------------------------------------ //




    }
