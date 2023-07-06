<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-solid-rounded/css/uicons-solid-rounded.css'>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <div class="formContainer">
        <div class="formHeading">Login</div>
        <form method="POST" action="/login">
            @csrf
            <div class="inputContainer">
                <input type="email" placeholder="Enter your email" class="input" id="email" name="email">
                <i class="fi fi-sr-envelope"></i>
            </div>
            <div class="inputContainer">
                <input type="password" placeholder="Enter your password" class="input" id="password" name="password">
                <i class="fi fi-sr-lock"></i>
            </div>
            <div class="cbContainer">
                <div class="cbContent">
                    <input type="checkbox" id="rem" name="rem" value="true">
                    <label for="rem" class="cbText">Remember me</label>
                </div>
                <a href="#" class="forget">Forgot password?</a>
                </div>
            <div class="buttonContainer">
                <input type="submit" value="Login" class="input">
            </div>
        </form>
        <div class="formFooter">
            <span>Not a member?<a href="/register"> Signup</a></span>
        </div>
    </div>
</body>
</html>
