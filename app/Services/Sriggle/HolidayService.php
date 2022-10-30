<?php

namespace App\Services\Sriggle;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use App\Models\SriggleCity;
use App\Models\SriggleAirport;
use Carbon\Carbon;
use GuzzleHttp\Psr7\Request;
use Illuminate\Http\Client\Pool;
use Illuminate\Support\Facades\Http;
use App\Models\FeaturedPackage;
use App\Models\HolidayTheme;

class HolidayService
{

    public function getHolidays($params)
    {


        if (Cache::has("holidays_test")) {
         //  return Cache::get("holidays_test");
        }
        $response = Http::timeout(60)->post('https://apidemo1.sriggle.tech/Signix/B2B/Package/Search', [
            "Credential" => [
                'Type' => 'C',
                'Module' => 'B',
                'Domain' => 'TRI',
                'LoginID' => 'SWETRI00',
                'Password' => 'Test@1234',
                'LanguageLocale' => 'en-US',
                'IpAddress' => '122.180.17.226'
            ],


            "TravellerNationality" => "IN",
            "Currency" => "EUR",
            "Rooms" => [
                [
                    "RoomNo" => "1",
                    "Adults" => "1",
                    "Children" => "1",
                    "Paxs" => null,
                ]
            ],
            "FromDate" => array_key_exists('start_date' , $params) ? $params['start_date'] : "2022-11-01",
            "ToDate" => array_key_exists('end_date' , $params) ? $params['end_date'] : "2022-11-15",
            "CountryId" => array_key_exists('country_id' , $params) ? $params['country_id'] : null ,
         //   "CityId" => 0

        ]);

        $holidays = $response->json();
        return $holidays;


        $filtered_holidays = $holidays;


        $list = [];

        for ($i = 0; $i < count($holidays['PackageProviders']) - 1; $i++) {
            $includes_required_theme = $params['theme'] == -1 ? true : false;

            foreach($holidays['PackageProviders'][$i]['PackageTheme'] as $theme)
            {
                $theme = HolidayTheme::firstOrCreate([
                    'theme_id' => $theme['ThemeId'],
                    'theme_name' => $theme['ThemeName']
                ]);

                if (/* $theme['ThemeId'] == $params['theme']   */ true)
                {
                    $includes_required_theme = true;
                }
            }

            if ($includes_required_theme)
            {
                $list[] = $holidays['PackageProviders'][$i];
            }


            for ($y = 0; $y < count($holidays['PackageProviders'][$i]['PackageCities']) - 1; $y++) {


                $city_id = $holidays['PackageProviders'][$i]['PackageCities'][$y]['CityId'];
                $city_m = SriggleCity::where("city_id", $city_id)->first();
                $holidays['PackageProviders'][$i]['PackageCities'][$y]['Destination'] = $city_m['Name'];




            }
        }

        $filtered_holidays['PackageProviders'] = $list;

        Cache::put("holidays_test",  $filtered_holidays);


        return $filtered_holidays;
    }


    public function getPackageDetails($id)
    {

        if (Cache::has("holidays_test2")) {
           // return Cache::get("holidays_test2");
        }

        $response = Http::timeout(120)->post('https://apidemo1.sriggle.tech/Signix/B2B/PackageDetail', [
            "Credential" => [
                'Type' => 'C',
                'Module' => 'B',
                'Domain' => 'TRI',
                'LoginID' => 'SWETRI00',
                'Password' => 'Test@1234',
                'LanguageLocale' => 'en-US',
                'IpAddress' => '122.180.17.226'
            ],


            "PackageDate" => "2022-11-15",
            "PackageCurrency" => "EUR",
            "PackageId" => $id,
            "Rooms" => [
                [
                    "RoomNo" => "1",
                    "Adults" => "1",
                    "Children" => "0",
                    "Paxs" => null
                ]
            ],


        ]);
        Cache::put("holidays_test22",  $response->json());

        return $response->json();
    }


