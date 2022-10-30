<?php

namespace App\Services\Trippbo;

use Illuminate\Support\Facades\DB;
use App\Models\WorldCity;

class TravelomatixHotelModel
{
    private $hotel_code;


    private function getHotel()
    {
    }

    public function suggestLocations($keyword)
    {
        $autocomplete = WorldCity::where('name', 'like', $keyword . '%')
            ->take(5)
            ->get();

        $a = [];
        foreach ($autocomplete as $at) {
            $az = $at;
            $az['Name'] = $at['name'];
            $a[] = $az;
        }
        return $a;
    }
}
