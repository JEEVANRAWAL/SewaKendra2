<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class AccessController extends Controller
{
    
    function accessChecker(Request $request){
        $validated= $request->validate([
            'username'=> 'required',
            'password'=>'required| min:5| max:15'
        ]);

        //extracting first five letters from the username.
        $extractFirstFiveLetters= substr($validated['username'],0,5);
        
        //This condition is to check the "user" whether it's from user table or provider table
        if($extractFirstFiveLetters !=="prov@"){
            //This validation checks whether the incoming username exists in the users table or not.
            $request->validate(['username'=>[Rule::exists('users', 'user_name')]]);

            //retriving users data from database based on provided credential
            $userData= User::where('user_name', '=', $validated['username'])->first(); 
            
            $username= $validated['username'];
            $password= $validated['password'];
    
            /*   
               This condition will check whether the users role attributes value is equals to zero or not. IF it's "True".

               Here we returning multiple data to the "userlogin Route" with the help of with()menthod which also accept associative array.
               NOTE:- Everytime when we use "with() method " to pass data. It will always store data as a flash data in the session for the next request.
               Flash data is designed to be available only for the next request and is automatically removed from the session after that.
            */
            
            if($userData->role == 0){
              
               return redirect()->route('userlogin')->with(
                    [
                        'username'=> $username,
                        'password'=> $password
                    ]
                );

            }elseif($userData->role == 1){
                
                return redirect()->route('adminlogin')->with(
                    [
                        'username'=> $username,
                        'password'=> $password
                    ]
                );

            }
        } else{
             
            $username= $validated['username'];
            $password= $validated['password'];

            return redirect()->route('providerlogin')->with(
                [
                    'username'=> $username,
                    'password'=> $password
                ]
            );
        }
    }

    public function logout(Request $request): RedirectResponse
    {
    Auth::logout();
 
    $request->session()->invalidate();
 
    $request->session()->regenerateToken();
 
    return redirect('/');
    }
}
