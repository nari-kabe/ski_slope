<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>スキー場検索</title>
        <!--<link rel="stylesheet" href="/ski/public/CSS/style.css">-->
        
        
    </head>
    <body>
        <h3>とりあえず一覧</h3>
        <div class='ski_areas'>
            @foreach ($ski_areas as $ski_area)
                <div class='ski_area'>
                    <p class='slope'>{{ $ski_area->place_name }}</p>
                </div>
            @endforeach
            
            <h2 class='title'>
                <a href="/ski_areas/{{ $ski_area->id }}">{{ $ski_area->title }}</a>
            </h2>
            
        </div>
    </body>
</html>