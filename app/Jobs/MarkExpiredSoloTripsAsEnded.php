<?php

namespace App\Jobs;

use App\Models\SoloTrip;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class MarkExpiredSoloTripsAsEnded implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Log::debug('worked');
        $date = Carbon::now()->subDays(60);

        $trips = SoloTrip::whereDate('created_at', '>=', $date->toDateString())->get();
        foreach ($trips as $trip) {
            $trip_date = new Carbon($trip->created_at);

            $trip_date = $trip_date->addDays($trip->durationInDays);

            if (Carbon::now()->diffInMinutes($trip_date, false) <= 0) {
                $trip->ended = true;
                $trip->redeemBalance();
                $trip->save();
            }
        }
        //
    }
}
