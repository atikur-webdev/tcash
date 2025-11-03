<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ForgetPasswordController extends Controller
{
    public function showLinkRequestForm() {
        return view('admin.auth.forget-password');
    }

    public function sendResetLinkEmail(Request $request) {
        $request->validate([
            'email' => 'required | email',
        ]);
        $status = Password::broker('admins')->sendResetLink(
            $request->only('email'),
        );

        return $status == Password::RESET_LINK_SENT
        ? back()->with(['status' => 'reset link sent'])
        : back()->with(['status' => 'can\'t find your email address']);
    }

}
