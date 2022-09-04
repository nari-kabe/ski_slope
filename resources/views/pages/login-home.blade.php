<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>スキー場検索</title>
        <!--<link rel="stylesheet" href="/css/style.css">-->
        <link rel="stylesheet" href="/css/login_home-style.css">
        <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.css">-->
        
    </head>
    <body>
        <div id=header>
            <div id=header_color>
                <h1>My best place</h1>
                <div class=head>
                    <table>
                        <tr>
                            <td><a href="/pages/registration">自己プロフィール編集</a></td>
                            <td>　</td>
                            <td><a href="/pages/login">ログアウト</a></td>
                        </tr>
                    </table>
                </div>
                <hr>
            </div>
            
            <div id=search>
                <table>
                    <tr>
                        <td><a href="/pages/how_to_use">使い方</a></td>
                        <td class=line-right>　</td>
                        <td>　</td>
                        <td><a href="/pages/star">お気に入り</a></td>
                        <td class=line-right>　</td>
                        <td>　</td>
                        <td><button class=Button2> 都道府県から探す</button></td>
                        <td class=line-right>　</td>
                        <td>　</td>
                        <td><input type=text placeholder="スキー場の名前で検索"></td>
                        <td class=line-right>　</td>
                        <td>　</td>
                        <td><a href="/">ログイン前の画面</a></td>
                    </tr>
                </table>
            </div>
            </br>
        </div>
        
        <!--お試しラジオ-->
        <!--<div class="example2">-->
        <!--    <input type="radio" checked id="11" name="example3"><label for="11">ボタン</label>-->
        <!--    <input type="radio" id="12" name="example3"><label for="12">ボタン</label>-->
        <!--    <input type="radio" id="13" name="example3"><label for="13">ボタン</label>-->
        <!--</div>-->
        
        <!--お試しラジオ-->
        <!--<div class="example">-->
        <!--    <input type="radio" checked class="radio1" name="radio_button" onclick="radius1()">-->
        <!--    <input type="radio" class="radio1" name="radio_button" onclick="radius2()">-->
        <!--    <input type="radio" class="radio1" name="radio_button" onclick="radius3()">-->
        <!--    <input type="radio" class="radio1" name="radio_button" onclick="radius4()">-->
        <!--</div>-->
        
        <!--現在使用中のラジオボタン-->
        <div class="example">
            <input type="radio" checked id="radio1" name="ex" onclick="radius1()"><label for="radio1">　</label>
            <input type="radio" id="radio2" name="ex" onclick="radius2()"><label for="radio2">　</label>
            <input type="radio" id="radio3" name="ex" onclick="radius3()"><label for="radio3">　</label>
            <input type="radio" id="radio4" name="ex" onclick="radius4()"><label for="radio4">　</label>
        </div>
        
        
        <!--４枚の画像-->
       <div class=image_container>
            <img id=image src=/images/sample1.jpeg>
            <button id=back_button onclick="go_back()">◀</button>
            <button  id=forward_button onclick="go_forward()">▶</button>
        </div>
        
        
        
            <!--画像 横ボタン-->
            <script> 
                const array = ["/images/sample1.jpeg", "/images/sample2.jpeg", "/images/sample3.jpeg", "/images/sample4.jpeg"];
                let num = 0;
                
                /*画像 横ボタン*/
                function go_back(){
                　　if (num == 0) {
                        num = 2;
                    }
                    else {
                        num --;
                    }
                    document.getElementById("image").src=array[num];
            　　}
                
                function go_forward(){
                    if (num == 3) {
                        num = 0;
                    }
                    else {
                        num ++;
                    }
                    document.getElementById("image").src=array[num];
                }
                
                /*画像 下の丸ボタン*/
                function radius1(){
                    document.getElementById("image").src=array[0];
                }
                function radius2(){
                    document.getElementById("image").src=array[1];
                }
                function radius3(){
                    document.getElementById("image").src=array[2];
                }
                function radius4(){
                    document.getElementById("image").src=array[3];
                }
            </script>

        </div>
        
        <!--スキー場一覧-->
        <div class=slope_list>
            <table>
                <tr>
                    <td><h2>スキー場一覧</h2></td>
                    <td>　</td>
                    <td><a href="/pages/create_slope">スキー場を追加する</a></td>
                </tr>
            </table>
            <h3>北海道</h3>
            <p>カムイスキーリンクス</p>
            <h3>福井県</h3>
            <p>スキージャム勝山</p>
            <a href="/pages/izumi">福井和泉スキー場</a>
            <!--<p>福井和泉スキー場</p>-->
        </div>
        <div class=twitter>
            <h2>Twitter</h2>
            @php
            //結果のうち最新5件を出力
            for ($i = 0; $i < 5; $i++) {
              $name = $result['includes']['users'][$i]['name'];
              $username = $result['includes']['users'][$i]['username'];
              $created_at = $result['data'][$i]['created_at'];
              $text = $result['data'][$i]['text'];
              $url = $result['includes']['users'][$i]['url'];
              echo '<p>';
              echo $created_at . '<br>';
              //echo $url . '<br>';
              echo '投稿者：' . $name . '（@' . $username . '）<br>';
              echo $text;
              echo '</p>';
            }
            @endphp
        
        </br>
        
        
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
            <td><a class=star_detail href="/pages/izumi">詳細を見る</a></td>
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
        
        <!--<script src="{{ asset('/js/login_home.js') }}"></script>-->
    </body>
</html>