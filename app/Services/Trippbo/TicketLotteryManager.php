<?php

namespace App\Services\Trippbo;

use App\Models\TicketLotteryOrder;

class TicketLotteryManager
{
    public function getUserEntries($user_id)
    {
        $user_orders = TicketLotteryOrder::where('user_id', $user_id)->where('completed', true)->get();

        return $user_orders;
    }
}
