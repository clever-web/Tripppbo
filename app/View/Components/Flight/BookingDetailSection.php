<?php

namespace App\View\Components\Flight;

use Illuminate\View\Component;

class BookingDetailSection extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $flightBookingDetail;
    public function __construct($flightBookingDetail)
    {
        $this->flightBookingDetail = $flightBookingDetail;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */

    public function render()
    {
        return view('components.flight.booking-detail-section');
    }
}
