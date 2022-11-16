<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>welcom</title>
        <link rel="stylesheet" href="/css/welcome.css">
    </head>
    <body>
        <h1>Welcome!</h1>
        <a href="/login" class="login_yes">ログインする</a>
        <a href="/pages/login_home" class="login_no">ログインしない</a>
        <p class="attention">※ログインしない場合は一部の機能が制限されます</p>  
        <h2>アプリ概要</h2>
        <div class="summary_container">
            <p class="summary">このWebサイトでは、まず、スキー場の概要や特徴を閲覧したり、スキー場の情報を登録することができます。
            また、興味のあるスキー場名を選択すると、その<span>スキー場の公式ホームページや地図情報、天気なども閲覧することができる</span>ため、効率よく情報を収集することができます。</p>
            <p class="summary">さらに、<span>Twitterに投稿されたスキーやスノーボードに関するツイートを閲覧することができる</span>ようになっています。その中から興味のあるツイートを発見した場合は、
            そのTwitterアカウントに移動することも可能です。</p>
            <p class="summary">そして、スキー場情報の登録をするしないに関わらず、<span>自己プロフィールを登録することができます</span>。また、この自己プロフィールをもとに、性別、年齢、住まい、
            スキー・スノーボードの経験の有無・レベルなどを絞り込み、<span>マッチング相手を探すことができます</span>。これにより、スキー・スノーボードの技術が高い人を探してマッチングをし指導を受けるなど、個々人の目的に合わせて仲間を探し、スキー・スノーボードをまた違った視点で楽しむことができるようになります。</p>
            <p class="summary">そのほか、自己プロフィールを登録すると、お気に入りのスキー場を選択し、興味のあるスキー場一覧としてまとめておくことができます。
            また、全ユーザーのお気に入り追加数に基づき、<span>注目を集めているスキー場情報をランキング形式で閲覧できる</span>ようになっています。</p>
        </div>
        <h2>使用可能な機能</h2>
        <h4 class="login">ログイン時</h4>
        <p class="functions">・スキー場登録・編集・閲覧・検索（絞り込み検索） </p>
        <p class="functions">・スキー場お気に入り登録</p>
        <p class="functions">・スキー場お気に入りランキングの閲覧</p>
        <p class="functions">・プロフィール登録・編集・閲覧・検索（絞り込み検索） </p>
        <p class="functions">・マッチング</p>
        <p class="functions">・スキー・スノーボードに関するTwitter投稿の閲覧</p>
        <p class="functions">・投稿されているスキー場の週間天気予報の閲覧</p>
        <p class="functions">・投稿されているスキー場のGoogleMapの閲覧</p>
        <h4 class="non_login">非ログイン時</h4>
        <p class="functions">・スキー場閲覧 </p>
        <p class="functions">・スキー場作成者のプロフィール閲覧</p>
        <p class="functions">・スキー・スノーボードに関するTwitter投稿の閲覧</p>
        <p class="functions">・投稿されているスキー場の週間天気予報の閲覧</p>
        <p class="functions">・投稿されているスキー場のGoogleMapの閲覧</p>
    </body>
</html>