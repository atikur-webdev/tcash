<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function showLogin()
    {
        return view('admin.auth.login');
    }
    public function login(Request $request)
    {
        $credential = $request->validate([
            'email' => 'required | email',
            'password' => 'required',
        ]);
       
        if (Auth::guard('admin')->attempt($credential)) {
            return to_route('admin.dashboard')->withSuccess('Login Successfully');
        }
        return back()->withErrors('Password didn\'t match');
    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login')->withSuccess('Logout Successfully');
    }
}
