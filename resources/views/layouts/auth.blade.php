<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/auth.css')}}">
    <link rel="icon" href="{{asset('img/twitter-icon.svg')}}">
    <title>Twitter</title>
</head>
<body>
    <div class="auth">
        <div class="content">
            <div class='icon'>
                <img src="{{asset('img/twitter-icon.svg')}}" alt="">
            </div>
            <main>
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>