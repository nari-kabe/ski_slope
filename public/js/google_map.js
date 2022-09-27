// // googleMapsAPIを持ってくるときに,callback=initMapと記述しているため、initMap関数を作成
// function initMap() {
//     // welcome.blade.phpで描画領域を設定するときに、id=mapとしたため、その領域を取得し、mapに格納します。
//     map = document.getElementById("map");
//     // 東京タワーの緯度は35.6585769,経度は139.7454506と事前に調べておいた
//     let tokyoTower = {lat: 35.6585769, lng: 139.7454506};
//     // オプションを設定
//     opt = {
//         zoom: 13, //地図の縮尺を指定
//         center: tokyoTower, //センターを東京タワーに指定
//     };
//     // 地図のインスタンスを作成します。第一引数にはマップを描画する領域、第二引数にはオプションを指定
//     mapObj = new google.maps.Map(map, opt);
    
//     // 追加
//     marker = new google.maps.Marker({
//         // ピンを差す位置を決めます。
//         position: tokyoTower,
// 	// ピンを差すマップを決めます。
//         map: mapObj,
// 	// ホバーしたときに「tokyotower」と表示されるようにします。
//         title: 'tokyotower',
//     });
// }

function initMap() {
 
  var target = document.getElementById('map'); //マップを表示する要素を指定
  var address = '東京都新宿区西新宿2-8-1'; //住所を指定
  var geocoder = new google.maps.Geocoder();  

  geocoder.geocode({ address: address }, function(results, status){
    if (status === 'OK' && results[0]){

      console.log(results[0].geometry.location);

       var map = new google.maps.Map(target, {  
         center: results[0].geometry.location,
         zoom: 18
       });

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