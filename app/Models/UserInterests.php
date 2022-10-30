<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInterests extends Model
{
    use HasFactory;

    public function interest()
    {
        return $this->belongsTo(TrippboUserInterests::class, 'interest_id');
    }
}
