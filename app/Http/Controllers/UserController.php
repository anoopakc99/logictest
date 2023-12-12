<?php

namespace App\Http\Controllers;
use Auth;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;

class UserController extends Controller
{

    public function showLoginForm()
{
    return view('login');
}

    public function create()
    {
        return view('register');
    }
    
    public function store(Request $request)
    {
        // Validate 
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'city' => $request->input('city'),
        ]);
    
        // Login the user
        Auth::login($user);
    
        // Redirect to profile  page
        return redirect()->route('profile.create');
    }
}