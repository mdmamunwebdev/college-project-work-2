<?php

namespace App\Http\Controllers\rioUser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountSettingsController extends Controller
{
    public function settings() {
        return view('rioUser.settings.index');
    }

    public function update() {
        //
    }
}
