<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'PostController@home');
Route::get('/pages/login', 'PostController@login');
Route::get('/pages/profile', 'PostController@profile'); //プロフィール登録
Route::get('/pages/izumi', 'PostController@izumi'); //使わない
Route::get('/pages/star', 'PostController@star');
Route::get('/pages/create_slope', 'PostController@create_slope');

Route::get('/pages/login_home', 'SkiAreaController@login_home'); //Home
Route::get('/ski_areas/{ski_area}', 'SkiAreaController@show'); //注意! Route::get('/pages/create_slope', 'PostController@create_slope');よりも下に書く
Route::post('/infomation_list', 'SkiAreaController@store'); //スキー場作成画面の内容をデータべースに反映すために使用
Route::get('/ski_areas/{ski_area}/edit', 'SkiAreaController@edit'); //スキー場作成内容編集
Route::put('/ski_areas/{ski_area}', 'SkiAreaController@update'); //スキー場情報編集内容反映

Route::get('/profiles/{profile}', 'ProfileController@show'); //注意! 
Route::post('/profile_list', 'ProfileController@store'); //自己プロフィール作成画面の内容をデータべースに反映すために使用
Route::get('/profiles/{profile}/edit', 'ProfileController@edit'); //自己プロフィール作成内容編集
Route::put('/profiles/{profile}', 'ProfileController@update'); //自己プロフィール情報編集内容反映

//OpenWeatherAPI
Route::get('/a', 'WeatherAPIController@weatherData');

Auth::routes();

