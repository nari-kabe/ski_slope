<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>マッチング</title>
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
                        <td>
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
                        <td>
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
                        <td>
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
                        <td>
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
            @if (in_array($profile['id'], $overlap_id))
                <p class="p_inline">お気に入り登録済み</p>
            @else
                <form action="/find_profile_list" method="POST" class="bookmark">
                    @csrf
                    <input type="hidden" name="star_profile[profile_id]" value="{{ $profile['id'] }}">
                    <button type="submit">お気に入り登録</button>
                </form>
            @endif
            <div class='profile_information'>
                <p class='sns'>SNS：{{ $profile['sns'] }}</p>
                <div class='summary'>
                    <table>
                        <tr>
                            <td class="color_first_row">住まい（都道府県）</td>
                            <td class="color_second_row width_second_row_l">{{ $profile['prefecture'] }}</td>
                            <td>　</td>
                            <td class="color_first_row">ホームゲレンデ</td>
                            @if ($profile['home_slope'] === null)
                                <td class="color_second_row width_second_row_l">-</td>
                            @else
                                <td class="color_second_row width_second_row_l">{{ $profile['home_slope']}}</td>
                            @endif
                        </tr>
                        <tr>
                            <td class="color_first_row">性別</td>
                            @if ($profile['sex'] == 0)
                                <td class="color_second_row width_second_row_l">未回答</td>
                            @elseif ($profile['sex'] == 1)
                                <td class="color_second_row width_second_row_l">男</td>
                            @elseif ($profile['sex'] == 2)
                                <td class="color_second_row width_second_row_l">女</td>
                            @else
                                <td class="color_second_row width_second_row_l">その他</td>
                            @endif
                            <td>　</td>
                            <td class="color_first_row">スキーの経験</td>
                            <td class="color_second_row width_second_row_l">{{ $profile['ski_level'] }}</td>
                        </tr>
                        <tr>
                            <td class="color_first_row">年齢</td>
                            <td class="color_second_row width_second_row_l">{{ $profile['age'] }}</td>
                            <td>　</td>
                            <td class="color_first_row">スノーボードの経験</td>
                            <td class="color_second_row width_second_row_l">{{ $profile['snowboard_level'] }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        @endforeach
        @if ($profiles->isEmpty() === true)
            <p class="no_profile">相手が見つかりませんでした</p>
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