<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login</title>
</head>
<body>
    <div class="container" style="background-color: green; width:350px; margin:auto;">
        <h2>login form</h2>

        <form action="{{ route('login') }}" method="POST">
            @csrf
        <label for="username">username</label>
        <input type="text" id="username" name="username" value=""><br>
        <span>@error('username') {{ $message }} @enderror</span><br>

        <label for="password">password</label>
        <input type="text" id="password" name="password" value=""><br>
        <span>@error('password') {{ $message }} @enderror</span><br>

        <input type="submit" value="submit">
        </form>
    </div>
</body>
</html>