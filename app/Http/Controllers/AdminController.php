<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\ServiceProvider;
use App\Models\User;
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
    $userRole= Auth::user()->role;
    if(Auth::check() && $userRole==1){
        $numAdmin= User::where('role', '=', 1)->count();
        $numUser= User::where('role', '=', 0)->count();
        $numService= Service::count();
        $numProvider= ServiceProvider::where('status', '=', 'approved')->count();
        $numPending= ServiceProvider::where('status', '=', 'pending')->count();

        return view('admin\adminDashboard', compact('numAdmin', 'numUser', 'numService', 'numProvider', 'numPending'));
    }else{
        return redirect('loginForm')->with('error', 'Invalid Request! Access Denied!!');
    }

   }


   public function viewPendingProviders(){
    $pendingProviders= ServiceProvider::where('status', '=', 'pending')->get();

    return view('admin.pendingRequest', compact('pendingProviders'));
   }

   public function viewUsers(){
    $users= User::where('role', '=', 0)->get();
    return view('admin.users',['users'=> $users]);
   }

   public function viewServices(){
    $services= Service::all();
    $category= ServiceCategory::all();
    return view('admin.services',['services'=> $services, 'categorys'=>$category]);
   }

   public function DeleteService(Request $request){
    Service::find($request->id)->delete();
    return back()->with('success', 'Service deleted successfully!!');
   }


   public function UpdateService(Request $request){
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
     
      return back()->with('success', "Service updated successfully!!");

    }else{
      return back()->with('cancel', 'Failed to update!!');
    }
    
  }
}
