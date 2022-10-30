<?php

namespace App\Services\Travelomatix;

use App\Models\Airline;
use App\Models\FlightPassenger;
use App\Services\Trippbo\CurrencyManagement;
use Exception;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Symfony\Component\ErrorHandler\Debug;

class Flights
{
    private $base_url;

    public function __construct()
    {
        $this->base_url = config('services.travelomatix.base_url');
    }

    public function roundTripFlightSearch($params)
    {
        if (Cache::has('flight2')) {
            return Cache::get('flight');
        }

        if ($params['flight_class'] == 'Premium Economy') {
            $params['flight_class'] = 'PremiumEconomy';
        }
        if ($params['flight_class'] == 'Premium Business') {
            $params['flight_class'] = 'PremiumBusiness';
        }

        $response = Http::timeout(60)->withHeaders([
            'x-Username' => config('services.travelomatix.username'),
            'x-DomainKey' => config('services.travelomatix.key'),
            'x-system' => config('services.travelomatix.enviroment'),
            'x-Password' => config('services.travelomatix.password'),
            'Accept-Encoding' => 'gzip, deflate',
        ])->post($this->base_url . 'webservices/index.php/flight/service/Search', [

            'Segments' => [
                [
                    'Origin' => $params['origin'],
                    'Destination' => $params['destination'],
                    'DepartureDate' => $params['departureDate'] . 'T00:00:00',
                    'ReturnDate' => $params['returnDate'] . 'T00:00:00',

                ],
            ],

            'CabinClass' => $params['flight_class'],
            'JourneyType' => $params['flightType'] == 'one way' ? 'OneWay' : ($params['flightType'] == 'round trip' ? 'Return' : 'Mutlicity'),
            'AdultCount' => $params['adultCount'],
            'ChildCount' => $params['childCount'],
            'InfantCount' => $params['infantCount'],

        ]);

        $api_json_result = $response->json();

        if($api_json_result["Status"] === 0) {
            return $api_json_result;
        }

        $result = $api_json_result;

        $api_flights = $result['Search']['FlightDataList']['JourneyList'][0];

        $flights = [];
        foreach ($api_flights as $flight) {
            $price = $flight['Price']['TotalDisplayFare']   - $flight['Price']['PriceBreakup']['AgentCommission'] + $flight['Price']['PriceBreakup']['AgentTdsOnCommision'];
            /* $operatorCode = $flight['FlightDetails']['Details'][0][0]['OperatorCode'];

            $airline = Airline::where('code', $operatorCode)->first();
            if ($airline !== null) {
                $price = $price + ceil(($airline->markup / 100) * $price);
            } */
            $flights[] = [
                'details' =>  $flight['FlightDetails']['Details'],
                'priceTotal' => CurrencyManagement::getPrice($flight['Price']['Currency'], null, $price),
                'priceTotalCurrency' => CurrencyManagement::determine_user_currency(),
                'refundable' => $flight['Attr']['IsRefundable'],
                'ResultToken' => $flight['ResultToken'],
            ];
        }

        Cache::put('flight', $flights);

        return $flights;
    }

    public function updateFareQuote($resultToken)
    {
        $act = new Activities();

        if (Cache::has('update_fare_quote2')) {
            return Cache::get('update_fare_quote');
        }
        $activites = new Activities();

        $response = Http::withHeaders([
            'x-Username' => config('services.travelomatix.username'),
            'x-DomainKey' => config('services.travelomatix.key'),
            'x-system' => config('services.travelomatix.enviroment'),
            'x-Password' => config('services.travelomatix.password'),
            'Accept-Encoding' => 'gzip, deflate',
        ])->post($this->base_url . 'webservices/index.php/flight/service/UpdateFareQuote', [

            'ResultToken' => $resultToken,
        ]);

        $api_json_result = $response->json()['UpdateFareQuote']['FareQuoteDetails']['JourneyList'];

        $price = [];

        $currency = $api_json_result['Price']['Currency'];
        foreach ($api_json_result['Price']['PassengerBreakup'] as $passenger_type => $passenger_info) {
            if (($passenger_type) == 'ADT') {
                $price[] = [
                    'passengers_type' => 'Adult',
                    'passengers_cost' => CurrencyManagement::getPrice($currency, null, $passenger_info['TotalPrice']),
                    'passengers_count' => $passenger_info['PassengerCount'],

                ];
            } elseif (($passenger_type) == 'CHD') {
                $price[] = [
                    'passengers_type' => 'Child',
                    'passengers_cost' => CurrencyManagement::getPrice($currency, null, $passenger_info['TotalPrice']),
                    'passengers_count' => $passenger_info['PassengerCount'],
                ];
            } else {
                $price[] = [
                    'passengers_type' => 'Infant',
                    'passengers_cost' => CurrencyManagement::getPrice($currency, null, $passenger_info['TotalPrice']),
                    'passengers_count' => $passenger_info['PassengerCount'],
                ];
            }
        }
        $result = [
            'details' => $api_json_result['FlightDetails']['Details'],
            'price' => $price,
            'currency' => CurrencyManagement::determine_user_currency(),
            'resultToken' => $api_json_result['ResultToken'],
            'attr' => $api_json_result['Attr'],
            'holdTicket' => $api_json_result['HoldTicket'],
        ];

        Cache::put('update_fare_quote', $result);

        return $result;
    }

