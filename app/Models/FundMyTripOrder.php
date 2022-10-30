<?php

namespace App\Models;

use App\Services\Trippbo\CurrencyManagement;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;

class FundMyTripOrder extends Model
{
    use HasFactory;

    public function hotelOrders()
    {
        return $this->hasMany(FundMyTripHotelOrderPlan::class, 'fund_my_trip_order_id');
    }

    public function flightOrders()
    {
        return $this->hasMany(FundMyTripFlightOrderPlan::class, 'fund_my_trip_order_id');
    }

    public function passengers()
    {
        return  DB::table('fund_my_trip_passengers')->where('trip_id', '=', $this->trip->id)->get();
    }

    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }

    public function getTotalPriceInUSD()
    {
        $total = 0;

        foreach ($this->hotelOrders()->get() as $order) {
            if ($order->last_price !== '' && $order->last_price !== null) {
                $total += CurrencyManagement::getPrice($order->last_price_currency, 'USD', $order->last_price);
            }
        }
        foreach ($this->flightOrders()->get() as $order) {
            if ($order->last_price !== '' && $order->last_price !== null) {
                $total += CurrencyManagement::getPrice($order->last_price_currency, 'USD', $order->last_price);
            }
        }

        return $total;
    }
}
