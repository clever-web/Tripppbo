<?php

namespace App\Http\Controllers;

use App\Services\Amadeus;
use Illuminate\Http\Request;

class AmadeusController extends Controller
{
    public function autocomplete($keyword)
    {
        $a = new Amadeus();

        return   $a->autocompleteAirport($keyword);

        // $a->test();
    }

    public function autocompleteAirport($keyword)
    {
        $a = new Amadeus();

        return   $a->autocompleteAirport($keyword);

        // $a->test();
    }
}
