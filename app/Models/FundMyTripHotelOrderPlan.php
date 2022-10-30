<?php

namespace App\Models;

use App\Jobs\FinalizeSingleTrip;
use App\Services\Trippbo\FundMyTripHotelBookingBot;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FundMyTripHotelOrderPlan extends Model
{
    use HasFactory;

    public function renew_order()
    {
        $job = new FinalizeSingleTrip($this, null);
        dispatch($job);
    }

    public function tripOrder()
    {
        return $this->belongsTo(FundMyTripOrder::class, 'fund_my_trip_order_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
