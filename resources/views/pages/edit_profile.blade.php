<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>自己プロフィール編集</title>
        <link rel="stylesheet" href="/css/profile.css">
        
    </head>
    <body>
        <h1 class=header>EDIT YOUR PROFILE!</h1>
        <a href="/pages/my_information">編集をやめる</a>
        <hr>
        
        <form action="/profiles/{{ $profile->id }}" method="POST">
        @csrf
        @method('PUT')
        
        <h2 class=inline>自己プロフィール編集</h2>
        <p class=inline id=inline_width><span>*</span>は必須です</p>
        <p class=attention>※スキー・スノーボード以外のアクティビティをしている場合はコメント欄に書いてください</p>
        
        <div id="list">
            <table>
                <tr>
                    <td><span>*</span>ユーザーネーム</td>
                    <td>
                        <input class="input_list" type=text name="profile[user_name]" value="{{ old('profile.user_name', $profile->user_name) }}">
                        <p class=error>{{ $errors->first('profile.user_name') }}</p>
                    </td>
                </tr>
                <tr>
                    <td><span>*</span>性別</td>
                    @if ($profile->sex === 0)
                        @if((old("profile.sex") == "1"))
                            <td>
                                <input type="radio" id="sex0" class="radio1" name="profile[sex]" value="0" {{ old("profile[sex]") == "0" ? "checked" : "" }}><label for="sex0">回答しない</label>
                                <input type="radio" id="sex1" class="radio2" name="profile[sex]" value="1" {{ old("profile[sex]", 1) == "1" ? "checked" : "" }}><label for="sex1">男</label>
                                <input type="radio" id="sex2" class="radio3" name="profile[sex]" value="2" {{ old("profile[sex]") == "2" ? "checked" : "" }}><label for="sex2">女</label>
                                <input type="radio" id="sex9" class="radio4" name="profile[sex]" value="9" {{ old("profile[sex]") == "9" ? "checked" : "" }}><label for="sex9">その他</label>
                                <p class=error>{{ $errors->first('profile.sex') }}</p>
                            </td>
                        @elseif((old("profile.sex") == "2"))
                            <td>
                                <input type="radio" id="sex0" class="radio1" name="profile[sex]" value="0" {{ old("profile[sex]") == "0" ? "checked" : "" }}><label for="sex0">回答しない</label>
                                <input type="radio" id="sex1" class="radio2" name="profile[sex]" value="1" {{ old("profile[sex]") == "1" ? "checked" : "" }}><label for="sex1">男</label>
                                <input type="radio" id="sex2" class="radio3" name="profile[sex]" value="2" {{ old("profile[sex]",2) == "2" ? "checked" : "" }}><label for="sex2">女</label>
                                <input type="radio" id="sex9" class="radio4" name="profile[sex]" value="9" {{ old("profile[sex]") == "9" ? "checked" : "" }}><label for="sex9">その他</label>
                                <p class=error>{{ $errors->first('profile.sex') }}</p>
                            </td>
                        
                        @elseif ((old("profile.sex") == "9"))
                            <td>
                                <input type="radio" checked id="sex0" class="radio1" name="profile[sex]" value="0" {{ old("profile[sex]") == "0" ? "checked" : "" }}><label for="sex0">回答しない</label>
                                <input type="radio" id="sex1" class="radio2" name="profile[sex]" value="1" {{ old("profile[sex]") == "1" ? "checked" : "" }}><label for="sex1">男</label>
                                <input type="radio" id="sex2" class="radio3" name="profile[sex]" value="2" {{ old("profile[sex]") == "2" ? "checked" : "" }}><label for="sex2">女</label>
                                <input type="radio" id="sex9" class="radio4" name="profile[sex]" value="9" {{ old("profile[sex]", 9) == "9" ? "checked" : "" }}><label for="sex9">その他</label>
                                <p class=error>{{ $errors->first('profile.sex') }}</p>
                            </td>
                        @else
                            <td>
                                <input type="radio" checked id="sex0" class="radio1" name="profile[sex]" value="0" {{ old("profile[sex]", 0) == "0" ? "checked" : "" }}><label for="sex0">回答しない</label>
                                <input type="radio" id="sex1" class="radio2" name="profile[sex]" value="1" {{ old("profile[sex]") == "1" ? "checked" : "" }}><label for="sex1">男</label>
                                <input type="radio" id="sex2" class="radio3" name="profile[sex]" value="2" {{ old("profile[sex]") == "2" ? "checked" : "" }}><label for="sex2">女</label>
                                <input type="radio" id="sex9" class="radio4" name="profile[sex]" value="9" {{ old("profile[sex]") == "9" ? "checked" : "" }}><label for="sex9">その他</label>
                                <p class=error>{{ $errors->first('profile.sex') }}</p>
                            </td>
                        @endif
                    @elseif ($profile->sex === 1)
                        @if((old("profile.sex") == "0"))
                            <td>
                                <input type="radio" id="sex0" class="radio1" name="profile[sex]" value="0" {{ old("profile[sex]", 0) == 0 ? "checked" : "" }}><label for="sex0">回答しない</label>
                                <input type="radio" id="sex1" class="radio2" name="profile[sex]" value="1" {{ old("profile[sex]") == "1" ? "checked" : "" }}><label for="sex1">男</label>
                                <input type="radio" id="sex2" class="radio3" name="profile[sex]" value="2" {{ old("profile[sex]") == "2" ? "checked" : "" }}><label for="sex2">女</label>
                                <input type="radio" id="sex9" class="radio4" name="profile[sex]" value="9" {{ old("profile[sex]") == "9" ? "checked" : "" }}><label for="sex9">その他</label>
                                <p class=error>{{ $errors->first('profile.sex') }}</p>
                            </td>
                        @elseif((old("profile.sex") == "2"))
                            <td>
                                <input type="radio" id="sex0" class="radio1" name="profile[sex]" value="0" {{ old("profile[sex]") == "0" ? "checked" : "" }}><label for="sex0">回答しない</label>
                                <input type="radio" id="sex1" class="radio2" name="profile[sex]" value="1" {{ old("profile[sex]") == "1" ? "checked" : "" }}><label for="sex1">男</label>
                                <input type="radio" id="sex2" class="radio3" name="profile[sex]" value="2" {{ old("profile[sex]",2) == "2" ? "checked" : "" }}><label for="sex2">女</label>
                                <input type="radio" id="sex9" class="radio4" name="profile[sex]" value="9" {{ old("profile[sex]") == "9" ? "checked" : "" }}><label for="sex9">その他</label>
                                <p class=error>{{ $errors->first('profile.sex') }}</p>
                            </td>
                        
                        @elseif ((old("profile.sex") == "9"))
                            <td>
                                <input type="radio" checked id="sex0" class="radio1" name="profile[sex]" value="0" {{ old("profile[sex]") == "0" ? "checked" : "" }}><label for="sex0">回答しない</label>
                                <input type="radio" id="sex1" class="radio2" name="profile[sex]" value="1" {{ old("profile[sex]") == "1" ? "checked" : "" }}><label for="sex1">男</label>
                                <input type="radio" id="sex2" class="radio3" name="profile[sex]" value="2" {{ old("profile[sex]") == "2" ? "checked" : "" }}><label for="sex2">女</label>
                                <input type="radio" id="sex9" class="radio4" name="profile[sex]" value="9" {{ old("profile[sex]", 9) == "9" ? "checked" : "" }}><label for="sex9">その他</label>
                                <p class=error>{{ $errors->first('profile.sex') }}</p>
                            </td>
                        @else
                            <td>
                                <input type="radio" id="sex0" class="radio1" name="profile[sex]" value="0" {{ old("profile[sex]") == "0" ? "checked" : "" }}><label for="sex0">回答しない</label>
                                <input type="radio" id="sex1" class="radio2" name="profile[sex]" value="1" {{ old("profile[sex]", 1) == "1" ? "checked" : "" }}><label for="sex1">男</label>
                                <input type="radio" id="sex2" class="radio3" name="profile[sex]" value="2" {{ old("profile[sex]") == "2" ? "checked" : "" }}><label for="sex2">女</label>
                                <input type="radio" id="sex9" class="radio4" name="profile[sex]" value="9" {{ old("profile[sex]") == "9" ? "checked" : "" }}><label for="sex9">その他</label>
                                <p class=error>{{ $errors->first('profile.sex') }}</p>
                            </td>
                        @endif
                    @elseif ($profile->sex === 2)
                        @if((old("profile.sex") === "0"))
                            <td>
                                <input type="radio" id="sex0" class="radio1" name="profile[sex]" value="0" {{ old("profile[sex]", 0) == 0 ? "checked" : "" }}><label for="sex0">回答しない</label>
                                <input type="radio" id="sex1" class="radio2" name="profile[sex]" value="1" {{ old("profile[sex]") == "1" ? "checked" : "" }}><label for="sex1">男</label>
                                <input type="radio" id="sex2" class="radio3" name="profile[sex]" value="2" {{ old("profile[sex]") == "2" ? "checked" : "" }}><label for="sex2">女</label>
                                <input type="radio" id="sex9" class="radio4" name="profile[sex]" value="9" {{ old("profile[sex]") == "9" ? "checked" : "" }}><label for="sex9">その他</label>
                                <p class=error>{{ $errors->first('profile.sex') }}</p>
                            </td>
                        @elseif((old("profile.sex") === "1"))
                            <td>
                                <input type="radio" id="sex0" class="radio1" name="profile[sex]" value="0" {{ old("profile[sex]") == "0" ? "checked" : "" }}><label for="sex0">回答しない</label>
                                <input type="radio" id="sex1" class="radio2" name="profile[sex]" value="1" {{ old("profile[sex]", 1) == "1" ? "checked" : "" }}><label for="sex1">男</label>
                                <input type="radio" id="sex2" class="radio3" name="profile[sex]" value="2" {{ old("profile[sex]") == "2" ? "checked" : "" }}><label for="sex2">女</label>
                                <input type="radio" id="sex9" class="radio4" name="profile[sex]" value="9" {{ old("profile[sex]") == "9" ? "checked" : "" }}><label for="sex9">その他</label>
                                <p class=error>{{ $errors->first('profile.sex') }}</p>
                            </td>
                        @elseif ((old("profile.sex") === "9"))
                            <td>
                                <input type="radio" checked id="sex0" class="radio1" name="profile[sex]" value="0" {{ old("profile[sex]") == "0" ? "checked" : "" }}><label for="sex0">回答しない</label>
                                <input type="radio" id="sex1" class="radio2" name="profile[sex]" value="1" {{ old("profile[sex]") == "1" ? "checked" : "" }}><label for="sex1">男</label>
                                <input type="radio" id="sex2" class="radio3" name="profile[sex]" value="2" {{ old("profile[sex]") == "2" ? "checked" : "" }}><label for="sex2">女</label>
                                <input type="radio" id="sex9" class="radio4" name="profile[sex]" value="9" {{ old("profile[sex]", 9) == "9" ? "checked" : "" }}><label for="sex9">その他</label>
                                <p class=error>{{ $errors->first('profile.sex') }}</p>
                            </td>
                        @else
                            <td>
                                <input type="radio" id="sex0" class="radio1" name="profile[sex]" value="0" {{ old("profile[sex]") == "0" ? "checked" : "" }}><label for="sex0">回答しない</label>
                                <input type="radio" id="sex1" class="radio2" name="profile[sex]" value="1" {{ old("profile[sex]") == "1" ? "checked" : "" }}><label for="sex1">男</label>
                                <input type="radio" id="sex2" class="radio3" name="profile[sex]" value="2" {{ old("profile[sex]", 2) == "2" ? "checked" : "" }}><label for="sex2">女</label>
                                <input type="radio" id="sex9" class="radio4" name="profile[sex]" value="9" {{ old("profile[sex]") == "9" ? "checked" : "" }}><label for="sex9">その他</label>
                                <p class=error>{{ $errors->first('profile.sex') }}</p>
                            </td>
                        @endif
                    @else
                        @if((old("profile.sex") === "0"))
                            <td>
                                <input type="radio" id="sex0" class="radio1" name="profile[sex]" value="0" {{ old("profile[sex]", 0) == 0 ? "checked" : "" }}><label for="sex0">回答しない</label>
                                <input type="radio" id="sex1" class="radio2" name="profile[sex]" value="1" {{ old("profile[sex]") == "1" ? "checked" : "" }}><label for="sex1">男</label>
                                <input type="radio" id="sex2" class="radio3" name="profile[sex]" value="2" {{ old("profile[sex]") == "2" ? "checked" : "" }}><label for="sex2">女</label>
                                <input type="radio" id="sex9" class="radio4" name="profile[sex]" value="9" {{ old("profile[sex]") == "9" ? "checked" : "" }}><label for="sex9">その他</label>
                                <p class=error>{{ $errors->first('profile.sex') }}</p>
                            </td>
                        @elseif((old("profile.sex") === "1"))
                            <td>
                                <input type="radio" id="sex0" class="radio1" name="profile[sex]" value="0" {{ old("profile[sex]") == "0" ? "checked" : "" }}><label for="sex0">回答しない</label>
                                <input type="radio" id="sex1" class="radio2" name="profile[sex]" value="1" {{ old("profile[sex]", 1) == "1" ? "checked" : "" }}><label for="sex1">男</label>
                                <input type="radio" id="sex2" class="radio3" name="profile[sex]" value="2" {{ old("profile[sex]") == "2" ? "checked" : "" }}><label for="sex2">女</label>
                                <input type="radio" id="sex9" class="radio4" name="profile[sex]" value="9" {{ old("profile[sex]") == "9" ? "checked" : "" }}><label for="sex9">その他</label>
                                <p class=error>{{ $errors->first('profile.sex') }}</p>
                            </td>
                        @elseif ((old("profile.sex") === "2"))
                            <td>
                                <input type="radio" id="sex0" class="radio1" name="profile[sex]" value="0" {{ old("profile[sex]") == "0" ? "checked" : "" }}><label for="sex0">回答しない</label>
                                <input type="radio" id="sex1" class="radio2" name="profile[sex]" value="1" {{ old("profile[sex]") == "1" ? "checked" : "" }}><label for="sex1">男</label>
                                <input type="radio" id="sex2" class="radio3" name="profile[sex]" value="2" {{ old("profile[sex]", 2) == "2" ? "checked" : "" }}><label for="sex2">女</label>
                                <input type="radio" id="sex9" class="radio4" name="profile[sex]" value="9" {{ old("profile[sex]") == "9" ? "checked" : "" }}><label for="sex9">その他</label>
                                <p class=error>{{ $errors->first('profile.sex') }}</p>
                            </td>
                        @else
                            <td>
                                <input type="radio" id="sex0" class="radio1" name="profile[sex]" value="0" {{ old("profile[sex]") == "0" ? "checked" : "" }}><label for="sex0">回答しない</label>
                                <input type="radio" id="sex1" class="radio2" name="profile[sex]" value="1" {{ old("profile[sex]") == "1" ? "checked" : "" }}><label for="sex1">男</label>
                                <input type="radio" id="sex2" class="radio3" name="profile[sex]" value="2" {{ old("profile[sex]") == "2" ? "checked" : "" }}><label for="sex2">女</label>
                                <input type="radio" id="sex9" class="radio4" name="profile[sex]" value="9" {{ old("profile[sex]", 9) == "9" ? "checked" : "" }}><label for="sex9">その他</label>
                                <p class=error>{{ $errors->first('profile.sex') }}</p>
                            </td>
                        @endif
                    @endif
                </tr>
                <tr>
                    <td>年齢</td>
                    <td>
                        <input class="input_list" type=text name="profile[age]" value="{{ old('profile.age', $profile->age) }}">　歳
                        <p class=error>{{ $errors->first('profile.age') }}</p>
                    </td>
                </tr>
                <tr>
                    <td><span>*</span>住まい（都道府県）</td>
                    <td>
                        <input class="input_list" type=text name="profile[prefecture]" value="{{ old('profile.prefecture', $profile->prefecture) }}">
                        <p class=error>{{ $errors->first('profile.prefecture') }}</p>
                    </td>
                </tr>
                <tr>
                    <td>職業</td>
                    <td>
                        <input class="input_list" type=text name="profile[occupation]" value="{{ old('profile.occupation', $profile->occupation) }}">
                        <p class=error>{{ $errors->first('profile.occupation') }}</p>
                    </td>
                </tr>
                <tr>
                    <td><span>*</span>スキーの経験</td>
                    @if ($profile->ski_level === "未経験")
                        @if ((old("profile.ski_level") === "初級者"))
                            <td>
                                <input type="radio" id="ski_level0" class="radio4" name="profile[ski_level]" value="未経験" {{ old("profile[ski_level]") == "未経験" ? "checked" : "" }}><label for="ski_level0">未経験</label>
                                <input type="radio" id="ski_level1" class="radio1" name="profile[ski_level]" value="初級者" {{ old("profile[ski_level]", "初級者") == "初級者" ? "checked" : "" }}><label for="ski_level1">初級者</label>
                                <input type="radio" id="ski_level2" class="radio2" name="profile[ski_level]" value="中級者" {{ old("profile[ski_level]") == "中級者" ? "checked" : "" }}><label for="ski_level2">中級者</label>
                                <input type="radio" id="ski_level3" class="radio3" name="profile[ski_level]" value="上級者" {{ old("profile[ski_level]") == "上級者" ? "checked" : "" }}><label for="ski_level3">上級者</label>
                                <p class=error>{{ $errors->first('profile.ski_level') }}</p>
                            </td>
                        @elseif ((old("profile.ski_level") === "中級者"))
                            <td>
                                <input type="radio" id="ski_level0" class="radio4" name="profile[ski_level]" value="未経験" {{ old("profile[ski_level]") == "未経験" ? "checked" : "" }}><label for="ski_level0">未経験</label>
                                <input type="radio" id="ski_level1" class="radio1" name="profile[ski_level]" value="初級者" {{ old("profile[ski_level]") == "初級者" ? "checked" : "" }}><label for="ski_level1">初級者</label>
                                <input type="radio" id="ski_level2" class="radio2" name="profile[ski_level]" value="中級者" {{ old("profile[ski_level]", "中級者") == "中級者" ? "checked" : "" }}><label for="ski_level2">中級者</label>
                                <input type="radio" id="ski_level3" class="radio3" name="profile[ski_level]" value="上級者" {{ old("profile[ski_level]") == "上級者" ? "checked" : "" }}><label for="ski_level3">上級者</label>
                                <p class=error>{{ $errors->first('profile.ski_level') }}</p>
                            </td>
                        @elseif ((old("profile.ski_level") === "上級者"))
                            <td>
                                <input type="radio" id="ski_level0" class="radio4" name="profile[ski_level]" value="未経験" {{ old("profile[ski_level]") == "未経験" ? "checked" : "" }}><label for="ski_level0">未経験</label>
                                <input type="radio" id="ski_level1" class="radio1" name="profile[ski_level]" value="初級者" {{ old("profile[ski_level]") == "初級者" ? "checked" : "" }}><label for="ski_level1">初級者</label>
                                <input type="radio" id="ski_level2" class="radio2" name="profile[ski_level]" value="中級者" {{ old("profile[ski_level]") == "中級者" ? "checked" : "" }}><label for="ski_level2">中級者</label>
                                <input type="radio" id="ski_level3" class="radio3" name="profile[ski_level]" value="上級者" {{ old("profile[ski_level]", "上級者") == "上級者" ? "checked" : "" }}><label for="ski_level3">上級者</label>
                                <p class=error>{{ $errors->first('profile.ski_level') }}</p>
                            </td>
                        @else
                            <td>
                                <input type="radio" id="ski_level0" class="radio4" name="profile[ski_level]" value="未経験" {{ old("profile[ski_level]", "未経験") == "未経験" ? "checked" : "" }}><label for="ski_level0">未経験</label>
                                <input type="radio" id="ski_level1" class="radio1" name="profile[ski_level]" value="初級者" {{ old("profile[ski_level]") == "初級者" ? "checked" : "" }}><label for="ski_level1">初級者</label>
                                <input type="radio" id="ski_level2" class="radio2" name="profile[ski_level]" value="中級者" {{ old("profile[ski_level]") == "中級者" ? "checked" : "" }}><label for="ski_level2">中級者</label>
                                <input type="radio" id="ski_level3" class="radio3" name="profile[ski_level]" value="上級者" {{ old("profile[ski_level]") == "上級者" ? "checked" : "" }}><label for="ski_level3">上級者</label>
                                <p class=error>{{ $errors->first('profile.ski_level') }}</p>
                            </td>
                        @endif
                    @elseif ($profile->ski_level === "初級者")
                        @if ((old("profile.ski_level") === "未経験"))
                            <td>
                                <input type="radio" id="ski_level0" class="radio4" name="profile[ski_level]" value="未経験" {{ old("profile[ski_level]", "未経験") == "未経験" ? "checked" : "" }}><label for="ski_level0">未経験</label>
                                <input type="radio" id="ski_level1" class="radio1" name="profile[ski_level]" value="初級者" {{ old("profile[ski_level]") == "初級者" ? "checked" : "" }}><label for="ski_level1">初級者</label>
                                <input type="radio" id="ski_level2" class="radio2" name="profile[ski_level]" value="中級者" {{ old("profile[ski_level]") == "中級者" ? "checked" : "" }}><label for="ski_level2">中級者</label>
                                <input type="radio" id="ski_level3" class="radio3" name="profile[ski_level]" value="上級者" {{ old("profile[ski_level]") == "上級者" ? "checked" : "" }}><label for="ski_level3">上級者</label>
                                <p class=error>{{ $errors->first('profile.ski_level') }}</p>
                            </td>
                        @elseif ((old("profile.ski_level") === "中級者"))
                            <td>
                                <input type="radio" id="ski_level0" class="radio4" name="profile[ski_level]" value="未経験" {{ old("profile[ski_level]") == "未経験" ? "checked" : "" }}><label for="ski_level0">未経験</label>
                                <input type="radio" id="ski_level1" class="radio1" name="profile[ski_level]" value="初級者" {{ old("profile[ski_level]") == "初級者" ? "checked" : "" }}><label for="ski_level1">初級者</label>
                                <input type="radio" id="ski_level2" class="radio2" name="profile[ski_level]" value="中級者" {{ old("profile[ski_level]", "中級者") == "中級者" ? "checked" : "" }}><label for="ski_level2">中級者</label>
                                <input type="radio" id="ski_level3" class="radio3" name="profile[ski_level]" value="上級者" {{ old("profile[ski_level]") == "上級者" ? "checked" : "" }}><label for="ski_level3">上級者</label>
                                <p class=error>{{ $errors->first('profile.ski_level') }}</p>
                            </td>
                        @elseif ((old("profile.ski_level") === "上級者"))
                            <td>
                                <input type="radio" id="ski_level0" class="radio4" name="profile[ski_level]" value="未経験" {{ old("profile[ski_level]") == "未経験" ? "checked" : "" }}><label for="ski_level0">未経験</label>
                                <input type="radio" id="ski_level1" class="radio1" name="profile[ski_level]" value="初級者" {{ old("profile[ski_level]") == "初級者" ? "checked" : "" }}><label for="ski_level1">初級者</label>
                                <input type="radio" id="ski_level2" class="radio2" name="profile[ski_level]" value="中級者" {{ old("profile[ski_level]") == "中級者" ? "checked" : "" }}><label for="ski_level2">中級者</label>
                                <input type="radio" id="ski_level3" class="radio3" name="profile[ski_level]" value="上級者" {{ old("profile[ski_level]", "上級者") == "上級者" ? "checked" : "" }}><label for="ski_level3">上級者</label>
                                <p class=error>{{ $errors->first('profile.ski_level') }}</p>
                            </td>
                        @else
                            <td>
                                <input type="radio" id="ski_level0" class="radio4" name="profile[ski_level]" value="未経験" {{ old("profile[ski_level]") == "未経験" ? "checked" : "" }}><label for="ski_level0">未経験</label>
                                <input type="radio" id="ski_level1" class="radio1" name="profile[ski_level]" value="初級者" {{ old("profile[ski_level]", "初級者") == "初級者" ? "checked" : "" }}><label for="ski_level1">初級者</label>
                                <input type="radio" id="ski_level2" class="radio2" name="profile[ski_level]" value="中級者" {{ old("profile[ski_level]") == "中級者" ? "checked" : "" }}><label for="ski_level2">中級者</label>
                                <input type="radio" id="ski_level3" class="radio3" name="profile[ski_level]" value="上級者" {{ old("profile[ski_level]") == "上級者" ? "checked" : "" }}><label for="ski_level3">上級者</label>
                                <p class=error>{{ $errors->first('profile.ski_level') }}</p>
                            </td>
                        @endif
                    @elseif ($profile->ski_level === "中級者")
                        @if ((old("profile.ski_level") === "未経験"))
                            <td>
                                <input type="radio" id="ski_level0" class="radio4" name="profile[ski_level]" value="未経験" {{ old("profile[ski_level]", "未経験") == "未経験" ? "checked" : "" }}><label for="ski_level0">未経験</label>
                                <input type="radio" id="ski_level1" class="radio1" name="profile[ski_level]" value="初級者" {{ old("profile[ski_level]") == "初級者" ? "checked" : "" }}><label for="ski_level1">初級者</label>
                                <input type="radio" id="ski_level2" class="radio2" name="profile[ski_level]" value="中級者" {{ old("profile[ski_level]") == "中級者" ? "checked" : "" }}><label for="ski_level2">中級者</label>
                                <input type="radio" id="ski_level3" class="radio3" name="profile[ski_level]" value="上級者" {{ old("profile[ski_level]") == "上級者" ? "checked" : "" }}><label for="ski_level3">上級者</label>
                                <p class=error>{{ $errors->first('profile.ski_level') }}</p>
                            </td>
                        @elseif ((old("profile.ski_level") === "初級者"))
                            <td>
                                <input type="radio" id="ski_level0" class="radio4" name="profile[ski_level]" value="未経験" {{ old("profile[ski_level]") == "未経験" ? "checked" : "" }}><label for="ski_level0">未経験</label>
                                <input type="radio" id="ski_level1" class="radio1" name="profile[ski_level]" value="初級者" {{ old("profile[ski_level]", "初級者") == "初級者" ? "checked" : "" }}><label for="ski_level1">初級者</label>
                                <input type="radio" id="ski_level2" class="radio2" name="profile[ski_level]" value="中級者" {{ old("profile[ski_level]") == "中級者" ? "checked" : "" }}><label for="ski_level2">中級者</label>
                                <input type="radio" id="ski_level3" class="radio3" name="profile[ski_level]" value="上級者" {{ old("profile[ski_level]") == "上級者" ? "checked" : "" }}><label for="ski_level3">上級者</label>
                                <p class=error>{{ $errors->first('profile.ski_level') }}</p>
                            </td>
                        @elseif ((old("profile.ski_level") === "上級者"))
                            <td>
                                <input type="radio" id="ski_level0" class="radio4" name="profile[ski_level]" value="未経験" {{ old("profile[ski_level]") == "未経験" ? "checked" : "" }}><label for="ski_level0">未経験</label>
                                <input type="radio" id="ski_level1" class="radio1" name="profile[ski_level]" value="初級者" {{ old("profile[ski_level]") == "初級者" ? "checked" : "" }}><label for="ski_level1">初級者</label>
                                <input type="radio" id="ski_level2" class="radio2" name="profile[ski_level]" value="中級者" {{ old("profile[ski_level]") == "中級者" ? "checked" : "" }}><label for="ski_level2">中級者</label>
                                <input type="radio" id="ski_level3" class="radio3" name="profile[ski_level]" value="上級者" {{ old("profile[ski_level]", "上級者") == "上級者" ? "checked" : "" }}><label for="ski_level3">上級者</label>
                                <p class=error>{{ $errors->first('profile.ski_level') }}</p>
                            </td>
                        @else
                            <td>
                                <input type="radio" id="ski_level0" class="radio4" name="profile[ski_level]" value="未経験" {{ old("profile[ski_level]") == "未経験" ? "checked" : "" }}><label for="ski_level0">未経験</label>
                                <input type="radio" id="ski_level1" class="radio1" name="profile[ski_level]" value="初級者" {{ old("profile[ski_level]") == "初級者" ? "checked" : "" }}><label for="ski_level1">初級者</label>
                                <input type="radio" id="ski_level2" class="radio2" name="profile[ski_level]" value="中級者" {{ old("profile[ski_level]", "中級者") == "中級者" ? "checked" : "" }}><label for="ski_level2">中級者</label>
                                <input type="radio" id="ski_level3" class="radio3" name="profile[ski_level]" value="上級者" {{ old("profile[ski_level]") == "上級者" ? "checked" : "" }}><label for="ski_level3">上級者</label>
                                <p class=error>{{ $errors->first('profile.ski_level') }}</p>
                            </td>
                        @endif
                    @else
                        @if ((old("profile.ski_level") === "未経験"))
                            <td>
                                <input type="radio" id="ski_level0" class="radio4" name="profile[ski_level]" value="未経験" {{ old("profile[ski_level]", "未経験") == "未経験" ? "checked" : "" }}><label for="ski_level0">未経験</label>
                                <input type="radio" id="ski_level1" class="radio1" name="profile[ski_level]" value="初級者" {{ old("profile[ski_level]") == "初級者" ? "checked" : "" }}><label for="ski_level1">初級者</label>
                                <input type="radio" id="ski_level2" class="radio2" name="profile[ski_level]" value="中級者" {{ old("profile[ski_level]") == "中級者" ? "checked" : "" }}><label for="ski_level2">中級者</label>
                                <input type="radio" id="ski_level3" class="radio3" name="profile[ski_level]" value="上級者" {{ old("profile[ski_level]") == "上級者" ? "checked" : "" }}><label for="ski_level3">上級者</label>
                                <p class=error>{{ $errors->first('profile.ski_level') }}</p>
                            </td>
                        @elseif ((old("profile.ski_level") === "初級者"))
                            <td>
                                <input type="radio" id="ski_level0" class="radio4" name="profile[ski_level]" value="未経験" {{ old("profile[ski_level]") == "未経験" ? "checked" : "" }}><label for="ski_level0">未経験</label>
                                <input type="radio" id="ski_level1" class="radio1" name="profile[ski_level]" value="初級者" {{ old("profile[ski_level]", "初級者") == "初級者" ? "checked" : "" }}><label for="ski_level1">初級者</label>
                                <input type="radio" id="ski_level2" class="radio2" name="profile[ski_level]" value="中級者" {{ old("profile[ski_level]") == "中級者" ? "checked" : "" }}><label for="ski_level2">中級者</label>
                                <input type="radio" id="ski_level3" class="radio3" name="profile[ski_level]" value="上級者" {{ old("profile[ski_level]") == "上級者" ? "checked" : "" }}><label for="ski_level3">上級者</label>
                                <p class=error>{{ $errors->first('profile.ski_level') }}</p>
                            </td>
                        @elseif ((old("profile.ski_level") === "中級者"))
                            <td>
                                <input type="radio" id="ski_level0" class="radio4" name="profile[ski_level]" value="未経験" {{ old("profile[ski_level]") == "未経験" ? "checked" : "" }}><label for="ski_level0">未経験</label>
                                <input type="radio" id="ski_level1" class="radio1" name="profile[ski_level]" value="初級者" {{ old("profile[ski_level]") == "初級者" ? "checked" : "" }}><label for="ski_level1">初級者</label>
                                <input type="radio" id="ski_level2" class="radio2" name="profile[ski_level]" value="中級者" {{ old("profile[ski_level]", "中級者") == "中級者" ? "checked" : "" }}><label for="ski_level2">中級者</label>
                                <input type="radio" id="ski_level3" class="radio3" name="profile[ski_level]" value="上級者" {{ old("profile[ski_level]") == "上級者" ? "checked" : "" }}><label for="ski_level3">上級者</label>
                                <p class=error>{{ $errors->first('profile.ski_level') }}</p>
                            </td>
                        @else
                            <td>
                                <input type="radio" id="ski_level0" class="radio4" name="profile[ski_level]" value="未経験" {{ old("profile[ski_level]") == "未経験" ? "checked" : "" }}><label for="ski_level0">未経験</label>
                                <input type="radio" id="ski_level1" class="radio1" name="profile[ski_level]" value="初級者" {{ old("profile[ski_level]") == "初級者" ? "checked" : "" }}><label for="ski_level1">初級者</label>
                                <input type="radio" id="ski_level2" class="radio2" name="profile[ski_level]" value="中級者" {{ old("profile[ski_level]") == "中級者" ? "checked" : "" }}><label for="ski_level2">中級者</label>
                                <input type="radio" id="ski_level3" class="radio3" name="profile[ski_level]" value="上級者" {{ old("profile[ski_level]", "上級者") == "上級者" ? "checked" : "" }}><label for="ski_level3">上級者</label>
                                <p class=error>{{ $errors->first('profile.ski_level') }}</p>
                            </td>
                        @endif
                    @endif
                </tr>
                <tr>
                    <td><span>*</span>スノーボードの経験</td>
                    @if ($profile->snowboard_level === "未経験")
                        @if ((old("profile.snowboard_level") === "初級者"))
                            <td>
                                <input type="radio" id="snowboard_level0" class="radio4" name="profile[snowboard_level]" value="未経験" {{ old("profile[snowboard_level]") == "未経験" ? "checked" : "" }}><label for="snowboard_level0">未経験</label>
                                <input type="radio" id="snowboard_level1" class="radio1" name="profile[snowboard_level]" value="初級者" {{ old("profile[snowboard_level]", "初級者") == "初級者" ? "checked" : "" }}><label for="snowboard_level1">初級者</label>
                                <input type="radio" id="snowboard_level2" class="radio2" name="profile[snowboard_level]" value="中級者" {{ old("profile[snowboard_level]") == "中級者" ? "checked" : "" }}><label for="snowboard_level2">中級者</label>
                                <input type="radio" id="snowboard_level3" class="radio3" name="profile[snowboard_level]" value="上級者" {{ old("profile[snowboard_level]") == "上級者" ? "checked" : "" }}><label for="snowboard_level3">上級者</label>
                                <p class=error>{{ $errors->first('profile.snowboard_level') }}</p>
                            </td>
                        @elseif ((old("profile.snowboard_level") === "中級者"))
                            <td>
                                <input type="radio" id="snowboard_level0" class="radio4" name="profile[snowboard_level]" value="未経験" {{ old("profile[snowboard_level]") == "未経験" ? "checked" : "" }}><label for="snowboard_level0">未経験</label>
                                <input type="radio" id="snowboard_level1" class="radio1" name="profile[snowboard_level]" value="初級者" {{ old("profile[snowboard_level]") == "初級者" ? "checked" : "" }}><label for="snowboard_level1">初級者</label>
                                <input type="radio" id="snowboard_level2" class="radio2" name="profile[snowboard_level]" value="中級者" {{ old("profile[snowboard_level]", "中級者") == "中級者" ? "checked" : "" }}><label for="snowboard_level2">中級者</label>
                                <input type="radio" id="snowboard_level3" class="radio3" name="profile[snowboard_level]" value="上級者" {{ old("profile[snowboard_level]") == "上級者" ? "checked" : "" }}><label for="snowboard_level3">上級者</label>
                                <p class=error>{{ $errors->first('profile.snowboard_level') }}</p>
                            </td>
                        @elseif ((old("profile.snowboard_level") === "上級者"))
                            <td>
                                <input type="radio" id="snowboard_level0" class="radio4" name="profile[snowboard_level]" value="未経験" {{ old("profile[snowboard_level]") == "未経験" ? "checked" : "" }}><label for="snowboard_level0">未経験</label>
                                <input type="radio" id="snowboard_level1" class="radio1" name="profile[snowboard_level]" value="初級者" {{ old("profile[snowboard_level]") == "初級者" ? "checked" : "" }}><label for="snowboard_level1">初級者</label>
                                <input type="radio" id="snowboard_level2" class="radio2" name="profile[snowboard_level]" value="中級者" {{ old("profile[snowboard_level]") == "中級者" ? "checked" : "" }}><label for="snowboard_level2">中級者</label>
                                <input type="radio" id="snowboard_level3" class="radio3" name="profile[snowboard_level]" value="上級者" {{ old("profile[snowboard_level]", "上級者") == "上級者" ? "checked" : "" }}><label for="snowboard_level3">上級者</label>
                                <p class=error>{{ $errors->first('profile.snowboard_level') }}</p>
                            </td>
                        @else
                            <td>
                                <input type="radio" id="snowboard_level0" class="radio4" name="profile[snowboard_level]" value="未経験" {{ old("profile[snowboard_level]", "未経験") == "未経験" ? "checked" : "" }}><label for="snowboard_level0">未経験</label>
                                <input type="radio" id="snowboard_level1" class="radio1" name="profile[snowboard_level]" value="初級者" {{ old("profile[snowboard_level]") == "初級者" ? "checked" : "" }}><label for="snowboard_level1">初級者</label>
                                <input type="radio" id="snowboard_level2" class="radio2" name="profile[snowboard_level]" value="中級者" {{ old("profile[snowboard_level]") == "中級者" ? "checked" : "" }}><label for="snowboard_level2">中級者</label>
                                <input type="radio" id="snowboard_level3" class="radio3" name="profile[snowboard_level]" value="上級者" {{ old("profile[snowboard_level]") == "上級者" ? "checked" : "" }}><label for="snowboard_level3">上級者</label>
                                <p class=error>{{ $errors->first('profile.snowboard_level') }}</p>
                            </td>
                        @endif
                    @elseif ($profile->snowboard_level === "初級者")
                        @if ((old("profile.snowboard_level") === "未経験"))
                            <td>
                                <input type="radio" id="snowboard_level0" class="radio4" name="profile[snowboard_level]" value="未経験" {{ old("profile[snowboard_level]", "未経験") == "未経験" ? "checked" : "" }}><label for="snowboard_level0">未経験</label>
                                <input type="radio" id="snowboard_level1" class="radio1" name="profile[snowboard_level]" value="初級者" {{ old("profile[snowboard_level]") == "初級者" ? "checked" : "" }}><label for="snowboard_level1">初級者</label>
                                <input type="radio" id="snowboard_level2" class="radio2" name="profile[snowboard_level]" value="中級者" {{ old("profile[snowboard_level]") == "中級者" ? "checked" : "" }}><label for="snowboard_level2">中級者</label>
                                <input type="radio" id="snowboard_level3" class="radio3" name="profile[snowboard_level]" value="上級者" {{ old("profile[snowboard_level]") == "上級者" ? "checked" : "" }}><label for="snowboard_level3">上級者</label>
                                <p class=error>{{ $errors->first('profile.snowboard_level') }}</p>
                            </td>
                        @elseif ((old("profile.snowboard_level") === "中級者"))
                            <td>
                                <input type="radio" id="snowboard_level0" class="radio4" name="profile[snowboard_level]" value="未経験" {{ old("profile[snowboard_level]") == "未経験" ? "checked" : "" }}><label for="snowboard_level0">未経験</label>
                                <input type="radio" id="snowboard_level1" class="radio1" name="profile[snowboard_level]" value="初級者" {{ old("profile[snowboard_level]") == "初級者" ? "checked" : "" }}><label for="snowboard_level1">初級者</label>
                                <input type="radio" id="snowboard_level2" class="radio2" name="profile[snowboard_level]" value="中級者" {{ old("profile[snowboard_level]", "中級者") == "中級者" ? "checked" : "" }}><label for="snowboard_level2">中級者</label>
                                <input type="radio" id="snowboard_level3" class="radio3" name="profile[snowboard_level]" value="上級者" {{ old("profile[snowboard_level]") == "上級者" ? "checked" : "" }}><label for="snowboard_level3">上級者</label>
                                <p class=error>{{ $errors->first('profile.snowboard_level') }}</p>
                            </td>
                        @elseif ((old("profile.snowboard_level") === "上級者"))
                            <td>
                                <input type="radio" id="snowboard_level0" class="radio4" name="profile[snowboard_level]" value="未経験" {{ old("profile[snowboard_level]") == "未経験" ? "checked" : "" }}><label for="snowboard_level0">未経験</label>
                                <input type="radio" id="snowboard_level1" class="radio1" name="profile[snowboard_level]" value="初級者" {{ old("profile[snowboard_level]") == "初級者" ? "checked" : "" }}><label for="snowboard_level1">初級者</label>
                                <input type="radio" id="snowboard_level2" class="radio2" name="profile[snowboard_level]" value="中級者" {{ old("profile[snowboard_level]") == "中級者" ? "checked" : "" }}><label for="snowboard_level2">中級者</label>
                                <input type="radio" id="snowboard_level3" class="radio3" name="profile[snowboard_level]" value="上級者" {{ old("profile[snowboard_level]", "上級者") == "上級者" ? "checked" : "" }}><label for="snowboard_level3">上級者</label>
                                <p class=error>{{ $errors->first('profile.snowboard_level') }}</p>
                            </td>
                        @else
                            <td>
                                <input type="radio" id="snowboard_level0" class="radio4" name="profile[snowboard_level]" value="未経験" {{ old("profile[snowboard_level]") == "未経験" ? "checked" : "" }}><label for="snowboard_level0">未経験</label>
                                <input type="radio" id="snowboard_level1" class="radio1" name="profile[snowboard_level]" value="初級者" {{ old("profile[snowboard_level]", "初級者") == "初級者" ? "checked" : "" }}><label for="snowboard_level1">初級者</label>
                                <input type="radio" id="snowboard_level2" class="radio2" name="profile[snowboard_level]" value="中級者" {{ old("profile[snowboard_level]") == "中級者" ? "checked" : "" }}><label for="snowboard_level2">中級者</label>
                                <input type="radio" id="snowboard_level3" class="radio3" name="profile[snowboard_level]" value="上級者" {{ old("profile[snowboard_level]") == "上級者" ? "checked" : "" }}><label for="snowboard_level3">上級者</label>
                                <p class=error>{{ $errors->first('profile.snowboard_level') }}</p>
                            </td>
                        @endif
                    @elseif ($profile->snowboard_level === "中級者")
                        @if ((old("profile.snowboard_level") === "未経験"))
                            <td>
                                <input type="radio" id="snowboard_level0" class="radio4" name="profile[snowboard_level]" value="未経験" {{ old("profile[snowboard_level]", "未経験") == "未経験" ? "checked" : "" }}><label for="snowboard_level0">未経験</label>
                                <input type="radio" id="snowboard_level1" class="radio1" name="profile[snowboard_level]" value="初級者" {{ old("profile[snowboard_level]") == "初級者" ? "checked" : "" }}><label for="snowboard_level1">初級者</label>
                                <input type="radio" id="snowboard_level2" class="radio2" name="profile[snowboard_level]" value="中級者" {{ old("profile[snowboard_level]") == "中級者" ? "checked" : "" }}><label for="snowboard_level2">中級者</label>
                                <input type="radio" id="snowboard_level3" class="radio3" name="profile[snowboard_level]" value="上級者" {{ old("profile[snowboard_level]") == "上級者" ? "checked" : "" }}><label for="snowboard_level3">上級者</label>
                                <p class=error>{{ $errors->first('profile.snowboard_level') }}</p>
                            </td>
                        @elseif ((old("profile.snowboard_level") === "初級者"))
                            <td>
                                <input type="radio" id="snowboard_level0" class="radio4" name="profile[snowboard_level]" value="未経験" {{ old("profile[snowboard_level]") == "未経験" ? "checked" : "" }}><label for="snowboard_level0">未経験</label>
                                <input type="radio" id="snowboard_level1" class="radio1" name="profile[snowboard_level]" value="初級者" {{ old("profile[snowboard_level]", "初級者") == "初級者" ? "checked" : "" }}><label for="snowboard_level1">初級者</label>
                                <input type="radio" id="snowboard_level2" class="radio2" name="profile[snowboard_level]" value="中級者" {{ old("profile[snowboard_level]") == "中級者" ? "checked" : "" }}><label for="snowboard_level2">中級者</label>
                                <input type="radio" id="snowboard_level3" class="radio3" name="profile[snowboard_level]" value="上級者" {{ old("profile[snowboard_level]") == "上級者" ? "checked" : "" }}><label for="snowboard_level3">上級者</label>
                                <p class=error>{{ $errors->first('profile.snowboard_level') }}</p>
                            </td>
                        @elseif ((old("profile.snowboard_level") === "上級者"))
                            <td>
                                <input type="radio" id="snowboard_level0" class="radio4" name="profile[snowboard_level]" value="未経験" {{ old("profile[snowboard_level]") == "未経験" ? "checked" : "" }}><label for="snowboard_level0">未経験</label>
                                <input type="radio" id="snowboard_level1" class="radio1" name="profile[snowboard_level]" value="初級者" {{ old("profile[snowboard_level]") == "初級者" ? "checked" : "" }}><label for="snowboard_level1">初級者</label>
                                <input type="radio" id="snowboard_level2" class="radio2" name="profile[snowboard_level]" value="中級者" {{ old("profile[snowboard_level]") == "中級者" ? "checked" : "" }}><label for="snowboard_level2">中級者</label>
                                <input type="radio" id="snowboard_level3" class="radio3" name="profile[snowboard_level]" value="上級者" {{ old("profile[snowboard_level]", "上級者") == "上級者" ? "checked" : "" }}><label for="snowboard_level3">上級者</label>
                                <p class=error>{{ $errors->first('profile.snowboard_level') }}</p>
                            </td>
                        @else
                            <td>
                                <input type="radio" id="snowboard_level0" class="radio4" name="profile[snowboard_level]" value="未経験" {{ old("profile[snowboard_level]") == "未経験" ? "checked" : "" }}><label for="snowboard_level0">未経験</label>
                                <input type="radio" id="snowboard_level1" class="radio1" name="profile[snowboard_level]" value="初級者" {{ old("profile[snowboard_level]") == "初級者" ? "checked" : "" }}><label for="snowboard_level1">初級者</label>
                                <input type="radio" id="snowboard_level2" class="radio2" name="profile[snowboard_level]" value="中級者" {{ old("profile[snowboard_level]", "中級者") == "中級者" ? "checked" : "" }}><label for="snowboard_level2">中級者</label>
                                <input type="radio" id="snowboard_level3" class="radio3" name="profile[snowboard_level]" value="上級者" {{ old("profile[snowboard_level]") == "上級者" ? "checked" : "" }}><label for="snowboard_level3">上級者</label>
                                <p class=error>{{ $errors->first('profile.snowboard_level') }}</p>
                            </td>
                        @endif
                    @else
                        @if ((old("profile.snowboard_level") === "未経験"))
                            <td>
                                <input type="radio" id="snowboard_level0" class="radio4" name="profile[snowboard_level]" value="未経験" {{ old("profile[snowboard_level]", "未経験") == "未経験" ? "checked" : "" }}><label for="snowboard_level0">未経験</label>
                                <input type="radio" id="snowboard_level1" class="radio1" name="profile[snowboard_level]" value="初級者" {{ old("profile[snowboard_level]") == "初級者" ? "checked" : "" }}><label for="snowboard_level1">初級者</label>
                                <input type="radio" id="snowboard_level2" class="radio2" name="profile[snowboard_level]" value="中級者" {{ old("profile[snowboard_level]") == "中級者" ? "checked" : "" }}><label for="snowboard_level2">中級者</label>
                                <input type="radio" id="snowboard_level3" class="radio3" name="profile[snowboard_level]" value="上級者" {{ old("profile[snowboard_level]") == "上級者" ? "checked" : "" }}><label for="snowboard_level3">上級者</label>
                                <p class=error>{{ $errors->first('profile.snowboard_level') }}</p>
                            </td>
                        @elseif ((old("profile.snowboard_level") === "初級者"))
                            <td>
                                <input type="radio" id="snowboard_level0" class="radio4" name="profile[snowboard_level]" value="未経験" {{ old("profile[snowboard_level]") == "未経験" ? "checked" : "" }}><label for="snowboard_level0">未経験</label>
                                <input type="radio" id="snowboard_level1" class="radio1" name="profile[snowboard_level]" value="初級者" {{ old("profile[snowboard_level]", "初級者") == "初級者" ? "checked" : "" }}><label for="snowboard_level1">初級者</label>
                                <input type="radio" id="snowboard_level2" class="radio2" name="profile[snowboard_level]" value="中級者" {{ old("profile[snowboard_level]") == "中級者" ? "checked" : "" }}><label for="snowboard_level2">中級者</label>
                                <input type="radio" id="snowboard_level3" class="radio3" name="profile[snowboard_level]" value="上級者" {{ old("profile[snowboard_level]") == "上級者" ? "checked" : "" }}><label for="snowboard_level3">上級者</label>
                                <p class=error>{{ $errors->first('profile.snowboard_level') }}</p>
                            </td>
                        @elseif ((old("profile.snowboard_level") === "中級者"))
                            <td>
                                <input type="radio" id="snowboard_level0" class="radio4" name="profile[snowboard_level]" value="未経験" {{ old("profile[snowboard_level]") == "未経験" ? "checked" : "" }}><label for="snowboard_level0">未経験</label>
                                <input type="radio" id="snowboard_level1" class="radio1" name="profile[snowboard_level]" value="初級者" {{ old("profile[snowboard_level]") == "初級者" ? "checked" : "" }}><label for="snowboard_level1">初級者</label>
                                <input type="radio" id="snowboard_level2" class="radio2" name="profile[snowboard_level]" value="中級者" {{ old("profile[snowboard_level]", "中級者") == "中級者" ? "checked" : "" }}><label for="snowboard_level2">中級者</label>
                                <input type="radio" id="snowboard_level3" class="radio3" name="profile[snowboard_level]" value="上級者" {{ old("profile[snowboard_level]") == "上級者" ? "checked" : "" }}><label for="snowboard_level3">上級者</label>
                                <p class=error>{{ $errors->first('profile.snowboard_level') }}</p>
                            </td>
                        @else
                            <td>
                                <input type="radio" id="snowboard_level0" class="radio4" name="profile[snowboard_level]" value="未経験" {{ old("profile[snowboard_level]") == "未経験" ? "checked" : "" }}><label for="snowboard_level0">未経験</label>
                                <input type="radio" id="snowboard_level1" class="radio1" name="profile[snowboard_level]" value="初級者" {{ old("profile[snowboard_level]") == "初級者" ? "checked" : "" }}><label for="snowboard_level1">初級者</label>
                                <input type="radio" id="snowboard_level2" class="radio2" name="profile[snowboard_level]" value="中級者" {{ old("profile[snowboard_level]") == "中級者" ? "checked" : "" }}><label for="snowboard_level2">中級者</label>
                                <input type="radio" id="snowboard_level3" class="radio3" name="profile[snowboard_level]" value="上級者" {{ old("profile[snowboard_level]", "上級者") == "上級者" ? "checked" : "" }}><label for="snowboard_level3">上級者</label>
                                <p class=error>{{ $errors->first('profile.snowboard_level') }}</p>
                            </td>
                        @endif
                    @endif
                </tr>
                <tr>
                    <td>その他の経験</td>
                    <td>
                        <textarea name="profile[others_level]" placeholder="">{{ old('profile.others_level', $profile->others_level) }}</textarea>
                        <p class=error>{{ $errors->first('profile.others_level') }}</p>
                    </td>
                </tr>
                <tr>
                    <td>ホームゲレンデ・よく行くスキー場</td>
                    <td>
                        <input class="input_list" type=text placeholder="札幌国際スキー場" name=profile[home_slope] value="{{ old('profile.home_slope', $profile->home_slope) }}">
                        <p class=error>{{ $errors->first('profile.home_slope') }}</p>
                    </td>
                </tr>
                <tr>
                    <td><span>*</span>マッチング</td>
                    @if ($profile->exchange_people === 0)
                        @if ((old("profile.exchange_people") == "1"))
                            <td>
                                <input type="radio" id="permission" class="radio1" name="profile[exchange_people]" value="0" {{ old("profile[exchange_people]") == 0 ? "checked" : "" }}><label for="permission">許可しない</label>
                                <input type="radio" id="no_permission" class="radio2" name="profile[exchange_people]" value="1" {{ old("profile[exchange_people]", "1") == 1 ? "checked" : "" }}><label for="no_permission">許可</label>
                                <p>※許可を選択すると自分がマッチング候補者として他のユーザーに表示されます</p>
                                <p class=error>{{ $errors->first('profile.exchange_people') }}</p>
                            </td>
                        @else
                            <td>
                                <input type="radio" id="permission" class="radio1" name="profile[exchange_people]" value="0" {{ old("profile[exchange_people]", "0") == 0 ? "checked" : "" }}><label for="permission">許可しない</label>
                                <input type="radio" id="no_permission" class="radio2" name="profile[exchange_people]" value="1" {{ old("profile[exchange_people]") == 1 ? "checked" : "" }}><label for="no_permission">許可</label>
                                <p>※許可を選択すると自分がマッチング候補者として他のユーザーに表示されます</p>
                                <p class=error>{{ $errors->first('profile.exchange_people') }}</p>
                            </td>
                        @endif
                    @else 
                        @if ((old("profile.exchange_people") == "0"))
                            <td>
                                <input type="radio" id="permission" class="radio1" name="profile[exchange_people]" value="0" {{ old("profile[exchange_people]", "0") == 0 ? "checked" : "" }}><label for="permission">許可しない</label>
                                <input type="radio" id="no_permission" class="radio2" name="profile[exchange_people]" value="1" {{ old("profile[exchange_people]") == 1 ? "checked" : "" }}><label for="no_permission">許可</label>
                                <p>※許可を選択すると自分がマッチング候補者として他のユーザーに表示されます</p>
                                <p class=error>{{ $errors->first('profile.exchange_people') }}</p>
                            </td>
                        @else
                            <td>
                                <input type="radio" id="permission" class="radio1" name="profile[exchange_people]" value="0" {{ old("profile[exchange_people]") == 0 ? "checked" : "" }}><label for="permission">許可しない</label>
                                <input type="radio" id="no_permission" class="radio2" name="profile[exchange_people]" value="1" {{ old("profile[exchange_people]", "1") == 1 ? "checked" : "" }}><label for="no_permission">許可</label>
                                <p>※許可を選択すると自分がマッチング候補者として他のユーザーに表示されます</p>
                                <p class=error>{{ $errors->first('profile.exchange_people') }}</p>
                            </td>
                        @endif
                    @endif
                </tr>
                <tr>
                    <td>SNS</td>
                    <td>
                        <input class="input_list" type=text placeholder="使用しているSNSとそのユーザー名またはリンクを記載してください" name=profile[sns] value="{{ old('profile.sns', $profile->sns) }}">
                        <p>※マッチングの検索対象になるには入力必須です</p>
                        <p class=error>{{ $errors->first('profile.sns') }}</p>
                    </td>
                </tr>
                <tr>
                    <td><span>*</span>公開設定</td>
                    @if ($profile->public_setting === "private")
                        @if ((old("profile.public_setting") === "public"))
                            <td>
                                <input type="radio" id="private" class="radio1" name="profile[public_setting]" value="private" {{ old("profile[public_setting]") == "private" ? "checked" : "" }}><label for="private">private</label>
                                <input type="radio" id="public" class="radio2" name="profile[public_setting]" value="public" {{ old("profile[public_setting]", "public") == "public" ? "checked" : "" }}><label for="public">public</label>
                                <p>※publicを選択すると他のユーザーが自分のプロフィール内容を見れるようになります</p>
                                <p class=error>{{ $errors->first('profile.public_setting') }}</p>
                            </td>
                        @else
                            <td>
                                <input type="radio" id="private" class="radio1" name="profile[public_setting]" value="private" {{ old("profile[public_setting]", "private") == "private" ? "checked" : "" }}><label for="private">private</label>
                                <input type="radio" id="public" class="radio2" name="profile[public_setting]" value="public" {{ old("profile[public_setting]") == "public" ? "checked" : "" }}><label for="public">public</label>
                                <p>※publicを選択すると他のユーザーが自分のプロフィール内容を見れるようになります</p>
                                <p class=error>{{ $errors->first('profile.public_setting') }}</p>
                            </td>
                        @endif
                    @else
                        @if ((old("profile.public_setting") === "private"))
                            <td>
                                <input type="radio" id="private" class="radio1" name="profile[public_setting]" value="private" {{ old("profile[public_setting]", "private") == "private" ? "checked" : "" }}><label for="private">private</label>
                                <input type="radio" id="public" class="radio2" name="profile[public_setting]" value="public" {{ old("profile[public_setting]") == "public" ? "checked" : "" }}><label for="public">public</label>
                                <p>※publicを選択すると他のユーザーが自分のプロフィール内容を見れるようになります</p>
                                <p class=error>{{ $errors->first('profile.public_setting') }}</p>
                            </td>
                        @else
                            <td>
                                <input type="radio" id="private" class="radio1" name="profile[public_setting]" value="private" {{ old("profile[public_setting]") == "private" ? "checked" : "" }}><label for="private">private</label>
                                <input type="radio" id="public" class="radio2" name="profile[public_setting]" value="public" {{ old("profile[public_setting]", "public") == "public" ? "checked" : "" }}><label for="public">public</label>
                                <p>※publicを選択すると他のユーザーが自分のプロフィール内容を見れるようになります</p>
                                <p class=error>{{ $errors->first('profile.public_setting') }}</p>
                            </td>
                        @endif
                    @endif
                </tr>
                <tr>
                    <td>コメント</td>
                    <td>
                        <textarea name="profile[greeting]" placeholder="補足等、自由にお使いください">{{ old('profile.greeting', $profile->greeting) }}</textarea>
                        <p class=error>{{ $errors->first('profile.greeting') }}</p>
                    </td>
                </tr>
            </table>
        </div>
        <input class=form type="submit" value="更新"/>
        </form>
    </body>
</html>