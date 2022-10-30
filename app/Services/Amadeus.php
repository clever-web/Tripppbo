<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class Amadeus
{
    private $isAuthenticated = false;

    private $accessToken;

    private $baseURL;

    public function __construct()
    {
        $this->baseURL = 'https://api.amadeus.com/';
        // $this->baseURL = "https://test.api.amadeus.com/";
        $this->authenticate();
    }

    private function authenticate()
    {
        if (Cache::has('amadeus_access_token')) {
            $this->accessToken = Cache::get('amadeus_access_token');
        } else {
            $response = Http::asForm()->withHeaders([

            ])->post($this->baseURL.'v1/security/oauth2/token', [
                'grant_type' => 'client_credentials',
                'client_id' => env('AMADEUS_API_KEY'),
                'client_secret' => env('AMADEUS_API_SECRET'),
            ]);

            $this->accessToken = $response->json('access_token');
            Cache::put('amadeus_access_token', $this->accessToken, 1740);
        }
    }

    public function getHotelOffers($hotelId, $checkInDate, $checkOutDate, $hotel_adult_count)
    {
        $requestBody = [];
        $requestBody['hotelId'] = $hotelId;
        $requestBody['checkInDate'] = $checkInDate;
        $requestBody['checkOutDate'] = $checkOutDate;
        $requestBody['adults'] = $hotel_adult_count;
        $response = Http::withHeaders([
            'Authorization' => 'Bearer '.$this->accessToken,
            'accept' => 'application/vnd.amadeus+json',
        ])->get($this->baseURL.'v2/shopping/hotel-offers/by-hotel', $requestBody);

        return $response->json();
    }

    public function searchForHotelsByCityOrAirportName($IATACode, $rating = null, $sortBy = null, $pageOffset = 0, $checkInDate = null, $checkOutDate = null, $nextPageLink = null, $previousPageLink = null, $amenities = null, $hotel_adult_count = null, $hotel_children_count = null)
    {
        $url = '';

        $requestBody = [];
        $requestBody['cityCode'] = $IATACode;
        $requestBody['page[limit]'] = 20;
        //    $requestBody['page[offset]'] = 0;
        if ($rating !== null) {
            $requestBody['ratings'] = $rating;
        }
        if ($sortBy !== null) {
            if ($sortBy == 'PRICE') {
                $requestBody['sort'] = 'PRICE';
            }
        }
        if ($checkInDate !== null && $checkInDate !== '') {
            $requestBody['checkInDate'] = $checkInDate;
        }

        if ($checkOutDate !== null && $checkOutDate !== '') {
            $requestBody['checkOutDate'] = $checkOutDate;
        }

        if ($amenities !== null) {
            $requestBody['amenities'] = $amenities;
        }

        $requestBody['adults'] = $hotel_adult_count;

        $response = Http::withHeaders([
            'Authorization' => 'Bearer '.$this->accessToken,
            'accept' => 'application/vnd.amadeus+json',
        ])->get($this->baseURL.'v2/shopping/hotel-offers', $requestBody);

        // $data[] = $pagination;

        return $response->json();
    }

    public function getPageFromLink($link)
    {
        if ($this->verifyAmadeusLink($link)) {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer '.$this->accessToken,
                'accept' => 'application/vnd.amadeus+json',
            ])->get($link);

            return $response->json();
        }
    }

    public function autocomplete($keyword)
    {
        $this->authenticate();
        $response = Http::withHeaders([
            'Authorization' => 'Bearer '.$this->accessToken,
        ])->get($this->baseURL.'v1/reference-data/locations', [
            'subType' => 'AIRPORT,CITY',
            'keyword' => $keyword,

        ]);

        return $response->json('data');
    }

    public function autocompleteAirport($keyword)
    {
        $this->authenticate();
        $response = Http::withHeaders([
            'Authorization' => 'Bearer '.$this->accessToken,
        ])->get($this->baseURL.'v1/reference-data/locations', [
            'subType' => 'AIRPORT',
            'keyword' => $keyword,

        ]);

        return $response->json('data');
    }

    public function test()
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer '.$this->accessToken,
        ])->get('https://api.amadeus.com/v2/shopping/flight-offers', [
            'originLocationCode' => 'YXU',
            'destinationLocationCode' => 'ARN',
            'departureDate' => '2021-05-10',
            'adults' => '1',
            'nonStop' => 'false',
            'max' => '250',

        ]);

        return dd($response->json());
    }

    public function verifyAmadeusLink($link)
    {
        $base = 'https://api.amadeus.com/v2/shopping/hotel-offers';
        if (substr($link, 0, strlen($base)) === $base) {
            return true;
        } else {
            return false;
        }
    }

    public function roundTripFlightSearch($departure_date, $return_date, $departure_city, $destination_city)
    {
        $requestBody = [];
        $requestBody['originLocationCode'] = $departure_city;
        $requestBody['destinationLocationCode'] = $destination_city;
        $requestBody['departureDate'] = $departure_date;
        $requestBody['returnDate'] = $return_date;
        $requestBody['adults'] = 1;
        $requestBody['children'] = 0;

        $response = Http::withHeaders([
            'Authorization' => 'Bearer '.$this->accessToken,
            'accept' => 'application/vnd.amadeus+json',
        ])->get($this->baseURL.'v2/shopping/flight-offers', $requestBody);

        return $response->json();
    }
}
