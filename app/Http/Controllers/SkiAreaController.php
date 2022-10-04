<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;
use App\Rules\ZipCodeRule;
use App\Rules\PrefectureRule;
use App\Rules\CityRule;
use App\Rules\PhoneNumberRule;
use App\Ski_area;
use App\Profile;

class SkiAreaController extends Controller
{
    public function getTweets($num)
    {
        //エンドポイントを指定
        $base_url = 'https://api.twitter.com/2/tweets/search/recent';
        
        //検索条件を指定
        $query = [
          'query' => '#スキー OR #スノーボード',
          'sort_order' => 'recency',
          'expansions' => 'author_id',
          'tweet.fields' => 'created_at',
          'max_results' => $num
        ];
        $url = $base_url . '?' . http_build_query($query);
        
        //ヘッダ生成
        ///Bearer Token
        $token = config('const.twitter.bearer_token');
        $header = [
            'Authorization: Bearer ' . $token,
            'Content-Type: application/json',
        ];
        
        //cURLで問い合わせ
        $curl = curl_init();
        
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        
        $response = curl_exec($curl);
        //dd($response);
        $result = json_decode($response, true);
        //dd($result);
        curl_close($curl);
        
        return $result;
    }
    
    public function getAreaTweets($num)
    {
        //エンドポイントを指定
        $base_url = 'https://api.twitter.com/2/tweets/search/recent';
        
        //検索条件を指定
        $query = [
          'query' => '#オフトレ OR #ハーフパイプ OR #モーグル OR #スノーゴーグル OR #冬スポ22 OR #リフト券',
          'sort_order' => 'recency',
          'expansions' => 'author_id',
          'tweet.fields' => 'created_at',
          'max_results' => $num
        ];
        $url = $base_url . '?' . http_build_query($query);
        
        //ヘッダ生成
        ///Bearer Token
        $token = config('const.twitter.bearer_token');
        $header = [
            'Authorization: Bearer ' . $token,
            'Content-Type: application/json',
        ];
        
        //cURLで問い合わせ
        $curl = curl_init();
        
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        
        $response = curl_exec($curl);
        //dd($response);
        $result = json_decode($response, true);
        //dd($result);
        curl_close($curl);
        
        return $result;
    }
    
    public function login_home(Ski_area $ski_area)
    {
        // dd($this->getTweets(15));
        $results=$this->getTweets(10);
        $users=[];
        $tweets=[];
        //連想配列を作る
        for($i=0; $i < count($results["includes"]["users"]); $i++){
            //・左辺：空の配列$users=[]に["includes"]["users"][$i]["id"]をkeyとして入れる
            //・右辺：keyに対する値として、$results["includes"]["users"][$i]を指定する
            $users[$results["includes"]["users"][$i]["id"]] = $results["includes"]["users"][$i]; //i番目のID（authorID）=ユーザーのi番目
            //dd($users);
        }
        for($i=0; $i < count($results["data"]); $i++){
            //・空の配列の$tweets=[]に$results["data"][$i]の中身を0番目から入れていく
            $tweets[$i]=$results["data"][$i]; //普通の配列で、i番目をresultsデータのi番目とする
            //dd($tweets);
            $tweets[$i]["user"]=$users[$results["data"][$i]["author_id"]]; 
            //・上のfor文の$results["includes"]["users"][$i]["id"]] と 下のfor文の$results["data"][$i]["author_id"] は同じだから、
            //  $results["data"][$i]["author_id"]を連想配列のkeyとして、連想配列$usersの値を呼び出す
            //・つまり、64行目では、$results["data"][$i]が誰のものかを上のfor文で作った連想配列$usersから炙り出し、結びつけている
            //  (resultsデータのi番目をauthorID（各個人のid。tweetのidではない）と結びつける)
            //dd($tweets);
        }
        
        if (Auth::check()){
            $profile_record = Profile::where('user_id', \Auth::user()->id)->first();
        }
        else {
            $profile_record = null;
        }
        return view('pages/login_home')->with(
            ['tweets'=>$tweets ,'ski_areas'=>$ski_area->get(), 'profile_record'=>$profile_record]
            );
    }
    
