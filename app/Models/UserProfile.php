<?php

namespace App\Models;

use App\Traits\Reportable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory, Reportable;

    protected $fillable = [
        'user_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'date_of_birth' => 'datetime',
    ];

    protected $reportable_object_name = 'userProfile'; // required by the Reportable trait

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
