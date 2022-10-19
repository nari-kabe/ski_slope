<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>My Profile</title>
        <link rel="stylesheet" href="/css/show_profile.css">
        
    </head>
    <body>
        <h1 class="header">Profile</h1>
        <a href="/pages/login_home">ホームに戻る</a>
        <hr>
        <h2 class="sub_header">情報一覧</h2>
        <p class="inline_block">{{ '最終更新日時：'. $profile->updated_at }}</p>
        
        <div id="list">
            <table>
                <tr>
                    <td>ユーザーネーム</td> 
                    <td class="input_list">{{ $profile->user_name }}</td>
                </tr>
                <tr>
                    <td>性別</td> 
                    @if ($profile->sex===0)
                        <td>未回答</td>
                    @elseif ($profile->sex===1)
                        <td>男</td>
                    @elseif ($profile->sex===2)
                        <td>女</td>
                    @else
                        <td>その他</td>
                    @endif
                </tr>
                <tr>
                    <td>年齢</td>
                    @if($profile->age===null)
                        <td>未記入</td>
                    @else
                        <td class="input_list">{{ $profile->age }}</td>
                    @endif
                </tr>
                <tr>
                    <td>住まい</td>
                    <td class="input_list">{{ $profile->prefecture }}</td>
                </tr>
                <tr>
                    <td>職業</td> 
                    @if($profile->occupation===null)
                        <td>未記入</td>
                    @else
                        <td class="input_list">{{ $profile->occupation }}</td>
                    @endif
                </tr>
                <tr>
                    <td>スキーの経験</td> 
                    <td>{{ $profile->ski_level }}</td>
                </tr>
                <tr>
                    <td>スノーボードの経験</td> 
                    <td>{{ $profile->snowboard_level }}</td>
                </tr>
                <tr>
                    <td>その他の経験</td>
                    @if ($profile->others_level===null)
                        <td>未記入</td>
                    @else
                        <td>{{ $profile->others_level }}</td>
                    @endif
                </tr>
                <tr>
                    <td>ホームゲレンデ</td> 
                    @if($profile->home_slope===null)
                        <td>未記入</td>
                    @else
                        <td>{{ $profile->home_slope }}</td>
                    @endif
                </tr>
                <tr>
                    <td>マッチング</td> 
                    @if($profile->exchange_people===0)
                        <td>許可しない</td>
                    @else
                        <td>許可</td>
                    @endif
                </tr>
                <tr>
                    <td>SNS</td> 
                    @if($profile->sns===null)
                        <td>未記入</td>
                    @else
                        <td>{{ $profile->sns }}</td>
                    @endif
                </tr>
                <tr>
                    <td>公開設定</td> 
                    <td>{{ $profile->public_setting }}</td>
                </tr>
                <tr>
                    <td>コメント</td> 
                    @if($profile->greeting===null)
                        <td>未記入</td>
                    @else
                        <td>{{ $profile->greeting }}</td>
                    @endif
                </tr>
            </table>
        </div>
    </body>
</html>