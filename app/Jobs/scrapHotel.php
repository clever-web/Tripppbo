<?php

namespace App\Jobs;

use App\Models\TravelomatixHotel;
use App\Services\Travelomatix\Hotels;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Cache;

class scrapHotel implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $hotel_result_token;

    protected $city_id;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($hotel_result_token, $city_id)
    {
        $this->hotel_result_token = $hotel_result_token;
        $this->city_id = $city_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $hotels = new Hotels();
        $hotel = $hotels->getHotelDetails($this->hotel_result_token);
        /*         $cache_hotel = [];
                $cache_hotel['hotel_code'] = $hotel['HotelCode'];
                $cache_hotel['city_id'] = $this->city_id;
                $cache_hotel['hotel_facilities'] = json_encode($hotel['HotelFacilities']);
                $cache_hotel['hotel_name'] = $hotel['HotelName'];
                $cache_hotel['longitude'] = $hotel['HotelCode'];
                $cache_hotel['hotel_code'] = $hotel['Longitude'];
                $cache_hotel['latitude'] = $hotel['Latitude'];
                Cache::put('hotel_'.$hotel['HotelCode'], $cache_hotel); */

        $db_hotel = new TravelomatixHotel();
        $db_hotel->hotel_code = $hotel['HotelCode'];
        $db_hotel->city_id = $this->city_id;
        $db_hotel->hotel_facilities = json_encode($hotel['HotelFacilities']);
        $db_hotel->hotel_name = $hotel['HotelName'];
        $db_hotel->longitude = $hotel['Longitude'];
        $db_hotel->latitude = $hotel['Latitude'];
        $db_hotel->address = $hotel['Address'];
        $db_hotel->images = json_encode($hotel['Images']);
        $db_hotel->save();
    }
}
