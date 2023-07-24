@extends('layouts.main')


@section('content')
<section class="our-services">
    <div class="container">
        <div class="Category-box">
            <div class="header-title">
                <h1>Frequently Booked Services</h1>
            </div>
            @if(Session::has('success'))
            <div class="message">
                <span>{{ Session::get('success') }}</span>
            </div> @elseif(Session::has('fail'))
            <div class="message">
                <span>{{ Session::get('fail') }}</span>
            </div>
            @endif

            <ul class="category-row" style="justify-content: flex-start">
                @foreach ($frequentlyBookedServices as $frequentlyBooked)
                    
                <li class="category-col" style="margin-left: 25px">
                    <a href="{{ 'serviceBookingPage/'. $frequentlyBooked['service']->id }}">
                        <div class="card">
                            <div class="card-body">
                                <div class="image">
                                    <img src="{{ asset('storage/serviceImages/' . $frequentlyBooked['service']->img) }}" alt="image">
                                </div>
                                <div class="favourite"  style="top: 20px">
                                    <i class="fa-regular fa-heart"></i>
                                </div>
                                <div class="priceTag" style="top: 212px">
                                    <span>{{ $frequentlyBooked['service']->price }}</span>
                                </div>
                                <h6 class="categories-name" style="margin-top: 15px">{{ $frequentlyBooked['service']->name }}</h6>
                                

                            </div>
                        </div>
                    </a>
                </li>
                @endforeach

            </ul>

            <div class="header-title">
                <h1>Services</h1>
            </div>

            <ul class="category-row">
                @foreach ($services as $service)
                    
                <li class="category-col">
                    <a href="{{ 'serviceBookingPage/'. $service->id }}">
                        <div class="card">
                            <div class="card-body">
                                <div class="image">
                                    <img src="{{ asset('storage/serviceImages/' . $service->img) }}" alt="image">
                                </div>
                                <div class="favourite">
                                    <i class="fa-regular fa-heart"></i>
                                </div>
                                <div class="priceTag">
                                    <span>{{ $service->price }}</span>
                                </div>
                                <h6 class="categories-name">{{ $service->name }}</h6>
                                <p class="serviceCategory">{{ $service->ServiceCategory->name }}</p>

                                <div class="provider">
                                    <div class="profile">
                                        <img src="../images/photo.jpg" alt="">
                                    </div>
                                    <span class="providerName">{{ $service->ServiceProvider->name }}</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </li>
                @endforeach

            </ul>
        </div>
    </div>
</section>
@endsection