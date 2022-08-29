<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'PostController@home');
Route::get('/pages/login', 'PostController@login');
Route::get('/pages/registration', 'PostController@registration');
Route::get('/pages/izumi', 'PostController@izumi');
Route::get('/pages/star', 'PostController@star');


