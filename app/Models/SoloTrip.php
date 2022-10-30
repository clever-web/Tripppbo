<?php

namespace App\Models;

use App\Traits\Reportable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class SoloTrip extends Model
{
    use HasFactory, Reportable, SoftDeletes;

    protected $reportable_object_name = 'soloTrip'; // required by the Reportable trait

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'startdate' => 'datetime',
        'enddate' => 'datetime',

    ];

    protected $with = ['destinationCity', 'user'];

    public function destinationCountry()
    {
        return $this->belongsTo(Country::class, 'destination_country_id');
    }
    public function destinationCity()
    {
        return $this->belongsTo(WorldCity::class, 'destination_city_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orders()
    {
        return $this->hasMany(SoloTripOrder::class, 'trip_id');
    }

    public function soloTripDonation()
    {
        return $this->hasMany(SoloTripOrder::class, 'trip_id')->where('completed', true)->where('refunded', false);
    }

    public function totalAmountRaised()
    {
        return $this->orders->where('completed', true)->where('refunded', false)->sum('amount');
    }

    public function totalAmountOfDonations()
    {
        return $this->orders->where('completed', true)->where('refunded', false)->count();
    }

    public function redeemBalance()
    {
        if ($this->redeemed) {
            abort(403);
        }
        $this->redeemed = true;
        $transaction = new BalanceTransaction();
        $transaction->user_id = $this->user->id;
        $transaction->amount = $this->totalAmountRaised();
        $transaction->reason = 'Redeemded Collected Funds #'.$this->id;

        DB::beginTransaction();

        try {
            $this->save();
            $transaction->save();
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }

        DB::commit();
    }
}
