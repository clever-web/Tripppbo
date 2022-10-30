<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HolidayTheme extends Model
{
    use HasFactory;

    protected $fillable = [
        'theme_id',
        'theme_name',
        'is_featured',
        'theme_picture'
    ];
}
