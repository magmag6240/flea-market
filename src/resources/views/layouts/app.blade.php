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
        <p class="header-logo"></p>
        <nav class="header-nav">
            <ul class="header-nav-list">
                @if(Auth::check())
                <form class="header-nav-item" action="/logout" method="post">
                    @csrf
                    <li class="header-nav-item">
                        <button class="logout-button" type="submit">ログアウト</button>
                    </li>
                </form>
                <li class="header-nav-item"><a class="list-link" href="/mypage">マイページ</a></li>
                @else
                <li class="header-nav-item"><a class="list-link" href="/login">ログイン</a></li>
                <li class="header-nav-item"><a class="list-link" href="/register">会員登録</a></li>
                <li class="header-nav-item"><a class="list-link" href="/listing">出品</li>
                @endif
            </ul>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

</body>

</html>