<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoloTripOrder extends Model
{
    use HasFactory;

    public function trip()
    {
        return $this->belongsTo(SoloTrip::class, 'trip_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function completedOrders()
    {
        return $this->where('completed', true)->where('refunded', false)->get();
    }

    public function totalAmountRaised()
    {
        return $this->where('completed', true)->where('refunded', false)->sum('amount');
    }
}
