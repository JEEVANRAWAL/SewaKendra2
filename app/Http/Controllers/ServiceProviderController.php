<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserCredentialsMail;
use Illuminate\Support\Str;


class ServiceProviderController extends Controller
{
    public function providerlogin(Request $request){
        $username= $request->session()->get('username'); // This email and password we are getting from Accesscontroller. which is being passed as a flash data using with() method.
        $password=$request->session()->get('password');

        if(Auth::guard('service-providers')->attempt(['user_name'=> $username, 'password'=>$password])){ //attempt method expect associative array so we have passed associative array in it
          // dd(Auth::guard('service-providers')->user());
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


    public function showRegistration(){
       return view('serviceProvider.registration');
    }


    public function providerRegistration(Request $request){
       $validation= $request->validate([
          'name' => 'required',
          'address' => 'required',
          'phone_number' => 'required|max:10|min:10',
          'email' => 'required|email|unique:service_providers',
       ]);

       $requestForRegistration= ServiceProvider::create($validation);

       if($requestForRegistration){
        return redirect('providerRegistrationForm')->with('success', 'Form Submitted!!');
       }
    }


    //This request comes from admin panel. To approve requested service provider
    public function approveProvider(Request $request){
      if(isset($request->approveBtn)){
       $id= $request->ProviderId;
       $status= $request->approveBtn;
       $recipientEmail= $request->input('ProviderEmail');

       $name= $request->ProviderName;
       $nameParts = explode(' ', $name); /* sperating first name from full name */
       $firstName = $nameParts[0]; 
       $username = "prov@" . $firstName;


       $password= Str::random(10);
       $hashedPassword = bcrypt($password);
       $approveProvider= ServiceProvider::where('id', '=', $id)->update([
        'user_name' => $username,
        'password' => $hashedPassword,
        'status' => $status. "d"
       ]);

        if($approveProvider){
          Mail::send(new UserCredentialsMail($username, $password, $recipientEmail));
           
          return redirect('pendingRequest')->with('success', 'provider successfuly approved!!');
        }

      }else{
        $id= $request->ProviderId;
        $status= $request->cancelBtn;

        $providerCancelled= ServiceProvider::where('id', '=', $id)->update([
          'status' => $status. "led"
         ]);

         if($providerCancelled){
          return redirect('pendingRequest')->with('cancel', 'provider request cancelled!!');
         }
      }
    }

}
