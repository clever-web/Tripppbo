<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookHotelOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id', 'user_id',
    ];

    public function passengers()
    {
        return $this->hasMany(HotelPassenger::class, 'hotel_order_id');
    }
}
