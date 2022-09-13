<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;


class WeatherAPIController extends Controller
{
    public function weatherData() {
        $API_KEY = config('const.openweathermap.key');
        $base_url = config('const.openweathermap.url');
        $city = 'Tokyo';
  
        $url = "$base_url?units=metric&q=$city&APPID=$API_KEY";

        // 接続
        $client = new Client();

        $method = "GET";
        $response = $client->request($method, $url);

        $weather_data = $response->getBody();
        //dd($weather_data);
        $weather_data = json_decode($weather_data, true);
        //dd($weather_data);

        //return response()->json($weather_data);
        
        return view('weather')->with(['weather' => $weather_data]);
    }
}



/*
class WeatherAPIController extends Controller
{
    function get_json( $type = null ){
        $city = "Gifu-shi,jp";
        $appid = config('const.openweathermap.key');
        $url = "http://api.openweathermap.org/data/2.5/weather?q=" . $city . "&units=metric&APPID=" . $appid;
        
        $json = file_get_contents( $url );
        $json = mb_convert_encoding( $json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN' );
        $json_decode = json_decode( $json );
        
        //現在の天気
        if( $type  === "weather" ):
        $out = $json_decode->weather[0]->main;
        
        //現在の天気アイコン
        elseif( $type === "icon" ):
        $out = "<img src='https://openweathermap.org/img/wn/" . $json_decode->weather[0]->icon . "@2x.png'>";
        
        //現在の気温
        elseif( $type  === "temp" ):
        $out = $json_decode->main->temp;
        
        //パラメータがないときは配列を出力
        else:
        $out = $json_decode;
        
        endif;
        
        return $out;
    }
}
*/