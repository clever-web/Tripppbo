<?php

namespace App\Models;

use App\Models\Trip;
use App\Models\User;
use App\Traits\Reportable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TripJoinRequest extends Model
{
    use HasFactory, Reportable, SoftDeletes;

    protected $reportable_object_name = 'tripJoinRequest'; // required by the Reportable trait
    protected $with = ['user'];
    protected $appends = ['flight', 'personal'];
    public $selected_flight;




    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }

/*     public function getHotelAttribute()
    {
        $order_plan = FundMyTripHotelOrderPlan::where(['user_id' => $this->user_id, 'trip_id' => $this->trip_id])->first();
        return $order_plan;
    } */

    public function getFlightAttribute()
    {
        $order_plan = FundMyTripFlightOrderPlan::where(['user_id' => $this->user_id, 'trip_id' => $this->trip_id])->first();

        return $order_plan;
    }
    public function getPersonalAttribute()
    {
        $order_plan = FundMyTripMemberPersonalInformation::where(['user_id' => $this->user_id, 'trip_id' => $this->trip_id])->first();

        return $order_plan;
    }

    public function passenger()
    {
        $order_plan = FundMyTripPassenger::where(['user_id' => $this->user_id])->first();

        return $order_plan;
    }
}
