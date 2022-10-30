<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\BookFlightOrderStatus;

class BookFlightOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id', 'user_id',
    ];

    public $bookingStatus;
    public $acceptableBookingStatuses = ['cancellation_requested', 'cancellation_pending', 'cancellation_approved', 'cancellation_denied', 'fulfilled'];

    public function passengers()
    {
        return $this->hasMany(FlightPassenger::class, 'flight_order_id');
    }

    public function getCurrentBookingStatusAttribute() {
        $flightOrderStatus = BookFlightOrder::find(1)->bookingStatuses()->get()->last();
        if($flightOrderStatus) {
            return $flightOrderStatus;
        }

        return null;
    }

    public function bookingStatuses()
    {
        return $this->hasMany(BookFlightOrderStatus::class);
    }

    public function setBookingStatus()
    {
        //return $this->hasMany(BookingStatus::class, 'flight_order_id');
    }

    public function supportPackage()
    {
        return $this->hasOne(FlightSupportPackage::class, 'flight_service_package_id');
    }

    public static function boot() {
        parent::boot();

        static::created(function($model) {
            $flightBookingStatus = new BookFlightOrderStatus;
            $flightBookingStatus->status = 'initiated';
            $model->bookingStatuses()->save($flightBookingStatus);
        });

        static::saving(function($model) {
            if(!empty($model->bookingStatus)) {
                if(in_array($model->bookingStatus, $model->acceptableBookingStatuses)) {
                    $flightOrderStatus = BookFlightOrder::find(1)->bookingStatuses()->get()->last();
                    if($flightOrderStatus && ($model->bookingStatus != $flightOrderStatus->status)) {
                        $flightBookingStatus = new BookFlightOrderStatus;
                        $flightBookingStatus->status = $model->bookingStatus;
                        $model->bookingStatuses()->save($flightBookingStatus);
                    }
                } else {
                    $error = \Illuminate\Validation\ValidationException::withMessages([
                       'Booking status' => ['Allowed statuses ' . join(", ", $model->acceptableBookingStatuses)],
                    ]);

                    throw $error;
                }
            }
        });
    }
}
