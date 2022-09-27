@extends('layouts.app')　　　　　　　　　　　　　　　　　　

@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>スキー場検索</title>
        <link rel="stylesheet" href="/css/login_home-style.css">
        <link href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" rel="stylesheet">
        <script src="{{ asset('/js/login_home.js') }}"></script>
    </head>
    <body>
        <!--<div id=header>-->
        <!--    <h1>My best place</h1>-->
        <!--    <hr id=header_horizon>-->
        <!--</div>-->
            
        <div class="various">
            <div class="nav">
                <div>
                    @guest
                        <p>ログインすると自己プロフィール登録・編集、スキー場追加、お気に入り登録ができます</p>
                    @endguest
                    
                    @auth
                        <a class="link_color right_space" href="/pages/profile">自己プロフィール登録</a>
                        <p class="line_right"></p>
                        
                        <a class="link_color right_space" href="/pages/create_slope">スキー場を追加する</a>
                        <p class="line_right"></p>
                        <a class="link_color right_space"href="/pages/star">お気に入り登録一覧</a>
                    @endauth
                </div>
            </div>
        </div>
            
        <div class="image_container">
            <!--４枚の画像-->
            <div>
                <img id=image src=/images/sample1.jpeg>
                <button id=back_button onclick="go_back()">◀</button>
                <button id=forward_button onclick="go_forward()">▶</button>
            </div>
        
            <!--画像下部ラジオボタン-->
            <div class="image_radio_button">
                <input type="radio" checked id="radio1" name="radio_button" onclick="radius1()"><label for="radio1">　</label>
                <input type="radio" id="radio2" name="radio_button" onclick="radius2()"><label for="radio2">　</label>
                <input type="radio" id="radio3" name="radio_button" onclick="radius3()"><label for="radio3">　</label>
                <input type="radio" id="radio4" name="radio_button" onclick="radius4()"><label for="radio4">　</label>
            </div>
        </div></br>
        
        <div class="information_container">
            <div class="information">
                <!--スキー場一覧-->
                <div class=slope_list>
                    <div class="information_header">
                        <h2 class="information_header">スキー場一覧</h2>
                    </div>
        
                    <h5>北海道</h5>
                    @foreach ($ski_areas as $ski_area)
                        @if( $ski_area->prefecture === "北海道")
                            <a class='ski_slope' href="/ski_areas/{{ $ski_area->id }}">{{ $ski_area->place_name }}</a>
                        @endif    
                    @endforeach
                    <h5>福井県</h5>
                    @foreach ($ski_areas as $ski_area)
                        @if($ski_area->prefecture === "福井県")
                            <a class='ski_slope' href="/ski_areas/{{ $ski_area->id }}">{{ $ski_area->place_name }}</a>
                        @endif
                    @endforeach
                    <h5>その他の県</h5>
                    @foreach ($ski_areas as $ski_area)
                        @if($ski_area->prefecture !== "北海道" && $ski_area->prefecture !== "福井県")
                            <a class='ski_slope' href="/ski_areas/{{ $ski_area->id }}">{{ $ski_area->place_name }}</a>
                        @endif
                    @endforeach
                    <!--それぞれ、都道府県ごとに分けて表示どうやる？-->
                    <h5>とりあえず一覧</h5>
                    <div class='ski_areas'>
                        @foreach ($ski_areas as $ski_area)
                                <a class='ski_slope' href="/ski_areas/{{ $ski_area->id }}">{{ $ski_area->place_name }}</a>
                        @endforeach
                    </div>
                </div>
            
                    <!--お気に入り　ログインユーザー限定-->
                    <div>
                        <h2>お気に入りランキング（実装中）</h2>
                        @auth
                            <div class=star_ranking>
                                <div>
                                    <p class="star_detail">No.1　福井和泉スキー場</p>
                                    <a class="link_color star_block" href="/pages/izumi">詳細を見る</a>
                                </div>
                                <div>
                                    <p class="star_detail">No.2　カムイスキーリンクス</p>
                                    <!--<button class=star_detail> 詳細を見る</button>-->
                                    <a class="link_color star_block" href="/pages/izumi">詳細を見る</a>
                                </div>
                                <div>
                                    <p class="star_detail">No.3　カムイスキーリンクス</p>
                                    <!--<button class=star_detail> 詳細を見る</button>-->
                                    <a class="link_color star_block" href="/pages/izumi">詳細を見る</a>
                                </div>
                            </div>
                        @endauth
                        @guest
                            <p>※ログインするとお気に入り一覧を見れます</p>
                        @endguest
                    </div>
            </div>
            
                <div class=twitter>
                    <div class="information_header">
                        <h2>Twitter</h2>
                        <a class="fab fa-twitter fa-2x" href="https://twitter.com/?lang=ja"></a>
                    </div>
                    @for ($i = 0; $i < count($tweets); $i++)
                      <p class=tweet>{{ $tweets[$i]['created_at'] }}</p>
                      <p class=tweet>{{'投稿者：'. $tweets[$i]['user']['name'] }}　{{'@'. $tweets[$i]['user']['username'] }}</p>
                      <p class=tweet_text>{{ $tweets[$i]['text'] }}</p>
                      <a href="{{ 'https://twitter.com/'. $tweets[$i]['user']['username']. '/status/'. $tweets[$i]['id'] }}">twitterで表示</a>
                      <p class=tweet_space></p>
                    @endfor
                </div>
                @auth
                <hr class=bar>
                @endauth
    
        </div>
    </body>
</html>

@endsection