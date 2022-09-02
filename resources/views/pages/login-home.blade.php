<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>スキー場検索</title>
        <!--<link rel="stylesheet" href="/css/style.css">-->
        <link rel="stylesheet" href="/css/home-style.css">
        
    </head>
    <body>
        <div class=header>
            <h1>My best place</h1>
            <div class=head>
                <table>
                    <tr>
                        <td><a href="/pages/registration">自己プロフィール編集</a></td>
                        <td>　</td>
                        <td><a href="/pages/login">ログアウト</a></td>
                    </tr>
                </table>
            </div>
            <hr>
        </div>
        
        
        
        <div id=search>
            <table>
                <tr>
                    <td><a href="/pages/star">お気に入り</a></td>
                    <td> </td>
                    <td><button class=Button2> 都道府県から探す</button></td>
                    <td> </td>
                    <td><input type=text placeholder="スキー場の名前で検索"></td>
                    <td> </td>
                    <td><a href="/">ログイン前の画面</a></td>
                </tr>
            </table>
        </div>
        </br>
        
        <hr>
        
        
        <div>
            <table>
                <tr>
                    <td><h2>スキー場一覧</h2></td>
                    <td>　</td>
                    <td><a href="/pages/create_slope">スキー場を追加する</a></td>
                </tr>
            </table>
            <h3>北海道</h3>
            <p>カムイスキーリンクス</p>
            <h3>福井県</h3>
            <p>スキージャム勝山</p>
            <a href="/pages/izumi">福井和泉スキー場</a>
            <!--<p>福井和泉スキー場</p>-->
        </div>
        <div class=twitter>
            <h2>Twitter</h2>
            @php
            //結果のうち最新9件を出力
            for ($i = 0; $i < 10; $i++) {
              $name = $result['includes']['users'][$i]['name'];
              $username = $result['includes']['users'][$i]['username'];
              $created_at = $result['data'][$i]['created_at'];
              $text = $result['data'][$i]['text'];
              $url = $result['includes']['users'][$i]['url'];
              echo '<p>';
              echo $created_at . '<br>';
              //echo $url . '<br>';
              echo '投稿者：' . $name . '（@' . $username . '）<br>';
              echo $text;
              echo '</p>';
            }
            @endphp
        </div>
        </br>
        <hr class=horizontal>
        <hr class=bar>
       
        <h2>お気に入りランキング</h2>
        <table>
        <tr>
        <td><p>No.1　福井和泉スキー場</p></td>
        <td><a class=star href="/pages/izumi">詳細を見る</a></td>
        </tr>
        </table>
        
        <table>
        <tr>
        <td><p>No.2　カムイスキーリンクス</p></td>
        <td><button class=star> 詳細を見る</button></td>
        </tr>
        </table>
        
        <table>
        <tr>
        <td><p>No.3　カムイスキーリンクス</p></td>
        <td><button class=star> 詳細を見る</button></td>
        </tr>
        </table>
        
    </body>
</html>