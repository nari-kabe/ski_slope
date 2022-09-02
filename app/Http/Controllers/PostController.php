<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

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
    
    public function izumi(Post $post)
    {
        return view('pages/izumi');
    }
    
    public function star(Post $post)
    {
        return view('pages/star');
    }
    
    public function create_slope(Post $post)
    {
        return view('pages/create_slope');
    }
    
    public function login_home(Post $post)
    {
        //エンドポイントを指定
        $base_url = 'https://api.twitter.com/2/tweets/search/recent';
        
        //検索条件を指定
        $query = [
          'query' => '#スキー #スノーボード',
          'sort_order' => 'recency',
          'expansions' => 'author_id',
          'user.fields' => 'name,username,url',
          //'user.fields' => 'url',
          'tweet.fields' => 'created_at',
          'max_results' => '20'
        ];
        $url = $base_url . '?' . http_build_query($query);
        
        //ヘッダ生成
        $token = 'AAAAAAAAAAAAAAAAAAAAAKcaggEAAAAAvGT%2BPJUKPydrJv5YQikxN6NaoTI%3DlocKWnY8JImwXhsLPXjDbygDIlRx2haIBF70VMv7lOLnr5iOSX';  //Bearer Token
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
        
            return view('pages/login-home')->with(['result'=>$result]);
    }
}
