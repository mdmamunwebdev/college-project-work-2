<?php

namespace App\Models\rioAdmin;

use App\Models\rioHome\CartCoupon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    private static $coupon, $cartCoupon;

    public static function couponNew($req) {
        self::$coupon = new Coupon();
        self::$coupon->name = $req->name;
        self::$coupon->code = $req->code;
        self::$coupon->price = $req->price;
        self::$coupon->description = $req->description;
        self::$coupon->status = $req->status;
        self::$coupon->calculation = $req->calculation;
        self::$coupon->save();
        return self::$coupon;
    }

    public static function couponUpdate($req, $id) {

        self::$coupon = Coupon::find($id);
        self::$coupon->name = $req->name;
        self::$coupon->code = $req->code;
        self::$coupon->price = $req->price;
        self::$coupon->description = $req->description;
        self::$coupon->status = $req->status;
        self::$coupon->calculation = $req->calculation;
        self::$coupon->save();
    }

    public static function couponStatus($id) {
        self::$coupon = Coupon::find($id);

        if (self::$coupon->status == 1) {
            self::$coupon->status = 0;
        }
        else {
            self::$coupon->status = 1;
        }

        self::$coupon->save();
    }

    public static function couponDelete($id) {

        /**
         * Coupons Delete From CartCoupon Table.
         */

        self::$cartCoupon = CartCoupon::where('coupon_id', $id)->get();
        foreach (self::$cartCoupon as  $cartCoupon) {
            CartCoupon::find($cartCoupon->id)->delete();
        }

        /**
         * Coupon Delete From Coupon Table.
         */

        self::$coupon = Coupon::find($id);

        self::$coupon->delete();
    }


    public function productCategory() {
        return $this->hasMany(ProductCategory::class);
    }
}
