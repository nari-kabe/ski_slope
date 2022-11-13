<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>welcom</title>
        <link rel="stylesheet" href="/css/home-style.css">
        
    </head>
    <body>
        <h1>Welcome!</h1>
        <a href="/login" class="login_yes">ログインする</a>
        <a href="/pages/login_home" class="login_no">ログインしない</a>
        <p class="attention">※ログインしない場合は一部の機能が制限されます</p>  
    </body>
</html>