<?php

namespace App\Services\Travelomatix;

use App\Models\ActivityAutocomplete;
use App\Models\airportAutocomplete;
use App\Models\HotelsAPICity;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use PhpParser\Node\Expr\Cast;

class Autocomplete
{
    private $base_url;

    public function autocomplete($keyword)
    {
        $autocomplete = HotelsAPICity::where('city_name', 'like', $keyword.'%')->take(5)->get();

        return $autocomplete;
    }

    public function autocomplete_airport($keyword)
    {
        $autocomplete = airportAutocomplete::where('CityName', 'like', $keyword.'%')->orWhere('AirportName', 'like', $keyword.'%')->orWhere('Code', 'like', $keyword.'%')->take(5)->get();

        return $autocomplete;
    }

    public function autocomplete_activity_2($keyword)
    {
        $autocomplete = ActivityAutocomplete::where('name', 'like', $keyword.'%')->take(5)->get();

        return $autocomplete;
    }
}
