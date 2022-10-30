<?php

namespace App\Services\Sriggle;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

use Illuminate\Support\Str;

class FlightService
{
    public function searchForFlights()
    {

        $string_json = file_get_contents(__DIR__ . '/flight_response.json');
        $flight_response = json_decode($string_json, true);

        return $flight_response;
    }
    public function searchForFlights2($data)
    {

        if (Cache::has('test_flight_cache')) {
              return Cache::get('test_flight_cache');
        }


        $num_of_adults = 0;
        $num_of_children = 0;
        $num_of_infants = 0;
        //    return $data;
        $passengers = json_decode($data['flight_passengers'], true);
        // return $passengers;
        foreach ($passengers as $p) {


            if ($p['id'] == 1) {
                $num_of_adults = count($p['passengers']);
            } else if ($p['id'] == 4) {
                $num_of_children = count($p['passengers']);
            } else if ($p['id'] == 6) {
                $num_of_infants = count($p['passengers']);
            }
        }

        if ($data['flight_class'] == 1) {
            $data['flight_class'] = 'E';
        } else if ($data['flight_class'] == 3) {
            $data['flight_class'] = 'B';
        } else if ($data['flight_class'] == 4) {
            $data['flight_class'] = 'F';
        }


        if ($data['flight_type'] == 1) {
            $data['flight_type'] = 'O';
        } else if ($data['flight_type'] == 2) {
            $data['flight_type'] = 'R';
        } else if ($data['flight_type'] == 3) {
            $data['flight_type'] = 'M';
        }


        //   return $data;

        $response = Http::timeout(120)->post('https://apidemo.sriggle.tech/SIGNIX/B2B/Flight/Search', [
            "Credential" => [
                'Type' => 'C',
                'Module' => 'B',
                'Domain' => 'TRI',
                'LoginID' => 'SWETRI00',
                'Password' => 'Test@1234',
                'LanguageLocale' => 'en-US',
                'IpAddress' => '122.180.17.226'
            ],

            "FromAirportId" =>  $data['departure_airport_id'],
            "ToAirportId" =>  $data['destination_airport_id'],
            "DepartDate" => $data['departure_date'],
            "ReturnDate" => $data['return_date'],
            "Adults" => $num_of_adults,
            "Infants" => $num_of_infants,
            "Children" => $num_of_children,
            "Class" =>   $data['flight_class'],
            "TravellerNationality" => "IN",
            "NationalityName" => 'Indian',
            "ServiceTypeCode" => "F",
            "Currency" => 'USD',
            "FlightType" => $data['flight_type'],
            "PageNo" => 1,
            "PageSize" => 20,
            "Filter" => array_key_exists("filters", $data) ? $data['filters'] : []

        ]);

        Cache::put('test_flight_cache', $response->json());


        return $response->json();
    }


    public function priceValidation($data)
    {
        $num_of_adults = 0;
        $num_of_children = 0;
        $num_of_infants = 0;
        //    return $data;
        $passengers = json_decode($data['flight_passengers'], true);
        // return $passengers;
        foreach ($passengers as $p) {


            if ($p['id'] == 1) {
                $num_of_adults = count($p['passengers']);
            } else if ($p['id'] == 4) {
                $num_of_children = count($p['passengers']);
            } else if ($p['id'] == 6) {
                $num_of_infants = count($p['passengers']);
            }
        }

        if ($data['flight_class'] == 1) {
            $data['flight_class'] = 'E';
        } else if ($data['flight_class'] == 3) {
            $data['flight_class'] = 'B';
        } else if ($data['flight_class'] == 4) {
            $data['flight_class'] = 'F';
        }


        if ($data['flight_type'] == 1) {
            $data['flight_type'] = 'O';
        } else if ($data['flight_type'] == 2) {
            $data['flight_type'] = 'R';
        } else if ($data['flight_type'] == 3) {
            $data['flight_type'] = 'M';
        }
        $response = Http::timeout(60)->post('https://apidemo.sriggle.tech/SIGNIX/B2B/PriceValidation', [
            "Credential" => [
                'Type' => 'C',
                'Module' => 'B',
                'Domain' => 'TRI',
                'LoginID' => 'SWETRI00',
                'Password' => 'Test@1234',
                'LanguageLocale' => 'en-US',
                'IpAddress' => '122.180.17.226'
            ],

            "FromAirportId" =>  $data['departure_airport_id'],
            "ToAirportId" =>  $data['destination_airport_id'],
            "DepartDate" => $data['departure_date'],
            "ReturnDate" => $data['return_date'],
            "Adults" => $num_of_adults,
            "Infants" => $num_of_infants,
            "Children" => $num_of_children,
            "Class" =>   $data['flight_class'],
            "TravellerNationality" => "IN",
            "NationalityName" => 'Indian',
            "ServiceTypeCode" => "F",
            "Currency" => 'USD',
            "FlightType" => $data['flight_type'],
            "PageNo" => 1,
            "PageSize" => 10,
            "ServiceIdentifer" => $data['ServiceIdentifier'],
            "OptionalToken" => $data['OptionalToken'],
            "SearchKey" => $data['SearchKey'],
            "ProviderName" => $data['ProviderName'],
            "SearchType" => "Flight"


        ]);

        return $response->json();
    }


