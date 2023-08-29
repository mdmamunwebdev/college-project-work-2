<?php

namespace App\Http\Controllers\rioUser;

use App\Http\Controllers\Controller;
use App\Models\rioAdmin\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAccountSettingsController extends Controller
{
    public function settings() {
        return view('rioUser.settings.index');
    }

    function update(Request $request, $id) {

        if ($request->password) {
            $request->validate([
                'password' => 'min:6|confirmed',
            ]);
        }

        $this->customer = Customer::customerUpdate($request, $id);

        return redirect('/user/account/settings')->with('userUpdateMsg', 'Your update has completed successfully.');
    }
}
