<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FlightBookingConfirmation extends Mailable
{
    use Queueable, SerializesModels;
    private $booking_information;
    private $flight_order;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($booking_information, $flight_order)
    {
        $this->booking_information = $booking_information;
        $this->flight_order = $flight_order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.booktrip.orders.flight-booking-confirmation', ['booking_information' => $this->booking_information, 'order' => $this->flight_order]);
    }
}
