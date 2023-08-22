<?php

namespace App\Http\Controllers\rioUser;

use App\Http\Controllers\Controller;
use App\Models\rioAdmin\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductHistoryController extends Controller
{
    public function productHistory() {
        return view('rioUser.product.index', ['orders' => Order::where( 'email', Auth::user()->email )->get()]);
    }
}