    public function getExtraServices($updatedResultToken)
    {
        $response = Http::withHeaders([
            'x-Username' => config('services.travelomatix.username'),
            'x-DomainKey' => config('services.travelomatix.key'),
            'x-system' => config('services.travelomatix.enviroment'),
            'x-Password' => config('services.travelomatix.password'),
            'Accept-Encoding' => 'gzip, deflate',
        ])->post($this->base_url . 'webservices/index.php/flight/service/ExtraServices', [

            'ResultToken' => $updatedResultToken,
        ]);
        //   return dd($response->json());

        /*      Log::debug($response->json()); */

        $data = [];
        try {
            $data = $response->json()['ExtraServices']['ExtraServiceDetails'];
        } catch (Exception $ex) {
        }

        $to_be_returned = [];
        $baggage_to_be_returned = [];
        $meals_to_be_returned = [];
        $meals_preference_to_be_returned = [];

        if ($data !== null && array_key_exists('Baggage', $data)) {
            foreach ($data['Baggage'] as $passenger) {
                foreach ($passenger as $key => $value) {
                    $price = CurrencyManagement::getPrice('USD', CurrencyManagement::determine_user_currency(), $value['Price']);
                    $currency = CurrencyManagement::determine_user_currency();
                    $temp = $value;
                    $temp['Price'] = $price;
                    $temp['Currency'] = $currency;
                    $baggage_to_be_returned[] = $temp;
                }
            }
        }
        if ($data !== null && array_key_exists('Meals', $data)) {
            foreach ($data['Meals'] as $passenger) {
                foreach ($passenger as $key => $value) {
                    $price = CurrencyManagement::getPrice('USD', CurrencyManagement::determine_user_currency(), $value['Price']);
                    $currency = CurrencyManagement::determine_user_currency();
                    $temp = $value;
                    $temp['Price'] = $price;
                    $temp['Currency'] = $currency;
                    $temp['Show_full_description'] = false;
                    $meals_to_be_returned[] = $temp;
                }
            }
        }
        if ($data !== null && array_key_exists('MealPreference', $data)) {
            foreach ($data['MealPreference'] as $passenger) {
                foreach ($passenger as $key => $value) {
                    $temp = $value;
                    $temp['Show_full_description'] = false;
                    $meals_preference_to_be_returned[] = $temp;
                }
            }
        }

        $to_be_returned['Meals'] = $meals_to_be_returned;
        $to_be_returned['Baggage'] = $baggage_to_be_returned;
        $to_be_returned['MealPreference'] = $meals_preference_to_be_returned;

        return $to_be_returned;

        //  return $response->json()['ExtraServices']['ExtraServiceDetails'];
    }

    public function commitBooking($flight_order)
    {
        $flight_passengers = FlightPassenger::where('flight_order_id', $flight_order->id)->get();
        $passengers = [];
        foreach ($flight_passengers as $passenger) {
            $to_be_added = [
                'IsLeadPax' => $passenger->IsLeadPax == true ? 1 : 0,
                'Title' => $passenger->Title,
                'FirstName' => $passenger->FirstName,
                'LastName' => $passenger->LastName,
                'Gender' => $passenger->Gender == '1' ? 1 : 2,
                'DateOfBirth' => $passenger->DateOfBirth,
                'PassportNumber' => '',
                'CountryCode' => $passenger->CountryCode,
                'CountryName' => $passenger->CountryName,
                'ContactNo' => $passenger->ContactNo,
                'City' => $passenger->City,
                'PinCode' => $passenger->PinCode,
                'AddressLine1' => $passenger->AddressLine1,
                'Email' => $passenger->Email,
                'PaxType' => $passenger->PaxType,

            ];

            if ($passenger->baggage_id) {
                $to_be_added['BaggageId'] = $passenger->baggage_id;
            }
            if ($passenger->meal_id) {
                $to_be_added['MealId'] = $passenger->meal_id;
            }
            if ($passenger->seat_id) {
                $to_be_added['SeatId'] = $passenger->seat_id;
            }
            $passengers[] = $to_be_added;
        }

        $response = Http::timeout(60)->withHeaders([
            'x-Username' => config('services.travelomatix.username'),
            'x-DomainKey' => config('services.travelomatix.key'),
            'x-system' => config('services.travelomatix.enviroment'),
            'x-Password' => config('services.travelomatix.password'),
            'Accept-Encoding' => 'gzip, deflate',
        ])->post($this->base_url . 'webservices/index.php/flight/service/CommitBooking', [

            'AppReference' => $flight_order->AppReference,
            'SequenceNumber' => $flight_order->SequenceNumber,
            'ResultToken' => $flight_order->ResultToken,
            'Passengers' => $passengers,
        ]);

        return $response->json();
    }

    public function getBookingDetails($appReference) {
        try {
            $response = Http::timeout(60)->withHeaders([
                'x-Username' => config('services.travelomatix.username'),
                'x-DomainKey' => config('services.travelomatix.key'),
                'x-system' => config('services.travelomatix.enviroment'),
                'x-Password' => config('services.travelomatix.password'),
                'Accept-Encoding' => 'gzip, deflate',
            ])->post($this->base_url . 'webservices/index.php/flight/service/BookingDetails', [
                'AppReference' => $flight_order->AppReference
            ]);

            return $response->json();
        } catch(Exception $ex) {
            Log::error($ex);
        }

        return null;
    }

    /*     public function issueHold()
    {
        $response = Http::withHeaders([
            'x-Username' => config('services.travelomatix.username'),
            'x-DomainKey' => config('services.travelomatix.key'),
            'x-system' => config('services.travelomatix.enviroment'),
            'x-Password' => config('services.travelomatix.password'),
            'Accept-Encoding' => 'gzip, deflate',
        ])->post($this->base_url.'webservices/index.php/flight/service/IssueHoldTicket', [

            'AppReference' => 'a05a5bec-8542-45ad-84e5-5691f23e1793',
            'SequenceNumber' => 0,
            'BookingId' => '49892367',
            'Pnr' => 'OK4J87',
        ]);

        return $response->json();
    } */
}
