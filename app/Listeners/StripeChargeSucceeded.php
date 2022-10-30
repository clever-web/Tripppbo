<?php

namespace App\Listeners;

use App\Models\BookTripOrder;
use App\Models\SoloTripOrder;
use App\Models\TicketLotteryOrder;
use App\Models\Trip;
use App\Services\Trippbo\TrippboOrder;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Laravel\Cashier\Events\WebhookReceived;

class StripeChargeSucceeded
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(WebhookReceived $event)
    {
        if ($event->payload['type'] === 'charge.succeeded') {
            Log::debug($event->payload);
            $payment_intent = $event->payload['data']['object']['payment_intent'];
            if (array_key_exists('type', $event->payload['data']['object']['metadata']) && ['metadata']['type'] == 'fund_my_trip_solo') {
                Log::debug('solo '.$payment_intent);
                $tripOrder = SoloTripOrder::where('payment_intent_id', $payment_intent)->first();
                $tripOrder->completed = true;
                $tripOrder->save();
            } elseif (array_key_exists('type', $event->payload['data']['object']['metadata']) && $event->payload['data']['object']['metadata']['type'] == 'ticket_lottery') {
                Log::debug('ticket lottery '.$payment_intent);
                $tripOrder = TicketLotteryOrder::where('payment_intent_id', $payment_intent)->first();
                $tripOrder->completed = true;
                $tripOrder->save();
            } else {
                Log::debug('book trip '.$payment_intent);
                $order = BookTripOrder::where('stripe_payment_intent_id', $payment_intent)->firstOrFail();
                $ord = new TrippboOrder($order);
                $ord->markAsPaidViaStripe();
                $ord->processOrder();
            }
        }
    }
}
