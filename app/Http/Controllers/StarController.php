<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
use App\Star;
use App\Ski_area;

class StarController extends Controller
{
    public function star(Star $star)
    {
        $count = Star::count();
        $place_id = null;
        $place_name = null;
        
        if (Auth::check() && Star::where('user_id', \Auth::user()->id)->first() !== null){
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
            
            return view('pages/show_all_stars')->with(['star'=>$star, 'place_id'=>$place_id, 'place_name'=>$place_name]);
            
        } else {
            return back();
        }
    }
    
    public function show(Star $star)
    {
        $place_id = $star['place_id'];
    
        if (Auth::check() && Star::where('user_id', \Auth::user()->id)->first() !== null){
            $star_rank = Ski_area::where('id', '=', $place_id)->first();
        } else {
            $star_rank = null;
        }
            
        if (Auth::check() && Auth::user()->id == $star->user_id){
            return view('pages/show_star')->with(['star'=>$star, 'star_rank'=>$star_rank]);
        } else {
            return back();
        }
    }
    
    public function store(Request $request, Star $star)
    {
        $input = $request['star'];
        $star['user_id'] = Auth::id();
        $star->fill($input)->save();
        return back();
    }

}
