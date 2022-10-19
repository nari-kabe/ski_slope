<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>お気に入り一覧</title>
        <link rel="stylesheet" href="/css/matching.css">
    </head>
    <body>
        <h1 class="matching_header">マッチング</h1>
        <a href="/pages/login_home">ホームに戻る</a>
        <hr>
        <h2>相手を探す</h2>
        @for ($i = 0; $i < $count_items; $i++)
            <a class='profile' href="/profiles/{{ $profiles[$i]['id'] }}">{{ $profiles[$i]['user_name'] }}</a>
            <p class='sns'>SNS：{{ $profiles[$i]['sns'] }}</p>
            <div class='profile_information'>
                <div class='summary_left'>
                    <table>
                        <tr>
                            <td class="color_first_row">住まい</td>
                            <td class="color_second_row width_second_row_l">{{ $profiles[$i]['prefecture'] }}</td>
                        </tr>
                        <tr>
                            <td class="color_first_row">性別</td>
                            <td class="color_second_row width_second_row_l">{{ $profiles[$i]['sex'] }}</td>
                        </tr>
                        <tr>
                            <td class="color_first_row">年齢</td>
                            <td class="color_second_row width_second_row_l">{{ $profiles[$i]['age'] }}</td>
                        </tr>
                    </table>
                </div>
                
                <div class=summary_right>
                    <table>
                        <tr>
                            <td class="color_first_row">ホームゲレンデ</td>
                            @if ($profiles[$i]['home_slope'] === null)
                                <td class="color_second_row width_second_row_r">-</td>
                            @else
                                <td class="color_second_row width_second_row_r">{{ $profiles[$i]['home_slope']}}</td>
                            @endif
                        </tr>
                        <tr>
                            <td class="color_first_row">スキーの経験</td>
                            <td class="color_second_row width_second_row_l">{{ $profiles[$i]['ski_level'] }}</td>
                        </tr>
                        <tr>
                            <td class="color_first_row">スノーボードの経験</td>
                            <td class="color_second_row width_second_row_l">{{ $profiles[$i]['snowboard_level'] }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        @endfor
    </body>
</html>