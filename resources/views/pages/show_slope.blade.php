<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>{{ $ski_area->place_name }}</title>
        <link rel="stylesheet" href="/css/show_slope.css">
        <link href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" rel="stylesheet">
        
    </head>
    <body>
        <table> 
            <tr>
                <td><h1>{{ $ski_area->place_name }}</h1></td>
                <td>　</td>
                @auth
                    @if ($star_slope === null)
                        <form action="/star_list" method="POST">
                        @csrf
                        <input type="hidden" name="star[place_id]" value="{{$ski_area->id}}">
                            <td><button type="submit">お気に入り登録</button></td>
                        </form>
                    @else
                        <td><p>お気に入り登録済み</p></td>
                    @endif
                @endauth
                @guest
                    <td><p>ログインするとお気に入り登録ができます</p></td>
                @endguest
                <td>　</td>
                <form action="/ski_areas/{{ $ski_area->id }}" id="form_{{ $ski_area->id }}" class="delete" method="post">
                    @csrf
                    @method('DELETE')
                    <td><input type="button" value="削除" onclick="deleteSlope()"></td>
                </form>
                <td>　</td>
                <td><a href="/pages/login_home">ホームに戻る</a></td>
            </tr>
        </table>
        <hr>
        
        <div class=container>
            <table> 
                <tr>
                    <td><h2 class="information_header">情報一覧</h2></td>
                    <td>　</td>
                    <td><a href='/ski_areas/{{ $ski_area->id }}/edit'>編集</a></td>
                    <td>　</td>
                    <td>{{ '最終更新日時：'. $ski_area->updated_at }}</td>
                </tr>
            </table>
        
            <div id="list">
                <table>
                    <tr>
                        <td>スキー場名</td> 
                        <td class="input_list">{{ $ski_area->place_name }}</td>
                    </tr>
                    <tr>
                        <td>住所</td> 
                        <td>{{ '〒'. $ski_area->zip_code. ' '. $ski_area->prefecture. $ski_area->city. $ski_area->after_address}}</td>
                    </tr>
                    <tr>
                        <td>ホームページ</td> 
                        @if($ski_area->home_page===null)
                            <td>未記入</td>
                        @else
                            <td><a href="{{ $ski_area->home_page }}">{{ $ski_area->home_page }}</a></td>
                        @endif
                    </tr>
                    <tr>
                        <td>電話番号</td> 
                        <td>{{ $ski_area->phone_number }}</td>
                    </tr>
                    <tr>
                        <td>営業時間</td> 
                        <td>{{ $ski_area->business_hours }}</td>
                    </tr>
                    <tr>
                        <td>リフト料金</td> 
                        @if($ski_area->lift_ticket===null)
                            <td>未記入</td>
                        @else
                            <td>{{ $ski_area->lift_ticket }}</td>
                        @endif
                    </tr>
                    <tr>
                        <td>シーズン期間</td>
                        @if($ski_area->season===null)
                            <td>未記入</td>
                        @else
                            <td>{{ $ski_area->season }}</td>
                        @endif
                    </tr>
                    <tr>
                        <td>ナイター</td> 
                        @if($ski_area->evening_hours===null)
                            <td>未記入</td>
                        @else
                            <td>{{ $ski_area->evening_hours }}</td>
                        @endif
                    </tr>
                    <tr>
                        <td>スノーボードの使用</td> 
                        @if($ski_area->snowboard==0)
                            <td>使用不可</td>
                        @else
                            <td>使用可能</td>
                        @endif
                    </tr>
                    <tr>
                        <td>レッスン</td> 
                        @if($ski_area->lesson===null)
                            <td>未記入</td>
                        @else
                            <td>{{ $ski_area->lesson }}</td>
                        @endif
                    </tr>
                    <tr>
                        <td>キッズパーク</td> 
                        @if($ski_area->kids_park===null)
                            <td>未記入</td>
                        @else
                            <td>{{ $ski_area->kids_park }}</td>
                        @endif
                    </tr>
                    <tr>
                        <td>駐車場</td> 
                        @if($ski_area->parking_lot===null)
                            <td>未記入</td>
                        @else
                            <td>{{ $ski_area->parking_lot }}</td>
                        @endif
                    </tr>
                    <tr>
                        <td>レストラン</td> 
                        @if($ski_area->restaurant===null)
                            <td>未記入</td>
                        @else
                            <td>{{ $ski_area->restaurant }}</td>
                        @endif
                    </tr>
                    <tr>
                        <td>温泉</td> 
                        @if($ski_area->spa===null)
                            <td>未記入</td>
                        @else
                            <td>{{ $ski_area->spa }}</td>
                        @endif
                    </tr>
                    <tr>
                        <td>宿泊施設</td> 
                        @if($ski_area->hotel===null)
                            <td>未記入</td>
                        @else
                            <td>{{ $ski_area->hotel }}</td>
                        @endif
                    </tr>
                    <tr>
                        <td>自由記入欄</td> 
                        @if($ski_area->hotel===null)
                            <td>未記入</td>
                        @else
                            <td>{{ $ski_area->free_entry }}</td>
                        @endif
                    </tr>
                    <tr>
                        <td>作成者</td> 
                        @if($edited_user===null)
                            <td>匿名</td>
                        @elseif($edited_user['public_setting'] == "public")
                            <td><a href='/profiles/{{ $edited_user['id'] }}'>{{ $edited_user['user_name']}}</a></td>
                        @else
                            <td>{{ $edited_user['user_name']}}</td>
                        @endif
                    </tr>
                </table>
            </div>
        
            <div class=twitter>
                <div class="information_header">
                    <h2 class="h2_twitter">Twitter</h2>
                    <a class="fab fa-twitter fa-2x" href="https://twitter.com/?lang=ja"></a>
                </div>
                    @for ($i = 0; $i < count($tweets); $i++)
                      <p class=tweet>{{ $tweets[$i]['created_at'] }}</p>
                      <p class=tweet>{{'投稿者：'. $tweets[$i]['user']['name'] }}　{{'@'. $tweets[$i]['user']['username'] }}</p>
                      <p class=tweet_text>{{ $tweets[$i]['text'] }}</p>
                      <a href="{{ 'https://twitter.com/'. $tweets[$i]['user']['username']. '/status/'. $tweets[$i]['id'] }}">twitterで表示</a>
                      <p class=tweet_space></p>
                    @endfor
            </div>
        </div>
        
        <h2 class="h2_weather">天気</h2>
        <div id="openweathermap-widget-1"></div>
        <script src='//openweathermap.org/themes/openweathermap/assets/vendor/owm/js/d3.min.js'></script><script>window.myWidgetParam ? 
        window.myWidgetParam : window.myWidgetParam = [];  window.myWidgetParam.push({id: 1,cityid: {{ $place_id }},appid: '{{ $openweather_key }}',
        units: 'metric',containerid: 'openweathermap-widget-1',  });  (function() {var script = document.createElement('script');script.async = true;
        script.charset = "utf-8";script.src = "//openweathermap.org/themes/openweathermap/assets/vendor/owm/js/weather-widget-generator.js";
        var s = document.getElementsByTagName('script')[0];s.parentNode.insertBefore(script, s);  })();
        </script>
        <h2 class="h2_map">Googleマップ</h2>
        <div id="map">
	    </div>
	    <script>
    	 function initMap() {
     
            var target = document.getElementById('map'); //マップを表示する要素を指定
            var address = '{{ $ski_area->place_name }}';  //入力されたスキー場名でmap表示
            
            var geocoder = new google.maps.Geocoder();  
        
            geocoder.geocode({ address: address }, function(results, status){
                if (status === 'OK' && results[0]){
        
                    console.log(results[0].geometry.location);
        
                    var map = new google.maps.Map(target, {  
                    center: results[0].geometry.location,
                    zoom: 18 //縮尺
                    });
        
                    //ピン
                    var marker = new google.maps.Marker({
                    position: results[0].geometry.location,
                    map: map,
                    animation: google.maps.Animation.DROP
                    });
        
                }else{ 
                //住所が存在しない場合の処理
                alert('住所が正しくないか存在しません。');
                target.style.display='none';
                }
            });
        }
        </script>
	    <script src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key={{ $google }}&callback=initMap" async defer></script>
	    
	    <script>
	        function deleteSlope() {
	            if ('{{ $author_slope }}' === 'author') {
    	            if (confirm("'{{ $ski_area->place_name }}'の情報を削除しますか？\n※削除すると復元できません")) {
    	                document.getElementById('form_{{ $ski_area->id }}').submit();
    	            }
	            } else {
	                alert('作成者本人ではないため、削除することはできません');
	            }
	        }
	    </script>
    </body>
</html>
