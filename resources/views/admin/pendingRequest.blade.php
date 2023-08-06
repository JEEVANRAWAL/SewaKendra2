@extends('admin.Layout.main')

@section('content')
<section class="main">
    <div class="main-top">
      <h1>Pending Request</h1>
      <i class="fas fa-user-cog"></i>
    </div>

    <section class="Booking">
      <div class="attendance-list">
        <h1>Pending Request</h1>
        @if(session()->has('success'))
           <span style="background-color: green">{{ session()->get('success') }}</span>
        @elseif(session()->has('cancel'))
           <span style="background-color: red">{{ session()->get('cancel') }}</span>
        @endif
        <table class="table">
          <thead>
            <tr>
              <th>ID</th>
              <th>Provider Name</th>
              <th>Address</th>
              <th>Contact</th>
              <th>Email</th>
              <th>Status</th>
              <th>Details</th>
            </tr>
          </thead>
          <tbody>
            @foreach($pendingProviders as $pendingProvider)

            <tr>
              <td>{{ $pendingProvider->id }}</td>
              <td>{{ $pendingProvider->name }}</td>
              <td>{{ $pendingProvider->address }}</td>
              <td>{{ $pendingProvider->phone_number }}</td>
              <td>{{ $pendingProvider->email }}</td>
              <td>{{ $pendingProvider->status }}</td>
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
    <form action="{{ route('approveProvider') }}" method="POST">
      @csrf
      <div class="labels">
       <label for="">Provider Id: </label>
       <label for="">Provider Name: </label>
       <label for="">Email:</label>
      </div>

      <div class="inputs">
        <span class="spanProviderId">2</span>
        <input type="hidden" class="ProviderId" name="ProviderId" >

        <span class="spanProviderName">hello</span>
        <input type="hidden" class="ProviderName" name="ProviderName" >

        <span class="spanProviderEmail">hello</span>
        <input type="hidden" class="ProviderEmail" name="ProviderEmail" >
        {{-- <input type="text" class="Status" id="Date" name="status"  required > <!-- here we have used "Carbon::now()" function to get current date and "toDateString()" function to convert that data to string. "min" attribute is used to set current date as minimum and block all the past days--> --}}
        
        <input type="submit" class="button" name="approveBtn" value="approve" style="background-color:green; margin:15px 5px 7px 5px;  border-radius:5px; width:80px; height:30px">
        <input type="submit" class="button" name="cancelBtn" value="cancel" style="background-color:red ; border-radius:5px; width:80px; height:30px; margin:5px 5px 5px 5px; " >
      </div>
    </form>
  </div>

</div>
{{-- <script src="{{ asset('js/popupform.js') }}"></script> --}}
<script src="{{ asset('js/providerStatusFetcherToUpdate.js') }}"></script>
</body>
</html>
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('css/bookingTable.css') }}" />
<link rel="stylesheet" href="{{ asset('css/PopupFormStyle.css') }}" />
@endsection