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
        if (Auth::check() && Star::where('user_id', \Auth::user()->id)->first() !== null){
            $count = Star::where('user_id', Auth::user()->id)->count();
        
            for($i = 1; $i <= $count; $i++){
                $stars[] = Star::find($i);
                $place_id[] = $stars[$i - 1]['place_id'];
                $place_name[] = Ski_area::where('id', '=', $place_id[$i - 1])->first()['place_name'];
            }
            
        } else {
            $place_id = null;
            $place_name = null;
        }
        
        return view('pages/show_all_stars')->with(['star'=>$star, 'place_id'=>$place_id, 'place_name'=>$place_name]);
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
        return redirect('/stars/' . $star->id);
    }
}
