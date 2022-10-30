<?php

namespace App\Services\Travelomatix;

use App\Models\HotelPassenger;
use App\Models\HotelsAPICity;
use App\Models\TravelomatixHotel;
use App\Services\Trippbo\CurrencyManagement;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Symfony\Component\ErrorHandler\Debug;

class Hotels
{
    private $base_url;

    public function __construct()
    {
        $this->base_url = config('services.travelomatix.base_url');
    }

    public function getHotels($params)
    {
        $act = new Activities();
        /*     if (Cache::has('test-hotels2')) {
                return Cache::get('test-hotels');
            } */
        $checkindate = new Carbon($params['checkinDate']);
        $date_array = $checkindate->toArray();
        $response = Http::timeout(60)->withHeaders([
            'x-Username' => config('services.travelomatix.username'),
            'x-DomainKey' => config('services.travelomatix.key'),
            'x-system' => config('services.travelomatix.enviroment'),
            'x-Password' => config('services.travelomatix.password'),
            'Accept-Encoding' => 'gzip, deflate',
        ])->post(
            $this->base_url.'webservices/index.php/hotel_v3/service/Search',

            [
                'CheckInDate' => $date_array['year'].'-'.$date_array['month'].'-'.$date_array['day'],
                'NoOfNights' => $params['noOfNights'],
                'CountryCode' => 'IN',
                'CityId' => $params['cityId'],
                'GuestNationality' => 'IN',
                'NoOfRooms' => $params['roomCount'],
                'RoomGuests' => $params['passengers'],

            ],

        );

        if ($response->json('Status') != '1') {
            abort(404);
        }

        $results = $response['Search']['HotelSearchResult']['HotelResults'];

        $hotels = TravelomatixHotel::where('city_id', $params['cityId'])->get();
        $final_results = [];
        foreach ($results as $hotel) {
            $hotelModel = $hotels->where('hotel_code', $hotel['OrginalHotelCode'])->take(1);
            $hotelModel = $hotelModel->isEmpty() ? null : $hotelModel[0];
            $final_results[] = [
                'HotelName' => $hotel['HotelName'],
                'HotelCode' => $hotel['HotelCode'],
                'StarRating' => $hotel['StarRating'],
                'HotelPicture' => $hotel['HotelPicture'],
                'ResultIndex' => $hotel['ResultIndex'],
                'IsHotDeal' => $hotel['IsHotDeal'],
                'ResultToken' => $hotel['ResultToken'],
                'Price' => CurrencyManagement::getPrice($hotel['Price']['CurrencyCode'], null, $hotel['Price']['OfferedPriceRoundedOff']),
                'Currency' => CurrencyManagement::determine_user_currency(),
                'Free_cancel_date' => $hotel['Free_cancel_date'],
                'HotelAddress' => $hotel['HotelAddress'],
                'HotelCode' => $hotel['OrginalHotelCode'],
                'HotelFacilities' => $hotelModel ? $hotelModel->hotel_facilities : [],
            ];
        }
        /*        Cache::put('test-hotels', $final_results); */
        return $final_results;
    }

    public function getHotelDetails($resultToken)
    {
        $act = new Activities();
        /*   if (Cache::has('test-hotel-subpage2')) {
              return Cache::get('test-hotel-subpage');
          } */
        $response = Http::timeout(60)->withHeaders([
            'x-Username' => config('services.travelomatix.username'),
            'x-DomainKey' => config('services.travelomatix.key'),
            'x-system' => config('services.travelomatix.enviroment'),
            'x-Password' => config('services.travelomatix.password'),
            'Accept-Encoding' => 'gzip, deflate',
        ])->post(
            $this->base_url.'webservices/index.php/hotel_v3/service/HotelDetails',

            [
                'ResultToken' => $resultToken,
            ],

        );

        $results = $response['HotelDetails']['HotelInfoResult']['HotelDetails'];
        /*  Cache::put('test-hotel-subpage', $results); */
        return $results;
    }

    public function getHotelRooms($resultToken)
    {
        $response = Http::timeout(60)->withHeaders([
            'x-Username' => config('services.travelomatix.username'),
            'x-DomainKey' => config('services.travelomatix.key'),
            'x-system' => config('services.travelomatix.enviroment'),
            'x-Password' => config('services.travelomatix.password'),
            'Accept-Encoding' => 'gzip, deflate',
        ])->post(
            $this->base_url.'webservices/index.php/hotel_v3/service/RoomList',

            [
                'ResultToken' => $resultToken,
            ],

        );

        $results = $response['RoomList']['GetHotelRoomResult']['HotelRoomsDetails'];

        $final_results = [];
        foreach ($results as $hotel) {
            $hotel['Price'] = CurrencyManagement::getPrice($hotel['Price']['CurrencyCode'], null, $hotel['Price']['OfferedPrice']);
            $hotel['PriceCurrency'] = CurrencyManagement::determine_user_currency();
            $final_results[] = $hotel;
        }

        return $final_results;
    }

