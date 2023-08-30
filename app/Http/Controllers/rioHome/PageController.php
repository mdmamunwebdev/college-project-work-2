<?php

namespace App\Http\Controllers\rioHome;

use App\Http\Controllers\Controller;
use App\Models\rioAdmin\Category;
use App\Models\rioAdmin\Order;
use App\Models\rioAdmin\Product;
use App\Models\rioHome\Cart;
use App\Models\rioHome\CartCoupon;
use App\Models\rioUser\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Session;

class PageController extends Controller
{
    private $order;
    function index(Request $request) {
        return view('rioHome.pages.index', ['categories' => Category::all(), 'products' => Product::all(), 'items' => Cart::where('user_ip', $request->ip())->get(), 'cart_coupon' => CartCoupon::where( 'user_ip', $request->ip() )->first(), 'total' => 0]);
    }

    function ourFoods(Request $request) {
        return view('rioHome.pages.our-foods', ['categories' => Category::all()->where('status', 1), 'products' => Product::all(), 'items' => Cart::where('user_ip', $request->ip())->get(), 'cart_coupon' => CartCoupon::where( 'user_ip', $request->ip() )->first(), 'total' => 0]);
    }

    function checkout(Request $request) {

        if (Cart::where('user_ip', $request->ip())->first()) {
            return view('rioHome.pages.checkout', ['categories' => Category::all(), 'products' => Product::all(), 'items' => Cart::where('user_ip', $request->ip())->get(), 'cart_coupon' => CartCoupon::where( 'user_ip', $request->ip() )->first(), 'total' => 0]);
        }
        else {
            return back();
        }

    }

    function success(Request $request, User $user, $id) {

        $this->order = Order::find($id);

        if ($this->order) {
            $customer = Customer::where('email', $this->order->email)->first();

            if ( $customer == null ) {

                $customer = Customer::newCustomer($this->order);

                $user = User::where('email', $customer->email)->first();

                if (empty($user)) {
                    $userData = $user->create([
                        'name' => $customer->username,
                        'email' => $customer->email,
                        'phone' => $customer->phone,
                        'password' => bcrypt($customer->phone),
                    ]);

                    if ($userData) {
                        auth()->attempt(['email'  => $customer->email, 'password' => $customer->phone]);
                    }
                }
                else {
                    if ($customer) {
                        auth()->attempt(['email'  => $customer->email, 'password' => $customer->phone]);
                    }
                }

            }
            return view('rioHome.pages.success', ['categories' => Category::all(), 'products' => Product::all(), 'items' => Cart::where('user_ip', $request->ip())->get(), 'cart_coupon' => CartCoupon::where( 'user_ip', $request->ip() )->first(), 'total' => 0, 'order_id' => $id]);
        }
        else {
            return redirect()->back();
        }

    }

}
