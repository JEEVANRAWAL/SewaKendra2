<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
   public function adminLogin(Request $request){
    $username= $request->session()->get('username');
    $password= $request->session()->get('password');

    if(Auth::attempt(['user_name'=>$username, 'password'=>$password])){
        $request->session()->regenerate();
        return redirect('adminDashboard')->with('success', 'welcome to Admin panel. You have successfully logged in as Admin');
    }else{
        return view('registration')->with('fail', 'credentials didnt match. please register to login!!');
    }

   }

   public function viewAdmin(Request $request){
    return view('admin\adminDashboard');
   }
}
