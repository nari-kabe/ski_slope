<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>スキー場検索</title>
        <!--<link rel="stylesheet" href="/ski/public/CSS/style.css">-->

        
    </head>
    <body>
        <h1 class=hoge>新規登録（アカウント作成）</h1>
        <form action="/" method="POST">
        @csrf
      　<h2>基本情報</h2>
        <table>
        <tr>
        <td><p>ユーザー名：</p></td>
        <td><input type=text></td>
        </tr>
        </table>
        
        <table>
        <tr>
        <td><p>Eメール：</p></td>
        <td><input type=text></td>
        </tr>
        </table>
        
        <table>
        <tr>
        <td><p>パスワード：</p></td>
        <td><input type=text></td>
        </tr>
        </table>
        
        <h2>詳細情報</h2>
        <table>
        <tr>
        <td><p>性別：</p></td>
        <td><input type=text></td>
        </tr>
        </table>
        
        <table>
        <tr>
        <td><p>年齢：</p></td>
        <td><input type=text></td>
        </tr>
        </table>
        
        <table>
        <tr>
        <td><p>職業：</p></td>
        <td><input type=text></td>
        </tr>
        </table>
        
        <table>
        <tr>
        <td><p>種目：</p></td>
        <td><input type=text></td>
        </tr>
        </table>
        
        <table>
        <tr>
        <td><p>経験年数：</p></td>
        <td><input type=text></td>
        </tr>
        </table>
        
        <table>
        <tr>
        <td><p>レベル：</p></td>
        <td><input type=text></td>
        </tr>
        </table>
        
        <table>
        <tr>
        <td><p>ホームゲレンデ：</p></td>
        <td><input type=text></td>
        </tr>
        </table>
        
        <table>
        <tr>
        <td><p>公開設定：</p></td>
        <td><input type=text></td>
        </tr>
        </table>
        </br>
        
        
        <input type="submit" value="送信"/>
        </form>
        </br>
        <a href="/">戻る</a>
    </body>
</html>