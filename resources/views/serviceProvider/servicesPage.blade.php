@extends('serviceProvider.Layout.main')

@section('content')
    <section class="main">
      <div class="main-top">
        <h1>Services</h1>
        <a href="{{ route('ServiceRegistration') }}" id="serviceAddBtn">Add Service</a>
        <i class="fas fa-user-cog" onclick="toggleDropdown()"></i>
        <ul class="dropdown-menu" id="dropdownMenu">
          <li><form action="{{ route('logout') }}" method="POST">
            @csrf
         <button type="submit" class="btn btn-outline-light me-2 btn-sm">Logout</button>
        </form></li>
        </ul>
      </div>
      <div class="Business-info">

        @foreach ($provServices as $provService)
        <div class="card">
          <img src="{{ asset('storage/serviceImages/' . $provService->img) }}">
          <h4>{{ $provService->name }}</h4>
          <p>{{ $provService->ServiceCategory->name }}</p>
          <div class="per">
           <h5>{{ $provService->price }}</h5>
          </div>
         <a href="#">Profile</a>
        </div>
        @endforeach

      </div>
      <script>
       //javascript to give resposive margin to service panel
              const BusinessInfo = document.querySelector('.Business-info');

              // Defined screen breakpoints
              const breakpoints = {
               small: '(max-width: 767px)',
               medium: '(min-width: 768px) and (max-width: 1023px)',
               large: '(min-width: 1024px)'
              };

             // Function to handle changes based on breakpoints
              function handleScreenSizeChange() {
                if (window.matchMedia(breakpoints.small).matches) {
                     BusinessInfo.style.marginLeft = '0px';
                     console.log('Small screen');
                 } else if (window.matchMedia(breakpoints.medium).matches) {
                     BusinessInfo.style.marginLeft = '0px';
                     console.log('Medium screen');
                 } else if (window.matchMedia(breakpoints.large).matches) {
                    BusinessInfo.style.marginLeft = '130px';
                    console.log('Large screen');
                 }
              }

             // Initial call to handle the screen size on page load
                handleScreenSizeChange();

            // Add event listener for screen size changes
              window.addEventListener('resize', handleScreenSizeChange);

          </script>
    </section>

    <script src="{{ asset('js/addClass.js') }}"></script>
  </body>
</html>

@endsection
