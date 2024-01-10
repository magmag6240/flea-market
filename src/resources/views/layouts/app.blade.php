<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CoachTech Flea Market</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    @yield('css')
</head>

<body>
    <header class="header">
        @if(!Route::is('user.sell'))
        <div class="header-logo">
            <img class="header-logo-img" src="logo_img.svg" alt="">
            <img class="header-logo-coachtech-img" src="coachtech_img.png" alt="">
        </div>
        @endif
        <nav class="header-nav">
            <ul class="header-nav-ul">
                @if(Route::is(''))

                @endif
                @if(Auth::check())
                <form class="header-nav-form" action="/logout" method="post">
                    @csrf
                    <li class="header-nav-list">
                        <button class="logout-button" type="submit">ログアウト</button>
                    </li>
                </form>
                <li class="header-nav-list"><a class="list-link" href="/mypage">マイページ</a></li>
                @else
                <li class="header-nav-list"><a class="list-link" href="/login">ログイン</a></li>
                <li class="header-nav-list"><a class="list-link" href="/register">会員登録</a></li>
                @endif
                <li class="header-nav-list"><a class="list-link" href="/listing">出品</a></li>
            </ul>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

</body>

</html>