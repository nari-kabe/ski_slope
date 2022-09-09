<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
    
    public function registration(Post $post)
    {
        return view('pages/registration');
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
            //左辺：空の配列$users=[]に["includes"]["users"][$i]["id"]をkeyとして入れる
            //右辺：keyに対するデータとして、$results["includes"]["users"][$i]を指定する
            $users[$results["includes"]["users"][$i]["id"]] = $results["includes"]["users"][$i]; 
            //dd($users);
        }
        for($i=0; $i < count($results["data"]); $i++){
            //空の配列の$tweets=[]のkeyを$iで０番目から指定し、データとして$results["data"][$i]を入れていく
            $tweets[$i]=$results["data"][$i];
            
            $tweets[$i]["user"]=$users[$results["data"][$i]["author_id"]];
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
        // $token = 'AAAAAAAAAAAAAAAAAAAAAKcaggEAAAAAvGT%2BPJUKPydrJv5YQikxN6NaoTI%3DlocKWnY8JImwXhsLPXjDbygDIlRx2haIBF70VMv7lOLnr5iOSX';  //Bearer Token
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
        
        $result = json_decode($response, true);
        //dd($result);
        curl_close($curl);
        
        return $result;
    }
    
    public function show(Ski_area $ski_area)
    {
        //dd($ski_area);
        return view('pages/show')->with(['ski_area' => $ski_area]);
    }
    
    public function store(Request $request, Ski_area $ski_area)
    {
        $input = $request['ski_area'];
        //dd($input);
        $ski_area->fill($input)->save();
        return redirect('/ski_areas/' . $ski_area->id);
    }
    
}
