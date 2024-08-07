<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <div class="container" style=" width:350px; margin:auto;">
        <h1>Sewa Kendra</h1>
        <div class="horizontal-line"></div>
        <h2>login form</h2>
        <span style="color: red" >{{ session()->get('error') }}</span>
        <form action="{{ route('login') }}" method="POST">
            @csrf
        <label for="username">username</label>
        <input type="text" id="username" name="username" value=""><br>
        <span>@error('username') {{ $message }} @enderror</span><br>

        <label for="password">password</label>
        <input type="text" id="password" name="password" value=""><br>
        <span>@error('password') {{ $message }} @enderror</span><br>

        <input type="submit" value="submit" id="submit">
        <a href="{{ route('registrationForm') }}">Create New Account</a>
        </form>
    </div>
</body>
</html>