<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;


class WeatherAPIController extends Controller
{
    public function weatherData() {
        $API_KEY = config('const.openweathermap.key');
        $base_url = config('const.openweathermap.url');
        //$city = '堺市';
        //$city = '坂井市';
        //$city = '福井市';
        //$city = '東京';
        $city = '西牟婁郡';
        
        
  
        $url = "$base_url?units=metric&q=$city&APPID=$API_KEY";

        // 接続
        $client = new Client();

        $method = "GET";
        
        try{
            $response = $client->request($method, $url);
        }catch(\Exception $e){
            $prefecture = '和歌山県';
            $url = "$base_url?units=metric&q=$prefecture&APPID=$API_KEY";
            $response = $client->request($method, $url);
        }
        

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

        return view('weather')->with(['place_id' => $place_id, 'weather' => $weather, 'icon' => $icon, 'temp_max' => $temp_max, 'temp_min' => $temp_min]);
    }
}