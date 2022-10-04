<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Http\Requests\ProfileRequest;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;

use App\Profile;


class ProfileController extends Controller
{
    
    public function profile(Profile $profile)
    {
        return view('pages/create_profile');
    }
    
    public function show(Profile $profile)
    {
        return view('pages/show_profile')->with(['profile' => $profile]);
    }
    
    public function store(Request $request, Profile $profile)
    {
        //dd($request->all());
        $request->validate([
            'profile.user_name' => ['required','string','max:20'],
            'profile.sex' => ['required'],
            'profile.age' => ['nullable','integer','max:100'],
            'profile.occupation' => ['nullable','max:10'],
            'profile.ski_level' => ['required'],
            'profile.snowboard_level' => ['required'],
            'profile.others_level' => ['nullable','string','max:200'],
            'profile.home_slope' => ['nullable','string','max:20'],
            'profile.public_setting' => ['required'],
            'profile.greeting' => ['nullable','string','max:300'],
        ]);
        
        $input = $request['profile'];
        $profile['user_id'] = Auth::id();
        $profile->fill($input)->save();
        return redirect('/profiles/' . $profile->id);
    }
    
    public function edit(Profile $profile)
    {
        return view('pages/edit_profile')->with(['profile' => $profile]);
    }
    
    public function update(Request $request, Profile $profile)
    {
        
        $request->validate([
            'profile.user_name' => ['required','string','max:20'],
            'profile.sex' => ['required'],
            'profile.age' => ['nullable', 'max:2'],
            'profile.occupation' => ['nullable', 'max:10'],
            'profile.ski_level' => ['required'],
            'profile.snowboard_level' => ['required'],
            'profile.others_level' => ['nullable','string','max:200'],
            'profile.home_slope' => ['nullable','string','max:20'],
            'profile.public_setting' => ['required'],
            'profile.greeting' => ['nullable','string','max:300'],
        ]);
        
        $input = $request['profile'];
        $profile->fill($input)->save();
    
        return redirect('/profiles/' . $profile->id);
    }
}
