@extends('admin.Layout.main')
  
@section('content')

    <section class="main">
      <div class="main-top">
        <h1>Admin Dashboard</h1>
        <i class="fas fa-user-cog" onclick="toggleDropdown()"></i>
        <ul class="dropdown-menu" id="dropdownMenu">
          <li><form action="{{ route('logout') }}" method="POST">
            @csrf
         <button type="submit" class="btn btn-outline-light me-2 btn-sm">Logout</button>
        </form></li>
        </ul>
      </div>
      <div class="Business-info">
        <div class="card">
          <h4>Admins</h4>
          <div class="per">
           <h5>{{ $numAdmin }}</h5>
          </div>
         <a href="{{ route('provServices') }}">VIEW</a>
        </div>

        <div class="card">
            <h4>Users</h4>
            <div class="per">
             <h5>{{ $numUser }}</h5>
            </div>
            <a href="#">VIEW</a>
        </div>

        <div class="card">
          <h4>Services</h4>
          <div class="per">
           <h5>{{ $numService }}</h5>
          </div>
          <a href="{{ route('provBookings') }}">VIEW</a>
        </div>

        <div class="card">
            <h4>Providers</h4>
            <div class="per">
             <h5>{{ $numProvider }}</h5>
            </div>
            <a href="{{ route('provBookings') }}">VIEW</a>
        </div>

        <div class="card">
            <h4>Pending Request</h4>
            <div class="per">
             <h5>{{ $numPending }}</h5>
            </div>
            <a href="{{ route('provBookings') }}">VIEW</a>
        </div>
       
      </div>

    </section>
  </div>
  <script src="{{ asset('js/addClass.js') }}"></script>

</body>
</html>
@endsection