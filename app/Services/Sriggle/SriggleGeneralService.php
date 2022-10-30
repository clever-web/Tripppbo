<?php

namespace App\Services\Sriggle;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use App\Models\SriggleCity;
use App\Models\SriggleAirport;
use GuzzleHttp\Psr7\Request;

class SriggleGeneralService
{
    public function AutocompleteCity($keyword)
    {
        return SriggleCity::search($keyword)->get();
   /*      $autocomplete = SriggleCity::where('Name', 'like', $keyword . '%')
            ->take(5)
            ->get();
        return $autocomplete; */
    }
    public function AutocompleteAirport($keyword)
    {
        return SriggleAirport::search($keyword)->get();

      /*   $autocomplete = SriggleAirport::where('Name', 'like', $keyword . '%')
            ->orWhere('Code', 'like', strtoupper($keyword) . '%')
            ->take(10)
            ->get();
        return $autocomplete; */
    }

    public function AirportById($airport_id)
    {
        return SriggleAirport::where('airport_id', $airport_id)->first();
    }
}
