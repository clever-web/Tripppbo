<?php

namespace App\Services\Trippbo;

use Illuminate\Support\Str;

class BookingsManager
{
    public function generatePasskey() : String
    {
        return Str::random(60);
    }

}
