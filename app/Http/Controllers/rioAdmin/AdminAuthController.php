<?php

namespace App\Http\Controllers\rioAdmin;

use App\Http\Controllers\Controller;
use App\Models\rioAdmin\Admin;
use Illuminate\Http\Request;

class AdminAuthController extends Controller
{
    function index() {
        return view('rioAdmin.dashboard.index');
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
