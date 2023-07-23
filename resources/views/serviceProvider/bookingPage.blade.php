@extends('serviceProvider.Layout.main')

@section('content')
<section class="main">
    <div class="main-top">
      <h1>Booking Page</h1>
      <i class="fas fa-user-cog"></i>
    </div>

    <section class="Booking">
      <div class="attendance-list">
        <h1>Booking List</h1>
        <table class="table">
          <thead>
            <tr>
              <th>ID</th>
              <th>Service Name</th>
              <th>Customer</th>
              <th>Price</th>
              <th>Date</th>
              <th>Status</th>
              <th>Details</th>
            </tr>
          </thead>
          <tbody>
            @foreach($bookings as $booking)

            <tr>
              <td>{{ $booking->id }}</td>
              <td>{{ $booking->Service->name }}</td>
              <td>{{ $booking->User->name }}</td>
              <td>{{ $booking->price }}</td>
              <td>{{ $booking->date }}</td>
              <td>{{ $booking->status }}</td>
              <td><button class="view">View</button></td>
            </tr>

            @endforeach
          </tbody>
        </table>
      </div>
    </section>
  </section>

  <div id="popupForm" class="popup-form" style="background-color: #fff">
    <div class="close">
      <span class="close-button">&times;</span>
    </div>
    <form action="{{ route('updateBookingStatus') }}" method="POST">
      @csrf
      <div class="labels">
       <label for="">Booking Id: </label>
       <label for="">Service Name: </label>
       <label for="">Status:</label>
      </div>

      <div class="inputs">
        <span class="spanBookingId">2</span>
        <input type="hidden" class="BookingId" name="bookingId" >

        <span class="ServiceName">hello</span>
        {{-- <input type="text" class="Status" id="Date" name="status"  required > <!-- here we have used "Carbon::now()" function to get current date and "toDateString()" function to convert that data to string. "min" attribute is used to set current date as minimum and block all the past days--> --}}
        <select class="status" name="status" id="">
            <option value="pending">pending</option>
            <option value="approved">approved</option>
            <option value="completed">completed</option>
            <option value="canceled">canceled</option>
        </select>
        <button type="submit" id="button">Conform</button>
      </div>
    </form>
  </div>

</div>
{{-- <script src="{{ asset('js/popupform.js') }}"></script> --}}
<script src="{{ asset('js/bookingStatusFetcherToUpdate.js') }}"></script>
</body>
</html>
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('css/bookingTable.css') }}" />
<link rel="stylesheet" href="{{ asset('css/PopupFormStyle.css') }}" />
@endsection