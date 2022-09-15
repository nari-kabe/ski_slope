<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Http\Requests\SkiAreaRequest;
use GuzzleHttp\Client;

use App\Post;
use App\Ski_area;
use App\Star;
use App\Public_user;


class PostController extends Controller
{
    
    public function home(Post $post)
    {
        return view('pages/home');
    }
    
    public function profile(Post $post)
    {
        return view('pages/profile');
    }
    
    public function login(Post $post)
    {
        return view('pages/login');
    }
    
    public function izumi(Ski_area $ski_area)
    {
        return view('pages/izumi')->with(['ski_area' => $ski_area]);;
    }
    
    public function star(Post $post)
    {
        return view('pages/star');
    }
    
    public function create_slope(Post $post)
    {
        return view('pages/create_slope');
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
        
        return view('pages/login_home')->with(
            ['tweets'=>$tweets ,'ski_areas' => $ski_area->get()]
            );
    }
    
    public function getTweets($num)
    {
        //エンドポイントを指定
        $base_url = 'https://api.twitter.com/2/tweets/search/recent';
        
        //検索条件を指定
        $query = [
          'query' => '#スキー OR #スノーボード',
          'sort_order' => 'recency',
          'expansions' => 'author_id',
          'user.fields' => 'name,username,url', //こっちのurlはtwitterのヘッダーにURL(ホームページなど)を記載してた場合にそのurlをとってきている
          'media.fields' => 'url', //こっちがtwitterへ飛ぶurl？？
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
    
    public function show(Ski_area $ski_area)
    {
        $API_KEY = config('const.openweathermap.key');
        $base_url = config('const.openweathermap.url');
        //$city = '堺市';
        //$city = '坂井市';
        $city = $ski_area->city;
        //dd($city);
  
        $url = "$base_url?units=metric&q=$city&APPID=$API_KEY&lang=ja";

        // 接続
        $client = new Client();

        $method = "GET";
        $response = $client->request($method, $url);

        $weather_data = $response->getBody();
        //dd($weather_data);
        $weather_data = json_decode($weather_data, true);
        //dd($weather_data);

        //return response()->json($weather_data);
        
        // $weather=$weather_data['list'][0]['weather'][0];
        $weather=$weather_data['list'][0];
        //dd($weather);
        
        $place_id=$weather_data['city']['id'];
        //dd($place_id);
        
        for($i=0; $i < 32; $i++){
            $weather=$weather_data['list'][$i]['weather'][0]['main'];
            $icon=$weather_data['list'][$i]['weather'][0]['icon'];
            $temp_max=$weather_data['list'][$i]['main']['temp_max'];
            $temp_min=$weather_data['list'][$i]['main']['temp_min'];
            //dd($weather);
            //dd($temp_min);
        }

        return view('pages/show_slope')->with(['ski_area' => $ski_area, 'place_id' => $place_id, 'weather' => $weather, 'icon' => $icon, 'temp_max' => $temp_max, 'temp_min' => $temp_min]);
        //return view('pages/show')->with(['ski_area' => $ski_area]);
    }
    
    public function store(SkiAreaRequest $request, Ski_area $ski_area)
    {
        $input = $request['ski_area'];
        //dd($input);
        $ski_area->fill($input)->save();
        return redirect('/ski_areas/' . $ski_area->id);
    }
    
    public function edit(Ski_area $ski_area)
    {
        return view('pages/edit_slope')->with(['ski_area' => $ski_area]);
    }
    
}
