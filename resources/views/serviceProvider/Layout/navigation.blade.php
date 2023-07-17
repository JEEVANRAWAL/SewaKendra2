<div class="container">
    <nav>
      <ul>
        <li ><a href="#" class="logo">
          <span class="nav-item">{{ auth()->guard('service-providers')->user()->name }}</span> <!-- here we have used " auth helper" insted of "Auth facade" to display usersname-->
        </a></li>
        <li id="Dashboard"><a href="{{ route('provDashboard') }}">
          <i class="fas fa-menorah"></i>
          <span class="nav-item">Dashboard</span>
        </a></li>
        <li id="Booking"><a href="#">
          <i class="fas fa-comment"></i>
          <span class="nav-item">Bookings</span>
        </a></li>
        <li id="Income"><a href="#">
          <i class="fas fa-database"></i>
          <span class="nav-item">Income</span>
        </a></li>
        <li id="Service"><a href="{{ route('provServices') }}">
          <i class="fas fa-chart-bar"></i>
          <span class="nav-item">Services</span>
        </a></li>
        <li id="Setting"><a href="#">
          <i class="fas fa-cog"></i>
          <span class="nav-item">Setting</span>
        </a></li>

        <li><a href="#" class="logout">
          <i class="fas fa-sign-out-alt"></i>
          <span class="nav-item">Log out</span>
        </a></li>
      </ul>
    </nav>
