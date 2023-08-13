<?php

namespace App\Http\Controllers\rioAdmin;

use App\Http\Controllers\Controller;
use App\Models\rioAdmin\AppSettings;
use Illuminate\Http\Request;

class AppSettingsController extends Controller
{
    function appSettingsForm() {
        return view('rioAdmin.settings.index', ['app_settings' => AppSettings::all()->first()]);
    }

    function update(Request $request) {
        AppSettings::appSettingsUpdate($request);
        return back()->with('app_settings_update_msg', 'Your app settings is updated successfully.');
    }
}
