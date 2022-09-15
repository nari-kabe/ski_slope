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
        <p>{{ $icon }}</p>
        <p>{{ $temp_max }}</p>
        <p>{{ $temp_min }}</p>
        
        <div id="openweathermap-widget-1"></div>
        <script src='//openweathermap.org/themes/openweathermap/assets/vendor/owm/js/d3.min.js'></script><script>window.myWidgetParam ? 
        window.myWidgetParam : window.myWidgetParam = [];  window.myWidgetParam.push({id: 1,cityid: {{ $place_id }},appid: '7a8d0fd25d5a115e3573385ecafc1197',
        units: 'metric',containerid: 'openweathermap-widget-1',  });  (function() {var script = document.createElement('script');script.async = true;
        script.charset = "utf-8";script.src = "//openweathermap.org/themes/openweathermap/assets/vendor/owm/js/weather-widget-generator.js";
        var s = document.getElementsByTagName('script')[0];s.parentNode.insertBefore(script, s);  })();</script>
        
    </body>
</html>


//東京　1850144
//福井 1863985