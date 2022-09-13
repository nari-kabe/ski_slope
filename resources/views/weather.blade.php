<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>天気</title>
        <link rel="stylesheet" href="/css/sample.css">
    </head>
    <body>
        <h1>天気</h1>
        <p>{{ $weather }}</p>
        
    </body>
</html>