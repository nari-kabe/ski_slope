<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'SkiAreaController@welcome');
Route::get('/pages/create_slope', 'SkiAreaController@create_slope'); //スキー場作成
Route::get('/pages/login_home', 'SkiAreaController@login_home'); //ホーム
Route::get('/ski_areas/{ski_area}', 'SkiAreaController@show'); //注意! Route::get('/pages/create_slope', 'PostController@create_slope');よりも下に書く
Route::post('/infomation_list', 'SkiAreaController@store'); //スキー場作成画面の内容をデータべースに反映すために使用
Route::get('/ski_areas/{ski_area}/edit', 'SkiAreaController@edit'); //スキー場作成内容編集
Route::put('/ski_areas/{ski_area}', 'SkiAreaController@update'); //スキー場情報編集内容反映
Route::delete('/ski_areas/{ski_area}', 'SkiAreaController@delete'); //削除

Route::get('/pages/profile', 'ProfileController@profile'); //プロフィール登録
Route::get('/profiles/{profile}', 'ProfileController@show'); //注意! 
Route::post('/profile_list', 'ProfileController@store'); //データべースに反映
Route::get('/profiles/{profile}/edit', 'ProfileController@edit'); //自己プロフィール作成内容編集
Route::put('/profiles/{profile}', 'ProfileController@update'); //自己プロフィール情報編集内容反映

Route::get('/pages/show_all_stars', 'StarController@star'); //お気に入り登録一覧
Route::get('/stars/{star}', 'StarController@show'); 
Route::post('/star_list', 'StarController@store'); //データべースに反映

Route::get('/pages/my_information', 'MyInformationController@show'); //自分の情報を見る
Route::post('/destroy{id}', 'MyInformationController@destroy')->name('star.destroy'); //削除

Route::get('/pages/matching', 'MatchingController@matching')->name('matching');
Route::get('/pages/match', 'MatchingController@show');
Route::get('/find_friends/{find_friend}', 'MatchingController@show'); 
Route::post('/find_friend_list', 'MatchingController@store');

//OpenWeatherAPI
Route::get('/a', 'WeatherAPIController@weatherData');

Auth::routes();

