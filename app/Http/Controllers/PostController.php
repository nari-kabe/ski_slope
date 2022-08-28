<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    /**
     * Post一覧を表示する
     * 
     * @param Post Postモデル
     * @return array Postモデルリスト
     */
    public function index(Post $post)  //Postモデルクラスを 変数（$）postにインタンス化して格納。
                                       //$post の post はDBのpostテーブルのこと
    {
        //return $post->get(); //postテーブルの情報を全て持ってくる
        return 'aaa';
    }
}
