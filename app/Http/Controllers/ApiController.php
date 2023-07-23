<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getServices(Request $request){
        $services = Service::limit(6)->with('ServiceProvider', 'ServiceCategory')->get();
        return response()->json($services);
    }
}
