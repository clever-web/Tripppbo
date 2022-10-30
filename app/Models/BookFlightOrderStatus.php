<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookFlightOrderStatus extends Model
{
    use HasFactory;

    public function booking() {
        return $this->belongsTo(BookiFlightOrder::class, 'booking_status_id');
    }
}
