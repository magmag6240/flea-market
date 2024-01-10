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
            <p class="login-group-title">メールアドレス</p>
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
            <p class="login-group-title">パスワード</p>
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
        <div class="registration">
            <p class="registration-text"><a class="registration-link" href="/register">会員登録はこちらから</a></p>
        </div>
    </form>
</div>

@endsection