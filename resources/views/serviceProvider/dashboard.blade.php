@extends('serviceProvider.Layout.main')
  
@section('content')

    <section class="main">
      <div class="main-top">
        <h1>Provider Dashboard</h1>
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
          <!-- <img src="./pic/img1.jpg"> -->
          <h4>Services</h4>
          <!-- <p>Ui designer</p> -->
          <div class="per">
           <h5>{{ $NumberOfservices }}</h5>
          </div>
         <a href="{{ route('provServices') }}">VIEW</a>
        </div>

        <div class="card">
            <!-- <img src="./pic/img1.jpg"> -->
            <h4>Payment</h4>
            <!-- <p>Ui designer</p> -->
            <div class="per">
             <h5>50</h5>
            </div>
            <a href="#">VIEW</a>
        </div>

        <div class="card">
          <!-- <img src="./pic/img1.jpg"> -->
          <h4>Pending</h4>
          <!-- <p>Ui designer</p> -->
          <div class="per">
           <h5>{{ $NumberOfpendings }}</h5>
          </div>
          <a href="{{ route('provBookings') }}">VIEW</a>
        </div>
       
      </div>

      <section class="Visual-representation">
        <div class="IncomeLine-chart">
          <h1>Monthly Income</h1>
           <canvas id="serviceGraph"  width="600" height="200"></canvas>

          <script>
              // Sample data for services and income
              var months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sept', 'Auct', 'Nov', 'Dec'];
              var serviceAIncome = [5000, 5500, 4800, 5200, 4900, 5300, 6000, 6500, 6900, 7000, 7300, 7200];
              var serviceBIncome = [4000, 4300, 4100, 4200, 3900, 4000, 5000, 5500, 4800, 5200, 4900, 6900];
              var serviceCIncome = [3000, 3200, 3100, 3300, 3000, 3200, 4200, 3900, 4000, 5000, 5500, 6000];
      
              // Creating a line chart
              const ctx = document.getElementById('serviceGraph').getContext('2d');
              const chart = new Chart(ctx, {
                  type: 'line',
                  data: {
                      labels: months,
                      datasets: [{
                          label: 'Service A',
                          data: serviceAIncome,
                          borderColor: 'rgba(255, 99, 132, 1)',
                          backgroundColor: 'rgba(255, 99, 132, 0.2)',
                          fill: false
                      },
                      {
                          label: 'Service B',
                          data: serviceBIncome,
                          borderColor: 'rgba(54, 162, 235, 1)',
                          backgroundColor: 'rgba(54, 162, 235, 0.2)',
                          fill: false
                      },
                      {
                          label: 'Service C',
                          data: serviceCIncome,
                          borderColor: 'rgba(255, 206, 86, 1)',
                          backgroundColor: 'rgba(255, 206, 86, 0.2)',
                          fill: false
                      }]
                  },
                  options: {
              scales: {
                  y: {
                      ticks: {
                          // Include a dollar sign in the ticks
                          callback: function(value, index, ticks) {
                              return '$' + value;
                          }
                      }
                  }
              }
          }
              });
             
              //javascript to style chart
              const chartContainer = document.querySelector('.IncomeLine-chart');
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
                     chartContainer.style.width = '100%';
                     chartContainer.style.marginLeft = '0px';
                     BusinessInfo.style.marginLeft = '0px';
                     console.log('Small screen');
                 } else if (window.matchMedia(breakpoints.medium).matches) {
                     chartContainer.style.width = '100%';
                     chartContainer.style.marginLeft = '0px';
                     BusinessInfo.style.marginLeft = '0px';
                     console.log('Medium screen');
                 } else if (window.matchMedia(breakpoints.large).matches) {
                    chartContainer.style.width = '900px';
                    chartContainer.style.marginLeft = '130px';
                    BusinessInfo.style.marginLeft = '130px';
                    console.log('Large screen');
                 }
              }

             // Initial call to handle the screen size on page load
                handleScreenSizeChange();

            // Add event listener for screen size changes
              window.addEventListener('resize', handleScreenSizeChange);

          </script>
        </div>

      </section>
    </section>
  </div>
  <script src="{{ asset('js/addClass.js') }}"></script>

</body>
</html>
@endsection