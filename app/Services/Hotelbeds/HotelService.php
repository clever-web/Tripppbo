<?php

namespace App\Services\Hotelbeds;

use App\Models\HotelbedsFacility;
use App\Models\HotelbedsLocationDestination;
use App\Models\HotelbedsRateComment;
use App\Models\HotelbedsRoomsType;
use App\Models\WorldCity;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use App\Services\Trippbo\CurrencyManagement;
use Illuminate\Support\Facades\Cache;

class HotelService
{
    private $base_url;

    public function __construct()
    {
        $this->base_url = config('services.hotelbeds.base_url');
    }

    public function getHotels($params, $passengers)
    {
        $childsAges = [];

        $amount_of_rooms = count($passengers);
        for ($x = 0; $x < $amount_of_rooms; $x++) {
            for ($y = 0; $y < $passengers[$x]['NoOfChild']; $y++) {
                $childsAges[] = ['type' => 'CH', 'age' => $passengers[$x]['ChildAge'][$y]];
            }
        }
        $city = HotelbedsLocationDestination::findOrFail((int)$params['cityId']);

        $checkindate = new Carbon($params['checkinDate']);
        $date_array = $checkindate->toArray();
        $checkinDate = $checkindate->toDateString();

        $checkoutdate = $checkindate->addDays((int) $params['noOfNights']);
        $checkout_date_array = $checkoutdate->toArray();


        $checkoutDate = $checkoutdate->toDateString();

        $response2 = Http::timeout(60)->withHeaders([
            'Api-key' => config('services.hotelbeds.API_KEY'),
            'X-Signature' => HotelbedsAuthManager::generateXSignature(),
            'Accept' => 'application/json',
            'Accept-Encoding' => 'gzip',

        ])->get(
                 'https://api.test.hotelbeds.com/hotel-content-api/1.0/hotels?destinationCode=' . $city->code
         /*    'https://api.test.hotelbeds.com/hotel-content-api/1.0/hotels?codes=' . 4691 */
        );

        /*   $response2 = Cache::get('Hotelbeds_content_api_response'); */
        /*      Cache::put('Hotelbeds_content_api_response', $response2->json()); */
        session(['hotelbeds_media_for_city_' .  $city->id => $response2]);


        $media_hotels = $response2['hotels'];

        $codes = [];
        foreach ($media_hotels as $hotel) {
            $codes[] = $hotel['code'];
        }


        $response = Http::timeout(60)->withHeaders([
            'Api-key' => config('services.hotelbeds.API_KEY'),
            'X-Signature' => HotelbedsAuthManager::generateXSignature(),
            'Accept' => 'application/json',
            'Accept-Encoding' => 'gzip',
            'Content-Type' => 'application/json'
        ])->post(
            'https://api.test.hotelbeds.com/hotel-api/1.0/hotels',

            [
                'stay' => [
                    'checkIn' => $checkinDate,
                    'checkOut' =>  $checkoutDate,
                ],
                'occupancies' => [
                    [
                        'rooms' =>  (int) $params['roomCount'],
                        'adults' =>    $params['totalAdults'],
                        'children' =>  $params['totalChildren'],
                        'paxes' => $childsAges,
                    ]

                ],
                'hotels' => ['hotel' => $codes],
                /*      'geolocation' => [
                    'longitude' => $city->lng,
                    'latitude' => $city->lat,
                    'radius' => 20,
                    'unit' => 'km'
                ], */



            ],

        );

        $response = $response->json();

        /*      $response =  Cache::get('Hotelbeds_booking_api_response'); */

        /*     Cache::put('Hotelbeds_booking_api_response', $response); */






        $request = request();
        session(['hotelbeds_for_city_' .  $city->id => $response]);

        $results = $response['hotels']['hotels'];


      
        $final_results = [];





    


        foreach ($results as $hotel) {

            $media_hotel = [];
            $free_cancellation_available = false;
            foreach ($media_hotels as $i) {
                if ($i['code'] == $hotel['code']) {
                    $media_hotel = $i;

                    break;
                }
            }
            foreach ($hotel['rooms'] as $room) {
                foreach ($room['rates'] as $rate) {
                    if (array_key_exists('cancellationPolicies', $rate))
                    {
                        $c = new Carbon($rate['cancellationPolicies'][0]['from']);
                        $now = new Carbon();
    
                        $diff = $c->diffInMinutes($now, false);
                        if ($diff > 0) {
                            $free_cancellation_available = true;
                        }
                    }
                
                }
            }
            $final_results[] = [
                'HotelName' => $hotel['name'],
                'HotelCode' => $hotel['code'],
                'StarRating' => (int) substr($hotel['categoryCode'], 0, 1),
                'HotelPicture' => array_key_exists('images', $media_hotel) ? 'http://photos.hotelbeds.com/giata/' . $media_hotel['images'][0]['path'] : asset('/images/media-not-available.jpg'),
                'ResultIndex' => 'test',
                'IsHotDeal' => 'test',
                'ResultToken' => 'test',
                'Price' => CurrencyManagement::getPrice($hotel['currency'], null, $hotel['minRate']),
                'Currency' => CurrencyManagement::determine_user_currency(),
                'Free_cancel_date' => '',
                'HotelAddress' => array_key_exists('address', $media_hotel) ? $media_hotel['address']['content'] : 'No Address',
                'HotelFacilities' => array_key_exists('facilities', $media_hotel) ? $media_hotel['facilities'] : [],
                'AccommodationTypeCode' => array_key_exists('accommodationTypeCode', $media_hotel) ? $media_hotel['accommodationTypeCode'] : '',
                'lat' =>  array_key_exists('coordinates', $media_hotel) ? $media_hotel['coordinates']['latitude'] : '',
                'lng' =>  array_key_exists('coordinates', $media_hotel) ? $media_hotel['coordinates']['longitude'] : '',
                'FreeCancellationAvailable' => $free_cancellation_available,
            ];
        }

        
        return $final_results;
    }



