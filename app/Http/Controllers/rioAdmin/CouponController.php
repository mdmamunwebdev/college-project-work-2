<?php

namespace App\Http\Controllers\rioAdmin;

use App\Http\Controllers\Controller;
use App\Models\rioAdmin\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    function index() {

        return view('rioAdmin.coupon.index', ['coupons' => Coupon::all()]);

    }

    function create(Request $request) {

        Coupon::couponNew($request);
        return redirect()->back()->with('addCouponMsg', 'coupon is added with successfully !!');

    }

    function couponUpdate($id) {

        return view('rioAdmin.coupon.update', ['coupon' => Coupon::find($id), 'coupons' => Coupon::all()]);

    }

    function update(Request $request, $id) {

        Coupon::couponUpdate($request, $id);
        return redirect('/coupon')->with('coupon_update_msg', 'coupon has updated successfully.');

    }

    function detail() {

        return view('rioAdmin.coupon.detail');

    }

    function status($id) {

        Coupon::couponStatus($id);
        return redirect('/coupon')->with('coupon_status_msg', 'coupon status has changed successfully.');

    }

    function delete($id) {

        Coupon::couponDelete($id);
        return redirect('/coupon')->with('coupon_delete_msg', 'coupon has deleted successfully.');

    }
}
