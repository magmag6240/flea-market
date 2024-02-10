@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/profile_edit.css') }}">
@endsection

@section('content')

<div class="profile-edit-content">
    <h1 class="profile-edit-title">プロフィール設定</h1>
    <form class="profile-edit-form" action="{{ route('user.profile_update') }}" enctype="multipart/form-data" method="post">
        @csrf
        @method('patch')
        <div class="image-edit-group">
            <div class="edit-image">
                <div class="image-preview">
                    <p class="image-preview-text">ファイルが選択されていません</p>
                </div>
                <label class="input-image-label" for="user-image">画像を選択する</label>
                <input class="user-image" type="file" name="user_image" id="user-image" accept=".jpg, .jpeg, .png">
            </div>
            @if ($errors->any())
            <div class="profile-edit-error">
                @error('name')
                {{ $message }}
                @enderror
            </div>
            @endif
        </div>
        <div class="edit-group">
            <span class="edit-group-title">ユーザー名</span>
            <input class="input-name" name="name" type="name" value="{{ old('name') }}">
            @if ($errors->any())
            <div class="profile-edit-error">
                @error('name')
                {{ $message }}
                @enderror
            </div>
            @endif
        </div>
        <div class="edit-group">
            <span class="edit-group-title">郵便番号</span>
            <input class="input-postcode" name="postcode" type="postcode" value="{{ old('postcode') }}">
            @if ($errors->any())
            <div class="profile-edit-error">
                @error('postcode')
                {{ $message }}
                @enderror
            </div>
            @endif
        </div>
        <div class="edit-group">
            <span class="edit-group-title">住所</span>
            <input class="input-address" name="address" type="address" value="{{ old('address') }}">
            @if ($errors->any())
            <div class="profile-edit-error">
                @error('address')
                {{ $message }}
                @enderror
            </div>
            @endif
        </div>
        <div class="edit-group">
            <span class="edit-group-title">建物名</span>
            <input class="input-building" name="building" type="building" value="{{ old('building') }}">
            @if ($errors->any())
            <div class="profile-edit-error">
                @error('building')
                {{ $message }}
                @enderror
            </div>
            @endif
        </div>
        <button class="update-button" type="submit">更新する</button>
    </form>
</div>
<script src="{{ mix('js/user_image.js') }}"></script>

@endsection