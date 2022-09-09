/*
 *このファイルはいらない
 *
 */

<!DOCTYPE HTML>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
         <meta charset="utf-8">
        <title>{{ $ski_area->place_name }}</title>    
    </head>
    <body>
        <h1 class="title">
            {{ $ski_area->place_name }}
        </h1>
        <div class="content">
            <div class="content__post">
                <h3>情報一覧</h3>
                <p>{{ '電話番号：'. $ski_area->phone_number }}</p>  
                <p>{{ $ski_area->updated_at }}</p>
            </div>
        </div>
        <div class="footer">
            <!--<a href="/pages/login-home">戻る</a>-->
            <a href="/pages/login_home">戻る</a>
        </div>
    </body>
</html>