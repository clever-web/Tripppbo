<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'reported_by_user_id');
    }

    public function scopeUnhandled($query)
    {
        return $query->where('handled', false);
    }
}
