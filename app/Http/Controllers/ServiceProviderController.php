<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceProviderController extends Controller
{
    public function providerlogin(Request $request){
        $username= $request->session()->get('username'); // This email and password we are getting from Accesscontroller. which is being passed as a flash data using with() method.
        $password=$request->session()->get('password');

        if(Auth::guard('service-providers')->attempt(['user_name'=> $username, 'password'=>$password])){ //attempt method expect associative array so we have passed associative array in it
           
            $request->session()->regenerate(); //using session() helper along with regenerate() to regenerate session ID for the security reasons.
            return redirect('/providerDashboard');
          }else{
            return redirect('login')->with('error', "Credential didn't match!!" );
          }
    }

    public function showAssociateServices(){
      $provider = Auth::guard('service-providers')->user();
      $provServices = Service::where('provider_id', $provider->id)->with('ServiceCategory')->get();
      //  foreach($provServices as $provService){
      //   echo $provService->name;
      //   echo $provService->ServiceCategory->name;
      //  }

      return view('serviceProvider/servicesPage',['provServices'=>$provServices]);
    }

    public function provIndex(){
      if(Auth::guard('service-providers')->check()){
       $providerId= Auth::guard('service-providers')->user()->id;
        $NumberOfservices = Service::where('provider_id', '=', $providerId)->count();
        $NumberOfpendings = Booking::where('provider_id', $providerId)->where('status', 'pending')->count();
       return view('serviceProvider.dashboard',compact('NumberOfservices', 'NumberOfpendings'));
      }
    }

}
