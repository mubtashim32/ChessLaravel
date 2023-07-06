<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
</head>
<body>
    <div class="formContainer">
        <div class="formHeading">
            <h1>Registration</h1>
        </div>
        <form method="POST" action="/register" class="form">
            @csrf
            <div class="inputContainer">
                <input type="email" placeholder="Enter your email" name="email" id="name" value="{{ old('email') }}">
                <i class="fi fi-sr-envelope"></i>
                @if ($errors->has('email'))
                    <span class="warning">{{ $errors->first('email') }}</span>
                @endif
            </div>
            <div class="inputContainer">
                <input type="text" placeholder="Enter your username(Min: 6)" name="username" id="username" value="{{ old('username') }}">
                <i class="fi fi-sr-user"></i>
                @if ($errors->has('username'))
                    <span class="warning">{{ $errors->first('username') }}</span>
                @endif
            </div>
            <div class="inputContainer">
                <input type="password" placeholder="Enter your password(Min: 6)" name="password" id="password">
                <i class="fi fi-sr-lock"></i>
                @if ($errors->has('password'))
                    <span class="warning">{{ $errors->first('password') }}</span>
                @endif
            </div>
            <input type="submit" value="Register" class="inputButton">
        </form>
        <div class="login">Already a member? <a href="/login">Login Now</a></div>
    </div>
</body>
</html>
