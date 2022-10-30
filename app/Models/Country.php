<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $with = ['flag'];

    public function getAllCountriesCached()
    {
        return $this->where('id', '>', 1)->get();
    }

    public function flag()
    {
        return $this->belongsTo(CountryFlag::class, 'code', 'code');
    }
    public function phone_code()

    {
        return $this->hasOne(CountryDialCode::class, 'code', 'code');
    }
}
