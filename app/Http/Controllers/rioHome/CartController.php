<?php

namespace App\Http\Controllers\rioHome;

use App\Http\Controllers\Controller;
use App\Models\rioAdmin\Coupon;
use App\Models\rioHome\Cart;
use App\Models\rioHome\CartCoupon;
use Illuminate\Http\Request;

class CartController extends Controller
{
    private $cart;

    function index() {
        //
    }

    function addCart(Request $request) {

        if( Cart::where(['user_ip' => $request->ip(), 'category_id' => $request->category_id, 'product_id' => $request->product_id])->first() ) {
            $this->updateCart($request, Cart::where(['user_ip' => $request->ip(), 'category_id' => $request->category_id, 'product_id' => $request->product_id])->first());
        }
        else {
            Cart::addToCart($request);
        }
        return redirect()->back();
//        return response()->json( 'success');

    }

    function updateCart($req, $id) {

       Cart::updatedToCart($req, $id);

    }

    function addCartCoupon(Request $request) {

        $coupon = Coupon::where('code', $request->code)->first();
        if ($coupon) {

            $cartCoupons = CartCoupon::where('user_ip', $request->ip())->get();

            if (count($cartCoupons)) {

                foreach ($cartCoupons as $cartCoupon) {
                    CartCoupon::find($cartCoupon->id)->delete();
                }

                CartCoupon::cartCouponNew($request, $coupon->id);
                return redirect()->back()->with('coupon_add_msg', 'Your coupon has been added successfully.');

            }else {

                CartCoupon::cartCouponNew($request, $coupon->id);
                return redirect()->back()->with('coupon_add_msg', 'Your coupon has been added successfully.');

            }

        }else {

            return redirect()->back()->with('coupon_invalid_msg', "Your coupon code is invalid.");

        }

    }
}
