<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>スキー場検索</title>
        <!--<link rel="stylesheet" href="/ski/public/CSS/style.css">-->
        
        
    </head>
    <body>
        <h1>ログイン</h1>
        <form action="pages/login-home" method="POST">
        @csrf
        <table>
        <tr>
        <td><p>ユーザー名</p></td>
        <td><input type=text placeholder="ユーザー名を入力"></td>
        </tr>
        </table>
        
        <table>
        <tr>
        <td><p>パスワード</p></td>
        <td><input type=text placeholder="パスワードを入力"></td>
        </tr>
        </table>
        
        <input type="submit" value="送信" /></br>
        </form>
        
        <table>
        <tr>
        <td><p>アカウントをお持ちでないですか？</p></td>
        <td><a href="/pages/registration">新規作成</a></td>
        </tr>
        </table>
    </body>
</html>