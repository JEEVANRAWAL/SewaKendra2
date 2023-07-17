@extends('serviceProvider.Layout.main')

@section('css')
<link rel="stylesheet" href="{{ asset('css/StyleForm.css') }}">
@endsection

@section('content')
    <section class="main">
      <div class="main-top">
        <h1>Register Services</h1>
        <i class="fas fa-user-cog"></i>
      </div>
      <div class="Business-info">
        <form action="{{ route('addServices') }}" method="post" enctype="multipart/form-data">
             @csrf 
            <div id="labels">
                <label for="name">Service Name:</label>
                <label for=""></label><!--this empty labels are used to align with input Fields-->
                <label for="category">Category:</label>
                <label for=""></label>
                <label for="Price">Service Price:</label>
                <label for=""></label>
                <label for="description">Description</label>
                <label for=""></label>
                <label for="template">Upload Template</label>
                <label for=""></label>
                <label for=""></label>
                <input type="submit" value="submit" id="button">
            </div>

            <div id="inputs">
                <input type="hidden" name="provider_id" value="{{ auth()->guard('service-providers')->user()->id }}" class="inputField">
                <input type="text" class="inputField" name="name" value="{{ old('name') }}" id="name">
                <span>@error('name') {{ $message }} @enderror</span>
            
                <select name="category_id" class="inputField" id="category">
                  @foreach ($categories as $category)
                  <option value="{{ $category->id }}">{{ $category->name }}</option>
                  @endforeach
                </select>
                <span>@error('category_id') {{ $message }} @enderror</span>

                <input type="text" class="inputField" name="price" value="{{ old('price') }}" id="Price">
                <span> @error('price') {{ $message }} @enderror </span>

                <input type="text" class="inputField" name="description" value="{{ old('description') }}" id="description">
                <span> @error('description') {{ $message }} @enderror </span>


                <input type="file" name="img" class="inputField" value="" id="template">
                <span> @error('img') {{ $message }} @enderror </span>

            </div>

        </form>
      </div>
      <script>
       //javascript to give resposive margin to service panel
              const BusinessInfo = document.querySelector('.Business-info');
              const form = document.querySelector('form');

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
                     form.style.width = '100%';
                     console.log('Small screen');
                 } else if (window.matchMedia(breakpoints.medium).matches) {
                     BusinessInfo.style.marginLeft = '0px';
                     form.style.width = '100%';
                     console.log('Medium screen');
                 } else if (window.matchMedia(breakpoints.large).matches) {
                    BusinessInfo.style.marginLeft = '130px';
                    form.style = '';
                    console.log('Large screen');
                 }
              }

             // Initial call to handle the screen size on page load
                handleScreenSizeChange();

            // Add event listener for screen size changes
              window.addEventListener('resize', handleScreenSizeChange);

          </script>
    </section>
  </body>
</html>
@endsection