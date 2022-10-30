<?php

namespace App\View\Components\Flight;

use Illuminate\View\Component;

class BookingGistAndActions extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $bookingInfo;
    public function __construct($bookingInfo)
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
        return view('components.flight.booking-gist-and-actions');
    }
}
