<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>スキー場検索</title>
        <link rel="stylesheet" href="/css/search_slope.css">
    </head>
    <body>
        <h1 class="star_header">スキー場検索</h1>
        <a href="/pages/login_home">ホームに戻る</a>
        <hr>
        <div class="refine_search">
            <span class="refine_search_title">絞り込み検索</span>
            <table>
                <form action='/search_slope_list' name="search"  method='POST'>
                    @csrf
                    <tr>
                        <th>都道府県</th>
                        <th>スノーボードの使用</th>
                        <th>ナイター</th>
                        <th>レッスン</th>
                        <th>キッズパーク</th>
                        <th>温泉</th>
                        <th>宿泊施設</th>
                        <th>スキー場名</th>
                    </tr>
                    <tr>
                        <td>
                            <select name="prefecture[]" id="select_prefecture">
                                @foreach($prefecture_data as $value)
                                        @if ($prefecture !== null && $value === $prefecture[0])
                                            <option value="{{ $value }}" selected>{{ $value }}</option>
                                        @else
                                            <option value="{{ $value }}" >{{ $value }}</option>
                                        @endif
                               @endforeach
                            </select>
                        </td>
                        <td>
                            <select name="snowboard[]" id="select_snowboard">
                                @foreach($snowboard_data as $key => $value)
                                        @if ($key == $old_snowboard)
                                            <option name="{{ $key }}" value="{{ $key }}" selected>{{ $value }}</option>
                                        @else
                                            <option name="{{ $key }}" value="{{ $key }}" >{{ $value }}</option>
                                        @endif
                                    
                               @endforeach
                            </select>
                        </td>
                        <td>
                            <select name="evening_hours[]" id="select_evening_hours">
                                @foreach($existence_data as $value)
                                        @if ($evening_hours !== null && $value === $evening_hours[0])
                                            <option value="{{ $value }}" selected>{{ $value }}</option>
                                        @else
                                            <option value="{{ $value }}" >{{ $value }}</option>
                                        @endif
                               @endforeach
                            </select>
                        </td>
                        <td>
                            <select name="lesson[]" id="select_lesson">
                                @foreach($existence_data as $value)
                                        @if ($lesson !== null && $value === $lesson[0])
                                            <option value="{{ $value }}" selected>{{ $value }}</option>
                                        @else
                                            <option value="{{ $value }}" >{{ $value }}</option>
                                        @endif
                               @endforeach
                            </select>
                        </td>
                        <td>
                            <select name="kids_park[]" id="select_kids_park">
                                @foreach($existence_data as $value)
                                        @if ($kids_park !== null && $value === $kids_park[0])
                                            <option value="{{ $value }}" selected>{{ $value }}</option>
                                        @else
                                            <option value="{{ $value }}" >{{ $value }}</option>
                                        @endif
                               @endforeach
                            </select>
                        </td>
                        <td>
                            <select name="spa[]" id="select_spa">
                                @foreach($existence_data as $value)
                                        @if ($spa !== null && $value === $spa[0])
                                            <option value="{{ $value }}" selected>{{ $value }}</option>
                                        @else
                                            <option value="{{ $value }}" >{{ $value }}</option>
                                        @endif
                               @endforeach
                            </select>
                        </td>
                        <td>
                            <select name="hotel[]" id="select_hotel">
                                @foreach($existence_data as $value)
                                        @if ($hotel !== null && $value === $hotel[0])
                                            <option value="{{ $value }}" selected>{{ $value }}</option>
                                        @else
                                            <option value="{{ $value }}" >{{ $value }}</option>
                                        @endif
                               @endforeach
                            </select>
                        </td>
                        <td>
                            <input name='search_slope' id="input_slope" value='{{ $search_slope }}' placeholder="スキー場名を入力">
                        </td>
                    </tr>
            </table>
                    <input class="search" type='submit' value="検索">
                </form>
            <button class="clear" onclick="reset()">すべての条件を<br>クリア</button>
        </div>
        @foreach ($slopes as $slope)
            <a class='ski_slope' href="/ski_areas/{{ $slope['id'] }}">{{ $slope['place_name'] }}</a>
            <div class=slope_information>
                <div class=summary>
                    <table>
                        <tr>
                            <td class="color_first_row">都道府県</td>
                            <td class="color_second_row width_second_row_l">{{ $slope['prefecture'] }}</td>
                            <td>　</td>
                            <td class="color_first_row first_row_width">ナイター</td>
                            @if($slope['evening_hours']===null)
                                <td class="color_second_row width_second_row_r">-</td>
                            @else
                                <td class="color_second_row width_second_row_r">{{ $slope['evening_hours'] }}</td>
                            @endif
                        </tr>
                        <tr>
                            <td class="color_first_row">シーズン期間</td>
                            @if($slope['season']===null)
                                <td class="color_second_row width_second_row_l">-</td>
                            @else
                                <td class="color_second_row width_second_row_l">{{ $slope['season'] }}</td>
                            @endif
                            <td>　</td>
                            <td class="color_first_row first_row_width">レッスン</td>
                            @if($slope['lesson']===null)
                                <td class="color_second_row width_second_row_r">-</td>
                            @else
                                <td class="color_second_row width_second_row_r">{{ $slope['lesson'] }}</td>
                            @endif
                        </tr>
                        <tr>
                            <td class="color_first_row">リフト料金</td>
                            @if($slope['lift_ticket']===null)
                                <td class="color_second_row width_second_row_l">-</td>
                            @else
                                 <td class="color_second_row width_second_row_l">{{ $slope['lift_ticket'] }}</td>
                            @endif
                            <td>　</td>
                            <td class="color_first_row first_row_width">キッズパーク</td>
                            @if($slope['kids_park']===null)
                                <td class="color_second_row width_second_row_r">-</td>
                            @else
                                <td class="color_second_row width_second_row_r">{{ $slope['kids_park'] }}</td>
                            @endif
                        </tr>
                        <tr>
                            <td class="color_first_row">スノーボードの使用</td>
                            @if($slope['snowboard']==0)
                                <td class="color_second_row width_second_row_l">使用不可</td>
                            @else
                                <td class="color_second_row width_second_row_l">使用可能</td>
                            @endif
                            <td>　</td>
                            <td class="color_first_row first_row_width">温泉</td>
                            @if($slope['spa']===null)
                                <td class="color_second_row width_second_row_r">-</td>
                            @else
                                <td class="color_second_row width_second_row_r">{{ $slope['spa'] }}</td>
                            @endif
                        </tr>
                        <tr>
                            <td class="color_first_row first_row_width">宿泊施設</td>
                            @if($slope['hotel']===null)
                                <td class="color_second_row width_second_row_r">-</td>
                            @else
                                <td class="color_second_row width_second_row_r">{{ $slope['hotel'] }}</td>
                            @endif
                            <td>　</td>
                            <td class="color_first_row first_row_width">駐車場</td>
                            @if($slope['parking_lot']===null)
                                <td class="color_second_row width_second_row_r">-</td>
                            @else
                                <td class="color_second_row width_second_row_r">{{ $slope['parking_lot'] }}</td>
                            @endif
                        </tr>
                    </table>
                </div>
            </div>
        @endforeach
        @if ($slopes->isEmpty() === true)
            <p class="no_slope">スキー場が見つかりませんでした</p>
        @endif
        <script>
            function reset() {
                document.getElementById('select_snowboard').options[0].selected = true;
                document.getElementById('select_prefecture').options[0].selected = true;
                document.getElementById('select_evening_hours').options[0].selected = true;
                document.getElementById('select_lesson').options[0].selected = true;
                document.getElementById('select_kids_park').options[0].selected = true;
                document.getElementById('select_spa').options[0].selected = true;
                document.getElementById('select_hotel').options[0].selected = true;
                document.getElementById('input_slope').value = null;
            }
        </script>
    </body>
</html>