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
        <div class="refine_search">
            <span class="refine_search_title">絞り込み検索</span>
            <table>
                <form action='/find_friend_list' name="search"  method='POST'>
                    @csrf
                    <tr>
                        <th>性別</th>
                        <th>年齢</th>
                        <th>住まい</th>
                        <th>スキーの経験</th>
                        <th>スノーボードの経験</th>
                        <th>ホームゲレンデ・よく行くスキー場</th>
                    </tr>
                    <tr>
                        <td class="terms">
                            <select name="sex[]" id="select_sex">
                                @foreach($sex_data as $key => $value)
                                        @if ($key == $old_sex)
                                            <option name="{{ $key }}" value="{{ $key }}" selected>{{ $value }}</option>
                                        @else
                                            <option name="{{ $key }}" value="{{ $key }}" >{{ $value }}</option>
                                        @endif
                                    
                               @endforeach
                            </select>
                        </td>
                        <td class="terms">
                            <select name="age[]" id="select_age">
                                @foreach($age_data as $value)
                                        @if ($age !== null && $value === $age[0])
                                            <option value="{{ $value }}" selected>{{ $value }}</option>
                                        @else
                                            <option value="{{ $value }}" >{{ $value }}</option>
                                        @endif
                                    
                               @endforeach
                            </select>
                        </td>
                        <td class="terms">
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
                        <td class="terms">
                            <select name="ski_level[]" id="select_ski_level">
                                @foreach($level_data as $value)
                                        @if ($ski_level !== null && $value === $ski_level[0])
                                            <option value="{{ $value }}" selected>{{ $value }}</option>
                                        @else
                                            <option value="{{ $value }}" >{{ $value }}</option>
                                        @endif
                               @endforeach
                            </select>
                        </td>
                        <td class="terms">
                            <select name="snowboard_level[]" id="select_snowboard_level">
                                @foreach($level_data as $value)
                                        @if ($snowboard_level !== null && $value === $snowboard_level[0])
                                            <option value="{{ $value }}" selected>{{ $value }}</option>
                                        @else
                                            <option value="{{ $value }}" >{{ $value }}</option>
                                        @endif
                               @endforeach
                            </select>
                        </td>
                        <td class="terms">
                            <input name='home_slope' id="input_slope" value='{{ $home_slope }}' placeholder="スキー場名を入力">
                        </td>
                    </tr>
            </table>
                <input class="search" type='submit' value="検索">
                </form>
            <button class="clear" onclick="reset()">すべての条件を<br>クリア</button>
        </div>
        @foreach ($profiles as $profile)
            <a class='profile' href="/profiles/{{ $profile['id'] }}">{{ $profile['user_name'] }}</a>
            @if ($star_profile === null)
                <form action="/find_profile_list" method="POST" class="bookmark">
                @csrf
                <input type="hidden" name="star_profile[profile_id]" value="{{ $profile['id'] }}">
                    <button type="submit">お気に入り登録</button>
                </form>
            @else
                <td><p>お気に入り登録済み</p></td>
            @endif
            <div class='profile_information'>
                <p class='sns'>SNS：{{ $profile['sns'] }}</p>
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
        <script>
            function reset() {
                document.getElementById('select_sex').options[0].selected = true;
                document.getElementById('select_age').options[0].selected = true;
                document.getElementById('select_prefecture').options[0].selected = true;
                document.getElementById('select_ski_level').options[0].selected = true;
                document.getElementById('select_snowboard_level').options[0].selected = true;
                document.getElementById('input_slope').value = null;
            }
        </script>
    </body>
</html>