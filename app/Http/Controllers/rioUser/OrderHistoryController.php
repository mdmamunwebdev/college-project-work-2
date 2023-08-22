<?php

namespace App\Http\Controllers\rioUser;

use App\Http\Controllers\Controller;
use App\Models\rioAdmin\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderHistoryController extends Controller
{
    public function orderHistory() {
        return view('rioUser.order.index', ['orders' => Order::where( 'email', Auth::user()->email )->get()]);
    }
}
