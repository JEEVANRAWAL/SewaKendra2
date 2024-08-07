<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function showAssociateBookings(){
        if(Auth::guard('service-providers')->check()){
            $provider_id= Auth::guard('service-providers')->user()->id;
            $bookings= Booking::where('provider_id', '=', $provider_id)->with('User', 'Service')->get();
            return view('serviceProvider.bookingPage',['bookings'=> $bookings]);
        }
    }

    public function showUsersBookingHistory(){
      if(Auth::check()){
          $user_id= Auth::user()->id;
          $bookings= Booking::where('user_id', '=', $user_id)->with('Service')->get();
          return view('Users.bookingHistory',['bookings'=> $bookings]);
      }
  }

    public function updateStatus(Request $request){
      $updateStatus= Booking::where('id', '=', $request->bookingId)->update([
         'status'=> $request->status
      ]);

      if($updateStatus){
        if(Auth::guard('service-providers')->check()){

          return redirect('provBookings');
        }else{
          return redirect('/UsersBookingHistory');
        }
      }
    }
}
