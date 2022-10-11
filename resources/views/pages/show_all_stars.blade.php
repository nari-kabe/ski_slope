<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>お気に入り一覧</title>
        <link rel="stylesheet" href="/css/show_star.css">
    </head>
    <body>
        <h1 class="star_header">お気に入り一覧</h1>
        <a href="/pages/login_home">ホームに戻る</a>
        @if ($place_id !== null)
            @for ($i = 0; $i < count($place_id); $i++)
                    <a class="ski_slope" href='/ski_areas/{{ $place_id[$i] }}'>No.{{ $i+1 }} {{ $place_name[$i] }}</a>
            @endfor
        @else
            <p>お気に入り登録に追加したものはありません</p>
        @endif
    </body>
</html>