    public function getHotelsDetails($params)
    {
        $list_of_hotels = $params['hotels'];

        if (Cache::has("holiday_hotels")) {
            return Cache::get("holiday_hotels");
        }



        /* $hotel_detail_responses = Http::pool(
            function (Pool $pool) use ($list_of_hotels) {
                $hotels = [];
                foreach ($list_of_hotels as $hotel) {
                    $hotels[] =   $pool->timeout(60)->post('https://apidemo.sriggle.tech/SIGNIX/B2B/Hotel/Detail', [
                        "Credential" => [
                            'Type' => 'C',
                            'Module' => 'B',
                            'Domain' => 'TRI',
                            'LoginID' => 'SWETRI00',
                            'Password' => 'Test@1234',
                            'LanguageLocale' => 'en-US',
                            'IpAddress' => '122.180.17.226'
                        ],

                        'HotelProviderSearchId' => $hotel


                    ]);
                }
                return $hotels;
            }

        );

        $hotel_detail_list = [];
        foreach ($hotel_detail_responses as $h) {
            $hotel_detail_list[] = $h->json();
        } */

        $hotel_index_responses = Http::pool(
            function (Pool $pool) use ($params) {
                $hotels = [];
                foreach ($params['hotels'] as $hotel) {
                    $hotels[] =   $pool->timeout(60)->post('https://apidemo.sriggle.tech/SIGNIX/B2B/Hotel/Search', [
                        "Credential" => [
                            'Type' => 'C',
                            'Module' => 'B',
                            'Domain' => 'TRI',
                            'LoginID' => 'SWETRI00',
                            'Password' => 'Test@1234',
                            'LanguageLocale' => 'en-US',
                            'IpAddress' => '122.180.17.226'
                        ],

                        'CityId' => $hotel['city_id'],
                        'HotelId' => $hotel['hotel_id'],
                        'CheckInDate' => $params['checkinDate'],
                        'CheckOutDate' => $params['checkoutDate'],
                        'Currency' => 'USD',
                        'TravellerNationality' => 'IN',
                        'PageSize' => 10,

                        'Rooms' => $params['rooms']


                    ]);
                }
                return $hotels;
            }

        );


        //   Cache::put("holiday_hotels", $list);

        $hotel_index_list = [];

        foreach ($hotel_index_responses as $h) {
            $temp = $h->json();
            $hotel_index_list[] = $temp['Hotels'][0];
        }

        return $hotel_index_list;
    }



