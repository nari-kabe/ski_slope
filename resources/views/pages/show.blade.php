<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>{{ $ski_area->place_name }}</title>
        <link rel="stylesheet" href="/css/show.css">
        
    </head>
    <body>
        <table> 
            <tr>
                <td><h1>{{ $ski_area->place_name }}</h1></td>
                <td>　</td>
                <td><button>お気に入り登録</button></td>
                 <td>　</td>
                <td><a href="/pages/login_home">ホームに戻る</a></td>
            </tr>
        </table>
        <hr>
        
        <table> 
            <tr>
                <td><h2>情報一覧</h2></td>
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
                <!--<tr>-->
                <!--    <td>住所（都道府県名）</td> <td>{{ $ski_area->prefecture }}</td>-->
                <!--</tr>-->
                <!--<tr>-->
                <!--    <td>住所（市町村名）</td> <td>{{ $ski_area->municipalities }}</td>-->
                <!--</tr>-->
                <!--<tr>-->
                <!--    <td>住所（番地以降）</td> <td>{{ $ski_area->after_address }}</td>-->
                <!--</tr>-->
                <tr>
                    <td>ホームページ</td> 
                    <td><a href="{{ $ski_area->home_page }}">{{ $ski_area->home_page }}</a></td>
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
                    <td>{{ $ski_area->lift_ticket }}</td>
                </tr>
                <tr>
                    <td>シーズン期間</td> 
                    <td>{{ $ski_area->season }}</td>
                </tr>
                <tr>
                    <td>ナイター</td> 
                    @if($ski_area->parking_lot===null)
                        <td>無し</td>
                    @else
                        <td>{{ $ski_area->evening_hours }}</td>
                    @endif
                </tr>
                <tr>
                    <td>レッスン</td> 
                    @if($ski_area->parking_lot===null)
                        <td>無し</td>
                    @else
                        <td>{{ $ski_area->lesson }}</td>
                    @endif
                </tr>
                <tr>
                    <td>キッズパーク</td> 
                    @if($ski_area->parking_lot===null)
                        <td>無し</td>
                    @else
                        <td>{{ $ski_area->kids_park }}</td>
                    @endif
                </tr>
                
                //ここどうする？
                <tr>
                    <td>使用可能アクティビティ</td> 
                    <td>{{ $ski_area->activity }}</td>
                </tr>
                
                <tr>
                    <td>駐車場</td> 
                    @if($ski_area->parking_lot===null)
                        <td>無し</td>
                    @else
                        <td>{{ $ski_area->parking_lot }}</td>
                    @endif
                </tr>
                <tr>
                    <td>レストラン</td> 
                    @if($ski_area->parking_lot===null)
                        <td>無し</td>
                    @else
                        <td>{{ $ski_area->restaurant }}</td>
                    @endif
                </tr>
                <tr>
                    <td>温泉</td> 
                    @if($ski_area->parking_lot===null)
                        <td>無し</td>
                    @else
                        <td>{{ $ski_area->spa }}</td>
                    @endif
                </tr>
                <tr>
                    <td>宿泊施設</td> 
                    @if($ski_area->parking_lot===null)
                        <td>無し</td>
                    @else
                        <td>{{ $ski_area->hotel }}</td>
                    @endif
                </tr>
                
            </table>
        </div>
        
        <hr>
        <h2>ゲレンデマップ</h2>
        <hr>
        <h2>天気</h2>
        <hr>
        <h2>Googleマップ</h2>
        
    </body>
</html>