<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
use App\Profile;
use App\Ski_area;
use App\Star;
use App\Find_friend;

class MatchingController extends Controller
{
    public function matching()
    {
        $query = Profile::query();
        $query->where('Exchange_people', 1); //マッチングを許可しているレコードを取り出す 
        $query->where('Public_setting', 'public'); //公開設定をpublicにしているレコードを取り出す
        $query->where('user_id', '!=', Auth::user()->id);
        $profiles = $query->get();
        
        $count_items = count($profiles);
        
        if (Auth::check()) {
            if ($count_items >= 1) {
                for ($i = 0; $i < $count_items; $i++) {
                    $profile_id[] = $profiles[$i]['id'];
                    $profile_name[] = $profiles[$i]['user_name'];
                }
                return view('pages/matching')->with(['profiles'=>$profiles, 'count_items'=>$count_items, 'profile_id' => $profile_id, 'profile_name'=>$profile_name]);
            } else {
                return view('pages/no_matching');
            }
        } else {
            return back();
        }
    }
}
