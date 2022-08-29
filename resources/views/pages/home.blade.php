<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>スキー場検索</title>
        <!--<link rel="stylesheet" href="/css/style.css">-->
        <link rel="stylesheet" href="/css/style.css">
        
    </head>
    <body>
        <table>
            <tr>
            <td><h1>My best place</h1></td>
            <td><a href="/pages/registration">新規登録</a></td>
            <td><a href="/pages/login">ログイン</a></td>
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
            <a href="/pages/izumi">福井和泉スキー場</a>
            <!--<p>福井和泉スキー場</p>-->
        </div>
        <div class=twitter>
            <h2>Twitter</h2>
            <textarea placeholder="スキー、スノーボードに関する投稿"></textarea>
        </div>
        </br>
        <hr class=horizontal>
        <hr class=bar>
       
        <h2>お気に入りランキング</h2>
        <table>
        <tr>
        <td><p>No.1　福井和泉スキー場</p></td>
        <td><a class=star href="/pages/izumi">詳細を見る</a></td>
        </tr>
        </table>
        
        <table>
        <tr>
        <td><p>No.2　カムイスキーリンクス</p></td>
        <td><button class=star> 詳細を見る</button></td>
        </tr>
        </table>
        
        <table>
        <tr>
        <td><p>No.3　カムイスキーリンクス</p></td>
        <td><button class=star> 詳細を見る</button></td>
        </tr>
        </table>
        
    </body>
</html>