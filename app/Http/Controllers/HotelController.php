    <?php

    namespace App\Http\Controllers;

    use App\Models\BookFlightOrder;
    use App\Models\BookHotelOrder;
    use App\Models\BookTripHotelbedsHotelOrder;
    use App\Models\BookTripOrder;
    use App\Models\Country;
    use App\Models\CustomModels\hotel_model;
    use App\Models\FundMyTripHotelOrderPlan;
    use App\Models\FundMyTripOrder;
    use App\Models\HotelPassenger;
    use App\Models\HotelsAPICity;
    use App\Models\SriggleHotelBooking;
    use App\Models\Trip;
    use App\Models\TripJoinRequest;
    use App\Services\Amadeus;
    use App\Services\Hotelbeds\HotelService;
    use App\Services\Travelomatix\Autocomplete;
    use App\Services\Travelomatix\Hotels;
    use App\Services\Trippbo\CurrencyManagement;
    use App\Services\Trippbo\OnGoingOrderManager;
    use App\Services\Trippbo\SessionController;
    use Carbon\Carbon;
    use Illuminate\Contracts\Session\Session;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Log;
    use App\Services\Sriggle\HotelService as SriggleHotelService;
    use App\Services\Trippbo\CacheManager;
    use Illuminate\Support\Facades\Cache;

    class HotelController extends Controller
    {
        public function bookHotel(Request $r)
        {
            $a = new SriggleHotelService();

            $data = json_decode($r['data'], true) ;
            $resp = $a->bookHotel($data);

            $hotelBooking = new SriggleHotelBooking();
            $hotelBooking->hotel_booking = json_encode($resp);
            $hotelBooking->save();
            return $resp;

        }

        public function searchForHotels(Request $r)
        {
            $key = $r['key'];

            $data = CacheManager::getHotelSearchData($key);

            $hotels = SriggleHotelService::searchForHotels2($data);
        }
        //
        public function index(Request $r)
        {

            $key = $r['key'];
            $data = CacheManager::getHotelSearchData($key);



            //     $hotels = SriggleHotelService::searchForHotels2($data);


            //     CacheManager::updateHotels($key, $hotels);


            return view('hotels.main', ['search_key' => $key, 'search_data' => $data]);


            $cityId = '';
            if ($r->has('isPackage')) {
                $package_information = [];
                $package_information['originCity'] = $r['originCity'];
                $package_information['destinationCity'] = $r['destinationCity'];
                $package_information['originCountry'] = $r['originCountry'];
                $package_information['destinationCountry'] = $r['destinationCountry'];
                $package_information['originAirportCode'] = $r['originAirportCode'];
                $package_information['destinationAirportCode'] = $r['destinationAirportCode'];
                $package_information['checkInDate'] = $r['CheckInDate'];
                $package_information['checkOutDate'] = $r['CheckOutDate'];
                $package_information['adultCount'] = $r['adultCount'];
                $package_information['roomCount'] = $r['roomCount'];
                $package_information['childCount'] = $r['childCount'];
                $package_information['infantCount'] = $r['infantCount'];
                $package_information['package_class'] = $r['package_class'];
                session(['package_information' => $package_information]);

                $autocomplete = new Autocomplete();
                $closestMatch = HotelsAPICity::where('city_name', 'like', '%' . $r->input('destinationCity') . '%')->where('country_name', 'like', '%' . $r->input('destinationCountry') . '%')->take(1)->first();

                $cityId = $closestMatch->city_code;
            } else {
                $cityId = $r->input('cityId');
            }
            $checkinDate = new Carbon($r->input('CheckInDate'));

            $checkoutDate = new Carbon($r->input('CheckOutDate'));
            $noOfNights = $checkinDate->diffInDays($checkoutDate);

            $hotel_destination_name = $r->has('hotel_destination_name') ? $r->input('hotel_destination_name') : '';
            $checkinDate = $checkinDate->toDateString();
            $checkoutDate = $checkoutDate->toDateString();

            $adultCount0 = $r->has('adultCount0') ? $r->input('adultCount0') : 2;
            $childCount0 = $r->has('childCount0') ? $r->input('childCount0') : 0;
            $adultCount1 = $r->has('adultCount1') ? $r->input('adultCount1') : 1;
            $childCount1 = $r->has('childCount1') ? $r->input('childCount1') : 0;
            $adultCount2 = $r->has('adultCount2') ? $r->input('adultCount2') : 1;
            $childCount2 = $r->has('childCount2') ? $r->input('childCount2') : 0;
            $roomCount = $r->has('roomCount') ? $r->input('roomCount') : 1;
            $childAges0 = $r->has('childAges0') ? explode(',', $r->input('childAges0')) : [];
            $childAges1 = $r->has('childAges1') ? explode(',', $r->input('childAges1')) : [];
            $childAges2 = $r->has('childAges2') ? explode(',', $r->input('childAges2')) : [];

            $tripId = '';
            if ($r->has('tripId')) {
                $tripId = $r->input('tripId');
            }

            return view('hotels.main', ['cityId' => $cityId, 'checkinDate' => $checkinDate, 'checkoutDate' => $checkoutDate, 'noOfNights' => $noOfNights, 'adultCount0' => $adultCount0, 'childCount0' => $childCount0, 'adultCount1' => $adultCount1, 'childCount1' => $childCount1,  'adultCount2' => $adultCount2, 'childCount2' => $childCount2, 'roomCount' => $roomCount, 'tripId' => $tripId, 'hotel_destination_name' => $hotel_destination_name, 'isPackage' => $r->has('isPackage') ? '1' : '0', 'childAges0' => $childAges0, 'childAges1' => $childAges1, 'childAges2' => $childAges2]);
        }

        /*     public function autocomplete(Amadeus $amadeus, Request $request, $keyword)
        {
            $results = $amadeus->autocomplete($keyword);
            return $results;
        } */
        public function prepare_search(Request $r)
        {
            $data = [];
            $data['check_in_date'] = $r['check_in_date'];
            $data['check_out_date'] = $r['check_out_date'];
            $data['city_id'] = $r['city_id'];
            $data['rooms'] = $r['rooms'];

            return CacheManager::saveHotelSearchData($data);
        }
        public function getHotels(Request $r)
        {

            $new_search = false;
            $key = $r['search_key'];
            $data = CacheManager::getHotelSearchData($key);
            if ($r->has('filters')) {
                $filters = json_decode($r['filters'], true);
                $data['filters'] = $filters;
            }
            if ($r->has('PageNo')) {
                $data['PageNo'] = $r['PageNo'];
                $new_search = true;
            }


            $hotels = SriggleHotelService::searchForHotels2($data);
            CacheManager::updateHotels($key, $hotels);
            if ($new_search) {
            } else {
            }





            return $hotels;


            if ($r->has('tripId') && $r->input('tripId') !== '') {
                $trip = Trip::find($r->input('tripId'));
                session(['fund_my_trip_hotel_order_plan' => ['city_code' => $r->input('cityId')]]);
            }
            //   $h = new Hotels();
            $params = [];
            $params['checkinDate'] = $r->has('checkinDate') ? $r->input('checkinDate') : '2022-01-05';
            $params['noOfNights'] = $r->has('noOfNights') ? $r->input('noOfNights') : 7;

            $params['cityId'] = $r->input('cityId');
            $params['roomCount'] = $r->has('roomCount') ? $r->input('roomCount') : 1;
            session(['hotel_room_count' => $params['roomCount']]);
            $params['passengers'] = [];
            $totalAdultsNumber = 0;
            $totalChildrenNumber = 0;
            // travelomatix
            /*    for ($x = 0; $x < 3; $x++) {
                if ($r->has('adultCount' . $x)) {
                    if ($r['childCount' . $x] == 0) {
                        $params['passengers'][] = ['NoOfAdults' => $r->input('adultCount' . $x), 'NoOfChild' => $r->input('childCount' . $x)];
                    } else {
                        $ages = explode(',', $r['childAges' . $x]);
                        array_pop($ages);
                        $params['passengers'][] = ['NoOfAdults' => $r->input('adultCount' . $x), 'NoOfChild' => $r->input('childCount' . $x), 'ChildAge' => $ages];
                    }
                    $totalAdultsNumber += $r->input('adultCount' . $x);
                    $totalChildrenNumber += $r->input('childCount' . $x);
                }
            } */


            // hotelbeds
            for ($x = 0; $x < 3; $x++) {
                if ($r->has('adultCount' . $x)) {
                    if ($r['childCount' . $x] == 0) {
                        $params['passengers'][] = ['NoOfAdults' => $r->input('adultCount' . $x), 'NoOfChild' => $r->input('childCount' . $x)];
                    } else {
                        $ages = explode(',', $r['childAges' . $x]);
                        array_pop($ages);
                        $params['passengers'][] = ['NoOfAdults' => $r->input('adultCount' . $x), 'NoOfChild' => $r->input('childCount' . $x), 'ChildAge' => $ages];
                    }
                    $totalAdultsNumber += $r->input('adultCount' . $x);
                    $totalChildrenNumber += $r->input('childCount' . $x);
                }
            }

            $params['totalAdults'] = $totalAdultsNumber;
            $params['totalChildren'] = $totalChildrenNumber;

            //  $response = $h->getHotels($params);
            $hotelbed_hotels = new HotelService();

            $response = $hotelbed_hotels->getHotels($params, $params['passengers']);
            session(
                [
                    'hotel_number_of_adults' => $totalAdultsNumber,
                    'hotel_number_of_child' => $totalChildrenNumber,
                    'hotel_number_of_rooms' => $params['roomCount'],
                    'hotel_passengers' => $params['passengers'],

                ]
            );

            return $response;
        }

        public function getHotelDetailsIndex(Request $r)
        {
            $result =   SriggleHotelService::getHotelDetails2($r['search_id']);


            $search_key = $r['search_key'];
            $search_id = $r['search_id'];


            $hotels = Cache::get('hotel_search_result' . $search_key);


            $selected_hotel = CacheManager::getSelectedHotel($search_key, $search_id);

            /*  $selected_hotel = null;
            foreach ($hotels['Hotels'] as $hotel) {
                if ($hotel['HotelProviderSearchId'] == $r['search_id']) {
                    $selected_hotel = $hotel;
                }
            } */
            //    return dd($selected_hotel);

            $search_data = CacheManager::getHotelSearchData($search_key);
            return view('hotels.sub', ['detail' => $result, 'search_key' => $r['search_key'], 'provider_id' => $r['search_id'], 'services' => $selected_hotel['HotelServices'], 'search_data' => $search_data]);




            $r->validate([
                'cityId' => 'required',
                'hotelCode' => 'required'
            ]);
            $current_order_id = session('hotelbeds_hotel_orders_counter', 0) + 1;
            session(['hotelbeds_hotel_orders_counter' => $current_order_id]);

            session(['hotelbeds_hotel_orders' . $current_order_id => [

                'hotelbeds_hotel_code' => $r['hotelCode'],
                'hotelbeds_city_id' => $r['cityId'],
                'hotelbeds_hotel_checkinDate' => $r['checkinDate'],
                'hotelbeds_hotel_noOfNights' => $r['numberOfNights'],
            ]]);

            $s = new HotelService();
            /*   session(['hotelbeds_cityId' => $r['cityId'], 'hotelbeds_hotelCode' => $r['hotelCode'], 'hotelbeds_hotel_checkinDate' => $r['checkinDate'], 'hotelbeds_hotel_noOfNights' => $r['numberOfNights']]);
        */
            $result =   $s->getHotelSubpage($r['cityId'], $r['hotelCode']);

            return view('hotels.sub', ['result' => $result, 'passengers' => session('hotel_passengers'), 'cityId' => $r['cityId'], 'hotelCode' => $r['hotelCode'], 'local_order_id' => $current_order_id]);







            //  return view('hotels.sub', ['resultToken' => $r->input('resultToken'), 'tripId' => $r->input('tripId'), 'isPackage' => $r->has('isPackage') ? '1' : '0']);
        }

        public function getHotelDetails(Request $r)
        {
            $h = new Hotels();

            return $h->getHotelDetails($r->input('resultToken'));
        }

        public function getHotelRooms(Request $r)
        {
            $h = new Hotels();

            return $h->getHotelRooms($r->input('resultToken'));
        }

        public function checkRate(Request $r)
        {
            $api = new HotelService();
            $response = $api->checkRate($r['rateKey'], session('hotel_passengers'));
            $hotelbeds_rate_keys = session('hotelbeds_modified_rates', []);
            $hotelbeds_rate_keys[] = $response['hotel']['rooms'][0]['rates'][0];
            session(['hotelbeds_modified_rates' => $hotelbeds_rate_keys]);
            return $response;
        }
        public function reserve_2(Request $r)
        {
            $r->validate([
                'local_hotel_order_id' => 'required',
            ]);

            $current_order_id = $r['local_hotel_order_id'];

            $orginialsession = session('hotelbeds_hotel_orders' . $current_order_id, null);

            session(['hotelbeds_hotel_orders' . $current_order_id => [
                'rateKey' => $r['rateKey'],
                'pending_hotelbeds_hotel' => true,
                'hotelbeds_hotel_code' => $r['hotelCode'],
                'hotelbeds_city_id' => $r['cityId'],
                'hotelbeds_hotel_checkinDate' => $orginialsession['hotelbeds_hotel_checkinDate'],
                'hotelbeds_hotel_noOfNights' => $orginialsession['hotelbeds_hotel_noOfNights'],
            ]]);

            SessionController::setFlight(null);
            SessionController::emptyPendingFlight();
            SessionController::setActivity(null);

            SessionController::regenerateOrder();


            /*
            session(['hotelbeds_chosen_ratekey' => $r['rateKey']]);

            session(['pending_hotelbeds_hotel' => true]);
            session(['hotelbeds_hotel_code' => $r['hotelCode']]);
            session(['hotelbeds_city_id' => $r['cityId']]);

            session(['hotelveds_hotel_local_id' . $current_order => '']); */
        }


        public function reserve_hotelbeds_hotel(Request $r)
        {
        }
        public function reserve(Request $r)
        {
            $trip = null;
            if ($r->input('trip_id') !== '') {
                $trip = Trip::find($r['trip_id']);

                if (Auth::check() && $trip !== null && $trip->isMemeber(Auth::id())) {
                    $member = TripJoinRequest::where('user_id', Auth::id())->first();
                    $trip_order = $trip->tripOrder;
                    if ($trip_order == null) {
                        $trip_order = new FundMyTripOrder();
                    }
                    $trip_order->trip_id = $trip->id;
                    $trip_order->save();

                    $order = FundMyTripHotelOrderPlan::where(['user_id' => Auth::id()])->first();
                    if ($order == null) {
                        $order = new FundMyTripHotelOrderPlan();
                    }

                    $order->fund_my_trip_order_id = $trip_order->id;
                    $order->checkin_date = $r['checkinDate'];
                    $order->checkout_date = $r['checkoutDate'];
                    $order->hotel_code = $r['hotelCode'];
                    $order->room_code = $r['roomCode'];
                    $order->numberOfNights = $r['noOfNights'];
                    $order->user_id = Auth::id();
                    $order->city_code = session('fund_my_trip_hotel_order_plan')['city_code'];
                    $order->hotel_name = $r['hotelName'];

                    $order->save();
                    $order->renew_order();

                    return;
                }
            }
            $hotel = new Hotels();

            $response = $hotel->reserveHotelRoom($r->input('resultToken'), $r->input('roomId'));

            $session_data = [];
            $session_data['ResultToken'] = $r->input('resultToken');
            $session_data['BlockRoomId'] = $response['BlockRoomId'];
            $session_data['Price'] = CurrencyManagement::getPrice($response['HotelRoomsDetails'][0]['Price']['CurrencyCode'], null, $response['HotelRoomsDetails'][0]['Price']['OfferedPriceRoundedOff']);
            $session_data['Currency'] = CurrencyManagement::determine_user_currency();
            $session_data['RoomDescription'] = $response['HotelRoomsDetails'][0]['RoomDescription'];
            $session_data['checkInDate'] = $r->input('checkinDate');
            $session_data['checkOutDate'] = $r->input('checkoutDate');
            $session_data['noOfNights'] = $r->input('noOfNights');
            $session_data['hotelName'] = $r->input('hotelName');
            $session_data['address'] = $r->input('address');
            $session_data['rating'] = $r->input('rating');

            SessionController::setFlight(null);
            SessionController::emptyPendingFlight();
            SessionController::setActivity(null);
            SessionController::regenerateOrder();

            SessionController::setHotel($session_data);
        }
        public function addPassengers_2(Request $r)
        {
            $ongoing = new OnGoingOrderManager();
            $hotelOrder = BookTripHotelbedsHotelOrder::where('order_id', $ongoing->getOrderId())->first();
            $hotelOrder->contactno = $r['ContactNo'];
            $hotelOrder->email = $r['Email'];
            $hotelOrder->holder_first_name = $r['FirstName'];
            $hotelOrder->holder_last_name = $r['LastName'];
            $hotelOrder->save();
            return $ongoing->getOrderId();
        }
        public function addPassengers(Request $r)
        {
            $month = $r->input('DateOfBirthMonth');
            $day = $r->input('DateOfBirthDay');
            $length = 2;
            $month = substr(str_repeat(0, $length) . $month, -$length);
            $day = substr(str_repeat(0, $length) . $day, -$length);
            $order_id = session('order_id');
            $hotel_order = BookHotelOrder::where('order_id', $order_id)->first();
            $passenger = new HotelPassenger();
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
            $passenger->hotel_order_id = $hotel_order->id;
            $passenger->RoomId = $r->has('RoomId') ? $r->input('RoomId') : 0;
            $passenger->save();
        }
        public function prepare_room_booking(Request $r)
        {
            $data = [];
            $data['search_key'] = $r['search_key'];
            $data['search_id'] = $r['search_id'];
            $data['OptionalToken'] = $r['OptionalToken'];
            $data['ServiceIdentifer'] = $r['ServiceIdentifer'];
            $data['ProviderName'] = $r['ProviderName'];

            $index = 0;

            if (Cache::has('room_prepare_index')) {
                $index = Cache::get('room_prepare_index');
                $index += 1;
                Cache::put('room_prepare_index', $index);
            } else {
                Cache::put('room_prepare_index', 0);
            }

            Cache::put('room_prepare_data' . $index, $data);

            return $index;
        }

        public function hotel_checkout(Request $r)
        {

            $data = Cache::get('room_prepare_data' . $r['id']);
            $user_data = CacheManager::getHotelSearchData($data['search_key']);

            $data = array_merge($data, $user_data);
            $price_breakup = SriggleHotelService::getPriceBreakup($data);
            /*  return   dd($price_breakup = SriggleHotelService::getPriceBreakup($data)); */
            /*     return dd(SriggleHotelService::bookHotel($data)); */

            $search_key = $data['search_key'];
            $provider_id = $data['search_id'];
            $OptionalToken = $data['OptionalToken'];
            $ServiceIdentifer = $data['ServiceIdentifer'];
            $selected_hotel = CacheManager::getSelectedHotel($search_key, $provider_id);


            /*         return dd($selected_hotel); */








            return view('hotels.checkout', ['price_breakup' => $price_breakup, 'hotel' => $selected_hotel, 'data' => $data]);
        }

        public function preparePayment(Request $r)
        {

            $data = json_decode($r['data'], true);

            $selected_hotel = CacheManager::getSelectedHotel($data['search_key'], $data['search_id']);

            $selected_service = null;
            foreach ($selected_hotel['HotelServices'] as $service) {
                if ($service['ServiceIdentifer'] == $data['ServiceIdentifer']) {
                    $selected_service = $service;
                    break;
                }
            }

            if (!$selected_service) {
                abort(403);
            }

            $amount_to_charge = ceil($selected_service['ServicePrice']) * 100;
            $currency = $selected_hotel['BookCurrency'];
            $options = [
                'amount' => ($amount_to_charge),
                'currency' => $currency,

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

        public function getPriceBreakup()
        {
        }


        public function validateHotelPrice(Request $r)
        {
        }
    }
