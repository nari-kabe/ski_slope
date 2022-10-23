<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
use App\Profile;
use App\Find_friend;

class MatchingController extends Controller
{
    public function matching(Request $request)
    {
        $query = Profile::query();
        $query->where('Exchange_people', 1); //マッチングを許可しているレコードを取り出す 
        $query->where('Public_setting', 'public'); //公開設定をpublicにしているレコードを取り出す
        $query->where('user_id', '!=', Auth::user()->id);
        
        $sex = $request->input('sex');
        $age = $request->input('age');
        $prefecture = $request->input('prefecture');
        $home_slope = $request->input('home_slope');
        $ski_level = $request->input('ski_level');
        $snowboard_level = $request->input('snowboard_level');
        
        $sex_data = [
            10 => "選択なし",
            0 => "未回答",
            1 => "男",
            2 => "女",
            9 => "その他"
        ];
        
        $age_data = [
            "選択なし",
            "10代",
            "20代",
            "30代",
            "40代",
            "50代",
            "その他"
        ];
        
        $prefecture_data = [
            "選択なし",
            "北海道",
            "青森県",
            "岩手県",
            "宮城県",
            "秋田県",
            "山形県",
            "福島県",
            "茨城県",
            "栃木県",
            "群馬県",
            "埼玉県",
            "千葉県",
            "東京都",
            "神奈川県",
            "新潟県",
            "富山県",
            "石川県",
            "福井県",
            "山梨県",
            "長野県",
            "岐阜県",
            "静岡県",
            "愛知県",
            "三重県",
            "滋賀県",
            "京都府",
            "大阪府",
            "兵庫県",
            "奈良県",
            "和歌山県",
            "鳥取県",
            "島根県",
            "岡山県",
            "広島県",
            "山口県",
            "徳島県",
            "香川県",
            "愛媛県",
            "高知県",
            "福岡県",
            "佐賀県",
            "長崎県",
            "熊本県",
            "大分県",
            "宮崎県",
            "鹿児島県",
            "沖縄県"
        ];
        
        $level_data = [
            "選択なし",
            "未経験",
            "初級者",
            "中級者",
            "上級者"
        ];
        
        if (!empty($sex) && $sex[0] != 10) {
            $query->where('sex', $sex);
        }
        
        if (!empty($age) && $age[0] !== "選択なし") {
            if ($age[0] === "10代") {
                $query->whereBetween('age', [10, 19]);
            } else if ($age[0] === "20代") {
                $query->whereBetween('age', [20, 29]);
            } else if ($age[0] === "30代") {
                $query->whereBetween('age', [30, 39]);
            } else if ($age[0] === "40代") {
                $query->whereBetween('age', [40, 49]);
            } else if ($age[0] === "50代") {
                $query->whereBetween('age', [50, 59]);
            } else {
                $query->whereBetween('age', [60, 99]);
            }
        }
        
        //各条件に合ったデータを取得
        if (!empty($prefecture) && $prefecture[0] !== "選択なし") {
            $query->where('prefecture', $prefecture[0]);
        }
        
        if (!empty($home_slope)) {
            $query->where('home_slope', $home_slope);
        }
        
        if (!empty($ski_level) && $ski_level[0] !== "選択なし") {
            $query->where('ski_level', $ski_level[0]);
        }
        
        if (!empty($snowboard_level) && $snowboard_level[0] !== "選択なし") {
            $query->where('snowboard_level', $snowboard_level[0]);
        }
        
        $profiles = $query->get();
        
        //選択された性別のセレクトボックスの値を保持
        if(isset($_POST['sex'])){
            $old_sex = $_POST['sex'][0];
        } else {
            $old_sex = 10;
        }
        
        if (Auth::check()) {
            if (!empty($profiles)) {
                return view('pages/matching', compact(
                    'profiles', 'sex_data', 'old_sex', 'age_data', 'age', 'prefecture_data', 'prefecture',
                    'home_slope', 'level_data', 'ski_level', 'snowboard_level'
                ));
            } else {
                return view('pages/no_matching');
            }
        } else {
            return back();
        }
    }
}
