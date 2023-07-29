<?php

namespace App\Http\Controllers\rioHome;

use App\Http\Controllers\Controller;
use App\Models\rioHome\Cart;
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
}
