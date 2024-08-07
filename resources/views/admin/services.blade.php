@extends('admin.Layout.main')

@section('content')
<section class="main">
    <div class="main-top">
      <h1>Service List</h1>
      <i class="fas fa-user-cog"></i>
    </div>

    <section class="Booking">
      <div class="attendance-list">
        <h1>Service List</h1>
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
              <th>Description</th>
              <th>Price</th>
              <th>Details</th>
            </tr>
          </thead>
          <tbody>
            @foreach($services as $service)

            <tr>
              <td>{{ $service->id }}</td>
              <td>{{ $service->name }}</td>
              <td>{{ $service->description }}</td>
              <td>{{ $service->price }}</td>
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
    <form action="{{ route('UpdateService') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="labels">
       <label for="">Name: </label>
       <label for="">Description:</label>
       <label for="">category:</label>
       <label for="">Price:</label>
       <label for="">image</label>
      </div>

      <div class="inputs">
        <input type="hidden" class="ServiceId" name="id" >
        <span></span>
        <span></span>
        <input type="text" class="Name" name="name">
        <span></span>
        <span></span>
        <input type="text" class="Description" name="description" >
        <span></span>
        <span></span>
        <select name="category_id" id="">
            @foreach ($categorys as $category)
                
            <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        <span></span>
        <span></span>
        <input type="text" class="Price" name="price" >
        <span></span>
        <span></span>
        <input type="file" name="img" >
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

    <form action="{{ route('DeleteService') }}" method="POST">
      @csrf
      <div class="labels">
        <label for="">Name: </label>
        <label for="">Price:</label>
      </div>

      <div class="inputs">
        <span class="spanServiceId">2</span>
        <input type="hidden" class="ServiceId2" name="id" >

        <span class="spanServiceName">hello</span>

        <span class="spanServicePrice">hello</span>
        
        {{-- <input type="text" class="Status" id="Date" name="status"  required > <!-- here we have used "Carbon::now()" function to get current date and "toDateString()" function to convert that data to string. "min" attribute is used to set current date as minimum and block all the past days--> --}}
        
        <input type="submit" class="button" name="DeleteBtn" value="delete" style="background-color:red ; border-radius:5px; width:80px; height:30px; margin:5px 5px 5px 5px; " >
      </div>
    </form>
  </div>

</div>
{{-- <script src="{{ asset('js/popupform.js') }}"></script> --}}
<script src="{{ asset('js/ServiceDataFetcher.js') }}"></script>
</body>
</html>
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('css/bookingTable.css') }}" />
<link rel="stylesheet" href="{{ asset('css/PopupFormStyle.css') }}" />
@endsection