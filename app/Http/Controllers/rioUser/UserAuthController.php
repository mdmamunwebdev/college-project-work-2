<?php

namespace App\Http\Controllers\rioUser;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserAuthController extends Controller
{
    function index() {
        return view('rioUser.dashboard.index');
    }

    function loginForm() {
        return view('rioUser.auth.login');
    }

    function login(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(auth()->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('/dashboard');
        }
        else {
            return back()->with('login_fail_msg', 'OOPS ! Your Credential is wrong !');
        }
    }

    function registerForm() {
        return view('rioUser.auth.register');
    }

    function register(Request $request, User $user) {

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);

        $userData = $user->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ]);

        if ($userData) {
            auth()->attempt(['email'  => $request->email, 'password' => $request->password]);
            return redirect('/dashboard');
        }
        else {
            return back();
        }
    }

    function logout() {
        auth()->logout();
        return redirect('/login')->with('logout_msg', 'You are Logout !');
    }
}
