<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>スキー場検索</title>
        <!--<link rel="stylesheet" href="/ski/public/CSS/style.css">-->
        <link rel="stylesheet" href="/ski/public/css/style.css">
        
    </head>
    <body>
        <table>
        <tr>
        <td><h1 class=hoge>My best place</h1></td>
        <td><a href="/pages/registration">自己プロフィール編集</a></td>
        <td><a href="/pages/login">ログアウト</a></td>
        </tr>
        </table>
        <hr>
        
        <table>
        <tr>
        <td><a href="/pages/star">お気に入り</a></td>
        <td><button class=Button2> 都道府県から探す</button></td>
        <td><input type=text placeholder="スキー場の名前で検索"></td>
        </tr>
        </table>
        <hr>
        
        <div>
            <h2>スキー場一覧</h2>
            <h3>北海道</h3>
            <p>カムイスキーリンクス</p>
            <h3>福井県</h3>
            <p>スキージャム勝山</p>
            <p>福井和泉スキー場</p>
        </div>
        <div style="text-align: right">
            <h2>Twitter</h2>
            <textarea  placeholder="スキー、スノーボードに関する投稿"></textarea>
        </div>
        <hr>
       
        <h2>お気に入りランキング</h2>
        <table>
        <tr>
        <td><p>No.1　カムイスキーリンクス</p></td>
        <td><p>　　　　　　　　</p></p></td>
        <td><button class=starButton> 詳細を見る</button></td>
        </tr>
        </table>
        
        <table>
        <tr>
        <td><p>No.2　カムイスキーリンクス</p></td>
        <td><p>　　　　　　　　</p></p></td>
        <td><button class=starButton> 詳細を見る</button></td>
        </tr>
        </table>
        
        <table>
        <tr>
        <td><p>No.3　カムイスキーリンクス</p></td>
        <td><p>　　　　　　　　</p></p></td>
        <td><button class=starButton> 詳細を見る</button></td>
        </tr>
        </table>
        
    </body>
</html>