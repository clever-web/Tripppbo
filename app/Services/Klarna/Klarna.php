<?php

namespace App\Services\Klarna;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class Klarna
{
    private $base_url;

    private $username;

    private $password;

    public function __construct()
    {
        $this->username = config('services.klarna.username');
        $this->password = config('services.klarna.password');
        $this->base_url = 'https://api.playground.klarna.com/';
    }

    public function createOrder($totalPrice, $tax, $orderlines, $orderId, $currency)
    {
        $response = Http::withHeaders(
            [
                'content-type' => 'application/json',

            ]
        )->withBasicAuth($this->username, $this->password)
            ->post(
                $this->base_url.'checkout/v3/orders',
                [
                    'purchase_country' => 'SE',
                    'purchase_currency' => $currency,
                    'locale' => 'en',
                    'order_amount' => $totalPrice,
                    'order_tax_amount' => $tax,
                    'shipping_counties' =>  ['AD', 'AE', 'AG', 'AI', 'AL', 'AM', 'AQ', 'AR', 'AS', 'AT', 'AU', 'AW', 'AX', 'AZ', 'BA', 'BB', 'BD', 'BE', 'BF', 'BG', 'BH', 'BJ', 'BL', 'BM', 'BN', 'BO', 'BQ', 'BR', 'BS', 'BT', 'BW', 'BY', 'BZ', 'CA', 'CF', 'CH', 'CI', 'CK', 'CL', 'CM', 'CN', 'CO', 'CR', 'CU', 'CV', 'CW', 'CX', 'CY', 'CZ', 'DE', 'DJ', 'DK', 'DM', 'DO', 'DZ', 'EC', 'EE', 'EG', 'ER', 'ES', 'ET', 'FI', 'FJ', 'FK', 'FM', 'FO', 'FR', 'GA', 'GB', 'GD', 'GE', 'GF', 'GG', 'GH', 'GI', 'GL', 'GM', 'GN', 'GP', 'GR', 'GS', 'GT', 'GU', 'GY', 'HK', 'HN', 'HR', 'HU', 'ID', 'IE', 'IL', 'IM', 'IN', 'IS', 'IT', 'JE', 'JM', 'JO', 'JP', 'KE', 'KG', 'KI', 'KM', 'KN', 'KR', 'KW', 'KY', 'KZ', 'LA', 'LA', 'LB', 'LC', 'LI', 'LK', 'LR', 'LS', 'LT', 'LU', 'LV', 'MA', 'MC', 'MD', 'ME', 'MF', 'MG', 'MH', 'MK', 'MK', 'ML', 'MM', 'MN', 'MO', 'MP', 'MQ', 'MR', 'MT', 'MU', 'MV', 'MW', 'MX', 'MY', 'MZ', 'NA', 'NC', 'NE', 'NF', 'NG', 'NI', 'NL', 'NO', 'NP', 'NR', 'NU', 'NZ', 'OM', 'PA', 'PE', 'PF', 'PG', 'PH', 'PK', 'PL', 'PM', 'PR', 'PS', 'PT', 'PW', 'PY', 'QA', 'RE', 'RO', 'RS', 'RU', 'RW', 'SA', 'SB', 'SC', 'SE', 'SG', 'SH', 'SI', 'SJ', 'SK', 'SL', 'SM', 'SN', 'SR', 'ST', 'SV', 'SX', 'SZ', 'TC', 'TF', 'TG', 'TH', 'TJ', 'TK', 'TL', 'TO', 'TR', 'TT', 'TV', 'TW', 'TZ', 'UA', 'UG', 'UM', 'US', 'UY', 'UZ', 'VA', 'VC', 'VG', 'VI', 'VN', 'VU', 'WF', 'WS', 'XK', 'YT', 'ZA', 'ZM', 'ZW'],
                    'billing_counties' =>  ['AD', 'AE', 'AG', 'AI', 'AL', 'AM', 'AQ', 'AR', 'AS', 'AT', 'AU', 'AW', 'AX', 'AZ', 'BA', 'BB', 'BD', 'BE', 'BF', 'BG', 'BH', 'BJ', 'BL', 'BM', 'BN', 'BO', 'BQ', 'BR', 'BS', 'BT', 'BW', 'BY', 'BZ', 'CA', 'CF', 'CH', 'CI', 'CK', 'CL', 'CM', 'CN', 'CO', 'CR', 'CU', 'CV', 'CW', 'CX', 'CY', 'CZ', 'DE', 'DJ', 'DK', 'DM', 'DO', 'DZ', 'EC', 'EE', 'EG', 'ER', 'ES', 'ET', 'FI', 'FJ', 'FK', 'FM', 'FO', 'FR', 'GA', 'GB', 'GD', 'GE', 'GF', 'GG', 'GH', 'GI', 'GL', 'GM', 'GN', 'GP', 'GR', 'GS', 'GT', 'GU', 'GY', 'HK', 'HN', 'HR', 'HU', 'ID', 'IE', 'IL', 'IM', 'IN', 'IS', 'IT', 'JE', 'JM', 'JO', 'JP', 'KE', 'KG', 'KI', 'KM', 'KN', 'KR', 'KW', 'KY', 'KZ', 'LA', 'LA', 'LB', 'LC', 'LI', 'LK', 'LR', 'LS', 'LT', 'LU', 'LV', 'MA', 'MC', 'MD', 'ME', 'MF', 'MG', 'MH', 'MK', 'MK', 'ML', 'MM', 'MN', 'MO', 'MP', 'MQ', 'MR', 'MT', 'MU', 'MV', 'MW', 'MX', 'MY', 'MZ', 'NA', 'NC', 'NE', 'NF', 'NG', 'NI', 'NL', 'NO', 'NP', 'NR', 'NU', 'NZ', 'OM', 'PA', 'PE', 'PF', 'PG', 'PH', 'PK', 'PL', 'PM', 'PR', 'PS', 'PT', 'PW', 'PY', 'QA', 'RE', 'RO', 'RS', 'RU', 'RW', 'SA', 'SB', 'SC', 'SE', 'SG', 'SH', 'SI', 'SJ', 'SK', 'SL', 'SM', 'SN', 'SR', 'ST', 'SV', 'SX', 'SZ', 'TC', 'TF', 'TG', 'TH', 'TJ', 'TK', 'TL', 'TO', 'TR', 'TT', 'TV', 'TW', 'TZ', 'UA', 'UG', 'UM', 'US', 'UY', 'UZ', 'VA', 'VC', 'VG', 'VI', 'VN', 'VU', 'WF', 'WS', 'XK', 'YT', 'ZA', 'ZM', 'ZW'],

                    'order_lines' => $orderlines,
                    'merchant_urls' => [
                        'terms' => 'https://www.example.com/terms.html',
                        'checkout' => 'https://www.trippbo.com/checkout/confirmation?order_id='.$orderId,
                        'confirmation' => 'https://www.example.com/confirmation.html?order_id='.$orderId,
                        'push' => 'https://testingserver101.ml/api/klarna_push?order_id='.$orderId,
                        'country_change' => 'https://country_change?klarna_order_id='.$orderId,
                    ],
                ]

            );

        return $response;
    }

    public function getOrder($orderId)
    {
        $response = Http::withHeaders(
            [
                'content-type' => '*',

            ]
        )->withBasicAuth($this->username, $this->password)
            ->get($this->base_url.'ordermanagement/v1/orders/'.$orderId);

        return $response;
    }
}
