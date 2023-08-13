<?php

namespace App\Http\Controllers\rioAdmin;

use App\Http\Controllers\Controller;
use App\Models\rioAdmin\AccountSettings;
use Illuminate\Http\Request;

class AccountSettingsController extends Controller
{
    function accountSettingsForm() {
        return view('rioAdmin.account-settings.index');
    }

    function update(Request $request, $id) {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);

        $account_settings = AccountSettings::adminUpdate($request, $id);

        return back()->with('account_settings_update_msg', 'Your account settings is updated.');
    }
}
