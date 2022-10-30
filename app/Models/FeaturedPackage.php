<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeaturedPackage extends Model
{
    use HasFactory;
    protected $casts = [
        'default_package_date' => 'date',
    ];
}
