<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class HotelbedsHotelBookingConfirmation extends Mailable
{
    use Queueable, SerializesModels;


    private $booking_information;
    private $hotel_order;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($booking_information, $hotel_order)
    {

        $this->booking_information = $booking_information;
        $this->hotel_order = $hotel_order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.booktrip.orders.hotelbeds-hotel-booking-confirmation', ['booking_information' => $this->booking_information, 'order' => $this->hotel_order]);
    }
}
