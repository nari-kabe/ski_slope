<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>スキー場追加</title>
        <link rel="stylesheet" href="/css/create_slope.css">
        <script src="{{ asset('/js/create_slope.js') }}"></script>
    </head>
    <body>
        <form action="pages/login-home" method="POST">
        @csrf
        <table> 
            <tr>
                <td><input class="header" placeholder="スキー場名を入力"></td>
                <td>　</td>
                 <td>　</td>
                <td><a href="/">ホームに戻る</a></td>
            </tr>
        </table>
        <hr>
        
        <h2>情報一覧</h2>
        <div id="list">
            <table>
                <tr>
                    <td>スキー場名</td> <td><input class="input_list" placeholder="スキー場名を入力"></td>
                </tr>
                <tr>
                    <td>住所（郵便番号）</td> <td><input class="input_list" placeholder="住所（郵便番号）を入力" 〒></td>
                </tr>
                <tr>
                    <td>住所（県名）</td> <td><input class="input_list" placeholder="住所（県名）を入力"></td>
                </tr>
                <tr>
                    <td>住所（市町村名）</td> <td><input class="input_list" placeholder="住所（市町村名）を入力"></td>
                </tr>
                <tr>
                    <td>住所（番地以降）</td> <td><input class="input_list" placeholder="住所（番地以降）を入力"></td>
                </tr>
                <tr>
                    <td>ホームページ</td> <td><input class="input_list" placeholder="ホームページURLを入力"></input></td>
                </tr>
                <tr>
                    <td>電話番号</td> <td><input class="input_list" placeholder="電話番号を入力"></td>
                </tr>
                <tr>
                    <td>営業時間</td> <td><input class="input_list" placeholder="営業時間を入力"></td>
                </tr>
                <tr>
                    <td>シーズン期間</td> <td><input class="input_list" placeholder="シーズン期間を入力"></td>
                </tr>
                <tr>
                    <td>ナイター</td> 
                    <td>
                        <input type="radio" checked id="night_game1" class="radio1" name="radio_button1" onclick="textarea_off(1)"><label for="night_game1">無</label>
                        <input type="radio" id="night_game2" class="radio2" name="radio_button1" onclick="textarea_on(1)"><label for="night_game2">有</label></br>
                        <input id=1 class="detail" style="display: none" placeholder="ナイターの詳細を入力">
                        <!--<input id=1 class="detail" placeholder="ナイターの詳細を入力">-->
                    </td>
                </tr>
                <tr>
                    <td>レッスン</td> 
                    <td>
                        <input type="radio" checked id="lesson1" class="radio1" name="radio_button2" onclick="textarea_off(2)"><label for="lesson1">無</label>
                        <input type="radio" id="lesson2" class="radio2" name="radio_button2" onclick="textarea_on(2)"><label for="lesson2">有</label></br>
                        <input id=2 class="detail" style="display: none" placeholder="レッスンの詳細を入力">
                        <!--<input id=1 class="detail" placeholder="ナイターの詳細を入力">-->
                    </td>
                </tr>
                <tr>
                    <td>レストラン</td> 
                     <td>
                        <input type="radio" checked id="restaurant1" class="radio1" name="radio_button3" onclick="textarea_off(3)"><label for="restaurant1">無</label>
                        <input type="radio" id="restaurant2" class="radio2" name="radio_button3" onclick="textarea_on(3)"><label for="restaurant2">有</label></br>
                        <input id=3 class="detail" style="display: none" placeholder="レストランの詳細を入力">
                        <!--<input id=1 class="detail" placeholder="ナイターの詳細を入力">-->
                    </td>
                </tr>
                <tr>
                    <td>温泉</td> 
                    <td>
                        <input type="radio" checked id="spa1" class="radio1" name="radio_button4" onclick="textarea_off(4)"><label for="spa1">無</label>
                        <input type="radio" id="spa2" class="radio2" name="radio_button4" onclick="textarea_on(4)"><label for="spa2">有</label></br>
                        <input id=4 class="detail" style="display: none" placeholder="温泉の詳細を入力">
                        <!--<input id=1 class="detail" placeholder="ナイターの詳細を入力">-->
                    </td>
                </tr>
                <tr>
                    <td>宿泊施設</td> 
                    <td>
                        <input type="radio" checked id="inn1" class="radio1" name="radio_button5" onclick="textarea_off(5)"><label for="inn1">無</label>
                        <input type="radio" id="inn2" class="radio2" name="radio_button5" onclick="textarea_on(5)"><label for="inn2">有</label></br>
                        <input id=5 class="detail" style="display: none" placeholder="宿泊施設の詳細を入力">
                        <!--<input id=1 class="detail" placeholder="ナイターの詳細を入力">-->
                    </td>
                </tr>
                <tr>
                    <td>ゲレンデマップ</td>  
                    <td>
                        <input type="radio" checked id="slope_map1" class="radio1" name="radio_button6" onclick="textarea_off(6)"><label for="slope_map1">無</label>
                        <input type="radio" id="slope_map2" class="radio2" name="radio_button6" onclick="textarea_on(6)"><label for="slope_map2">有</label></br>
                        <input id=6 class="detail" style="display: none" placeholder="ゲレンデマップの画像を入力">
                        <!--<input id=1 class="detail" placeholder="ナイターの詳細を入力">-->
                </tr>
            </table>
        </div>
        
        <hr>
        <h2>ゲレンデマップ</h2>
        <hr>
        <h2>天気</h2>
        <hr>
        <h2>Googleマップ</h2>
        
        <input class=form type="submit" value="送信"/></br>
        </form>
        
    </body>
</html>