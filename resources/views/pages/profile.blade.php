<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>自己プロフィール登録</title>
        <link rel="stylesheet" href="/css/profile.css">
        <!--<link rel="stylesheet" href="/css/create_slope.css">-->
        <script src="{{ asset('/js/create_slope.js') }}"></script>
        
    </head>
    <body>
        <h1 class=header>CREATE YOUR PROFILE!</h1>
        <a href="/pages/login_home">ホームに戻る</a>
        <hr>
        
        <form action="/profile_list" method="POST">
        @csrf
      　<!--<h2>基本情報</h2>-->
       <!-- <table>-->
       <!-- <tr>-->
       <!-- <td><p>ユーザー名：</p></td>-->
       <!-- <td><input type=text></td>-->
       <!-- </tr>-->
       <!-- </table>-->
        
       <!-- <table>-->
       <!-- <tr>-->
       <!-- <td><p>Eメール：</p></td>-->
       <!-- <td><input type=text></td>-->
       <!-- </tr>-->
       <!-- </table>-->
        
       <!-- <table>-->
       <!-- <tr>-->
       <!-- <td><p>パスワード：</p></td>-->
       <!-- <td><input type=text></td>-->
       <!-- </tr>-->
       <!-- </table>-->
        
        <h2 class=inline>自己プロフィール</h2>
        <p class=inline id=inline_width><span>*</span>は必須です</p>
        <p class=attention>※複数のアクティビティをしている場合はコメント欄に書いてください</p>
        
        <div id="list">
            <table>
                <tr>
                    <td><span>*</span>ユーザーネーム</td>
                    <td>
                        <input class="input_list" type=text name="profiles[user_name]" value="{{ old('profiles.user_name') }}">
                        <p class=error>{{ $errors->first('profiles.user_name') }}</p>
                    </td>
                </tr>
                <tr>
                    <td><span>*</span>性別</td>
                    <td>
                        <input type="radio" checked id="sex0" name="radio_button1"><label for="sex0">回答しない</label>
                        <input type="radio" id="sex1" name="radio_button1"><label for="sex1">男</label>
                        <input type="radio" id="sex2" name="radio_button1"><label for="sex2">女</label>
                        <input type="radio" id="sex9" name="radio_button1"><label for="sex9">その他</label></br>
                    </td>
                </tr>
                <tr>
                    <td>年齢</td>
                    <td>
                        <input class="input_list" type=text name="profiles[age]" value="{{ old('profiles.age') }}">　歳
                        <p class=error>{{ $errors->first('profiles.age') }}</p>
                    </td>
                </tr>
                <tr>
                    <td>職業</td>
                    <td>
                        <input class="input_list" type=text name="profiles[occupation]" value="{{ old('profiles.occupation') }}">
                        <p class=error>{{ $errors->first('profiles.occupation') }}</p>
                    </td>
                </tr>
                <tr>
                    <td><span>*</span>種目</td>
                    <td>
                        <input type="checkbox" checked id="available1"  class="check1" name="check_box1"><label for="available1">スキー</label>
                        <input type="checkbox" checked id="available2" class="check2" name="check_box1"><label for="available2">スノーボード</label>
                        <input type="checkbox" id="available3" class="check3" name="check_box1" onclick="textarea_display(0)"><label for="available3">その他</label>
                        <textarea id=0 class="others" style="display: none" name="profiles[activity]" placeholder="その他を選択の場合はここに入力してください">{{ old('profiles.activity') }}</textarea>
                        <p class=error>{{ $errors->first('profiles.activity') }}</p>    
                    </td>
                </tr>
                <tr>
                    <td>経験年数</td>
                    <td>
                        <input class="input_list" type=text name="profiles[experience]" value="{{ old('profiles.experience') }}">　年
                        <p class=error>{{ $errors->first('profiles.experience') }}</p>
                    </td>
                </tr>
                <tr>
                    <td><span>*</span>レベル</td>
                    <td>
                        <input type="radio" checked id="level1" class="radio1" name="radio_button4" onclick="textarea_off(1)"><label for="level1">初級者</label>
                        <input type="radio" id="level2" class="radio2" name="radio_button4" onclick="textarea_off(1)"><label for="level2">中級者</label>
                        <input type="radio" id="level3" class="radio3" name="radio_button4" onclick="textarea_off(1)"><label for="level3">上級者</label>
                        <input type="radio" id="level4" class="radio4" name="radio_button4" onclick="textarea_on(1)"><label for="level4">その他</label></br>
                        <textarea id=1 class="others" style="display: none" name="profiles[level]" placeholder="">{{ old('profiles.level') }}</textarea>
                        <p class=error>{{ $errors->first('profiles.level') }}</p>
                    </td>
                </tr>
                <tr>
                    <td>ホームゲレンデ</td>
                    <td>
                        <input class="input_list" type=text placeholder="札幌国際スキー場" name=profiles[home_slope] value="{{ old('profiles.home_slope') }}">
                        <p class=error>{{ $errors->first('profiles.home_slope') }}</p>
                    </td>
                </tr>
                <tr>
                    <td><span>*</span>公開設定</td>
                    <td>
                        <input type="radio" id="private" class="radio1" name="public_setting"><label for="private">private</label>
                        <input type="radio" checked id="public" class="radio2" name="public_setting"><label for="public">public</label>
                        <!--<p class=error>{{ $errors->first('ski_area.spa') }}</p>-->
                        <p>※publicを選択すると他のユーザーが自分のプロフィール内容を見れるようになります</p>
                    </td>
                </tr>
                <tr>
                    <td>コメント</td>
                    <td>
                        <textarea class= name="profiles[greeting]" placeholder="補足等、自由にお使いください">{{ old('profiles.greeting') }}</textarea>
                        <p class=error>{{ $errors->first('ski_area.greeting') }}</p>
                    </td>
                </tr>
            </table>
        </div>
        
        <input class=form type="submit" value="送信"/>
        </form>
        </br>
        <a href="/">戻る</a>
    </body>
</html>