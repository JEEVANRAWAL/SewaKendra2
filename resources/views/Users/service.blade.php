@extends('layouts/main')


@section('content')
    <div class="serv-container">
      @foreach ($clickedService as $clickedServ)
          
      <div class="serviceBox">
        <div class="img-box">
          <img src="{{ asset('storage/serviceImages/' . $clickedServ->img) }}" alt="image">
        </div>
        <div class="serviceBox-row">
          <div class="col">
            <h2 class="serviceName">{{ $clickedServ->name }}</h2>
            <h4 class="Category">Category: <span>{{ $clickedServ->ServiceCategory->name }}</span></h4>
            <span class="ServiceProvider">provider: {{ $clickedServ->ServiceProvider->name }}</span>
          </div>
          <div class="col col2">
            <div class="service-price-box">
              <h4>Price: <span class="price">{{ $clickedServ->price }}</span></h4>
            </div>
            <div class="discription">
              <p>{{ $clickedServ->description }} </p>
            </div>
            <div class="book">
              <a href="#" id="book-now">Book Now</a>
            </div>
          </div>
        </div>
      </div>

      <div id="popupForm" class="popup-form">
        <div class="close">
          <span class="close-button">&times;</span>
        </div>
        <form action="{{ route('userBookingsubmitted') }}" method="POST">
          @csrf
          <div class="labels">
           <label for="">Service Name: </label>
           <label for="">Service Category: </label>
           <label for="">Provider Name:  </label>
           <label for="">Service price: </label>
           <label for="Date">Booking Date:</label>
           <hr>
           <label for="" style="color: red">Total price: </label>
          </div>

          <div class="inputs">
            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
            <span>{{ $clickedServ->name }}</span>
            <input type="hidden" name="service_id" value="{{ $clickedServ->id }}">

            <span>{{ $clickedServ->ServiceCategory->name }}</span>
            <span>{{ $clickedServ->ServiceProvider->name }}</span>
            <input type="hidden" name="provider_id" value="{{ $clickedServ->ServiceProvider->id }}">
            <span>{{ $clickedServ->price }}</span>
            <input type="date" id="Date" name="date" min="{{Carbon\Carbon::now()->toDateString()}}" required > <!-- here we have used "Carbon::now()" function to get current date and "toDateString()" function to convert that data to string. "min" attribute is used to set current date as minimum and block all the past days-->
            <hr>
            <span>{{ $clickedServ->price }}</span>
            <input type="hidden" name="price" value="{{ $clickedServ->price }}">
            <button type="submit" id="button">Conform</button>
          </div>
        </form>
      </div>
      @endforeach
        

        <div class="related-services">
        
        </div>
    </div>
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('css/serviceStyle.css') }}">
<link rel="stylesheet" href="{{ asset('css/PopupFormStyle.css') }}">
@endsection

@section('js')
    <script src="{{ asset('js/popupform.js') }}"></script>
@endsection