<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceProvider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Fetch data for the service section and provider section
        $services = Service::limit(6)->with('ServiceProvider', 'ServiceCategory')->get(); 
        $providers = ServiceProvider::all();
        $offers = Service::where('offer', '!=', null)->get();

        // Pass the data to the home page view
        return view('index', compact('services', 'providers', 'offers')); // here we are using compact() function which helps to make associative array. In it we have to pass variables name and it converts it into key and the values that variable stores as a value. This method is more reliable and useful then our premative way. eg:- we used to do it like this before "view('index',['services'=> $services, 'providers'=> $providers])".
    }
}
