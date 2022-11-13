<?php

use Illuminate\Support\Facades\Route;

//ホーム
Route::get('/', 'SkiAreaController@welcome');
Route::get('/pages/login_home', 'SkiAreaController@login_home');

//スキー場作成・表示関係
Route::get('/pages/create_slope', 'SkiAreaController@create_slope');
Route::get('/ski_areas/{ski_area}', 'SkiAreaController@show'); //注意! Route::get('/pages/create_slope', 'PostController@create_slope');よりも下に書く
Route::post('/infomation_list', 'SkiAreaController@store');
Route::get('/ski_areas/{ski_area}/edit', 'SkiAreaController@edit');
Route::put('/ski_areas/{ski_area}', 'SkiAreaController@update');
Route::delete('/ski_areas/{ski_area}', 'SkiAreaController@delete');

//スキー場検索
Route::get('/pages/search_slope', 'SkiAreaController@search');
Route::post('/search_slope_list', 'SkiAreaController@search');

//プロフィール作成・表示関係
Route::get('/pages/profile', 'ProfileController@profile');
Route::get('/profiles/{profile}', 'ProfileController@show');
Route::post('/profile_list', 'ProfileController@store');
Route::get('/profiles/{profile}/edit', 'ProfileController@edit');
Route::put('/profiles/{profile}', 'ProfileController@update');

//スキー場のお気に入り登録関係
Route::get('/pages/show_all_stars', 'StarController@star'); //スキー場のお気に入り登録一覧
Route::get('/stars/{star}', 'StarController@show'); 
Route::post('/star_list', 'StarController@store');

//Myページ
Route::get('/pages/my_information', 'MyInformationController@show'); //自分の情報を見る
Route::post('/destroy{id}', 'MyInformationController@destroy')->name('star.destroy');

//マッチング関係
Route::get('/pages/matching', 'MatchingController@matching')->name('matching');
Route::get('/pages/match', 'MatchingController@show');
Route::get('/find_friends/{find_friend}', 'MatchingController@show'); 
Route::post('/find_friend_list', 'MatchingController@matching');
Route::post('/find_profile_list', 'MatchingController@store');

Auth::routes();

