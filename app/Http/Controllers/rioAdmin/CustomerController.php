<?php

namespace App\Http\Controllers\rioAdmin;

use App\Http\Controllers\Controller;
use App\Models\rioAdmin\Customer;
use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    private $customer;

    function index() {
        return view('rioAdmin.customer.index', ['customers' => User::orderBy('id', 'desc')->get()]);
    }


    function customerCreateForm() {
        return view('rioAdmin.customer.create', ['customers' => User::orderBy('id', 'desc')->get()]);
    }

    function create(Request $request) {
        $this->customer = User::customerAdd($request);

        return redirect('/customer/list')->with('customerAddMsg', 'A new customer has been added successfully.');
    }

    function customerUpdateForm($id) {
        return view('rioAdmin.customer.update', ['customer' => User::find($id)]);
    }

    function update(Request $request, $id) {
        $this->customer = User::customerUpdate($request, $id);

        return redirect('/customer/list')->with('customerUpdateMsg', 'Your update has completed successfully.');
    }

    function detail() {
        return view('rioAdmin.customer.detail');
    }

    function status() {
        //
    }

    function delete($id) {
        User::customerDelete($id);

        return redirect('/customer/list')->with('customerDeleteMsg', 'A customer has been deleted successfully.');
    }
}
