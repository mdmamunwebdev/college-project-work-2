<?php

namespace App\Http\Controllers\rioAdmin;

use App\Http\Controllers\Controller;
use App\Models\rioAdmin\Admin;
use App\Models\rioAdmin\AppSettings;
use App\Models\rioAdmin\Order;
use App\Models\rioAdmin\Product;
use App\Models\rioHome\OrderedProduct;
use App\Models\User;
use Illuminate\Http\Request;

class AdminAuthController extends Controller
{
    private $qty = 0;
    private $revenue = 0;

    private $topSaling = [], $product_qty, $product_revenue, $product_name, $product_id, $product_image, $product_price;


    function index() {

        $products = Product::all();

        foreach ($products as $product) {
            $orderedProducts = $product->orderedProduct;
            foreach ($orderedProducts as $orderedProduct) {

                if ($orderedProduct->order_status == 2) {
                    $this->product_id = $product->id;
                    $this->product_image = $product->image;
                    $this->product_name = $product->name;
                    $this->product_price = $orderedProduct->sale_price;
                    $this->product_qty += $orderedProduct->product_qty;
                    $this->product_revenue +=  ($orderedProduct->product_qty * $orderedProduct->sale_price);
                }

            }
            array_push($this->topSaling, [
                'product_id'      =>  $this->product_id,
                'product_image'   =>  $this->product_image,
                'name'            =>  $this->product_name,
                'price'           =>  $this->product_price,
                'product_qty'     =>  $this->product_qty,
                'product_revenue' =>  $this->product_revenue,
            ]);
        }

        usort($this->topSaling, function ($a, $b) {
            return $b['product_qty'] - $a['product_qty'];
        });


        $orderedProduct = OrderedProduct::where('order_status', 2)->get();

        foreach ($orderedProduct as $item) {
            $this->qty += $item->product_qty;
        }

        $order = Order::where('order_status', 2)->get();

        foreach ($order as $item) {
            $this->revenue += $item->total;
        }

        return view('rioAdmin.dashboard.index', [
            'customers' => User::all(),
            'sales'     => $this->qty,
            'revenue'   => $this->revenue,
            'recent_sales' => OrderedProduct::orderBy('id', 'desc')->take(10),
            'top_sale'  => $this->topSaling,
        ]
        );
    }

    function loginForm() {
        return view('rioAdmin.auth.login');
    }

    function login(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(auth()->guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            if ( !count(AppSettings::all()) ) {
                AppSettings::appSettingsStart();
            }
            return redirect('/admin/dashboard');
        }
        else {
            return back()->with('login_fail_msg', 'OOPS ! Your Credential is wrong !');
        }
    }

    function registerForm() {
        return view('rioAdmin.auth.register');
    }

    function register(Request $request, Admin $admin) {

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);

        $userData = $admin->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ]);

        if ($userData) {
            if ( !count(AppSettings::all()) ) {
                AppSettings::appSettingsStart();
            }
            auth()->guard('admin')->attempt(['email'  => $request->email, 'password' => $request->password]);
            return redirect('/admin/dashboard');
        }
        else {
            return back();
        }
    }

    function logout() {
        auth()->guard('admin')->logout();
        return redirect('/admin/login')->with('logout_msg', 'You are Logout !');
    }
}
