<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('user.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/user/dashboard');
        } else {
            return redirect()->back()->withErrors(['email' => 'Invalid credentials']);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