    public function getHotelSubpage($cityId, $hotelCode, $updated_rate = null)
    {
        $response = session('hotelbeds_for_city_' . $cityId);
        $media_response = session('hotelbeds_media_for_city_' . $cityId);
        $response_hotels = $response['hotels']['hotels'];
        $response_media_hotels = $media_response['hotels'];
        $hotel = null;
        $media_hotel = null;
        $rateComments = null;
        foreach ($response_hotels as $response_hotel) {
            if ($response_hotel['code'] == $hotelCode) {
                $hotel = $response_hotel;
                $rateComments = HotelbedsRateComment::where('hotelCode', $hotel['code'])->get();
            }
        }


        $modified_rooms = [];
        foreach ($hotel['rooms'] as $room) {
            $temp_rate = [];
            $temp = $room;
            $temp['images'] = [];
            $type =  HotelbedsRoomsType::where('code', $room['code'])->first();
            $temp['trippbo_room_description'] = $type !== null ? $type->characteristicDescription : '';
            $temp['trippbo_room_type'] = $type !== null ? $type->typeDescription : '';
            $temp['trippbo_max_pax'] = $type !== null ? $type->maxPax : '';


            $modified_rates = [];
            $temp['rates'] = [];
            foreach ($room['rates'] as $rate) {

                $temp_rate = $rate;


                $rate_comments = explode('|', $rate['rateCommentsId'] ?? '');
                $temp_rate['trippbo_rate_comment'] = [];
                foreach ($rate_comments as $rate_comment) {

                    $t1 = $rateComments->where('rateCommentCode', $rate_comment)->first();
                    if ($t1 !== null)
                    {
                        $t2 = json_decode($t1['commentsByRates']);
                        $temp_rate['trippbo_rate_comment'][] =     $t2;
                    }

                }


                $modified_rates[] = $temp_rate;
            }

            $temp['rates'] = $modified_rates;
            $modified_rooms[] = $temp;
        }

        $hotel['rooms'] = $modified_rooms;
        foreach ($response_media_hotels as $response_hotel) {
            if ($response_hotel['code'] == $hotelCode) {
                $media_hotel = $response_hotel;
            }
        }
        $images = [];
        // array_key_exists('images', $media_hotel) ? 'http://photos.hotelbeds.com/giata/' . $media_hotel['images'][0]['path'] : asset('/images/media-not-available.jpg'),
        if (array_key_exists('images', $media_hotel)) {
            foreach ($media_hotel['images'] as $image) {
                $images[] = 'http://photos.hotelbeds.com/giata/original/' . $image['path'];
            }
        }
        $trippbo_facilities = [];
        foreach ($media_hotel['facilities'] as $facility) {
            $db_facility = HotelbedsFacility::where('code', $facility['facilityCode'])->where('facilityGroupCode',  $facility['facilityGroupCode'])->first();
            $trippbo_facilities[] = $db_facility;
        }
        $media_hotel['trippbo_facilities'] = $trippbo_facilities;
        $media_hotel['custom_image_gallery'] = $images;
        return ['hotel' => $hotel, 'media' => $media_hotel];
    }

