<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookTripOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
    ];

    public function FlightOrder()
    {
        return $this->hasOne(BookFlightOrder::class, 'order_id');
    }

    public function HotelOrder()
    {
        return $this->hasOne(BookHotelOrder::class, 'order_id');
    }

    public function ActivityOrder()
    {
        return $this->hasOne(BookActivityOrder::class, 'order_id');
    }

    public function GiftCard()
    {
        return $this->belongsTo(GiftCard::class);
    }

    public function Coupon()
    {
        return $this->belongsTo(CouponCode::class, 'coupon_id');
    }

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
