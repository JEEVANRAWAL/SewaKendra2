<header class="p-3 text-bg-dark">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                <img class="bi me-2" width="65" height="38" role="img" style="border-radius: 10px 0px 10px 0px;" aria-label="Bootstrap" src="{{ asset('images/logo.jpg') }}">
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="{{ url('/') }}" class="nav-link px-2 text-white">Home</a></li>
                <li><a href="{{ route('services') }}" class="nav-link px-2 text-white">Services</a></li>
                @if(Auth::check())
                <li><a href="{{ route('showUsersBooking') }}" class="nav-link px-2 text-white">Booking</a></li>
                @endif
                <li><a href="#" class="nav-link px-2 text-white">Category</a></li>
                <li><a href="#" class="nav-link px-2 text-white">Service Provider</a></li>
                <li><a href="#" class="nav-link px-2 text-white">About</a></li>
            </ul>

            <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
                <input type="search" class="form-control form-control-dark" placeholder="Search..." aria-label="Search">
            </form>

            @if (Auth::check())
                 <div class="text-end" style="display: flex;  ">

                     <p style="margin-right:15px ">Welcome, {{ Auth::user()->name }}</p>
                     
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                     <button type="submit" class="btn btn-outline-light me-2 btn-sm">Logout</button>
                    </form>
                 </div>
            @else

            <div class="text-end" style="display: flex; ">
                <form action="{{ route('loginForm') }}" method="GET">
                    
                    <button type="submit" class="btn btn-outline-light me-2">Login</button>
                </form>

                <form action="{{ route('registrationForm') }}" method="GET">
                    <button type="submit" class="btn btn-warning">Sign-up</button>
                </form>

                <form action="{{ route('providerRegistrationForm') }}" method="GET">
                    <button type="submit" class="btn" style="background-color: green; margin-left:5px; color:#fff">Become Provider</button>
                </form>
            </div>

            @endif

        </div>
    </div>
</header>