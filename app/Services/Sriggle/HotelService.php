<?php

namespace App\Services\Sriggle;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Client\Pool;
use Illuminate\Support\Str;
class HotelService
{
    public static function searchForHotels()
    {

        $string_json = file_get_contents(__DIR__ . '/hotel_response.json');
        $hotel_res = json_decode($string_json, true);

        return $hotel_res;
    }


    public static function getHotelDetails()
    {

        $string_json = file_get_contents(__DIR__ . '/hotel_detail_response.json');
        $hotel_res = json_decode($string_json, true);

        return $hotel_res;
    }

    public static function searchForHotels2($data)
    {
        if (Cache::has('sriggle_hotels')) {
            //   return Cache::get('sriggle_hotels');
        }

        $rooms = [];

        $input_rooms = json_decode($data['rooms'], true);

        foreach ($input_rooms as $index => $room) {

            $adults = 0;
            $children = 0;
            $pax = [];
            foreach ($room['passengers'] as $passenger) {
                if ($passenger['passenger_type_id'] == 1) {
                    $adults += 1;
                }
                if ($passenger['passenger_type_id'] == 2) {
                    $children += 1;
                    $pax[] = ['PaxType' => 'C', 'Age' => $passenger['passenger_age']];
                }
            }
            $rooms[] = [
                'RoomNo' => $index + 1,
                'Adults' => $adults,
                'Children' => $children,
                'Paxs' => $pax

            ];
        }






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

            'CityId' => $data['city_id'],
            'CheckInDate' => $data['check_in_date'],
            'CheckOutDate' => $data['check_out_date'],
            'Currency' => 'USD',
            'TravellerNationality' => 'IN',
            'PageSize' => 10,
            'PageNo' => array_key_exists('PageNo', $data) ? $data['PageNo'] : 1,
            'Filter' => array_key_exists('filters', $data) ? $data['filters'] : [],
            'Rooms' => $rooms


        ]);

        Cache::put('sriggle_hotels', $response->json());

        return $response->json();
    }
    public static function getHotelDetails2($data)
    {
        if (Cache::has('sriggle_hotels')) {
            //  return Cache::get('sriggle_hotels');
        }

        $rooms = [];

        /*    foreach($data['rooms'] as $room)
        {
            $temp_room = [];
            $temp_room['RoomNo'] = 1;
            $temp_room['RoomNo'] = $room;
        }
 */
        $response = Http::timeout(60)->post('https://apidemo.sriggle.tech/SIGNIX/B2B/Hotel/Detail', [
            "Credential" => [
                'Type' => 'C',
                'Module' => 'B',
                'Domain' => 'TRI',
                'LoginID' => 'SWETRI00',
                'Password' => 'Test@1234',
                'LanguageLocale' => 'en-US',
                'IpAddress' => '122.180.17.226'
            ],

            'HotelProviderSearchId' => $data


        ]);



        $my_data = [];

        $my_data['hotel_details'] = $response->json();
        $my_data['hotel_media']  =  HotelService::getHotelMedia($data);

        return $my_data;
    }

    private static function getHotelMedia($data)
    {

        $response = Http::timeout(60)->post('https://apidemo.sriggle.tech/Signix/B2B/Hotel/Media', [
            "Credential" => [
                'Type' => 'C',
                'Module' => 'B',
                'Domain' => 'TRI',
                'LoginID' => 'SWETRI00',
                'Password' => 'Test@1234',
                'LanguageLocale' => 'en-US',
                'IpAddress' => '122.180.17.226'
            ],

            'HotelProviderSearchId' => $data


        ]);



        return $response->json();
    }

    public static function getPriceBreakup($data)
    {

        $response = Http::timeout(60)->post('https://apidemo.sriggle.tech/SIGNIX/B2B/Hotel/PriceBreakup', [
            "Credential" => [
                'Type' => 'C',
                'Module' => 'B',
                'Domain' => 'TRI',
                'LoginID' => 'SWETRI00',
                'Password' => 'Test@1234',
                'LanguageLocale' => 'en-US',
                'IpAddress' => '122.180.17.226'
            ],

            'ServiceIdentifer' => $data['ServiceIdentifer'],
            'ProviderName' =>  $data['ProviderName'],
            'SearchType' => "Hotel",
            'ServiceToken' => $data['OptionalToken'],



        ]);



        return $response->json();
    }
    public static function bookHotel($data)
    {


        $rooms = [];
        $request_rooms = [];
        $is_first = true;


        $rooms = json_decode($data['rooms'], true);
        $room_index = 1;
        // return $rooms;

        foreach ($rooms as $room) {
            $num_of_adults = 0;
            $num_of_children = 0;
            $temp = [];
            foreach ($room['passengers'] as $pass) {
                if ($pass['passenger_type_id'] == 1) {
                    $num_of_adults += 1;
                } else {
                    $num_of_children += 1;
                }


                $is_first = false;
            }
            $request_rooms[] = [
                "RoomId" => $room_index,
                "Adults" => $num_of_adults,
                "Children" => $num_of_children,

                "RoomName" => $data['RoomName'],

                "Paxs" =>  [
                    'LeadPax' => true,
                    'Title' => $data['lead_paxes'][$room_index - 1]['lead_pax_title'] == 'Ms' ? 'Ms' : 'Mr',
                    'Forename' => $data['lead_paxes'][$room_index - 1]['lead_pax_first_name'],
                    'Surname' => $data['lead_paxes'][$room_index - 1]['lead_pax_last_name'],
                    'PaxType' => 'A',
               /*      'Age' => '22',
                    'DOB' => '2000', */
                    'PaxEmail' => $data['contact_information']['email'],
                    'PaxMobile' => $data['contact_information']['phone_nr'],
                    'RoomID' => $room_index

                ]


            ];

            $room_index += 1;
        }
        $key = Str::random(40);
       // return $request_rooms;
        $response = Http::timeout(60)->post('https://apidemo.sriggle.tech/SIGNIX/B2B/Book', [
            "Credential" => [
                'Type' => 'C',
                'Module' => 'B',
                'Domain' => 'TRI',
                'LoginID' => 'SWETRI00',
                'Password' => 'Test@1234',
                'LanguageLocale' => 'en-US',
                'IpAddress' => '122.180.17.226'
            ],

            'ReservationId' => null,
            'ReservationName' => '',
            'ReservationArrivalDate' => $data['check_in_date'],
            'ReservationCurrency' => 'EUR',
            'ReservationClientReference' => '',
            'ReservationRemarks' => '',
            'IsQuote' => false,




            'BookingDetails' => [
                [
                    'SearchType' => 'Hotel',
                    'UniqueReferencekey' => 'HotelBooking-' . $key,
                    'HotelServiceDetail' => [
                        'UniqueReferencekey' => 'HotelBooking-' . $key,
                        'ServiceBookPrice' => $data['price'],

                        'ProviderName' => $data['ProviderName'],
                        'ServiceIdentifer' => $data['ServiceIdentifer'],
                        'OptionalToken' => $data['OptionalToken'],
                        'FromDate' => $data['check_in_date'],
                        'ToDate' => $data['check_out_date'],
                        'RoomDetails' => $request_rooms,
                        'PaymentType' => 'Cash'
                    ],


                ]
            ],
        ]);



        return $response->json();
    }

    public static function getStaticData()
    {
        $response = Http::timeout(120)->post('https://apidemo.sriggle.tech/SIGNIX/B2B/StaticData/AC', [
            "Credential" => [
                'Type' => 'C',
                'Module' => 'B',
                'Domain' => 'TRI',
                'LoginID' => 'SWETRI00',
                'Password' => 'Test@1234',
                'LanguageLocale' => 'en-US',
                'IpAddress' => '122.180.17.226'
            ],
            'AcType' => 'HOTEL',
            'SearchText' => '',
            'AllData' => true


        ]);


        $json = $response->json();
        Storage::put('HOTEL.json', json_encode($json));
    }


    public function getHotelsDetails($arr_of_hotels)
    {


        $pool_array = [];



        $responses = Http::pool(
            function (Pool $pool) {
                /*    foreach ($arr_of_hotels as $hotel) {

                } */
                return
                    [
                        $pool->get('http://localhost/first'),
                        $pool->get('http://localhost/second'),
                        $pool->get('http://localhost/third')
                    ];
            }

        );

        return $responses[0]->ok() &&
            $responses[1]->ok() &&
            $responses[2]->ok();
    }
}
