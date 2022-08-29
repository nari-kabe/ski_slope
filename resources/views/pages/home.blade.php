<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>スキー場検索</title>
        <link rel="stylesheet" href="/ski/CSS/style.css">
    </head>
    <body>
        <table>
        <tr>
        <td><h1 class=asd>My best place</h1></td>
        <td><button class=registrationButton> 新規登録</button></td>
        <td><button class=registrationButton>ログイン</button></td>
        </tr>
        </table>
        <hr>
        
        <table>
        <tr>
        <td><button class=Button2> お気に入り</button></td>
        <td><button class=Button2> 都道府県から探す</button></td>
        <td><input type=text placeholder="スキー場の名前で検索"></td>
        </tr>
        </table>
        <hr>
        
        
        <div>
            <h2>スキー場一覧</h2>
            <h3>北海道</h3>
            <p>カムイスキーリンクス</p>
            <h3>福井県</h3>
            <p>スキージャム勝山</p>
            <p>福井和泉スキー場</p>
        </div>
        <div style="text-align: right">
            <h2>Twitter</h2>
            <textarea  placeholder="スキー、スノーボードに関する投稿"></textarea>
        </div>
        <hr>
       
        <h2>お気に入りランキング</h2>
        <table>
        <tr>
        <td><p>No.1　カムイスキーリンクス</p></td>
        <td><p>　　　　　　　　</p></p></td>
        <td><button class=starButton> 詳細を見る</button></td>
        </tr>
        </table>
        
        <table>
        <tr>
        <td><p>No.2　カムイスキーリンクス</p></td>
        <td><p>　　　　　　　　</p></p></td>
        <td><button class=starButton> 詳細を見る</button></td>
        </tr>
        </table>
        
        <table>
        <tr>
        <td><p>No.3　カムイスキーリンクス</p></td>
        <td><p>　　　　　　　　</p></p></td>
        <td><button class=starButton> 詳細を見る</button></td>
        </tr>
        </table>
        
        <div class='posts'>
            
            <!--@foreach ($pages as $p)-->
            <!--    <div class='post'>-->
            <!--        <h2 class='title'>{{ $p->title }}</h2>-->
            <!--        <p class='body'>{{ $p->body }}</p>-->
            <!--    </div>-->
            <!--@endforeach-->
        </div>
    </body>
</html>