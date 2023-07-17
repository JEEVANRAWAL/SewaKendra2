<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Panel</title>
</head>
<body>
    <div class="container">
        <nav style="display: flex; justify-content:flex-end;">
            <div class="account" style="display:inline-block; background-color: aqua">
                <div class="username">
                    @if (Session::has('username')){
                        <span>{{ Session::get('username') }}</span>
                    }
                    @endif
                </div>
                <div class="logout">
                    <a href="#"><span>logout</span></a>
                </div>
            </div>
        </nav>

        <main>
            <span>{{ Session::get('success') }}</span>
        </main>
    </div>
</body>
</html>