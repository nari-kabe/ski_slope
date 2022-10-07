<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>お気に入り一覧</title>
        <link rel="stylesheet" href="/css/show_star.css">
    </head>
    <body>
        <h1 class="header">追加したお気に入りスキー場</h1>
        <a class="header_space" href="/pages/login_home">ホームに戻る</a>
        <a class="header_space" href="/pages/show_all_stars">お気に入り一覧を見る</a>
        <a class="ski_slope" href='/ski_areas/{{ $star->place_id }}'>{{ $star_rank->place_name }}</a>
    </body>
</html>