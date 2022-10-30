<?php

namespace App\Services\Trippbo;

use Illuminate\Support\Facades\Cache;
use Illuminate\Contracts\Cache\LockTimeoutException;

class CacheManager
{

    private static function nextHotelSearchIndex()
    {
        if (!Cache::has('prepare_hotel_search_index')) {
            Cache::put('prepare_hotel_search_index', 0, 6000);
        }
        $new_index = null;
        $current_index = (int)Cache::get('prepare_hotel_search_index');
        $next_index = $current_index + 1;
        Cache::put('prepare_hotel_search_index', $next_index);
        $new_index = $next_index;
        return $new_index;
    }

    public static function saveHotelSearchData($data)
    {
        $key = CacheManager::nextHotelSearchIndex();

        Cache::put('hotel_search' . $key, $data);
        return $key;
    }
    public static function updateHotels($key, $results)
    {
        if (Cache::has('hotel_search_result' . $key))
        {
            $hotels = Cache::get('hotel_search_result' . $key);

            $all_hotels = array_merge($hotels['Hotels'], $results['Hotels']);
            $hotels['Hotels'] = $all_hotels;
            Cache::put('hotel_search_result' . $key, $hotels);
        }
        else
        {
            Cache::put('hotel_search_result' . $key, $results);
        }

    }

    public static function getSelectedHotel($search_key, $provider_id)
    {
        $hotels = Cache::get('hotel_search_result' . $search_key);
        $selected_hotel = null;
        foreach ($hotels['Hotels'] as $hotel) {
            if ($hotel['HotelProviderSearchId'] == $provider_id) {
                $selected_hotel = $hotel;
            }
        }
        return $selected_hotel;
    }
    public static function getHotelSearchData($key)
    {
        return   Cache::get('hotel_search' . $key);
    }


    private static function nextIndex()
    {
        if (!Cache::has('prepare_flight_index')) {
            Cache::put('prepare_flight_index', 0);
        }
        $new_index = null;
        $current_index = (int)Cache::get('prepare_flight_index');
        $next_index = $current_index + 1;
        Cache::put('prepare_flight_index', $next_index);
        $new_index = $next_index;
        return $new_index;
    }
    public static function cacheFlight($flight)
    {

        $nextIndex = CacheManager::nextIndex();
        Cache::put('prepare_flight_index' . $nextIndex, $flight);
        return $nextIndex;
    }

    public static function getFlightData($key)
    {
        return Cache::get('prepare_flight_index' . $key, null);
    }


    public static function getFlightSearchData($key)
    {
        return Cache::get('prepare_flight_search_index' . $key);
    }
    public static function saveFlightSearchData($data)
    {
        $index = CacheManager::nextIndex();
        Cache::put('prepare_flight_search_index' . $index, $data);
        return $index;
    }
}
