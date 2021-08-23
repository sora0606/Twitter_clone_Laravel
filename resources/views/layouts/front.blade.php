<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>「いま」を見つけよう/Twitter</title>
    <link rel="stylesheet" href="{{asset('css/front.css')}}">
    <link rel="icon" href="{{asset('img/twitter-icon.svg')}}">
</head>
<body>
    <div class="frontpage">
        <div class="mainvisual">
            <img src="{{asset('img/twitter.jpg')}}" alt="">
        </div>
        <div class="nav">
            <div class="nav-content">
                <img src="{{asset('img/twitter-icon.svg')}}" alt="" class="icon">
                <h1 class='title'>すべての話題が、ここに。</h1>
                <h3>Twitterをはじめよう</h3>
                <div class="nav-link">

                    <form action="{{('register')}}">
                        {{csrf_field()}}
                        <div class="register">
                            <button class="btn" type="submit">アカウント作成</button>
                        </div>
                    </form>

                    <form action="{{('login')}}">
                        {{csrf_field()}}
                        <div class="login">
                            <button class="btn" type="submit">ログイン</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</body>
</html>