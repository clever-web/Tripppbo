<?php

namespace App\Models;

use App\Jobs\FinalizeTrip;
use App\Models\User;
use App\Traits\Reportable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory, Reportable;

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'start_month' => 'datetime',

    ];

    protected $reportable_object_name = 'trip'; // required by the Reportable trait

    protected $with = ['destinationCity', 'user'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function destinationCountry()
    {
        return $this->belongsTo(Country::class, 'destination_country_id');
    }
    public function destinationCity()
    {
        return $this->belongsTo(WorldCity::class, 'destination_city_id');
    }
    public function joinRequests()
    {
        return $this->hasMany(TripJoinRequest::class);
    }

    public function members()
    {
        return $this->joinRequests->where('trip_id', $this->id)->where('accepted', true);
    }

    public function unansweredRequests()
    {
        return $this->joinRequests->where('trip_id', $this->id)->where('accepted', null)->where('declined', null);
    }

    public function isMember($user_id)
    {
        return $this->members()->contains('user_id', $user_id);
    }

    public function tripOrder()
    {
        return $this->hasOne(FundMyTripOrder::class);
    }

    public function finalizeTrip()
    {
        $job = new FinalizeTrip($this);

        dispatch($job);
    }

    public function passengerInformationEntered()
    {
        $members = $this->members();
        $yes = true;
        foreach ($members as $member) {
            if (! $member->passenger()) {
                $yes = false;
            }
        }

        return $yes;
    }

    public function canFinalize()
    {
        $members = $this->members();
        $yes = false;
        foreach ($members as $member) {
            if ($member->passenger() && ($member->flight() || $member->hotel())) {
                $yes = true;
            }
        }

        return $yes;
    }

    public function tripDate()
    {
        $date = new Carbon($this->start_month);

        return $date->format('Y, F');
    }
}
