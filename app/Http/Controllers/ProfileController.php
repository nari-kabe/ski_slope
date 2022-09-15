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
        $input = $request['profile'];
        //dd($input);
        $profile->fill($input)->save();
        return redirect('/profile/' . $profile->id);
    }
    
    public function edit(Profile $profile)
    {
        return view('pages/edit_profile')->with(['profile' => $profile]);
    }
    
}
