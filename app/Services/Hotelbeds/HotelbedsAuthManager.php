<?php

namespace App\Services\Hotelbeds;

use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use App\Services\Trippbo\CurrencyManagement;

class HotelbedsAuthManager
{
    public static function generateXSignature() : String
    {
        $key = config('services.hotelbeds.API_KEY');
        $secret = config('services.hotelbeds.API_SECRET');
        $timestamp =  time();

        $output = hash('sha256', $key . $secret . $timestamp);
        return $output;
    }
}
