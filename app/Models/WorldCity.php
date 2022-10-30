<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorldCity extends Model
{
    use HasFactory;

    protected $with = ['country'];

    public function country()
    {
        return $this->belongsTo(Country::class, 'country' , 'code');
    }
}
