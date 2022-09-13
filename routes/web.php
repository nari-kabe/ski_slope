<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'PostController@home');
Route::get('/pages/login', 'PostController@login');
Route::get('/pages/registration', 'PostController@registration');
Route::get('/pages/izumi', 'PostController@izumi'); //使わない
Route::get('/pages/star', 'PostController@star');
Route::get('/pages/create_slope', 'PostController@create_slope');
Route::get('/pages/login_home', 'PostController@login_home');
Route::get('/ski_areas/{ski_area}', 'PostController@show'); //注意! Route::get('/pages/create_slope', 'PostController@create_slope');よりも下に書く
Route::post('/infomation_list', 'PostController@store'); //スキー場作成画面の内容をデータべースに反映すために使用
Route::get('/ski_areas/{ski_area}/edit', 'PostController@edit'); //スキー場作成内容編集
Route::put('/ski_areas/{ski_area}', 'PostController@update');



//OpenWeatherAPI
Route::get('/a', 'WeatherAPIController@weatherData');
Route::get('/b', 'WeatherAPIController@get_json');

