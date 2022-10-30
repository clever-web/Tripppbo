<?php

namespace App\Jobs;

use App\Models\FundMyTripHotelOrderPlan;
use App\Notifications\SingleTripFinalized;
use App\Services\Trippbo\FundMyTripFlightBookingBot;
use App\Services\Trippbo\FundMyTripHotelBookingBot;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Notification;

class FinalizeSingleTrip implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $hotel_order;

    protected $flight_order;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($hotel_order, $flight_order)
    {
        $this->hotel_order = $hotel_order;
        $this->flight_order = $flight_order;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if ($this->hotel_order !== null) {
            $bot = new FundMyTripHotelBookingBot();
            $bot->getHotelOrderInformation($this->hotel_order);
            $result = [

                'event' => 'fundmytrip.single-trip-finalized-hotel',
                'user_id' => $this->hotel_order->user_id,
                'hotel_price' => $this->hotel_order->last_price,
                'hotel_price_currency' => $this->hotel_order->last_price_currency,

            ];
            foreach ($this->hotel_order->tripOrder->trip->members() as $member) {
                $member->user->notify(new SingleTripFinalized($result));
            }
        }
        if ($this->flight_order !== null) {
            $bot = new FundMyTripFlightBookingBot();

            $bot->getFlightOrderInformation($this->flight_order);
            $result = [
                'event' => 'fundmytrip.single-trip-finalized-flight',
                'user_id' => $this->flight_order->user_id,
                'flight_price' => $this->flight_order->last_price,
                'flight_price_currency' => $this->flight_order->last_price_currency,

            ];
            foreach ($this->flight_order->tripOrder->trip->members() as $member) {
                $member->user->notify(new SingleTripFinalized($result));
            }
        }
    }
}
