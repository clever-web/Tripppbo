<?php

namespace App\Services\Travelomatix;

use App\Models\ActivityPassenger;
use App\Services\Trippbo\CurrencyManagement;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use PhpParser\Node\Expr\Cast;

class Activities
{
    private $base_url;

    public function __construct()
    {
        $this->base_url = config('services.travelomatix.base_url');
    }

    public function getActivities($city)
    {
        if (Cache::has('test-activities2')) {
            return Cache::get('test-activities');
        }
        $response = Http::timeout(60)->withHeaders([
            'x-Username' => config('services.travelomatix.username'),
            'x-DomainKey' => config('services.travelomatix.key'),
            'x-system' => config('services.travelomatix.enviroment'),
            'x-Password' => config('services.travelomatix.password'),
            'Accept-Encoding' => 'gzip, deflate',
        ])->post($this->base_url.'webservices/sightseeing/service/Search', [

            'city_id' => $city,

        ]);
        $status = $response->json()['Status'];
        /*   if ($status == 0) {
            abort(404);
        } */
        $activities = $response->json()['Search']['SSSearchResult']['SightSeeingResults'];

        $final_response = [];
        $result = [];

        foreach ($activities as $activity) {
            $result[] = [
                'ProductName' => $activity['ProductName'],
                'ProductCode' => $activity['ProductCode'],
                'ImageUrl' => $activity['ImageUrl'],
                'ImageHisUrl' => $activity['ImageHisUrl'],
                'DestinationName' => $activity['DestinationName'],
                'Description' => $activity['Description'],
                'Cancellation_available' => $activity['Cancellation_available'],
                'ResultToken' => $activity['ResultToken'],
                'Duration' => $activity['Duration'],
                'Price' => CurrencyManagement::getPrice($activity['Price']['Currency'], null, $activity['Price']['TotalDisplayFare']),
                'Currency' => CurrencyManagement::determine_user_currency(), /*  $activity['Price']['Currency'] */
                'Categories' => $activity['Cat_Ids'],
                'StarRating' => $activity['StarRating'],
                'Promotion' => $activity['Promotion'],

            ];
        }

        $final_response['activites'] = $result;
        $final_response['categories'] = $this->getCityCategories($city);
        Cache::put('test-activities', $final_response);

        return $final_response;
    }

    public function getCityCategories($city)
    {
        $response = Http::withHeaders([
            'x-Username' => config('services.travelomatix.username'),
            'x-DomainKey' => config('services.travelomatix.key'),
            'x-system' => config('services.travelomatix.enviroment'),
            'x-Password' => config('services.travelomatix.password'),
            'Accept-Encoding' => 'gzip, deflate',
        ])->post($this->base_url.'webservices/sightseeing/service/CategoryList', [

            'city_id' => $city,

        ]);
        $category_list = $response->json('CategoryList')['CategoryList'];

        return $category_list;
    }

    public function getActivityDetails($product_code, $result_token)
    {
        if (Cache::has('test-activity2')) {
            return Cache::get('test-activity');
        }
        $response = Http::withHeaders([
            'x-Username' => config('services.travelomatix.username'),
            'x-DomainKey' => config('services.travelomatix.key'),
            'x-system' => config('services.travelomatix.enviroment'),
            'x-Password' => config('services.travelomatix.password'),
            'Accept-Encoding' => 'gzip, deflate',
        ])->post($this->base_url.'webservices/sightseeing/service/ProductDetails', [

            'ProductCode' => $product_code,
            'ResultToken' => $result_token,

        ]);
        if ($response->successful()) {
            /*            $activity_details = $response->json();
            return $activity_details; */
            $status = $response->json('Status');
            if ($status != 1) {
                abort(404);
            }
            $activity_details = $response->json('ProductDetails')['SSInfoResult'];
            $activity_details['Price']['TotalDisplayFare'] = CurrencyManagement::getPrice($activity_details['Price']['Currency'], null, $activity_details['Price']['TotalDisplayFare']);
            $activity_details['Price']['Currency'] = CurrencyManagement::determine_user_currency();
            $photos = [];
            foreach ($activity_details['ProductPhotos'] as $photo) {
                $photos[] = $photo['photoHiResURL'];
            }
            $activity_details['photos'] = $photos;
            Cache::put('test-activity', $activity_details);

            return $activity_details;
        }
    }

