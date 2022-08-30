<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>スキー場検索</title>
        <link rel="stylesheet" href="/css/create_slope.css">
        
    </head>
    <body>
        <form action="pages/login-home" method="POST">
        @csrf
        <table> 
            <tr>
                <td><input class=header placeholder="スキー場名を入力"></td>
                <td>　</td>
                 <td>　</td>
                <td><a href="/">ホームに戻る</a></td>
            </tr>
        </table>
        <hr>
        
        <h2>情報一覧</h2>
        <div id="list">
            <table>
               
                <tr>
                    <td>スキー場名</td>  <td id=InputData><input placeholder="スキー場名を入力"></td>
                </tr>
                <tr>
                    <td>ホームページ</td>  <td><textarea placeholder="ホームページURLを入力"></textarea></td>
                </tr>
                <tr>
                    <td>電話番号</td>  <td><input placeholder="電話番号を入力"></td>
                </tr>
                <tr>
                    <td>営業時間</td>  <td><input placeholder="営業時間を入力"></td>
                </tr>
                <tr>
                    <td>ナイター</td>  <td><input placeholder="ナイターの有無を入力"></td>
                </tr>
                <tr>
                    <td>シーズン期間</td>  <td><input placeholder="シーズン期間を入力"></td>
                </tr>
                <tr>
                    <td>レッスン</td>  <td><textarea placeholder="レッスンの有無を入力"></textarea></td>
                </tr>
                <tr>
                    <td>レストラン</td>  <td><textarea placeholder="レストランの有無を入力"></textarea></td>
                </tr>
                <tr>
                    <td>温泉</td>  <td><textarea placeholder="温泉の有無を入力"></textarea></td>
                </tr>
                <tr>
                    <td>宿泊施設</td>  <td><textarea placeholder="宿泊施設を入力"></textarea></td>
                </tr>
                <tr>
                    <td>ゲレンデマップ</td>  <td><input placeholder="ゲレンデマップを入力"></td>
                </tr>
                
            </table>
        </div>
        
        <hr>
        <h2>ゲレンデマップ</h2>
        <hr>
        <h2>天気</h2>
        <hr>
        <h2>Googleマップ</h2>
        
        <input class=form type="submit" value="送信"/></br>
        </form>
        
    </body>
</html>