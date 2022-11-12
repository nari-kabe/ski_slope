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
        <form action='/search_slope_list' name="search"  method='POST'>
            @csrf
            <input name='search_slope' id="input_slope" value='{{ $search_slope }}' placeholder="スキー場名で検索">
            <input class="search" type='submit' value="検索">
        </form>
        @foreach ($slopes as $slope)
            <a class='ski_slope' href="/ski_areas/{{ $slope['id'] }}">{{ $slope['place_name'] }}</a>
            <div class=slope_information>
                <div class=summary_left>
                    <table>
                        <tr>
                            <td class="color_first_row">シーズン期間</td>
                            @if($slope['season']===null)
                                <td class="color_second_row width_second_row_l">-</td>
                            @else
                                <td class="color_second_row width_second_row_l">{{ $slope['season'] }}</td>
                            @endif
                        </tr>
                        <tr>
                            <td class="color_first_row">リフト料金</td>
                            @if($slope['lift_ticket']===null)
                                <td class="color_second_row width_second_row_l">-</td>
                            @else
                                 <td class="color_second_row width_second_row_l">{{ $slope['lift_ticket'] }}</td>
                            @endif
                        </tr>
                        <tr>
                            <td class="color_first_row">スノーボードの使用</td>
                            @if($slope['snowboard']==0)
                                <td class="color_second_row width_second_row_l">使用不可</td>
                            @else
                                <td class="color_second_row width_second_row_l">使用可能</td>
                            @endif
                        </tr>
                    </table>
                </div>
                
                <div class=summary_right>
                    <table>
                        <tr>
                            <td class="color_first_row first_row_width">ナイター</td>
                            @if($slope['evening_hours']===null)
                                <td class="color_second_row width_second_row_r">-</td>
                            @else
                                <td class="color_second_row width_second_row_r">{{ $slope['evening_hours'] }}</td>
                            @endif
                        </tr>
                        <tr>
                            <td class="color_first_row first_row_width">宿泊施設</td>
                            @if($slope['hotel']===null)
                                <td class="color_second_row width_second_row_r">-</td>
                            @else
                                <td class="color_second_row width_second_row_r">{{ $slope['hotel'] }}</td>
                            @endif
                        </tr>
                        <tr>
                            <td class="color_first_row first_row_width">レッスン</td>
                            @if($slope['lesson']===null)
                                <td class="color_second_row width_second_row_r">-</td>
                            @else
                                <td class="color_second_row width_second_row_r">{{ $slope['lesson'] }}</td>
                            @endif
                        </tr>
                    </table>
                </div>
            </div>
        @endforeach
    </body>
</html>