<?php

namespace App\Http\Controllers;

use App\Models\CouponCode;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function verifyCoupon(Request $r)
    {
        $coupon =    CouponCode::where('coupon_code', $r['coupon_code'])->first();

        if ($coupon)
        {
            return $coupon;
        }
        else
        {
            abort("404", "Coupon code was not found");
        }
    }



}
