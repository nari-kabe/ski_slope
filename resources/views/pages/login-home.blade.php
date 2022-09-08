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
        <div id=header>
            <div id=header_color>
                <h1>My best place</h1>
                <div class=head>
                    <table>
                        <tr>
                            <td><a class=link_color href="/pages/registration">自己プロフィール編集</a></td>
                            <td>　</td>
                            <td><a class=link_color href="/pages/login">ログアウト</a></td>
                        </tr>
                    </table>
                </div>
                <hr id=header_horizon>
            </div>
            
            <div id=search>
                <table>
                    <tr>
                        <td><a class=link_color href="/pages/how_to_use">使い方</a></td>
                        <td class=line-right>　</td>
                        <td>　</td>
                        <td><a class=link_color　href="/pages/star">お気に入り登録一覧</a></td>
                        <td class=line-right>　</td>
                        <td>　</td>
                        <td><button class=Button2> 都道府県から探す</button></td>
                        <td class=line-right>　</td>
                        <td>　</td>
                        <td><input type=text placeholder="スキー場の名前で検索"></td>
                        <td class=line-right>　</td>
                        <td>　</td>
                        <td><a class=link_color href="/">ログイン前の画面</a></td>
                    </tr>
                </table>
            </div>
            </br>
            
            <!--<div id=search>-->
            <!--    <table>-->
            <!--        <tr>-->
            <!--            <td><a class='link_color space' href="/pages/how_to_use">使い方</a></td>-->
            <!--            <td class=line-right>　</td>-->
                        
            <!--            <td><a class='link_color space'　href="/pages/star">お気に入り登録一覧</a></td>-->
            <!--            <td class=line-right>　</td>-->
                        
            <!--            <td><button class='Button2 sp'> 都道府県から探す</button></td>-->
            <!--            <td class=line-right>　</td>-->
                        
            <!--            <td><input class=sp type=text placeholder="スキー場の名前で検索"></td>-->
            <!--            <td class=line-right>　</td>-->
                        
            <!--            <td><a class='link_color space' href="/">ログイン前の画面</a></td>-->
            <!--        </tr>-->
            <!--    </table>-->
            <!--</div>-->
            <!--</br>-->
            
        </div>
    
        <!--現在使用中のラジオボタン-->
        <div class="image_radio_button">
            <input type="radio" checked id="radio1" name="radio_button" onclick="radius1()"><label for="radio1">　</label>
            <input type="radio" id="radio2" name="radio_button" onclick="radius2()"><label for="radio2">　</label>
            <input type="radio" id="radio3" name="radio_button" onclick="radius3()"><label for="radio3">　</label>
            <input type="radio" id="radio4" name="radio_button" onclick="radius4()"><label for="radio4">　</label>
        </div>
        
        <!--４枚の画像-->
        <div class=image_container>
            <img id=image src=/images/sample1.jpeg>
            <button id=back_button onclick="go_back()">◀</button>
            <button  id=forward_button onclick="go_forward()">▶</button>
        </div>
        
        <!--スキー場一覧-->
        <div class=slope_list>
            <table>
                <tr>
                    <td><h2>スキー場一覧</h2></td>
                    <td>　</td>
                    <td><a class=link_color href="/pages/create_slope">スキー場を追加する</a></td>
                </tr>
            </table>
            <h3>北海道</h3>
            <p>カムイスキーリンクス</p>
            <h3>福井県</h3>
            <p>スキージャム勝山</p>
            <a class=link_color href="/pages/izumi">福井和泉スキー場</a>
            <!--<p>福井和泉スキー場</p>-->
        </div>
        
        <div class=twitter>
            <h2 id=h2_twitter>Twitter</h2>
            <a class="fab fa-twitter fa-2x" href="https://twitter.com/?lang=ja"></a>
            @for ($i = 0; $i < count($tweets); $i++) 
              <!--$name = $result['includes']['users'][$i]['name'];-->
              <!--$username = $result['includes']['users'][$i]['username'];-->
              <!--$created_at = $result['data'][$i]['created_at'];-->
              <!--$text = $result['data'][$i]['text'];-->
              <!--$url = $result['includes']['users'][$i]['url'];-->
              
              <!--echo '<p>';-->
              <!--echo $created_at . '<br>';-->
              <!--//echo $url . '<br>';-->
              <!--echo '投稿者：' . $name . '（@' . $username . '）<br>';-->
              <!--echo $text;-->
              <!--echo '</p>';-->
              
              <!--使用できる-->
              <!--<p class=tweet>{{ $tweets[$i]['created_at'] }}</p>-->
              <!--<p class=tweet>{{'投稿者：'. $tweets[$i]['user']['name'] }}　{{'@'. $tweets[$i]['user']['username'] }}</p>-->
              <!--<a href="{{ $tweets[$i]['user']['url'] }}">{{ $tweets[$i]['text'] }}</a>-->
              <!--<p></p>-->
              
              <p class=tweet>{{ $tweets[$i]['created_at'] }}</p>
              <p class=tweet>{{'投稿者：'. $tweets[$i]['user']['name'] }}　{{'@'. $tweets[$i]['user']['username'] }}</p>
              <p class=tweet_text>{{ $tweets[$i]['text'] }}</p>
              <a href="{{ $tweets[$i]['user']['url'] }}">twitterで表示</a>
              <p class=tweet_space></p>
              
            @endfor
        </div>       
        <!--<hr class=horizontal>-->
        <hr class=bar>
       
       <!--お気に入り　ログインユーザー限定-->
        <div  class=star_list>
            <h2>お気に入りランキング</h2>
            <table>
            <tr>
            <td><p>No.1　福井和泉スキー場</p></td>
            <td>　</td>
            <td><a class="star_detail link_color" href="/pages/izumi">詳細を見る</a></td>
            </tr>
            </table>
            
            <table>
            <tr>
            <td><p>No.2　カムイスキーリンクス</p></td>
            <td>　</td>
            <td><button class=star_detail> 詳細を見る</button></td>
            </tr>
            </table>
            
            <table>
            <tr>
            <td><p>No.3　カムイスキーリンクス</p></td>
            <td>　</td>
            <td><button class=star_detail> 詳細を見る</button></td>
            </tr>
            </table>
        </div>
    </body>
</html>