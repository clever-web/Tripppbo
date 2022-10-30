<?php

namespace App\Models;

use App\Jobs\FinalizeSingleTrip;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FundMyTripFlightOrderPlan extends Model
{
    use HasFactory;
    protected $fillable = [
        'trip_id',
        'user_id'
    ];
    protected $casts = [
        'flight' => 'array',
        'search_data' => 'array'
    ];



    public function tripOrder()
    {
        return $this->belongsTo(FundMyTripOrder::class, 'fund_my_trip_order_id');
    }

    public function renew_order()
    {
        $job = new FinalizeSingleTrip(null, $this);
        dispatch($job);
    }

    public function getOrigin()
    {
        $airportCode = $this->origin_airport_code;
        $result = airportAutocomplete::where('Code', $airportCode)->first();

        return $result;
    }

    public function getDestination()
    {
        $airportCode = $this->destination_airport_code;
        $result = airportAutocomplete::where('Code', $airportCode)->first();

        return $result;
    }

    public function getOperatorName()
    {
        $operator_code = explode(',', $this->operator_code)[0];

        $result = Airline::where('code', $operator_code)->first();

        return $result->name;
    }

    public function getReturnOperatorName()
    {
        $operator_code = explode(',', $this->return_operator_code)[0];

        $result = Airline::where('code', $operator_code)->first();

        return $result->name;
    }

    public function getFirstFlightInformation()
    {
        $operator_code = explode(',', $this->operator_code)[0];
        $flight_number = explode(',', $this->flight_number)[0];

        return [$operator_code, $flight_number];
    }

    public function getFirstFlightReturnInformation()
    {
        $operator_code = explode(',', $this->return_operator_code)[0];
        $flight_number = explode(',', $this->return_flight_number)[0];

        return [$operator_code, $flight_number];
    }
}
