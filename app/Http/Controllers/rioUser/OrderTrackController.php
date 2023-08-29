<?php

namespace App\Http\Controllers\rioUser;

use App\Http\Controllers\Controller;
use App\Models\rioAdmin\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderTrackController extends Controller
{
    function orderTrack(Request $request) {

        $orders = Order::where('email', Auth::user()->email)->get();

        if ($orders) {
            foreach ($orders as $order) {
                if ($order->id == $request->order_id) {
                    return view('rioUser.order-track.index', ['order' => Order::find($request->order_id), 'orders' => Order::where('email', Auth::user()->email)->orderBy('id', 'desc')->take(5)->get()]);
                }
            }

            return redirect('/dashboard')->with('trackMsg', 'Your Track Id is Incorrect.');
        }
        else {
            return back()->with('trackMsg', 'You have no orders.');
        }
    }

}
