@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/profile_edit.css') }}">
@endsection

@section('content')

<div class="profile-edit-content">
    <h1 class="profile-edit-title">プロフィール設定</h1>
    <form class="profile-edit-form" action="{{ route('user.profile_update') }}" method="post">
        @csrf
        @method('patch')
        <div class="edit-group">
            <p class="edit-group-title">ユーザー名</p>
            <input class="input-name" name="name" type="name" value="{{ old('name') }}">
            @if ($errors->any())
            <div class="login-error">
                @error('name')
                {{ $message }}
                @enderror
            </div>
            @endif
        </div>
        <div class="edit-group">
            <p class="edit-group-title">郵便番号</p>
            <input class="input-postcode" name="postcode" type="postcode" value="{{ old('postcode') }}">
            @if ($errors->any())
            <div class="login-error">
                @error('postcode')
                {{ $message }}
                @enderror
            </div>
            @endif
        </div>
        <div class="edit-group">
            <p class="edit-group-title">住所</p>
            <input class="input-address" name="address" type="address" value="{{ old('address') }}">
            @if ($errors->any())
            <div class="login-error">
                @error('address')
                {{ $message }}
                @enderror
            </div>
            @endif
        </div>
        <div class="edit-group">
            <p class="edit-group-title">建物名</p>
            <input class="input-building" name="building" type="building" value="{{ old('building') }}">
            @if ($errors->any())
            <div class="login-error">
                @error('building')
                {{ $message }}
                @enderror
            </div>
            @endif
        </div>
        <button class="update-button" type="submit">更新する</button>
    </form>

</div>

@endsection