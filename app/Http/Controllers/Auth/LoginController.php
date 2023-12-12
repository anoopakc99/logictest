<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    

    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        // validate data 
        $request->validate([
            'email' => 'required',
            'password' => 'required|min:8|string'
        ]);

        // login code 
        
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect('profile');
        }else{
            return back()->with('error', "Your email and password do not match. Please try again.");
  
        }
        
}


public function logout(){
    \Session::flush();
    \Auth::logout();
    return redirect('login')->with('success', 'Admin Logout Succesfully! ');;

    
}
}
