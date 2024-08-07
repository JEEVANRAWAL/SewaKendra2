@extends('layouts.main')

@section('content')
<section class="main"style="margin-top:50px; margin-bottom:210px">
    <section class="Booking" style="width:100%; ">
      <div class="attendance-list" style=" width: 70%; margin:auto;">
        <h1 style="font-size: 25px; font-family:Georgia, 'Times New Roman', Times, serif; color:#5f60b9;">Booking List</h1>
        <table class="table">
          <thead>
            <tr>
              <th>ID</th>
              <th>Service Name</th>
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
              <td>{{ $booking->price }}</td>
              <td>{{ $booking->date }}</td>
              <td>{{ $booking->status }}</td>
              <td><button class="view">Cancel</button></td>
            </tr>

            @endforeach
          </tbody>
        </table>
      </div>
    </section>
  </section>

  <div id="popupForm" class="popup-form" style="background-color: #e2e2e2; margin-top:0px">
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
        <span class="ServiceName">canceled</span>
        <input type="hidden" name="status" value="canceled">
        <button type="submit" id="button">Conform</button>
      </div>
    </form>
  </div>


{{-- <script src="{{ asset('js/popupform.js') }}"></script> --}}
@endsection

@section('js')
<script src="{{ asset('js/bookingStatusFetcherToUpdate.js') }}"></script>
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('css/bookingTable.css') }}" />
<link rel="stylesheet" href="{{ asset('css/PopupFormStyle.css') }}" />
@endsection