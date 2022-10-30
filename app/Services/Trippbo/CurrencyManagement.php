<?php

namespace App\Services\Trippbo;

use Exception;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use function Psy\debug;

class CurrencyManagement
{
    /* public static function getPriceRapidApi($from, $to, $price)
    {
        $to = ($to == null ? (CurrencyManagement::determine_user_currency() == null ? 'EUR' : CurrencyManagement::determine_user_currency()) : $to);

        $exchange_rate = null;
        if (Cache::has('currency-rate-' . $from . $to)) {
            $exchange_rate = Cache::get('currency-rate-' . $from . $to);
        } else {


            $response = Http::withHeaders([
                'x-rapidapi-host' => 'currency-converter5.p.rapidapi.com',
                'x-rapidapi-key' => '1edde5385emsh63e8d266b4358b6p113aadjsn3d762b8f43a9'
            ])->get('https://currency-converter5.p.rapidapi.com/currency/convert', [
                'format' => 'json',
                'from' => $from,
                'to' => $to,
                'amount' => 1
            ]);

            $key = $from . $to;

            $exchange_rate = $response->json()['rates'][$to]['rate'];

            Cache::put('currency-rate-' . $from . $to, $exchange_rate, 3600);
        }

        return ceil($exchange_rate * $price);
    }*/

    public static function getPrice($from, $to, $price, $returnExchangeRate = null)
    {
        $to = ($to == null ? self::determine_user_currency() : $to);
        $exchange_rate = null;
        if ($from == $to && ! $returnExchangeRate) {
            return ceil($price);
        }

        if (Cache::has('currency-rate-'.$from.$to)) {
            $exchange_rate = Cache::get('currency-rate-'.$from.$to);
        } else {
            try {
                $response = Http::get('https://apilayer.net/api/live?access_key=94ad23cd08d3ce5425959ed92f226a82&currencies='.$to.'&source='.$from.'&format=1');
                $key = $from.$to;
                $exchange_rate = $response->json()['quotes'][$from.$to];
            } catch (Exception $ex) {
                abort(404, $ex->getMessage());
            }

            Cache::put('currency-rate-'.$from.$to, $exchange_rate, 3600);
        }
        if ($returnExchangeRate == true) {
            return $exchange_rate;
        }

        return ceil($exchange_rate * $price);
    }

    public static function determine_user_currency()
    {
        return 'USD';
        $default_currency = 'USD';

        if (session('default_currency')) {
            return session('default_currency');
        }

        $request = request();
        $response = Http::withHeaders([
            'x-rapidapi-host' => 'ip-geo-location.p.rapidapi.com',
            'x-rapidapi-key' => '1edde5385emsh63e8d266b4358b6p113aadjsn3d762b8f43a9',
        ])->get('https://ip-geo-location.p.rapidapi.com/ip/'.$request->ip(), [
            'format' => 'json',
        ]);
        $currencyCode = $default_currency;
        try {
            $currencyCode = $response->json()['currency']['code'] ? $response->json()['currency']['code'] : $default_currency;
        } catch (Exception $ex) {
            $currencyCode = $default_currency;
        }
        session(['default_currency' => $currencyCode]);

        return $currencyCode;
    }
}
