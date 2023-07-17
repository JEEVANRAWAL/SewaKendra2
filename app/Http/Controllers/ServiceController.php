<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function showServiceRegistrationForm(){
        $categories= ServiceCategory::all();
        return view('serviceProvider/addServiceForm',['categories'=> $categories]);
      }
  
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
        // this returns to service page.
        return view('servicePage');
      }
}
