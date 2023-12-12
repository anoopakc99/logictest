<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\Storage;


class ProfileController extends Controller
{
    public function create()
    {
        return view('create_profile');
    }
    
    public function store(Request $request)
    {
        // Validate and store profile details
        $profile = Profile::create([
            'user_id' => auth()->user()->id,
            'user_name' => $request->input('user_name'),
            'profile_photo' => $this->uploadProfilePhoto($request),

          
        ]);
     
        return redirect()->route('profile.index');
    }

    private function uploadProfilePhoto(Request $request)
    {
        if ($request->hasFile('profile_photo')) {
            $file = $request->file('profile_photo');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('images/profile', $fileName, 'public');

            return asset('storage/' . $filePath);
        }

        return null;
    }
    
    public function index()
    {
        $profiles = auth()->user()->profiles;
        $activeProfile = auth()->user()->profiles()->where('is_active', true)->first();
    
        return view('profile_index', compact('profiles', 'activeProfile'));
    }
    
    public function setActive(Profile $profile)
    {
        auth()->user()->profiles()->update(['is_active' => false]);
        $profile->update(['is_active' => true]);
    
        return redirect()->route('profile.index');
    }
}