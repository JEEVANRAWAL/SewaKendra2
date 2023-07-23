<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
   public function registration(Request $request){
       $data= $request->validate([
        'name'=> 'required',
        'address'=> 'required',
        'phone_number'=> 'required| min:10| max:10',
        'email'=> 'required|email|unique:users',
        'user_name'=> 'required|unique:users| min:6| max:15',
        'password'=> 'required|min:6|max:15',
        'Cpassword'=> 'required| same:password'
      ]);

      $storedData= User::create($data);


      if($storedData){
        return back()-> with('success', 'you have registered successfully!!');
      }else{
        return back()-> with('fail', 'registration failed!!');
      }
    }

    public function userlogin(Request $request){
      $username= $request->session()->get('username'); // This email and password we are getting from admincontroller. which is being passed as a flash data using with() method.
      $password=$request->session()->get('password');

      if(Auth::attempt(['user_name'=>$username, 'password'=>$password])){
        $request->session()->regenerate(); //using session() helper along with regenerate() to regenerate session ID for the security reasons.
        return redirect('/');
      }else{
        return redirect('login')->with('error', "Credential didn't match!!" );
      }
    }

    public function userview(){
      return view('userDashboard');
    }

    public function viewLoginForm(){
      return view('login');
    }

    public function viewRegistrationForm(){
      return view('registration');
    }
}
