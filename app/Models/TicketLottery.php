<?php

namespace App\Models;

use App\Traits\Reportable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketLottery extends Model
{
    use HasFactory, Reportable;

    protected $reportable_object_name = 'ticketLottery'; // required by the Reportable trait

    public function lotteryEntries()
    {
        return $this->hasMany(TicketLotteryOrder::class);
    }

    public function winner()
    {
        return $this->belongsTo(User::class, 'winner_user_id');
    }
}