    public function show(Ski_area $ski_area, Profile $profile)
    {
        /*
         *OpenweatherAPI
         */
        $API_KEY = config('const.openweathermap.key');
        $base_url = config('const.openweathermap.url');
        $city = $ski_area->city;
        //dd($city);
  
        $url = "$base_url?units=metric&q=$city&APPID=$API_KEY&lang=ja";

        // 接続
        $client = new Client();

        $method = "GET";
        
        try{
            $response = $client->request($method, $url);
        }catch(\Exception $e){
            $prefecture = $ski_area->prefecture;
            $url = "$base_url?units=metric&q=$prefecture&APPID=$API_KEY";
            $response = $client->request($method, $url);
        }
        
        $weather_data = $response->getBody();
        //dd($weather_data);
        $weather_data = json_decode($weather_data, true);
        //dd($weather_data);
        $weather=$weather_data['list'][0];
        //dd($weather);   
        $place_id=$weather_data['city']['id'];
        //dd($place_id);
        
        /*
         *TwitterAPI
         */
        $results=$this->getAreaTweets(10);
        $users=[];
        $tweets=[];
        for($i=0; $i < 4; $i++){
            $users[$results["includes"]["users"][$i]["id"]] = $results["includes"]["users"][$i];
            //dd($users);
        }
        for($i=0; $i < 4; $i++){
            $tweets[$i]=$results["data"][$i];
            //dd($tweets);
            $tweets[$i]["user"]=$users[$results["data"][$i]["author_id"]]; 
        }
        
        
        /*
         *GoogleMapAPI
         */
        $GOOGLE_MAP_API_KEY = config('const.googlemap.key');
        
        $user_id = $ski_area['user_id'];
        if (Profile::where('user_id', \Auth::user()->id)->first() !== null){
            $edited_user = Profile::where('user_id', '=', $user_id)->first()['user_name'];
        } else {
            $edited_user = null;
        }
        
        return view('pages/show_slope')->with([
            'ski_area' => $ski_area, 'place_id' => $place_id, 'tweets'=>$tweets, 'google' => $GOOGLE_MAP_API_KEY, 'profile'=>$profile, 'edited_user'=>$edited_user
            ]);
    }
    
    public function store(Request $request, Ski_area $ski_area)
    {
        //dd($request->all());
        $request->validate([
            'ski_area.place_name' => ['required','string','max:40'],
            'ski_area.home_page' => ['nullable','url'],
            'ski_area.zip_code' => ['required', new ZipCodeRule()],
            'ski_area.prefecture' => ['required', new PrefectureRule()],
            'ski_area.city' => ['required', new CityRule()],
            'ski_area.after_address' => ['required','string','max:50'],
            'ski_area.phone_number' => ['required', new PhoneNumberRule()],
            'ski_area.business_hours' => ['required','string'],
            'ski_area.evening_hours' => ['nullable','string','max:30'],
            'ski_area.season' => ['nullable','string'],
            'ski_area.lesson' => ['nullable','string'],
            'ski_area.restaurant' => ['nullable','string'],
            'ski_area.spa' => ['nullable','string'],
            'ski_area.hotel' => ['nullable','string'],
            // 'ski_area.slope_map' => 'required','string',  画像入力にしたいから、一旦保留
            
            //追加分
            'ski_area.parking_lot' => ['nullable','string'],
            'ski_area.activity' => ['nullable','string'],
            'ski_area.kids_park' => ['nullable','string'],
            'ski_area.lift_ticket' => ['nullable','string'],
        ]);
        
        $input = $request['ski_area'];
        $ski_area['user_id'] = Auth::id();
        $ski_area->fill($input)->save();
        return redirect('/ski_areas/' . $ski_area->id);
    }
    
    public function edit(Ski_area $ski_area)
    {
        return view('pages/edit_slope')->with(['ski_area' => $ski_area]);
    }
    
    public function update(Request $request, Ski_area $ski_area)
    {
        //dd($request->all());
        $request->validate([
            'ski_area.place_name' => ['required','string','max:40'],
            'ski_area.home_page' => ['nullable','url'],
            'ski_area.zip_code' => ['required', new ZipCodeRule()],
            'ski_area.prefecture' => ['required', new PrefectureRule()],
            'ski_area.city' => ['required', new CityRule()],
            'ski_area.after_address' => ['required','string','max:50'],
            'ski_area.phone_number' => ['required', new PhoneNumberRule()],
            'ski_area.business_hours' => ['required','string'],
            'ski_area.evening_hours' => ['nullable','string','max:30'],
            'ski_area.season' => ['nullable','string'],
            'ski_area.lesson' => ['nullable','string'],
            'ski_area.restaurant' => ['nullable','string'],
            'ski_area.spa' => ['nullable','string'],
            'ski_area.hotel' => ['nullable','string'],
            
            //追加分
            'ski_area.parking_lot' => ['nullable','string'],
            'ski_area.activity' => ['nullable','string'],
            'ski_area.kids_park' => ['nullable','string'],
            'ski_area.lift_ticket' => ['nullable','string'],
        ]);
        
        $input = $request['ski_area'];
        $ski_area->fill($input)->save();
    
        return redirect('/ski_areas/' . $ski_area->id);
    }
}