    public function bookHoliday($params)
    {
        $num_of_adults = 0;
        $num_of_children = 0;
        $paxes = [];
        $paxes[] = [];
        $first_pax = true;
        $pax_id = 1;
        $room_id = 1;
        $rooms = [];

        $flight_num_of_children = 0;
        $flight_num_of_infants = 0;


        foreach ($params['paxes_details'] as $p) {
            if ($p['type'] == 'Adult') {
                $num_of_adults += 1;
            }
            if ($p['type'] == 'Child' || $p['type'] == 'Infant') {
                $num_of_children += 1;
            }
            if ($p['type'] == 'Child') {
                $flight_num_of_children += 1;
            } else if ($p['type'] == 'Infant') {
                $flight_num_of_infants += 1;
            }
        }

        foreach ($params['paxes_details'] as $p) {
            $paxes[0][] = [
                'LeadPax' => $first_pax,
                'PaxId' => $pax_id,
                'Title' => $p['gender'] == 'Male' ? 'Mr' : 'Ms',
                'Forename' => $p['first_name'],
                'Surname' => $p['last_name'],
                'PaxType' => $p['type'] == 'Adult' ? 'A' : 'C',
                'Age' => '45',
                'PaxEmail' => $params['contact_info']['email'],
                'PaxMobile' => $params['contact_info']['phone_nr'],
                'PaxMobilePrefix' => '+46',
                'RoomID' => $room_id,
                'PaxDocuments' => [

                    'Passport' => [
                        'Nationality' => 'Indian',
                        'NationalityCode' => 'IN'
                    ]
                ]

            ];
            $first_pax = false;
            $pax_id += 1;
        }




        $hotels = [];

        foreach ($params['selected_rooms'] as $key => $b) {
            $hotels[] =     [
                'UniqueReferencekey' => 'first_package_booking_reference_key' . $key,
                'ServiceBookPrice' => ceil($b['ServicePrice']),

                'ProviderName' => $b['ProviderName'],
                'ServiceIdentifer' => $b['ServiceIdentifer'],
                'OptionalToken' => $b['OptionalToken'],
                'FromDate' => substr($b['checkInDate'], 0, 10),
                'ToDate' => substr($b['checkOutDate'], 0, 10),
                'RoomDetails' => [
                    [
                        'RoomId' => $room_id,
                        'Adults' => $num_of_adults,
                        'Children' => $num_of_children,
                        'RoomName' => $b['Rooms'][0]['RoomName'],
                        'Paxs' => $paxes

                    ]
                ],
                'PaymentType' => 'Cash'
            ];
        }




        $booking_details = [];


        foreach ($hotels as $key => $h) {
            $booking_details[] = [
                'SearchType' => 'Hotel',
                'UniqueReferencekey' => 'first_package_booking' . $key,
                'HotelServiceDetail' => $h


            ];
        }

        $booking_details[] = [
            'SearchType' => 'Flight',
            'BookSearchType' => 'Flight',

            'UniqueReferencekey' => 'first_package_booking' . 'Flight' . $key,
            'FlightServiceDetail' => [
                'UniqueReferencekey' => 'flight_package_booking' . $key,
                'ServiceBookPrice' => ceil($params['flight']['PublishedFare']),
                'ProviderName' => $params['flight']['ProviderName'],
                'ServiceIdentifer' =>  $params['flight']['ServiceIdentifier'],
                'OptionalToken' =>  $params['flight']['OptionalToken'],
                'FromDate' => substr($params['package_details']['PackageStartDate'], 0, 10),
                'ToDate' => substr($params['package_details']['PackageEndDate'], 0, 10),
                'Adults' => $num_of_adults,
                'Children' => $flight_num_of_children,
                'Infants' => $flight_num_of_infants,
                'Paxs' => $paxes,

            ]
        ];


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
            'ReservationArrivalDate' => substr($params['package_details']['PackageStartDate'], 0, 10),
            'ReservationCurrency' => 'EUR',
            'ReservationClientReference' => '',
            'ReservationRemarks' => '',
            'IsQuote' => false,




            'BookingDetails' => $booking_details,









        ]);


        return $response->json();
    }


    public function getFeaturedPackages()
    {

        $packages = FeaturedPackage::all();

        $packages_resp = Http::pool(
            function (Pool $pool) use ($packages) {
                $responses = [];
                foreach ($packages as $p) {
                    $responses[] =   $pool->timeout(60)->post('https://apidemo1.sriggle.tech/Signix/B2B/PackageDetail', [
                        "Credential" => [
                            'Type' => 'C',
                            'Module' => 'B',
                            'Domain' => 'TRI',
                            'LoginID' => 'SWETRI00',
                            'Password' => 'Test@1234',
                            'LanguageLocale' => 'en-US',
                            'IpAddress' => '122.180.17.226'
                        ],

                        "PackageDate" => $p->default_package_date,
                        "PackageCurrency" => "EUR",
                        "PackageId" => $p->package_id,
                        "Rooms" => [
                            [
                                "RoomNo" => "1",
                                "Adults" => "1",
                                "Children" => "0",
                                "Paxs" => null
                            ]
                        ],


                    ]);
                }
                return $responses;
            }

        );


        $json_list = [];

        foreach($packages_resp as $resp)
        {
            $json_list[] = $resp->json();
        }

        return $json_list;
    }
}
