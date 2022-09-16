<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Http\Requests\ProfileRequest;
use GuzzleHttp\Client;

use App\Profile;


class PostController extends Controller
{
    public function show(Profile $profile)
    {
         return view('pages/show_profile')->with(['profile' => $profile]);
    }
    
    public function store(ProfileRequest $request, Profile $profile)
    {
        $request->validate([
            'profile.place_name' => ['required','string','max:40'],
            'profile.home_page' => ['nullable','url'],
            'profile.zip_code' => ['required', new ZipCodeRule()],
            'profile.prefecture' => ['required','string','max:3'],
            'profile.city' => ['required','string','max:30'],
            'profile.after_address' => ['required','string','max:50'],
            'profile.phone_number' => ['required','string','max:60'],
            'profile.business_hours' => ['required','string'],
            'profile.evening_hours' => ['nullable','string','max:30'],
            'profile.season' => ['nullable','string'],
            'profile.lesson' => ['nullable','string'],
            'profile.restaurant' => ['nullable','string'],
            'profile.spa' => ['nullable','string'],
            'profile.hotel' => ['nullable','string'],
           
        ]);
        
        $input = $request['profile'];
        //dd($input);
        $profile->fill($input)->save();
        return redirect('/profile/' . $profile->id);
    }
    
    public function edit(Profile $profile)
    {
        return view('pages/edit_profile')->with(['profile' => $profile]);
    }
    
    public function update(Request $request, Profile $profile)
    {
        
        $request->validate([
            'profile.place_name' => ['required','string','max:40'],
            'profile.home_page' => ['nullable','url'],
            'profile.zip_code' => ['required', new ZipCodeRule()],
            'profile.prefecture' => ['required','string','max:3'],
            'profile.city' => ['required','string','max:30'],
            'profile.after_address' => ['required','string','max:50'],
            'profile.phone_number' => ['required','string','max:60'],
            'profile.business_hours' => ['required','string'],
            'profile.evening_hours' => ['nullable','string','max:30'],
            'profile.season' => ['nullable','string'],
            'profile.lesson' => ['nullable','string'],
            'profile.restaurant' => ['nullable','string'],
            'profile.spa' => ['nullable','string'],
            'profile.hotel' => ['nullable','string'],
           
        ]);
        
        $input = $request['profile'];
        $profile->fill($input)->save();
    
        return redirect('/profile/' . $profile->id);
    }
}
