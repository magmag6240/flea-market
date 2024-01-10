@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')

<div class="login-content">
    <h1 class="login-title">ログイン</h1>
    <form class="login-form" action="/login" method="post">
        @csrf
        <div class="login-group">
            <span class="login-group-title">メールアドレス</span>
            <input class="input-email" name="email" type="email" value="{{ old('email') }}">
            @if ($errors->any())
            <div class="login-error">
                @error('email')
                {{ $message }}
                @enderror
            </div>
            @endif
        </div>
        <div class="login-group">
            <span class="login-group-title">パスワード</span>
            <input class="input-password" name="password" type="password" value="{{ old('password') }}">
            @if ($errors->any())
            <div class="login-error">
                @error('password')
                {{ $message }}
                @enderror
            </div>
            @endif
        </div>
        <button class="login-button" type="submit">ログイン</button>
        <div class="register">
            <a class="register-link" href="/register">会員登録はこちらから</a>
        </div>
    </form>
</div>

@endsection