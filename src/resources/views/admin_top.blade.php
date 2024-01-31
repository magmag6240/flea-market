@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin_top.css') }}">
@endsection

@section('content')

<div class="admin-top-content">
    <h1 class="admin-top-title">管理者ページ</h1>
    <div class="admin-link-list">
        <ul class="admin-list-ul">
            <li class="admin-list"><a href="{{ route('admin.user_list') }}">ユーザ一覧</a></li>
            <li class="admin-list"><a href="{{ route('admin.mail.index') }}">新規メール作成</a></li>
        </ul>
    </div>
</div>

@endsection