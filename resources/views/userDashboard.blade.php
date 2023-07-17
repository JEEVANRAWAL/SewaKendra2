<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>userDashboard</title>
</head>
<body>
    <h2>hello {{ Auth::guard('service-providers')->user()->name }}. Welcome to user Dashboard</h2><br>
    <span>{{ session()->get('message') }}</span>
</body>
</html>