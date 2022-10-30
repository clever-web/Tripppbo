<?php

namespace App\Services\Trippbo;

class SessionController
{
    public static function setHotel($hotel)
    {
        session(['pending_hotel' => $hotel]);
    }

    public static function getHotel()
    {
        return session('pending_hotel', null);
    }

    public static function setFlight($flight)
    {
        session(['pending_flight' => $flight]);
    }

    public static function getFlight()
    {
        return session('pending_flight', null);
    }

    public static function emptyPendingFlight()
    {
        session(['pending_review_flight_trip_id' => null]);
    }

    public static function setActivity($activity)
    {
        session(['pending_activity' => $activity]);
    }

    public static function regenerateOrder()
    {
        session(['order_id' => null]);
    }
}
