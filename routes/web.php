<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'PostController@home');
Route::get('/pages/login', 'PostController@login');
Route::get('/pages/registration', 'PostController@registration');
Route::get('/pages/izumi', 'PostController@izumi');
Route::get('/pages/star', 'PostController@star');
Route::get('/pages/create_slope', 'PostController@create_slope');
Route::get('/pages/login-home', 'PostController@login_home');

//OpenWeatherAPI
Route::get('/a', 'WeatherAPIController@weatherData');
