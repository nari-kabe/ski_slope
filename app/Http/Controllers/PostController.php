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
    public function home(Post $post)   //:PostはDBのpostsテーブルと結びついている
                                       //:Postモデルクラスを 変数（$）postにインタンス化して格納。
                                       //:以上より、$post の post はDBのpostテーブルのことを指す
    {
        //return $post->get(); //postsテーブルの情報を全て持ってくる
        //return 'aaa';
        return view('pages/home')->with(['pages' => $post->get()]); //:withの後の$postは変数名pages
                                                                    //: => の右側は変数pagesに対する値 （例：x = 5）。ここでは、view側（home）にposts テーブルの全情報を渡す。
                                                                    //: その後、view側（home）で、コントローラーから受け取った全情報のなかで、どの情報を使うかを指定する。
    }
}
