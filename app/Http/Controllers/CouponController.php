<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coupon;
use Illuminate\Support\Facades\Auth;

class CouponController extends Controller
{
    public function coupon(){
        $coupons = Coupon::where('store_id', Auth::user()->store->id);
        dd($coupons);
        return view('pages.checkout.index', compact('coupons'));
    }
}
