<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <div class="container" style="width:350px;  margin:auto;">
        <h1>Sewa Kendra</h1>
        <div class="horizontal-line"></div>
        <h2>Fill Up The Form</h2>
        @if(Session::has('success')){
            <span style="background-color: green">{{ Session::get('success') }}</span>
        }@elseif(Session::has('fail')){
            <span>{{ Session::get('fail') }}</span>
        }
        @endif
        <form action="{{ route('providerRegistration') }}" method="POST">
            @csrf
            <label for="fullname">Full Name</label>
            <input type="text" id="fullname" name="name" value="{{ old('name'); }}" ><br>
            <span>@error('name') {{ $message }} @enderror</span> <br>

            <label for="address">Address</label>
            <input type="text" id="address" name="address" value="{{ old('address'); }}" ><br>
            <span>@error('address') {{ $message }} @enderror</span><br>

            <label for="number">Phone Number</label>
            <input type="text" id="number" name="phone_number" value="{{ old('phone_number'); }}" ><br>
            <span>@error('phone_number') {{ $message }} @enderror</span><br>

            <label for="email">Email</label>
            <input type="text" id="email" name="email" value="{{ old('email'); }}" ><br>
            <span>@error('email') {{ $message }} @enderror</span><br>

            <input type="submit" value="submit" id="submit">
            <a href="{{ route('loginForm') }}">Already Registered? click here </a>
        </form>
    </div>
</body>
</html>