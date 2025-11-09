<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use App\Models\Section;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    public function showRegisterForm() {

        $siteSettingContent = Section::where('data_key', 'siteSetting-content')->first();

        $siteSettingElement = Section::where('data_key', 'siteSetting-element')->get();

        $footerContent = Section::where('data_key', 'footer-content')->first();

        return view('user.auth.register', compact('siteSettingContent', 'siteSettingElement', 'footerContent'));
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        // $referrerId  = null;
        // if(!empty($data['referral'])) {
        //     $referrer = User::where('referred_by', $data['referral'])->first();
        //     if($referrer) {
        //         $referrerId = $referrer->id;
        //     }
        // }

        $referral = request()->referral;
        $user = User::where('referral_link', $referral)->first();

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'referral_link' => strtoupper(Str::random(10)),
            'referred_by' => $user->id
        ]);
    }
}
