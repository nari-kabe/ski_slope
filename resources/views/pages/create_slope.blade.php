<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>スキー場情報追加</title>
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
        
        <h2 class=inline>情報一覧</h2>
        <p class=inline id=inline_width><span>*</span>は必須です</p>
        <div id="list">
            <table>
                <tr>
                    <td><span>*</span>スキー場名</td> 
                    <td>
                        <input class="input_list" name="ski_area[place_name]" placeholder="例１：札幌国際スキー場　例２：ルスツリゾート" value="{{ old('ski_area.place_name') }}">
                        <p class=error>{{ $errors->first('ski_area.place_name') }}</p>
                    </td>
                </tr>
                <tr>
                    <td>ホームページ</td> 
                    <td>
                        <input class="input_list" name="ski_area[home_page]" placeholder="例：https://www.sapporo-kokusai.jp/" value="{{ old('ski_area.home_page') }}">
                        <p class=error>{{ $errors->first('ski_area.home_page') }}</p>
                    </td>
                </tr>
                <tr>
                    <td><span>*</span>住所（郵便番号）</td> 
                    <td>
                        <input class="input_list" name="ski_area[zip_code]" placeholder="例：010-0012" value="{{ old('ski_area.zip_code') }}">
                        <p class=error>{{ $errors->first('ski_area.zip_code') }}</p>
                    </td>
                </tr>
                <tr>
                    <td><span>*</span>住所（都道府県名）</td> 
                    <td>
                        <input class="input_list" name="ski_area[prefecture]" placeholder="例：北海道" value="{{ old('ski_area.prefecture') }}">
                        <p class=error>{{ $errors->first('ski_area.prefecture') }}</p>
                    </td>
                </tr>
                <tr>
                    <td><span>*</span>住所（市区郡名）</td> 
                    <td>
                        <input class="input_list" name="ski_area[city]" placeholder="例：南区" value="{{ old('ski_area.city') }}">
                        <p class=error>{{ $errors->first('ski_area.city') }}</p>
                    </td>
                </tr>
                <tr>
                    <td><span>*</span>住所（上記以降）</td> 
                    <td>
                        <input class="input_list" name="ski_area[after_address]" placeholder="例：定山渓937番地先" value="{{ old('ski_area.after_address') }}">
                        <p class=error>{{ $errors->first('ski_area.after_address') }}</p>
                    </td>
                </tr>
                <tr>
                    <td><span>*</span>電話番号</td> 
                    <td>
                        <input class="input_list" name="ski_area[phone_number]" placeholder="例：0811-59-4819" value="{{ old('ski_area.phone_number') }}">
                        <p class=error>{{ $errors->first('ski_area.phone_number') }}</p>
                    </td>
                </tr>
                <tr>
                    <td><span>*</span>営業時間</td> 
                    <td>
                        <textarea class="normal_textarea" name="ski_area[business_hours]" placeholder="例：通常期間 2022年12月1日（木）~ 2023年3月31日（金）&#10;平日 9:00 ~ 17:00 / 土日祝 8:30 ~ 17:00">{{ old('ski_area.business_hours') }}</textarea>
                        <p class=error>{{ $errors->first('ski_area.business_hours') }}</p>
                    </td>
                </tr>
                <tr>
                    <td>シーズン期間</td> 
                    <td>
                        <input class="input_list" name="ski_area[season]" placeholder="例：2022年11月18日（金） ~ 2023年5月7日（日）" value="{{ old('ski_area.season') }}">
                        <p class=error>{{ $errors->first('ski_area.season') }}</p>
                    </td>
                </tr>
                <tr>
                    <td>リフト料金</td> 
                    <td>
                        <textarea class="normal_textarea" name="ski_area[lift_ticket]" placeholder="例：1日券：4000円 &#10; 4時間券：3000円">{{ old('ski_area.lift_ticket') }}</textarea>
                        <p class=error>{{ $errors->first('ski_area.lift_ticket') }}</p>
                    </td>
                </tr>
                <tr>
                    <td>駐車場</td> 
                    <td>
                        @if (old("radio_button8") == "無")
                            <input type="radio" id="parking_lot1" class="radio1" name="radio_button8" value="無" {{ old("radio_button8", "無") == "無" ? "checked" : "" }} onclick="textarea_off(8)"><label for="parking_lot1">無</label>
                            <input type="radio" id="parking_lot2" class="radio2" name="radio_button8" value="有" {{ old("radio_button8") == "有" ? "checked" : "" }} onclick="textarea_on(8)"><label for="parking_lot2">有</label></br>
                            <textarea id=8 class="detail" style="display: none" name="ski_area[parking_lot]" placeholder="例：第一駐車場（800台）" >{{ old('ski_area.parking_lot') }}</textarea>
                            <p class=error>{{ $errors->first('ski_area.parking_lot') }}</p>
                        @else
                            <input type="radio" id="parking_lot1" class="radio1" name="radio_button8" value="無" {{ old("radio_button8") == "無" ? "checked" : "" }} onclick="textarea_off(8)"><label for="parking_lot1">無</label>
                            <input type="radio" id="parking_lot2" class="radio2" name="radio_button8" value="有" {{ old("radio_button8", "有") == "有" ? "checked" : "" }} onclick="textarea_on(8)"><label for="parking_lot2">有</label></br>
                            <textarea id=8 class="detail" style="display: block" name="ski_area[parking_lot]" placeholder="例：第一駐車場（800台）" >{{ old('ski_area.parking_lot') }}</textarea>
                            <p class=error>{{ $errors->first('ski_area.parking_lot') }}</p>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>キッズパーク</td> 
                    <td>
                        @if (old("radio_button7") == "無")
                            <input type="radio" id="kids_park1" class="radio1" name="radio_button7" value="無" {{ old("radio_button7", "無") == "無" ? "checked" : "" }} onclick="textarea_off(7)"><label for="kids_park1">無</label>
                            <input type="radio" id="kids_park2" class="radio2" name="radio_button7" value="有" {{ old("radio_button7") == "有" ? "checked" : "" }} onclick="textarea_on(7)"><label for="kids_park2">有</label></br>
                            <textarea id=7 class="detail" style="display: none" name="ski_area[kids_park]" placeholder="例：場所：センターハウス横 &#10; ソリー使用可能">{{ old('ski_area.kids_park') }}</textarea>
                            <p class=error>{{ $errors->first('ski_area.kids_park') }}</p>
                        @else
                            <input type="radio" id="kids_park1" class="radio1" name="radio_button7" value="無" {{ old("radio_button7") == "無" ? "checked" : "" }} onclick="textarea_off(7)"><label for="kids_park1">無</label>
                            <input type="radio" id="kids_park2" class="radio2" name="radio_button7" value="有" {{ old("radio_button7", "有") == "有" ? "checked" : "" }} onclick="textarea_on(7)"><label for="kids_park2">有</label></br>
                            <textarea id=7 class="detail" style="display: block" name="ski_area[kids_park]" placeholder="例：場所：センターハウス横 &#10; ソリー使用可能">{{ old('ski_area.kids_park') }}</textarea>
                            <p class=error>{{ $errors->first('ski_area.kids_park') }}</p>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>ナイター</td> 
                    <td>
                        @if (old("radio_button1") == "無")
                            <input type="radio" id="night_game1" class="radio1" name="radio_button1" value="無" {{ old("radio_button1", "無") == "無" ? "checked" : "" }} onclick="textarea_off(1)"><label for="night_game1">無</label>
                            <input type="radio" id="night_game2" class="radio2" name="radio_button1" value="有" {{ old("radio_button1") == "有" ? "checked" : "" }} onclick="textarea_on(1)"><label for="night_game2">有</label></br>
                            <textarea id=1 class="detail" style="display: none" name="ski_area[evening_hours]" placeholder="例：17:00 ~ 20:00">{{ old('ski_area.evening_hours') }}</textarea>
                            <p class=error>{{ $errors->first('ski_area.evening_hours') }}</p>
                        @else
                            <input type="radio" id="night_game1" class="radio1" name="radio_button1" value="無" {{ old("radio_button1") == "無" ? "checked" : "" }} onclick="textarea_off(1)"><label for="night_game1">無</label>
                            <input type="radio" id="night_game2" class="radio2" name="radio_button1" value="有" {{ old("radio_button1", "有") == "有" ? "checked" : "" }} onclick="textarea_on(1)"><label for="night_game2">有</label></br>
                            <textarea id=1 class="detail" style="display: block" name="ski_area[evening_hours]" placeholder="例：17:00 ~ 20:00">{{ old('ski_area.evening_hours') }}</textarea>
                            <p class=error>{{ $errors->first('ski_area.evening_hours') }}</p>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>レッスン</td> 
                    <td>
                        @if (old("radio_button2") == "無")
                            <input type="radio" id="lesson1" class="radio1" name="radio_button2" value="無" {{ old("radio_button2", "無") == "無" ? "checked" : "" }} onclick="textarea_off(2)"><label for="lesson1">無</label>
                            <input type="radio" id="lesson2" class="radio2" name="radio_button2" value="有" {{ old("radio_button2") == "有" ? "checked" : "" }} onclick="textarea_on(2)"><label for="lesson2">有</label></br>
                            <textarea id=2 class="detail" style="display: none" name="ski_area[lesson]" placeholder="例：３日集中レッスン、キッズ・ジュニアレッスン、レベル別レッスン、プライベートレッスン">{{ old('ski_area.lesson') }}</textarea>
                            <p class=error>{{ $errors->first('ski_area.lesson') }}</p>
                        @else
                            <input type="radio" id="lesson1" class="radio1" name="radio_button2" value="無" {{ old("radio_button2") == "無" ? "checked" : "" }} onclick="textarea_off(2)"><label for="lesson1">無</label>
                            <input type="radio" id="lesson2" class="radio2" name="radio_button2" value="有" {{ old("radio_button2", "有") == "有" ? "checked" : "" }} onclick="textarea_on(2)"><label for="lesson2">有</label></br>
                            <textarea id=2 class="detail" style="display: block" name="ski_area[lesson]" placeholder="例：３日集中レッスン、キッズ・ジュニアレッスン、レベル別レッスン、プライベートレッスン">{{ old('ski_area.lesson') }}</textarea>
                            <p class=error>{{ $errors->first('ski_area.lesson') }}</p>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>スノーボードの使用</td> 
                    <td>
                        <input type="radio" id="available1" class="radio1" name="ski_area[snowboard]" value="1" {{ old("ski_area[snowboard]", "1") == "1" ? "checked" : "" }}><label for="available1">使用可能</label>
                        <input type="radio" id="available2" class="radio2" name="ski_area[snowboard]" value="0" {{ old("ski_area[snowboard]") == "0" ? "checked" : "" }}><label for="available2">使用不可</label>
                        <p class=error>{{ $errors->first('ski_area.snowboard') }}</p>
                    </td>
                </tr>
                <tr>
                    <td>レストラン</td> 
                     <td>
                        @if (old("radio_button3") == "無")
                            <input type="radio" id="restaurant1" class="radio1" name="radio_button3" value="無" {{ old("radio_button3", "無") == "無" ? "checked" : "" }} onclick="textarea_off(3)"><label for="restaurant1">無</label>
                            <input type="radio" id="restaurant2" class="radio2" name="radio_button3" value="有" {{ old("radio_button3") == "有" ? "checked" : "" }} onclick="textarea_on(3)"><label for="restaurant2">有</label></br>
                            <textarea id=3 class="detail" style="display: none" name="ski_area[restaurant]" placeholder="スキー場内に６つ有り">{{ old('ski_area.restaurant') }}</textarea>
                            <p class=error>{{ $errors->first('ski_area.restaurant') }}</p>
                        @else
                            <input type="radio" id="restaurant1" class="radio1" name="radio_button3" value="無" {{ old("radio_button3") == "無" ? "checked" : "" }} onclick="textarea_off(3)"><label for="restaurant1">無</label>
                            <input type="radio" id="restaurant2" class="radio2" name="radio_button3" value="有" {{ old("radio_button3", "有") == "有" ? "checked" : "" }} onclick="textarea_on(3)"><label for="restaurant2">有</label></br>
                            <textarea id=3 class="detail" style="display: block" name="ski_area[restaurant]" placeholder="スキー場内に６つ有り">{{ old('ski_area.restaurant') }}</textarea>
                            <p class=error>{{ $errors->first('ski_area.restaurant') }}</p>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>温泉</td> 
                    <td>
                        @if (old("radio_button4") == "無")
                            <input type="radio" id="spa1" class="radio1" name="radio_button4" value="無" {{ old("radio_button4", "無") == "無" ? "checked" : "" }} onclick="textarea_off(4)"><label for="spa1">無</label>
                            <input type="radio" id="spa2" class="radio2" name="radio_button4" value="有" {{ old("radio_button4") == "有" ? "checked" : "" }} onclick="textarea_on(4)"><label for="spa2">有</label></br>
                            <textarea id=4 class="detail" style="display: none" name="ski_area[spa]" placeholder="例：◯◯温泉 （スキー場から1km ）">{{ old('ski_area.spa') }}</textarea>
                            <p class=error>{{ $errors->first('ski_area.spa') }}</p>
                        @else
                            <input type="radio" id="spa1" class="radio1" name="radio_button4" value="無" {{ old("radio_button4") == "無" ? "checked" : "" }} onclick="textarea_off(4)"><label for="spa1">無</label>
                            <input type="radio" id="spa2" class="radio2" name="radio_button4" value="有" {{ old("radio_button4", "有") == "有" ? "checked" : "" }} onclick="textarea_on(4)"><label for="spa2">有</label></br>
                            <textarea id=4 class="detail" style="display: block" name="ski_area[spa]" placeholder="例：◯◯温泉 （スキー場から1km ）">{{ old('ski_area.spa') }}</textarea>
                            <p class=error>{{ $errors->first('ski_area.spa') }}</p>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>宿泊施設</td> 
                    <td>
                        @if (old("radio_button5") == "無")
                            <input type="radio" id="inn1" class="radio1" name="radio_button5" value="無" {{ old("radio_button5", "無") == "無" ? "checked" : "" }} onclick="textarea_off(5)"><label for="inn1">無</label>
                            <input type="radio" id="inn2" class="radio2" name="radio_button5" value="有" {{ old("radio_button5") == "有" ? "checked" : "" }} onclick="textarea_on(5)"><label for="inn2">有</label></br>
                            <textarea id=5 class="detail" style="display: none" name="ski_area[hotel]" placeholder="◯◯ホテル（スキー場から15km ）">{{ old('ski_area.hotel') }}</textarea>
                            <p class=error>{{ $errors->first('ski_area.hotel') }}</p>
                        @else
                            <input type="radio" id="inn1" class="radio1" name="radio_button5" value="無" {{ old("radio_button5") == "無" ? "checked" : "" }} onclick="textarea_off(5)"><label for="inn1">無</label>
                            <input type="radio" id="inn2" class="radio2" name="radio_button5" value="有" {{ old("radio_button5", "有") == "有" ? "checked" : "" }} onclick="textarea_on(5)"><label for="inn2">有</label></br>
                            <textarea id=5 class="detail" style="display: block" name="ski_area[hotel]" placeholder="◯◯ホテル（スキー場から15km ）">{{ old('ski_area.hotel') }}</textarea>
                            <p class=error>{{ $errors->first('ski_area.hotel') }}</p>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>自由記入欄</td> 
                    <td>
                        <textarea class="normal_textarea" name="ski_area[free_entry]" placeholder="自由に記入してください">{{ old('ski_area.free_entry') }}</textarea>
                        <p class=error>{{ $errors->first('ski_area.free_entry') }}</p>
                    </td>
                </tr>
                <!--ゲレンデマップ省略-->
            </table>
        </div>
        <input class=form type="submit" value="送信"/></br>
        </form>
        
    </body>
</html>