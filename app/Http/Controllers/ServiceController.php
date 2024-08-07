<?php

namespace App\Http\Controllers;

use App\Helpers\ServiceHelper;
use App\Models\Booking;
use App\Models\Service;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    public function showServiceRegistrationForm(){
        $categories= ServiceCategory::all();
        return view('serviceProvider/addServiceForm',['categories'=> $categories]); //here we have sent associative array i.e."categories" as key "$categories" as value
      }
  
      //This function is used to register new services through provider panel
      public function addServices(Request $request){
        $validated= $request->validate([
          'provider_id'=> 'required',
          'name'=> 'required',
          'category_id'=> 'required',
          'price'=> 'required',
          'description'=>'required',
          'img'=> 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);
  
        // $providerID= Auth::guard('service-providers')->user()->id;
        // echo $providerID;
  
        $image = $request->file('img');
        $imgNewName = time() . '.' . $image->getClientOriginalExtension(); // new name created here with its original Extension
        $image->storeAs('public/serviceImages', $imgNewName); // here we have created new folder inside storage/public directory "serviceImage" and stored image there.
        
  
        Service::create([
          'provider_id'=> $request->provider_id,
          'name'=> $request->name,
          'category_id'=>$request->category_id,
          'price'=>$request->price,
          'description'=> $request->description,
          'img'=>$imgNewName
        ]);
  
        return redirect("/provServices");
  
      }

      public function showServices(Request $request){
        $frequentlyBookedServices = ServiceHelper::getFrequentlyBookedServices(); // here we using algorithm to display frequently booked services
        $services = Service::with('ServiceProvider', 'ServiceCategory')->get();
        // this returns to service page.
        return view('servicePage', compact('services', 'frequentlyBookedServices')); //here we have sent associative array i.e."service" as key "$service" as value
      }


     //This function is to display clicked service in a wide view. Also this function is used to display clicked service in a updateform in a provider panel 
      public function showClickedService(Request $request){
        if(Auth::check()){ // if the requested user is authenticated plus normal user. The condition will be true.

          $id = $request->id;
          $clickedService = Service::where('id','=', $id)->with('ServiceProvider', 'ServiceCategory')->get();
          return view('Users.service',['clickedService'=> $clickedService]);

        }elseif(Auth::guard('service-providers')->check()){ //Here we have used guard to verify the authenticated user. To know if the requested user is authenticated or not if "yes" it also check the user is service_provider or not by the help of "guard". In another word "if the requested user is authenticated plus service_provider the condition will be true. otherwise false. "

          $id = $request->id;
          $clickedService = Service::where('id','=', $id)->with('ServiceCategory')->get();
          $categories= ServiceCategory::all();
          return view('serviceProvider.updateServiceForm',['clickedService'=> $clickedService, 'categories'=> $categories]);

        }else{
          return redirect('login')->with('error','You need to login first!!');
        }
      }


     //This function is to book service from user side
      public function BookingDone(Request $request){
        $stored='';
        $data = $request->all();
        // $currentDate= now()->toDateString();
        $checkSameBooking= Booking::where('user_id', '=', $request->user_id)->where('service_id', '=', $request->service_id)->where(function ($query) {
                $query->where('status', 'pending')
                ->orWhere('status', 'approved');
              })->count();

                
        if($checkSameBooking == 0){

          $stored= Booking::create($data);
        }

        if($stored){
          return redirect('/services')->with('success', 'Booking Done wait for the approvel from provider!!');
        }else{
          return redirect('/services')->with('fail', "Booking failed!. You have already booked this service");
        }
      }


      //This function is to update service from provider panel
      public function serviceUpdate(Request $request){
        $validated= $request->validate([
          'name'=> 'required',
          'category_id'=> 'required',
          'price'=> 'required',
          'description'=>'required',
          'img'=> 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $image = $request->file('img');
        $imgNewName = time() . '.' . $image->getClientOriginalExtension(); // new name created here with its original Extension
        $image->storeAs('public/serviceImages', $imgNewName); // here we have created new folder inside storage/public directory "serviceImage" and stored image there.

        $update= Service::where('id', '=', $request->id)->update([
          'name'=> $request->name,
          'category_id'=>$request->category_id,
          'price'=>$request->price,
          'description'=> $request->description,
          'img'=>$imgNewName
        ]);
       
        if($update){
         
          return redirect('/provServices');

        }else{
          echo "update fail!!";
        }
        
      }




     // This function is used to delete services from provider panel
      public function DeleteService(Request $request){
        Service::find($request->id)->delete();
        return redirect('/provServices');
      }


      
}
