@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')

<div class="register-content">
    <h1 class="register-title">会員登録</h1>
    <form class="register-form" action="/register" method="post">
        @csrf
        <div class="register-group">
            <span class="register-group-title">メールアドレス</span>
            <input class="input-email" name="email" type="email" value="{{ old('email') }}">
            @if ($errors->any())
            <div class="register-error">
                @error('email')
                {{ $message }}
                @enderror
            </div>
            @endif
        </div>
        <div class="register-group">
            <span class="register-group-title">パスワード</span>
            <input class="input-password" name="password" type="password" value="{{ old('password') }}">
            @if ($errors->any())
            <div class="register-error">
                @error('password')
                {{ $message }}
                @enderror
            </div>
            @endif
        </div>
        <button class="register-button" type="submit">会員登録</button>
        <div class="login">
            <a class="login-link" href="/login">ログインはこちらから</a>
        </div>
    </form>
</div>

@endsection