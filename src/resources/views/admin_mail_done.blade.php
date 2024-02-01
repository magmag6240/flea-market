@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin_mail_done.css') }}">
@endsection

@section('content')

<div class="done">
    <p class="done-text">メールの送信が完了しました</p>
    <button class="user-list-button" type="button"><a class="user-list-link" href="/admin">戻る</a></button>
</div>

@endsection