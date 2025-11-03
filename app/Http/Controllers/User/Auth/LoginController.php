<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use App\Models\Section;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    public function showLoginForm()
    {
        $siteSettingContent = Section::where('data_key', 'siteSetting-content')->first();

        $siteSettingElement = Section::where('data_key', 'siteSetting-element')->get();

        $footerContent = Section::where('data_key', 'footer-content')->first();
        
        return view('user.auth.login', compact('siteSettingContent', 'siteSettingElement', 'footerContent'));
    }

    public function logout(Request $request) {
        Auth::logout();
        return back();
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/user/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }


}
