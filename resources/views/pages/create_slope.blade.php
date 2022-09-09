<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>スキー場追加</title>
        <link rel="stylesheet" href="/css/create_slope.css">
        <script src="{{ asset('/js/create_slope.js') }}"></script>
    </head>
    <body>
        <form action="/infomation_list" method="POST">
        @csrf
        <table> 
            <tr>
                <td><p class="header">CREATE SKI SLOPE!</p></td>
                <td>　</td>
                 <td>　</td>
                <td><a href="/pages/login_home">ホームに戻る</a></td>
            </tr>
        </table>
        <hr>
        
        <h2>情報一覧</h2>
        <div id="list">
            <table>
                <tr>
                    <td>スキー場名</td> 
                    <td><input class="input_list" name="ski_area[place_name]" placeholder="スキー場名を入力" value="{{ old('ski_area.place_name') }}"></td>
                    <td class=error>{{ $errors->first('ski_area.place_name') }}</td>
                </tr>
                <tr>
                    <td>住所（郵便番号）</td> 
                    <td><input class="input_list" name="ski_area[zip_code]" placeholder="例：010-0012" value="{{ old('ski_area.zip_code') }}"></td>
                    <td class=error>{{ $errors->first('ski_area.zip_code') }}</td>
                </tr>
                <tr>
                    <td>住所（都道府県名）</td> 
                    <td><input class="input_list" name="ski_area[prefecture]" placeholder="住所（都道府県名）を入力" value="{{ old('ski_area.prefecture') }}"></td>
                    <td class=error>{{ $errors->first('ski_area.prefecture') }}</td>
                </tr>
                <tr>
                    <td>住所（市町村名）</td> 
                    <td><input class="input_list" name="ski_area[municipalities]" placeholder="住所（市町村名）を入力" value="{{ old('ski_area.municipalities') }}"></td>
                    <td class=error>{{ $errors->first('ski_area.municipalities') }}</td>
                </tr>
                <tr>
                    <td>住所（番地以降）</td> 
                    <td><input class="input_list" name="ski_area[after_address]" placeholder="住所（番地以降）を入力" value="{{ old('ski_area.after_address') }}"></td>
                    <td class=error>{{ $errors->first('ski_area.after_address') }}</td>
                </tr>
                <tr>
                    <td>ホームページ</td> 
                    <td><input class="input_list" name="ski_area[home_page]" placeholder="ホームページURLを入力" value="{{ old('ski_area.home_page') }}"></input></td>
                    <td class=error>{{ $errors->first('ski_area.home_page') }}</td>
                </tr>
                <tr>
                    <td>電話番号</td> 
                    <td><input class="input_list" name="ski_area[phone_number]" placeholder="電話番号を入力" value="{{ old('ski_area.phone_number') }}"></td>
                    <td class=error>{{ $errors->first('ski_area.phone_number') }}</td>
                </tr>
                <tr>
                    <td>営業時間</td> 
                    <td><input class="input_list" name="ski_area[business_hours]" placeholder="営業時間を入力" value="{{ old('ski_area.business_hours') }}"></td>
                    <td class=error>{{ $errors->first('ski_area.business_hours') }}</td>
                </tr>
                <tr>
                    <td>シーズン期間</td> 
                    <td><input class="input_list" name="ski_area[season]" placeholder="シーズン期間を入力" value="{{ old('ski_area.season') }}"></td>
                    <td class=error>{{ $errors->first('ski_area.season') }}</td>
                </tr>
                <tr>
                    <td>ナイター</td> 
                    <td>
                        <input type="radio" id="night_game1" class="radio1" name="radio_button1" onclick="textarea_off(1)"><label for="night_game1">無</label>
                        <input type="radio" checked id="night_game2" class="radio2" name="radio_button1" onclick="textarea_on(1)"><label for="night_game2">有</label></br>
                        <input id=1 class="detail" style="display: block" name="ski_area[evening_hours]" placeholder="ナイターの詳細を入力" value="{{ old('ski_area.evening_hours') }}">
                    </td>
                    <td class=error>{{ $errors->first('ski_area.evening_hours') }}</td>
                </tr>
                <tr>
                    <td>レッスン</td> 
                    <td>
                        <input type="radio" id="lesson1" class="radio1" name="radio_button2" onclick="textarea_off(2)"><label for="lesson1">無</label>
                        <input type="radio" checked id="lesson2" class="radio2" name="radio_button2" onclick="textarea_on(2)"><label for="lesson2">有</label></br>
                        <input id=2 class="detail" style="display: block" name="ski_area[lesson]" placeholder="レッスンの詳細を入力" value="{{ old('ski_area.lesson') }}">
                    </td>
                    <td class=error>{{ $errors->first('ski_area.lesson') }}</td>
                </tr>
                <tr>
                    <td>レストラン</td> 
                     <td>
                        <input type="radio" id="restaurant1" class="radio1" name="radio_button3" onclick="textarea_off(3)"><label for="restaurant1">無</label>
                        <input type="radio" checked id="restaurant2" class="radio2" name="radio_button3" onclick="textarea_on(3)"><label for="restaurant2">有</label></br>
                        <input id=3 class="detail" style="display: block" name="ski_area[restaurant]" placeholder="レストランの詳細を入力" value="{{ old('ski_area.restaurant') }}">
                    </td>
                    <td class=error>{{ $errors->first('ski_area.restaurant') }}</td>
                </tr>
                <tr>
                    <td>温泉</td> 
                    <td>
                        <input type="radio" id="spa1" class="radio1" name="radio_button4" onclick="textarea_off(4)"><label for="spa1">無</label>
                        <input type="radio" checked id="spa2" class="radio2" name="radio_button4" onclick="textarea_on(4)"><label for="spa2">有</label></br>
                        <input id=4 class="detail" style="display: block" name="ski_area[spa]" placeholder="温泉の詳細を入力" value="{{ old('ski_area.spa') }}">
                    </td>
                    <td class=error>{{ $errors->first('ski_area.spa') }}</td>
                </tr>
                <tr>
                    <td>宿泊施設</td> 
                    <td>
                        <input type="radio" id="inn1" class="radio1" name="radio_button5" onclick="textarea_off(5)"><label for="inn1">無</label>
                        <input type="radio" checked id="inn2" class="radio2" name="radio_button5" onclick="textarea_on(5)"><label for="inn2">有</label></br>
                        <input id=5 class="detail" style="display: block" name="ski_area[hotel]" placeholder="宿泊施設の詳細を入力" value="{{ old('ski_area.hotel') }}">
                    </td>
                    <td class=error>{{ $errors->first('ski_area.hotel') }}</td>
                </tr>
                <tr>
                    <td>ゲレンデマップ</td>  
                    <td>
                        <input type="radio" id="slope_map1" class="radio1" name="radio_button6" onclick="textarea_off(6)"><label for="slope_map1">無</label>
                        <input type="radio" checked id="slope_map2" class="radio2" name="radio_button6" onclick="textarea_on(6)"><label for="slope_map2">有</label></br>
                        <input id=6 class="detail" style="display: block" name="ski_area[slope_map]" placeholder="ゲレンデマップの画像を入力" value="{{ old('ski_area.slope_map') }}">
                    </td>
                    <td class=error>{{ $errors->first('ski_area.slope_map') }}</td>
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