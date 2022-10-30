<?php

namespace App\Jobs;

use App\Mail\FlightBookingConfirmation;
use App\Models\BookActivityOrder;
use App\Models\BookFlightOrder;
use App\Models\BookHotelOrder;
use App\Models\BookTripHotelbedsHotelOrder;
use App\Services\Hotelbeds\HotelService;
use App\Services\Travelomatix\Activities;
use App\Services\Travelomatix\Flights;
use App\Services\Travelomatix\Hotels;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\Middleware\WithoutOverlapping;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ProcessTrippboOrder implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $backoff = 300;

    protected $order;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($order)
    {
        $this->order = $order;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if ($this->order->processed == false && $this->order->processing == false) {
            $hotelOrder = BookHotelOrder::where('order_id', $this->order->id)->first();
            if ($hotelOrder !== null) {
                $travelomatix_hotels = new Hotels();
                $result = $travelomatix_hotels->commitBooking($hotelOrder);
                $hotelOrder->commit_book_response = $result;
                if (array_key_exists('Status', $result)) {
                    if ($result['Status'] !== 1) {
                        $hotelOrder->requires_attention = true;
                    } else {
                        $hotelOrder->booked_successfully = true;
                    }
                } else {
                    $hotelOrder->requires_attention = true;
                }
                $hotelOrder->save();
            }
            $flightOrder = BookFlightOrder::where('order_id', $this->order->id)->first();

            if ($flightOrder !== null) {
                $travelomatix_flights = new Flights();
                $result = $travelomatix_flights->commitBooking($flightOrder);
                $flightOrder->commit_book_response = $result;
                if (array_key_exists('Status', $result)) {
                    if ($result['Status'] !== 1) {
                        $flightOrder->requires_attention = true;
                    } else {
                        $flightOrder->booked_successfully = true;
                    }
                } else {
                    $flightOrder->requires_attention = true;
                }

                $flightOrder->save();
                Mail::to(env('DEBUG_REPORT_MAIL', 'tarek.aldwiri@gmail.com'))->send(new FlightBookingConfirmation($result,$flightOrder));
            }
            $activityOrder = BookActivityOrder::where('order_id', $this->order->id)->first();

            if ($activityOrder !== null) {
                $travelomatix_activity = new Activities();
                $result = $travelomatix_activity->commitBooking($activityOrder);
                $activityOrder->commit_book_response = $result;
                if (array_key_exists('Status', $result)) {
                    if ($result['Status'] !== 1) {
                        $activityOrder->requires_attention = true;
                    } else {
                        $activityOrder->booked_successfully = true;
                    }
                } else {
                    $activityOrder->requires_attention = true;
                }
                $activityOrder->save();
            }

            $HotelbedsHotelOrder = BookTripHotelbedsHotelOrder::where('order_id', $this->order->id)->first();
            if ($HotelbedsHotelOrder !== null) {
                $hotelbeds_hotel = new HotelService();
                $result = $hotelbeds_hotel->bookHotel($HotelbedsHotelOrder);
                $HotelbedsHotelOrder->booking_response = $result;

           /*      if (array_key_exists('Status', $result)) {
                    if ($result['Status'] !== 1) {
                        $hotelOrder->requires_attention = true;
                    } else {
                        $hotelOrder->booked_successfully = true;
                    }
                } else {
                    $hotelOrder->requires_attention = true;
                } */
                Mail::to('tarek.aldwiri@gmail.com')->send(new FlightBookingConfirmation($result,$HotelbedsHotelOrder));
                $HotelbedsHotelOrder->save();
            }



            $this->order->processing = false;
            $this->order->save();
        }
    }

    public function middleware()
    {
        return [new WithoutOverlapping($this->order->id)];
    }
}
