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
        <form action='/find_friend_list'  method='POST'>
            @csrf
            <select name="sex[]">
                @foreach($sex_data as $key => $value)
                        @if ($key == $old_sex)
                            <option value="{{ $key }}" selected>{{ $value }}</option>
                        @else
                            <option value="{{ $key }}" >{{ $value }}</option>
                        @endif
                    
               @endforeach
            </select>
            <select name="age[]">
                @foreach($age_data as $value)
                        @if ($value === $age[0])
                            <option value="{{ $value }}" selected>{{ $value }}</option>
                        @else
                            <option value="{{ $value }}" >{{ $value }}</option>
                        @endif
                    
               @endforeach
            </select>
            <select name="prefecture[]">
                @foreach($prefecture_data as $value)
                        @if ($value === $prefecture[0])
                            <option value="{{ $value }}" selected>{{ $value }}</option>
                        @else
                            <option value="{{ $value }}" >{{ $value }}</option>
                        @endif
               @endforeach
            </select>
            <select name="ski_level[]">
                @foreach($level_data as $value)
                        @if ($value === $ski_level[0])
                            <option value="{{ $value }}" selected>{{ $value }}</option>
                        @else
                            <option value="{{ $value }}" >{{ $value }}</option>
                        @endif
               @endforeach
            </select>
            <select name="snowboard_level[]">
                @foreach($level_data as $value)
                        @if ($value === $snowboard_level[0])
                            <option value="{{ $value }}" selected>{{ $value }}</option>
                        @else
                            <option value="{{ $value }}" >{{ $value }}</option>
                        @endif
               @endforeach
            </select>
            <input name='home_slope' value='{{ $home_slope }}'>
            <button>すべての条件をクリア</button>
            <p><input type='submit' value="検索"></p>
        </form>
        @foreach ($profiles as $profile)
            <a class='profile' href="/profiles/{{ $profile['id'] }}">{{ $profile['user_name'] }}</a>
            <p class='sns'>SNS：{{ $profile['sns'] }}</p>
            <div class='profile_information'>
                <div class='summary_left'>
                    <table>
                        <tr>
                            <td class="color_first_row">住まい</td>
                            <td class="color_second_row width_second_row_l">{{ $profile['prefecture'] }}</td>
                        </tr>
                        <tr>
                            <td class="color_first_row">性別</td>
                            <td class="color_second_row width_second_row_l">{{ $profile['sex'] }}</td>
                        </tr>
                        <tr>
                            <td class="color_first_row">年齢</td>
                            <td class="color_second_row width_second_row_l">{{ $profile['age'] }}</td>
                        </tr>
                    </table>
                </div>
                
                <div class=summary_right>
                    <table>
                        <tr>
                            <td class="color_first_row">ホームゲレンデ</td>
                            @if ($profile['home_slope'] === null)
                                <td class="color_second_row width_second_row_r">-</td>
                            @else
                                <td class="color_second_row width_second_row_r">{{ $profile['home_slope']}}</td>
                            @endif
                        </tr>
                        <tr>
                            <td class="color_first_row">スキーの経験</td>
                            <td class="color_second_row width_second_row_l">{{ $profile['ski_level'] }}</td>
                        </tr>
                        <tr>
                            <td class="color_first_row">スノーボードの経験</td>
                            <td class="color_second_row width_second_row_l">{{ $profile['snowboard_level'] }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        @endforeach
        @if ($profiles->isEmpty() === true)
            <p>相手が見つかりませんでした</p>
        @endif
    </body>
</html>