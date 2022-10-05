<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>お気に入り一覧</title>
        <!--<link rel="stylesheet" href="/ski/public/CSS/style.css">-->
        
        
    </head>
    <body>
        <h1>お気に入り一覧</h1>
        <a href="/pages/login_home">ホームに戻る</a>
        <p>カムイスキーリンクス</p>
        <p>ルスツリゾート</p>
        <p>高鷲スノーパーク</p>
        <p>ウイングヒルズ白鳥リゾートスキー場</p>
        <p>白馬八方尾根スキー場</p>
        
        <p>{{ $star->place_id }}</p>
        <a href='/ski_areas/{{ $star->place_id }}'>お気に入り</a>
        @if ($star_rank !==null)
            <a href='/ski_areas/{{ $star_rank->id }}'>{{ $star_rank->place_name }}</a>
        @endif
    </body>
</html>