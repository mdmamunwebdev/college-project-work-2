<?php

namespace App\Models\rioHome;

use App\Models\rioAdmin\Coupon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartCoupon extends Model
{
    use HasFactory;

    private static $cartCoupon;
    public static function cartCouponNew($req, $id) {
        self::$cartCoupon = new CartCoupon();
        self::$cartCoupon->user_ip = $req->ip();
        self::$cartCoupon->coupon_id = $id;
        self::$cartCoupon->save();
        return self::$cartCoupon;
    }

    public static function cartCouponDel($req) {
        self::$cartCoupon = CartCoupon::where('user_ip', $req->ip())->get();
        foreach (self::$cartCoupon as  $cartCoupon) {
            CartCoupon::find($cartCoupon->id)->delete();
        }
    }

    public function coupon() {
        return $this->belongsTo(Coupon::class);
    }
}
