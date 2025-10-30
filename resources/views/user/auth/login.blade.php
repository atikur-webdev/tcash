<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('assets/user/css/login.css') }}">
    <title>{{ config('app.name', 'Laravel') }} | Login & Register</title>
</head>

<body>
    <div class="container">

        <div class="left">
            <h1>Modernize</h1>
            <p>Welcome to our application! Please log in or create an account to continue.</p>
        </div>

        <div class="right">
            @if (request()->routeIs('register'))
                <h2>Create Account</h2>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <input type="text" name="name" placeholder="Full Name" required>
                    <input type="email" name="email" placeholder="Email Address" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
                    <button type="submit">Sign Up</button>
                </form>
                <div class="switch">
                    Already have an account?
                    <a href="{{ route('login') }}">Login</a>
                </div>
            @else
                <h2>Login</h2>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <input type="email" name="email" placeholder="Email Address" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <button type="submit">Login</button>
                </form>
                @if (Route::has('register'))
                    <div class="switch">
                        Don’t have an account?
                        <a href="{{ route('register') }}">Register</a>
                    </div>
                @endif
            @endif
        </div>

    </div>
</body>

</html>
