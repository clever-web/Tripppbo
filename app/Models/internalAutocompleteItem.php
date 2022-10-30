<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class internalAutocompleteItem extends Model
{
    use HasFactory;
    protected $with = ['country', 'city'];

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }
    public function city()
    {
        return $this->belongsTo(WorldCity::class, 'city_id');
    }


}
