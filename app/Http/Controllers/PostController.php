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
    
}
