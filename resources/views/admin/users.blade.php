@extends('admin.Layout.main')

@section('content')
<section class="main">
    <div class="main-top">
      <h1>Users List</h1>
      <i class="fas fa-user-cog"></i>
    </div>

    <section class="Booking">
      <div class="attendance-list">
        <h1>Users List</h1>
        @if(session()->has('success'))
           <span style="background-color: green">{{ session()->get('success') }}</span>
        @elseif(session()->has('cancel'))
           <span style="background-color: red">{{ session()->get('cancel') }}</span>
        @endif
        <table class="table">
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Address</th>
              <th>Contact</th>
              <th>Email</th>
              <th>Username</th>
              <th>Details</th>
            </tr>
          </thead>
          <tbody>
            @foreach($users as $user)

            <tr>
              <td>{{ $user->id }}</td>
              <td>{{ $user->name }}</td>
              <td>{{ $user->address }}</td>
              <td>{{ $user->phone_number }}</td>
              <td>{{ $user->email }}</td>
              <td>{{ $user->user_name }}</td>
              <td><button class="edit">Edit</button>
                <button class="delete">Delete</button>
              </td>
            </tr>

            @endforeach
          </tbody>
        </table>
      </div>
    </section>
  </section>

  {{-- popup form to update users --}}
  <div id="popupForm" class="popup-form" style="background-color: #fff">
    <div class="close">
        <span class="close-button">&times;</span>
    </div>
    <h4 style="margin: 10px 5px 5px 30px;">Update Form</h4>
    <form action="{{ route('editOrdelete') }}" method="POST">
      @csrf
      <div class="labels">
       <label for="">Provider Name: </label>
       <label for="">Address:</label>
       <label for="">Contact:</label>
       <label for="">Email:</label>
       <label for="">Username:</label>
      </div>

      <div class="inputs">
        <input type="hidden" class="UserId" name="UserId" >
        <span></span>
        <span></span>
        <input type="text" class="Name" name="Name">
        <span></span>
        <span></span>
        <input type="text" class="Address" name="Address" >
        <span></span>
        <span></span>
        <input type="text" class="Contact" name="Contact" >
        <span></span>
        <span></span>
        <input type="email" class="UserEmail" name="UserEmail" >
        <span></span>
        <span></span>
        <input type="text" class="Username" name="Username" >
        <span></span>
        <span></span>
        {{-- <input type="text" class="Status" id="Date" name="status"  required > <!-- here we have used "Carbon::now()" function to get current date and "toDateString()" function to convert that data to string. "min" attribute is used to set current date as minimum and block all the past days--> --}}
        
        <input type="submit" class="button" name="UpdateBtn" value="update" style="background-color:green; margin:15px 5px 7px 5px;  border-radius:5px; width:80px; height:30px">
      </div>
    </form>
  </div>

  {{-- popup form to delete users --}}
  <div id="popupForm2" class="popup-form" style="background-color: #fff">
    <div class="close">
      <span class="close-button2">&times;</span>
    </div>

    <h4 style="margin: 20px 5px 5px 30px;">Delete Form</h4>

    <form action="{{ route('editOrdelete') }}" method="POST">
      @csrf
      <div class="labels">
       <label for="">Provider Id: </label>
       <label for="">Provider Name: </label>
       <label for="">Email:</label>
      </div>

      <div class="inputs">
        <span class="spanUserId">2</span>
        <input type="hidden" class="UserId2" name="UserId" >

        <span class="spanUserName">hello</span>
        <input type="hidden" class="UserName" name="UserName" >

        <span class="spanUserEmail">hello</span>
        <input type="hidden" class="UserEmail" name="UserEmail" >
        {{-- <input type="text" class="Status" id="Date" name="status"  required > <!-- here we have used "Carbon::now()" function to get current date and "toDateString()" function to convert that data to string. "min" attribute is used to set current date as minimum and block all the past days--> --}}
        
        <input type="submit" class="button" name="DeleteBtn" value="delete" style="background-color:red ; border-radius:5px; width:80px; height:30px; margin:5px 5px 5px 5px; " >
      </div>
    </form>
  </div>

</div>
{{-- <script src="{{ asset('js/popupform.js') }}"></script> --}}
<script src="{{ asset('js/userDataFetcher.js') }}"></script>
</body>
</html>
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('css/bookingTable.css') }}" />
<link rel="stylesheet" href="{{ asset('css/PopupFormStyle.css') }}" />
@endsection