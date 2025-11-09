@extends('user.layouts.master')
@section('content')
    <div class="login-wrapper-wrapper">
        <div class="login-wrapper">
            <div class="container login-page">

                <div class="left">
                    <h1>Finanza</h1>
                    <p>Create an account to start using the application.</p>
                </div>

                <div class="right">
                    <h2>Create Account</h2>

                    <form method="POST" action="{{ url('register') }}">
                        @csrf
                        <input type="text" name="name" placeholder="Full Name" value="" required>

                        <input type="email" name="email" placeholder="Email Address" value="" required>

                        <input type="password" name="password" placeholder="Password" required>

                        <input type="password" name="password_confirmation" placeholder="Confirm Password" required>

                        <input type="hidden" name="referral" value="{{ request()->referral  }}">

                        <button type="submit">Sign Up</button>
                    </form>

                    <div class="switch">
                        Already have an account?
                        <a href="{{ route('login') }}">Login</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
