<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
use App\Star;
use App\Ski_area;

class StarController extends Controller
{
    public function show(Star $star)
    {
        
        // $user_id = $ski_area['user_id'];
        // if (Auth::check() && Profile::where('user_id', \Auth::user()->id)->first() !== null){
        //     $edited_user = Profile::where('user_id', '=', $user_id)->first();
            
        $place_id = $star['place_id'];
        if (Auth::check() && Star::where('user_id', \Auth::user()->id)->first() !== null){
            $star_rank = Ski_area::where('id', '=', $place_id)->first();
        } else {
            $star_rank = null;
        }
        //dd($star_rank);
            
        if (Auth::user()->id == $star->user_id){
            return view('pages/show_star')->with(['star'=>$star, 'star_rank'=>$star_rank]);
        // } else if ($profile->public_setting == 'public') {
        //     return view('pages/star')->with(['star' => $star]);
        } else {
            return back();
        }
    }
    
    public function store(Request $request, Star $star)
    {
        $input = $request['star'];
        $star['user_id'] = Auth::id();
        $star->fill($input)->save();
        return redirect('/stars/' . $star->id);
    }
}
