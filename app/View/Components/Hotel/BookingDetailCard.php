<?php

namespace App\View\Components\Hotel;

use Illuminate\View\Component;

class BookingDetailCard extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $bookingInfo;
    public function __construct($bookingInfo = [])
    {
        $this->bookingInfo = $bookingInfo;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.hotel.booking-detail-card');
    }
}
