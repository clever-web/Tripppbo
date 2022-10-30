<?php

namespace App\Jobs;

use App\Models\User;
use App\Notifications\TripFinalized;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class FinalizeTrip implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $trip;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($trip)
    {
        $this->trip = $trip;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $hotel_orders = $this->trip->tripOrder->hotelOrders()->get();
        $flight_orders = $this->trip->tripOrder->flightOrders()->get();

        foreach ($hotel_orders as $hotel_order) {
            $hotel_order->renew_order();
        }
        foreach ($flight_orders as $flight_order) {
            $flight_order->renew_order();
        }
        $this->trip->tripOrder->last_finalized = Carbon::now();
        $this->trip->tripOrder->save();
        $user = User::find($this->trip->host_id);
        $user->notify(new TripFinalized($this->trip));
    }
}
