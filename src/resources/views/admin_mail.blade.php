@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin_mail.css') }}">
@endsection

@section('content')

<div class="mail-form-content">
    <h1 class="mail-form-title">新規メール作成</h1>
    <form class="mail-form" method="post" action="{{ route('admin.mail.send', ['user_id' => $user->id]) }}">
        @csrf
        <div class="mail-edit">
            <div class="mail-edit-title">
                <p class="mail-edit-title-text">メール内容</p>
                <button class="mail-form-button" type="submit">送信</button>
            </div>
            <div class="mail-edit-title">
                <p class="mail-edit-title-text">宛先メールアドレス</p>
                <p class="mail-form-email">{{ $user->email }}</p>
            </div>
            <textarea class="form-textarea" name="contents" id="contents" cols="30" rows="20" placeholder="Message"></textarea>
        </div>
    </form>
    <button class="user-list-button" type="button"><a class="user-list-link" href="/admin">戻る</a></button>
</div>

@endsection