<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>My Profile</title>
        <link rel="stylesheet" href="/css/show.css">
        
    </head>
    <body>
        <table> 
            <tr>
                <td><h1>My Profile</h1></td>
                <td>　</td>
                <td><a href="/pages/login_home">ホームに戻る</a></td>
            </tr>
        </table>
        <hr>
        
        <table> 
            <tr>
                <td><h2>情報一覧</h2></td>
                <td>　</td>
                <td><a href='/profile/{{ $profile->id }}/edit'>編集</a></td>
                <td>　</td>
                <td>{{ '最終更新日時：'. $profile->updated_at }}</td>
            </tr>
        </table>
        
        <div id="list">
            <table>
               
                <tr>
                    <td>ユーザーネーム</td> 
                    <td class="input_list">{{ $profile->user_name }}</td>
                </tr>
                <tr>
                    <td>性別</td> 
                    <td class="input_list">{{ $profile->sex }}</td>
                </tr>
                <tr>
                    <td>年齢</td> 
                    <td class="input_list">{{ $profile->age }}</td>
                </tr>
                <tr>
                    <td>職業</td> 
                    <td>{{ $profile->occupation }}</td>
                </tr>
                <tr>
                    <td>種目</td> 
                    <td>{{ $profile->activity }}</td>
                </tr>
                <tr>
                    <td>経験年数</td> 
                    <td>{{ $profile->experience }}</td>
                </tr>
                <tr>
                    <td>レベル</td> 
                    <td>{{ $profile->level }}</td>
                </tr>
                <tr>
                    <td>ホームゲレンデ</td> 
                    @if($profile->parking_lot===null)
                        <td>無し</td>
                    @else
                        <td>{{ $profile->home_slope }}</td>
                    @endif
                </tr>
                <tr>
                    <td>公開設定</td> 
                    @if($profile->parking_lot===null)
                        <td>無し</td>
                    @else
                        <td>{{ $profile->lesson }}</td>
                    @endif
                </tr>
                <tr>
                    <td>コメント</td> 
                    @if($profile->parking_lot===null)
                        <td>無し</td>
                    @else
                        <td>{{ $profile->kids_park }}</td>
                    @endif
                </tr>
            </table>
        </div>
    </body>
</html>