    public function checkRate($rateKey, $passengers)
    {

        /*    $rooms = [];
        $amount_of_rooms = count($passengers);
        for($x = 0; $x < $amount_of_rooms; $x++)
        {

        } */
        $response = Http::timeout(60)->withHeaders([
            'Api-key' => config('services.hotelbeds.API_KEY'),
            'X-Signature' => HotelbedsAuthManager::generateXSignature(),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Accept-Encoding' => 'gzip',

        ])->post(
            'https://api.test.hotelbeds.com/hotel-api/1.0/checkrates',
            [
                'rooms' =>
                [
                    [
                        'rateKey' => $rateKey,

                    ],
                ],
            ]
        );

        return $response->json();
    }
    public function bookHotel($hotelbeds_hotel_order)
    {

        $response = Http::timeout(60)->withHeaders([
            'Api-key' => config('services.hotelbeds.API_KEY'),
            'X-Signature' => HotelbedsAuthManager::generateXSignature(),
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Accept-Encoding' => 'gzip',

        ])->post(
            'https://api.test.hotelbeds.com/hotel-api/1.0/bookings',
            [
                'holder' => [
                    'name' => $hotelbeds_hotel_order->holder_first_name,
                    'surname' => $hotelbeds_hotel_order->holder_last_name,
                ],
                'clientReference' => $hotelbeds_hotel_order->client_reference,
                'rooms' => [
                    [
                        'rateKey' => $hotelbeds_hotel_order->rate_key,
                    ]
                ]

            ]
        );

        return $response->json();
    }


    public function updateFacilites()
    {
        /*   $response = Cache::get('hotelbeds_facilities'); */

        $response = Http::timeout(60)->withHeaders([
            'Api-key' => config('services.hotelbeds.API_KEY'),
            'X-Signature' => HotelbedsAuthManager::generateXSignature(),
            'Accept' => 'application/json',
            'Accept-Encoding' => 'gzip',

        ])->get(
            'https://api.test.hotelbeds.com/hotel-content-api/1.0/types/facilities?from=1&to=557'
        );

        Cache::put('hotelbeds_facilities', $response->json());
        return $response->json();

        foreach ($response['facilities'] as $facility) {
            $f = new HotelbedsFacility();
            $f->code = $facility['code'];
            $f->facilityGroupCode = $facility['facilityGroupCode'];
            $f->facilityTypologyCode = $facility['facilityTypologyCode'];
            $f->description = array_key_exists('description', $facility) ? $facility['description']['content'] : '';
            $f->save();
        }
    }

