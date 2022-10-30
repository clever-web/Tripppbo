<?php

namespace App\Models;

use App\Services\Trippbo\CurrencyManagement;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GiftCard extends Model
{
    use HasFactory, SoftDeletes;

    public function RemainingValueInTargetCurrency($currency)
    {
        return CurrencyManagement::getPrice($this->currency, $currency, $this->value - $this->redeemed_portion);
    }
}
