<?php

namespace App\Services\Trippbo;

use App\Models\GiftCard;

class GiftCardManager
{
    public static function generateGiftCardCode()
    {
        return $code = random_int(0, 9).random_int(0, 9).random_int(0, 9).random_int(0, 9).'-'.random_int(0, 9).random_int(0, 9).random_int(0, 9).random_int(0, 9).'-'.random_int(0, 9).random_int(0, 9).random_int(0, 9).random_int(0, 9).'-'.random_int(0, 9).random_int(0, 9).random_int(0, 9).random_int(0, 9);
    }

    public function generateGIftCard($currency, $value, $exp_date, $active = false)
    {
        $code = self::generateGiftCardCode();
        $gift_card = new GiftCard();
        while (GiftCard::where('code', $code)->exists()) {
            $code = self::generateGiftCardCode();
        }
        $gift_card->code = $code;
        $gift_card->currency = $currency;
        $gift_card->value = $value;
        $gift_card->active = $active;
        $gift_card->save();
    }
}