    public function updateAcommodationType()
    {
        $response = Http::timeout(60)->withHeaders([
            'Api-key' => config('services.hotelbeds.API_KEY'),
            'X-Signature' => HotelbedsAuthManager::generateXSignature(),
            'Accept' => 'application/json',
            'Accept-Encoding' => 'gzip',

        ])->get(
            'https://api.test.hotelbeds.com/hotel-content-api/1.0/types/accommodations'
        );
        return $response->json();
    }
    public function populateRoomTypes()
    {
        /*        $response = Http::timeout(60)->withHeaders([
            'Api-key' => config('services.hotelbeds.API_KEY'),
            'X-Signature' => HotelbedsAuthManager::generateXSignature(),
            'Accept' => 'application/json',
            'Accept-Encoding' => 'gzip',

        ])->get(
            'https://api.test.hotelbeds.com/hotel-content-api/1.0/types/rooms?from=' .  1 . '&to=' .  10
        );
        return $response->json(); */
        $requests = 0;
        $from = 11880;
        while ($from < 13000) {
            $response = Http::timeout(60)->withHeaders([
                'Api-key' => config('services.hotelbeds.API_KEY'),
                'X-Signature' => HotelbedsAuthManager::generateXSignature(),
                'Accept' => 'application/json',
                'Accept-Encoding' => 'gzip',

            ])->get(
                'https://api.test.hotelbeds.com/hotel-content-api/1.0/types/rooms?from=' . $from . '&to=' . $from + 999
            );



            $result = $response->json()['rooms'];
            foreach ($result as $roomType) {
                $hotelType = new HotelbedsRoomsType();
                $hotelType->code = array_key_exists('code', $roomType) ?  $roomType['code'] : '';
                $hotelType->type =  array_key_exists('type', $roomType) ?  $roomType['type'] : '';
                $hotelType->characteristic =  array_key_exists('characteristic', $roomType) ?  $roomType['characteristic'] : '';
                $hotelType->minPax =  array_key_exists('minPax', $roomType) ?  $roomType['minPax'] : '';
                $hotelType->maxPax =  array_key_exists('maxPax', $roomType) ?  $roomType['maxPax'] : '';
                $hotelType->maxAdults =  array_key_exists('maxAdults', $roomType) ?  $roomType['maxAdults'] : '';
                $hotelType->maxChildren =  array_key_exists('maxChildren', $roomType) ?  $roomType['maxChildren'] : '';
                $hotelType->minAdults =  array_key_exists('minAdults', $roomType) ?  $roomType['minAdults'] : '';
                $hotelType->description = array_key_exists('description', $roomType) ?  $roomType['description'] : '';
                $hotelType->typeDescription =  array_key_exists('typeDescription', $roomType) ?  $roomType['typeDescription']['content'] : '';
                $hotelType->characteristicDescription =  array_key_exists('characteristicDescription', $roomType) ?  $roomType['characteristicDescription']['content'] : '';
                $hotelType->save();
            }

            $from += 999;
        }
    }
    public function updateSegments()
    {
        $response = Http::timeout(60)->withHeaders([
            'Api-key' => config('services.hotelbeds.API_KEY'),
            'X-Signature' => HotelbedsAuthManager::generateXSignature(),
            'Accept' => 'application/json',
            'Accept-Encoding' => 'gzip',

        ])->get(
            'https://api.test.hotelbeds.com/hotel-content-api/1.0/types/segments'
        );
        return $response->json();
    }
    public function updateRateComments()
    {


        $from = 46000;
        while ($from < 70000) {
            $response = Http::timeout(60)->withHeaders([
                'Api-key' => config('services.hotelbeds.API_KEY'),
                'X-Signature' => HotelbedsAuthManager::generateXSignature(),
                'Accept' => 'application/json',
                'Accept-Encoding' => 'gzip',

            ])->get(
                'https://api.test.hotelbeds.com/hotel-content-api/1.0/types/ratecomments?from=' . $from  . '&to=' . $from + 999
            );

            $from += 1000;
            $rateComments = $response['rateComments'];

            foreach ($rateComments as $rateComment) {
                $rate = new  HotelbedsRateComment();
                $rate->rateCommentCode = array_key_exists('code', $rateComment) ? $rateComment['code'] : '';
                $rate->incoming = array_key_exists('incoming', $rateComment) ? $rateComment['incoming'] : '';
                $rate->hotelCode = array_key_exists('hotel', $rateComment) ? $rateComment['hotel'] : '';

                $rate->commentsByRates = array_key_exists('commentsByRates', $rateComment) ? json_encode($rateComment['commentsByRates']) : '';
                $rate->save();
            }
        }
        return $response->json();
    }
    public function updateLocationDestinations()
    {


        $from = 1;
        while ($from < 8001) {
            $response = Http::timeout(60)->withHeaders([
                'Api-key' => config('services.hotelbeds.API_KEY'),
                'X-Signature' => HotelbedsAuthManager::generateXSignature(),
                'Accept' => 'application/json',
                'Accept-Encoding' => 'gzip',

            ])->get(
                'https://api.test.hotelbeds.com/hotel-content-api/1.0/locations/destinations?from=' . $from  . '&to=' . $from + 999
            );

            $from += 1000;
            $destinations = $response->json()['destinations'];
            foreach ($destinations as $destination) {
                $d = new  HotelbedsLocationDestination();
                $d->code = array_key_exists('code', $destination) ? $destination['code'] : '';
                $d->name = array_key_exists('name', $destination) ? $destination['name']['content'] : '';
                $d->countryCode = array_key_exists('countryCode', $destination) ? $destination['countryCode'] : '';
                $d->isoCode = array_key_exists('isoCode', $destination) ? $destination['isoCode'] : '';

                $d->zones = array_key_exists('zones', $destination) ? json_encode($destination['zones']) : '';
                $d->save();
            }
        }
    }


    public function updateAminities()
    {


        $from = 1;
        while ($from < 2) {
            $response = Http::timeout(60)->withHeaders([
                'Api-key' => config('services.hotelbeds.API_KEY'),
                'X-Signature' => HotelbedsAuthManager::generateXSignature(),
                'Accept' => 'application/json',
                'Accept-Encoding' => 'gzip',

            ])->get(
                'https://api.test.hotelbeds.com/hotel-content-api/1.0/types/amenities?from=' . $from  . '&to=' . $from + 1
            );

            $from += 1000;
            return $response->json();
            /*      $destinations = $response->json()['destinations']; */
            /*    foreach ($destinations as $destination) {
                $d = new  HotelbedsLocationDestination();
                $d->code = array_key_exists('code', $destination) ? $destination['code'] : '';
                $d->name = array_key_exists('name', $destination) ? $destination['name']['content'] : '';
                $d->countryCode = array_key_exists('countryCode', $destination) ? $destination['countryCode'] : '';
                $d->isoCode = array_key_exists('isoCode', $destination) ? $destination['isoCode'] : '';

                $d->zones = array_key_exists('zones', $destination) ? json_encode($destination['zones']) : '';
                $d->save();
            } */
        }
    }
}
