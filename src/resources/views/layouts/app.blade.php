<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CoachTech Flea Market</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    @yield('css')
</head>

<body>
    <header class="header">
        <div class="header-content">
            <div class="header-logo">
                <a class="top-link" href="{{ route('user.top') }}">
                    <img class="header-logo-img" src="logo_img.svg" alt="">
                    <img class="header-logo-coachtech-img" src="coachtech_img.png" alt="">
                </a>
            </div>
            @if(Route::is('user.top') || Route::is('user.mylist') || Route::is('user.mypage') || Route::is('user.comment') || Route::is('user.profile_edit') || Route::is('user.item_detail') || Route::is('user.purchase'))
            <nav class="header-nav nav" id="js-nav">
                <ul class="header-nav-ul nav-items">
                    <form class="header-nav-form" action="{{ route('user.search') }}" method="get">
                        <input class="search-input" type="search" name="keyword" placeholder="なにをお探しですか？">
                    </form>
                    @if(Auth::check())
                    <form class="header-nav-form" action="/logout" method="post">
                        @csrf
                        <li class="header-nav-list">
                            <button class="logout-button" type="submit">ログアウト</button>
                        </li>
                    </form>
                    @can('general')
                    <li class="header-nav-list"><a class="list-link-mypage" href="/mypage">マイページ</a></li>
                    <li class="header-nav-list"><a class="list-link-sell" href="/sell">出品</a></li>
                    @endcan
                    @can('admin')
                    <li class="header-nav-list"><a class="list-link-admin" href="/admin">管理者ページ</a></li>
                    <li class="header-nav-list"><a class="list-link-sell" href="/sell">出品</a></li>
                    @endcan
                    @else
                    <li class="header-nav-list"><a class="list-link-login" href="/login">ログイン</a></li>
                    <li class="header-nav-list"><a class="list-link-register" href="/register">会員登録</a></li>
                    <li class="header-nav-list"><a class="list-link-sell" href="/sell">出品</a></li>
                    @endif
                </ul>
            </nav>
            <button class="header-button button" id="js-button">
                <span></span>
                <span></span>
                <span></span>
            </button>
            @endif
        </div>
    </header>

    <main>
        @yield('content')
    </main>

</body>
<script src="{{ mix('js/menu.js') }}"></script>

</html>