    public function bookFlight($data, $paxes)
    {
        $num_of_adults = 0;
        $num_of_children = 0;
        $num_of_infants = 0;
        $is_first = true;
        //    return $data;
        $passengers = $paxes;
        $paxes_r = [];
        // return $passengers;
        foreach ($passengers as $passenger) {
            if ($passenger['type_of_passenger'] == 'Adult') {
                $num_of_adults += 1;
            } else if ($passenger['type_of_passenger'] == 'Child') {
                $num_of_children += 1;
            } else {
                $num_of_infants += 1;
            }
            $paxes_r[] = [
                "LeadPax" => $is_first,
                "Title" => $passenger['gender']['value'] == 'Male' ? 'Mr' : 'Ms',
                "Forename" => $passenger['first_name']['value'],
                "Surname" => $passenger['last_name']['value'],
                "PaxType" => $passenger['type_of_passenger'] == 'Adult' ? 'A' : ($passenger['type_of_passenger'] == 'Child' ? 'C' : 'I'),
                "DOB" => $passenger['dob_y']['value']  . $passenger['dob_m']['value'] . $passenger['dob_d']['value'],
                "PaxEmail" => '',
                "PaxMobile" => '',
                "PaxDocuments" => [
                    "Passport" =>   [
                        "Nationality" => 'Indian',
                        "NationalityCode" => 'IN'

                    ]
                ]


            ];


            $is_first = false;
        }




        if ($data['flight_class'] == 1) {
            $data['flight_class'] = 'E';
        } else if ($data['flight_class'] == 3) {
            $data['flight_class'] = 'B';
        } else if ($data['flight_class'] == 4) {
            $data['flight_class'] = 'F';
        }


        if ($data['flight_type'] == 1) {
            $data['flight_type'] = 'O';
        } else if ($data['flight_type'] == 2) {
            $data['flight_type'] = 'R';
        } else if ($data['flight_type'] == 3) {
            $data['flight_type'] = 'M';
        }
        $key = Str::random(40);
        $booking_details = [];
        $booking_details[] = [
            'SearchType' => 'Flight',
            'BookSearchType' => 'Flight',

            'UniqueReferencekey' => 'Flight' . $key,
            'FlightServiceDetail' => [
                'UniqueReferencekey' => 'Flight' . $key,
                'ServiceBookPrice' => ceil($data['PublishedFare']),
                'ProviderName' => $data['ProviderName'],
                'ServiceIdentifer' =>  $data['ServiceIdentifier'],
                'OptionalToken' =>  $data['OptionalToken'],
                'FromDate' => $data['departure_date'],
                'ToDate' => $data['return_date'] ?? '',
                'Adults' => $num_of_adults,
                'Children' => $num_of_children,
                'Infants' => $num_of_infants,
                'Paxs' => $paxes_r,

            ]
        ];
     //   return $booking_details;
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
            'ReservationArrivalDate' => $data['departure_date'],
            'ReservationCurrency' => 'EUR',
            'ReservationClientReference' => '',
            'ReservationRemarks' => '',
            'IsQuote' => false,




            'BookingDetails' => $booking_details,









        ]);

        return $response->json();
        /*     $response = Http::timeout(60)->post('https://apidemo.sriggle.tech/SIGNIX/B2B/PriceValidation', [
            "Credential" => [
                'Type' => 'C',
                'Module' => 'B',
                'Domain' => 'TRI',
                'LoginID' => 'SWETRI00',
                'Password' => 'Test@1234',
                'LanguageLocale' => 'en-US',
                'IpAddress' => '122.180.17.226'
            ],

            "FromAirportId" =>  $data['departure_airport_id'],
            "ToAirportId" =>  $data['destination_airport_id'],
            "DepartDate" => $data['departure_date'],
            "ReturnDate" => $data['return_date'],
            "Adults" => $num_of_adults,
            "Infants" => $num_of_infants,
            "Children" => $num_of_children,
            "Class" =>   $data['flight_class'],
            "TravellerNationality" => "IN",
            "NationalityName" => 'Indian',
            "ServiceTypeCode" => "F",
            "Currency" => 'USD',
            "FlightType" => $data['flight_type'],
            "PageNo" => 1,
            "PageSize" => 10,
            "ServiceIdentifer" => $data['ServiceIdentifier'],
            "OptionalToken" => $data['OptionalToken'],
            "SearchKey" => $data['SearchKey'],
            "ProviderName" => $data['ProviderName'],
            "SearchType" => "Flight"


        ]);

        return $response->json(); */
    }
    public function getTerms($data)
    {
        $response = Http::timeout(60)->post('https://apidemo.sriggle.tech/SIGNIX/B2B/Flight/FareRule', [
            "Credential" => [
                'Type' => 'C',
                'Module' => 'B',
                'Domain' => 'TRI',
                'LoginID' => 'SWETRI00',
                'Password' => 'Test@1234',
                'LanguageLocale' => 'en-US',
                'IpAddress' => '122.180.17.226'
            ],

            "ServiceIdentifier" => $data['ServiceIdentifier'],
            "OptionalToken" => $data['OptionalToken'],
            "ProviderName" => $data['ProviderName'],



        ]);


        return $response->json();
    }
}
