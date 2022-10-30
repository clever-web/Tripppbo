<?php

namespace App\Services\Trippbo;

use App\Jobs\ProcessTrippboOrder;
use App\Models\BookTripOrder;

class TrippboOrder
{
    private $order;

    public function __construct($order)
    {
        $this->order = $order;
    }

    public function markAsPaidViaKlarna()
    {
        $this->order->paid = true;
        $this->order->paid_with_klarna = true;
        $this->order->save();
    }

    public function markAsPaidViaStripe()
    {
        $this->order->paid = true;
        $this->order->paid_with_stripe = true;
        $this->order->save();
    }

    public function processOrder()
    {
        ProcessTrippboOrder::dispatch($this->order);
    }
}