    public function getActivityTourGrade($date, $product_code, $result_token, $adult_count, $child_count, $infant_count)
    {
        $ageBands = [];
        $ageBands[] = [
            'bandId' => 1,
            'count' => $adult_count,
        ];

        if ($child_count > 0) {
            $ageBands[] = [
                'bandId' => 2,
                'count' => $child_count,
            ];
        }
        if ($infant_count > 0) {
            $ageBands[] = [
                'bandId' => 3,
                'count' => $infant_count,
            ];
        }
        $response = Http::withHeaders([
            'x-Username' => config('services.travelomatix.username'),
            'x-DomainKey' => config('services.travelomatix.key'),
            'x-system' => config('services.travelomatix.enviroment'),
            'x-Password' => config('services.travelomatix.password'),
            'Accept-Encoding' => 'gzip, deflate',
        ])->post($this->base_url.'webservices/sightseeing/service/TripList', [

            'ProductCode' => $product_code,
            'ResultToken' => $result_token,
            'BookingDate' => $date,
            'ageBands' =>  $ageBands,

        ]);

        if ($response->successful()) {
            $activity_details = $response->json();

            $trips_to_be_returned = [];
            foreach ($activity_details['TripList']['Trip_list'] as $trip) {
                $temp = $trip;
                if ($trip['Price']['TotalDisplayFare'] > 0) {
                    $temp['Price'] = CurrencyManagement::getPrice($trip['Price']['Currency'], null, $trip['Price']['TotalDisplayFare']);
                    $temp['Currency'] = CurrencyManagement::determine_user_currency();

                    $trips_to_be_returned[] = $temp;
                }
            }

            return $trips_to_be_returned;
        }
    }

    public function reserveActivity($date, $gradeCode, $productCode, $resultToken, $adult_count, $child_count, $infant_count)
    {
        $ageBands = [];
        $ageBands[] = [
            'bandId' => 1,
            'count' => $adult_count,
        ];

        if ($child_count > 0) {
            $ageBands[] = [
                'bandId' => 2,
                'count' => $child_count,
            ];
        }
        if ($infant_count > 0) {
            $ageBands[] = [
                'bandId' => 3,
                'count' => $infant_count,
            ];
        }
        $response = Http::withHeaders([
            'x-Username' => config('services.travelomatix.username'),
            'x-DomainKey' => config('services.travelomatix.key'),
            'x-system' => config('services.travelomatix.enviroment'),
            'x-Password' => config('services.travelomatix.password'),
            'Accept-Encoding' => 'gzip, deflate',
        ])->post($this->base_url.'webservices/sightseeing/service/BlockTrip', [

            'ProductCode' => $productCode,
            'ResultToken' => $resultToken,
            'BookingDate' => $date,
            'GradeCode' => $gradeCode,
            'ageBands' => $ageBands,

        ]);

        $activity_details = $response->json();

        return $activity_details;
    }

    public function commitBooking($activity_order)
    {
        $activity_passenger = ActivityPassenger::where('activity_order_id', $activity_order->id)->get();
        $passengers = [];
        foreach ($activity_passenger as $passenger) {
            $passengers[] = [
                'IsLeadPax' => $passenger->IsLeadPax,
                'FirstName' => $passenger->FirstName,
                'LastName' => $passenger->LastName,
                'ContactNo' => $passenger->ContactNo,
                'Email' => $passenger->Email,
                'PaxType' => $passenger->PaxType,

            ];
        }

        $response = Http::withHeaders([
            'x-Username' => config('services.travelomatix.username'),
            'x-DomainKey' => config('services.travelomatix.key'),
            'x-system' => config('services.travelomatix.enviroment'),
            'x-Password' => config('services.travelomatix.password'),
            'Accept-Encoding' => 'gzip, deflate',
        ])->post($this->base_url.'webservices/sightseeing/services/CommitBooking', [

            'PassengerDetails' => $passengers,
            'BlockTourId' => $activity_order->BlockTourId,
            'AppReference' => $activity_order->AppReference,
            'ProductDetails' => [
                'ProductCode' => $activity_order->ProductCode,
                'BookingDate' => $activity_order->BookingDate,
                'GradeCode' => $activity_order->GradeCode,
            ],

        ]);

        return $response->json();
    }
}
