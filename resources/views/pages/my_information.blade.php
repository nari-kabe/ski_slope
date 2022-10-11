<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>My Information</title>
        <link rel="stylesheet" href="/css/my_information.css">
    </head>
    <body>
        <h1 class="header">My Information</h1>
        <a href="/pages/login_home">ホームに戻る</a>
        <hr>
        <h2 class="sub_header">My Profile</h2>
        @Auth
            @if ($my_profile !== null)
                <a class="left_right_space" href='/profiles/{{ $my_profile->id }}/edit'>編集</a>
                <p class="inline_block">{{ '最終更新日時：'. $my_profile->updated_at }}</p>
            
        <div id="list">
            <table>
                <tr>
                    <td>ユーザーネーム</td> 
                    <td class="input_list">{{ $my_profile->user_name }}</td>
                </tr>
                <tr>
                    <td>性別</td> 
                    @if ($my_profile->sex===0)
                        <td>未回答</td>
                    @elseif ($my_profile->sex===1)
                        <td>男</td>
                    @elseif ($my_profile->sex===2)
                        <td>女</td>
                    @else
                        <td>その他</td>
                    @endif
                </tr>
                <tr>
                    <td>年齢</td>
                    @if($my_profile->age===null)
                        <td>未記入</td>
                    @else
                        <td class="input_list">{{ $my_profile->age }}</td>
                    @endif
                </tr>
                <tr>
                    <td>職業</td> 
                    @if($my_profile->occupation===null)
                        <td>未記入</td>
                    @else
                        <td class="input_list">{{ $my_profile->occupation }}</td>
                    @endif
                </tr>
                <tr>
                    <td>スキーの経験</td> 
                    <td>{{ $my_profile->ski_level }}</td>
                </tr>
                <tr>
                    <td>スノーボードの経験</td> 
                    <td>{{ $my_profile->snowboard_level }}</td>
                </tr>
                <tr>
                    <td>その他の経験</td>
                    @if ($my_profile->others_level===null)
                        <td>未記入</td>
                    @else
                        <td>{{ $my_profile->others_level }}</td>
                    @endif
                </tr>
                <tr>
                    <td>ホームゲレンデ</td> 
                    @if($my_profile->home_slope===null)
                        <td>未記入</td>
                    @else
                        <td>{{ $my_profile->home_slope }}</td>
                    @endif
                </tr>
                <tr>
                    <td>公開設定</td> 
                    <td>{{ $my_profile->public_setting }}</td>
                </tr>
                <tr>
                    <td>コメント</td> 
                    @if($my_profile->greeting===null)
                        <td>未記入</td>
                    @else
                        <td>{{ $my_profile->greeting }}</td>
                    @endif
                </tr>
            </table>
        </div>
            @else
                <p class="text">プロフィール情報が未登録です</p>
            @endif
            @endAuth
            
            @guest
                <p class="text">ログインしていません</p>
            @endguest
        
        <h2 class="star_header">お気に入り一覧</h2>
        <div class="star_rank">
            @if ($place_id !== null)
                <table>
                @for ($i = 0; $i < count($place_id); $i++)
                    <tr>
                        <td>
                            <p class="rank">No.{{ $i+1 }} {{ $place_name[$i] }}</p>
                        </td>
                        <td>
                            <a class="ski_slope" href='/ski_areas/{{ $place_id[$i] }}'>詳細を見る</a>
                        </td>
                    </tr>
                @endfor
                 </table>
            @else
                <p>お気に入り登録に追加したものはありません</p>
            @endif
        </div>
    </body>
</html>