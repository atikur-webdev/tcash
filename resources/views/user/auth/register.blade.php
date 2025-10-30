
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('assets/user/css/login.css') }}">
    <title>Laravel | Register</title>
</head>

<body>
    <div class="container">

        <div class="left">
            <h1>Laravel</h1>
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

                <button type="submit">Sign Up</button>
            </form>

            <div class="switch">
                Already have an account?
                <a href="{{ route('login') }}">Login</a>
            </div>
        </div>

    </div>
</body>

</html>
