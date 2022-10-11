<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
use App\Profile;
use App\Star;
use App\Ski_area;


class MyInformationController extends Controller
{
    public function show(Profile $profile, Star $star)
    {
        $count = Star::count();
        $place_id = null;
        $place_name = null;
        $my_profile = null;
        $my_star = null;
        
        if (Auth::check()) {
            if (Profile::where('user_id', \Auth::user()->id)->first() !== null) {
                $my_profile = Profile::where('user_id', \Auth::user()->id)->first();
            }
            if (Star::where('user_id', \Auth::user()->id)->first() !== null) {
                $my_star = Star::where('user_id', \Auth::user()->id)->first();
            }
        }
            
        if ($my_profile !== null) {
       
            if ($my_star !== null) {
                for($i = 1; $i <= $count; $i++){
                    if (Star::find($i) === null){
                        $count += 1;
                    } else if (Star::find($i) !== null && Star::find($i)['user_id'] === Auth::user()->id) {
                        $stars[] = Star::find($i);
                    }
                }
                for($i = 0; $i < count($stars); $i++){
                        $place_id[] = $stars[$i]['place_id'];
                        $place_name[] = Ski_area::where('id', '=', $place_id[$i])->first()['place_name'];
                }
                
                return view('pages/my_information')->with(['my_profile' => $my_profile, 'star'=>$star, 'place_id'=>$place_id, 'place_name'=>$place_name]);
            }
            
            return view('pages/my_information')->with(['my_profile' => $my_profile, 'place_id'=>$place_id]);
        }
        
        else {
            if ($my_star !== null) {
                for($i = 1; $i <= $count; $i++){
                    if (Star::find($i) === null){
                        $count += 1;
                    } else if (Star::find($i) !== null && Star::find($i)['user_id'] === Auth::user()->id) {
                        $stars[] = Star::find($i);
                    }
                }
                for($i = 0; $i < count($stars); $i++){
                        $place_id[] = $stars[$i]['place_id'];
                        $place_name[] = Ski_area::where('id', '=', $place_id[$i])->first()['place_name'];
                }
                
                return view('pages/my_information')->with(['my_profile' => $my_profile, 'star'=>$star, 'place_id'=>$place_id, 'place_name'=>$place_name]);
            }
            
            return view('pages/my_information')->with(['place_id'=>$place_id]);
        }
        
    }
    
}
