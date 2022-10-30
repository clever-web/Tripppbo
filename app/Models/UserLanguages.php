<?php

namespace App\Models;

use Database\Seeders\TrippboUserLanguages;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLanguages extends Model
{
    use HasFactory;

    public function language()
    {
        return $this->belongsTo(TrippboUserLanguage::class, 'language_id');
    }
}