    public function reserveHotelRoom($resultToken, $roomUniqueId)
    {
        $response = Http::timeout(60)->withHeaders([
            'x-Username' => config('services.travelomatix.username'),
            'x-DomainKey' => config('services.travelomatix.key'),
            'x-system' => config('services.travelomatix.enviroment'),
            'x-Password' => config('services.travelomatix.password'),
            'Accept-Encoding' => 'gzip, deflate',
        ])->post(
            $this->base_url.'webservices/index.php/hotel_v3/service/BlockRoom',

            [
                'ResultToken' => $resultToken,
                'RoomUniqueId' => [$roomUniqueId],
            ],

        );

        if ($response['Status'] == 1) {
            $results = $response['BlockRoom']['BlockRoomResult'];

            return $results;
        } else {
            abort(404);
        }
    }

    public function commitBooking($hotel_order)
    {
        $hotel_passengers = HotelPassenger::where('hotel_order_id', $hotel_order->id)->get();
        $passengers = [];

        foreach ($hotel_passengers as $passenger) {
            $passengers[$passenger->RoomId] = [
                'LeadPassenger' => $passenger->IsLeadPax,
                'Title' => $passenger->Title,
                'FirstName' => $passenger->FirstName,
                'MiddleName' => '',
                'LastName' => $passenger->LastName,
                /*        'Gender' => $passenger->Gender, */
                'Age' => $this->getAge($passenger->DateOfBirth),
                //   'PassportNumber' => '',
                /*          'CountryCode' => $passenger->CountryCode,
                'CountryName' => $passenger->CountryName, */
                'Phoneno' => $passenger->ContactNo,
                /*     'City' => $passenger->City, */
                /*     'PinCode' => $passenger->PinCode,
                'AddressLine1' => $passenger->AddressLine1, */
                'Email' => $passenger->Email,
                'PaxType' => $passenger->PaxType,

            ];
        }
        $room_details = [];
        foreach ($passengers as $passenger_list) {
            $room_details[] = ['PassengerDetails' => $passenger_list];
        }

        $response = Http::withHeaders([
            'x-Username' => config('services.travelomatix.username'),
            'x-DomainKey' => config('services.travelomatix.key'),
            'x-system' => config('services.travelomatix.enviroment'),
            'x-Password' => config('services.travelomatix.password'),
            'Accept-Encoding' => 'gzip, deflate',
        ])->post($this->base_url.'webservices/index.php/hotel_v3/service/CommitBooking', [

            'AppReference' => $hotel_order->AppReference,
            'BlockRoomId' => $hotel_order->BlockRoomId,
            'ResultToken' => $hotel_order->ResultToken,
            'RoomDetails' => $room_details,
        ]);

        return $response->json();
    }

    private function getAge($dateOfBirth)
    {
        $now = Carbon::now();
        $date = new Carbon($dateOfBirth);

        return $now->diffInYears($dateOfBirth);
    }

    public function populateCityID()
    {
        $response = Http::withHeaders([
            'x-Username' => config('services.travelomatix.username'),
            'x-DomainKey' => config('services.travelomatix.key'),
            'x-system' => config('services.travelomatix.enviroment'),
            'x-Password' => config('services.travelomatix.password'),
            'Accept-Encoding' => 'gzip, deflate',
        ])->get($this->base_url.'webservices/index.php/hotel_v3/service/HotelCityList', [
        /*          'CheckInDate' => '27-09-2021',
                'NoOfNights' => 1,
                'CountryCode' => 'GR',
                'GuestNationality' => 'GR',
                'CityId' => '7411',
                'NoOfRooms' => 1,
                'NoOfAdults' => 1,
                'NoOfChild' => 0,

 */]);
        $cities = $response->json('HotelCityList');

        return $cities;
        foreach ($cities as $city) {
            $c = new HotelsAPICity();
            $c->city_name = $city['city_name'];
            $c->city_code = $city['city_code'];

            $c->country_name = $city['country_name'];
            $c->country_code = $city['country_code'];
            $c->save();
        }
    }
}
