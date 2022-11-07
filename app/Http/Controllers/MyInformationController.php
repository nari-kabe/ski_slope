<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
use App\Profile;
use App\Star;
use App\Ski_area;
use App\Find_friend;


class MyInformationController extends Controller
{
    public function matching()
    {
        //お気に入りマッチング相手
        $find_friend = new Find_friend();
        $star_profile_data = $find_friend->getData(); //お気に入りマッチング相手のデータ取得
        
        for ($i = 0; $i < count($star_profile_data); $i++) {
            $star_profile_id[] = $star_profile_data[$i]['profile_id'];
            $find_star_profile[] = Profile::find($star_profile_id[$i]);
            $star_profile[$star_profile_id[$i]] = $find_star_profile[$i]['user_name'];
        }
        
        if (!empty($star_profile)) {
            return $star_profile;
        }
    }
    
    public function starSkiArea()
    {
        //お気に入りスキー場
        $star = new Star();
        $star_slope_data = $star->getData(); //お気に入りスキー場のデータ取得
        $star_slope = null;
        
        if ($star_slope_data -> isEmpty() === false) {
            for ($i = 0; $i < count($star_slope_data); $i++) {
                $star_slope_id[] = ['star_id' => $star_slope_data[$i]['id'], 'place_id' => $star_slope_data[$i]['place_id']];
                
                //スキー場があるか確認し、あれば配列に入れる
                if (Ski_area::find($star_slope_id[$i]['place_id']) !== null) {
                    $find_star_slope[] = Ski_area::find($star_slope_id[$i]['place_id']);
                    $find_star_id[] = $star_slope_id[$i]['star_id'];
                }
            }
            
            for ($i = 0; $i < count($find_star_slope); $i++) {
                $star_slope[] = ['num' => $i, 'star_id' => $star_slope_id[$i]['star_id'], 
                                 'place_id' => $find_star_slope[$i]['id'], 'place_name' => $find_star_slope[$i]['place_name']];
            }
        }
        
        return $star_slope;
    }
    
    public function show()
    {
        $star_profile = $this->matching();
        $star_slope = $this->starSkiArea();
        $my_profile = null;
        
        if (Auth::check()) {
            //プロフィール
            if (Profile::where('user_id', \Auth::user()->id)->first() !== null) {
                $my_profile = Profile::where('user_id', \Auth::user()->id)->first();
            }
        }

        if ($my_profile !== null) {
            return view('pages/my_information')->with(['my_profile' => $my_profile, 'star_slope'=>$star_slope, 'star_profile'=>$star_profile]);
        } else {
            return view('pages/my_information')->with(['my_profile' => $my_profile, 'star_slope'=>$star_slope, 'star_profile'=>$star_profile]);
        }
        
    }
    
    public function destroy($id){
        $destroy = Star::find($id);
        $destroy->delete();
        return redirect('/pages/my_information');
    }
    
}
