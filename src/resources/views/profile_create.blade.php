@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/profile_create.css') }}">
@endsection

@section('content')

<div class="profile-create-content">
    <h1 class="profile-create-title">プロフィール設定</h1>
    <form class="profile-create-form" action="{{ route('user.profile_store') }}" enctype="multipart/form-data" method="post">
        @csrf
        <div class="create-group">
            <div class="create-image">
                <div class="image-preview">
                    <p class="image-preview-text">ファイルが選択されていません</p>
                </div>
                <label class="input-image-label" for="user-image">画像を選択する</label>
                <input class="user-image" type="file" name="image_url" id="user-image" accept=".jpg, .jpeg, .png">
                @if ($errors->any())
                <div class="profile-create-error">
                    @error('image_url')
                    {{ $message }}
                    @enderror
                </div>
                @endif
            </div>
        </div>
        <div class="create-group">
            <span class="create-group-title">ユーザー名</span>
            <input class="input-name" name="user_name" type="name" value="{{ old('user_name') }}">
            @if ($errors->any())
            <div class="profile-create-error">
                @error('user_name')
                {{ $message }}
                @enderror
            </div>
            @endif
        </div>
        <div class="create-group">
            <span class="create-group-title">郵便番号</span>
            <input class="input-postcode" name="postcode" type="postcode" value="{{ old('postcode') }}">
            @if ($errors->any())
            <div class="profile-create-error">
                @error('postcode')
                {{ $message }}
                @enderror
            </div>
            @endif
        </div>
        <div class="create-group">
            <span class="create-group-title">住所</span>
            <input class="input-address" name="address" type="address" value="{{ old('address') }}">
            @if ($errors->any())
            <div class="profile-create-error">
                @error('address')
                {{ $message }}
                @enderror
            </div>
            @endif
        </div>
        <div class="create-group">
            <span class="create-group-title">建物名</span>
            <input class="input-building" name="building" type="building" value="{{ old('building') }}">
            @if ($errors->any())
            <div class="profile-create-error">
                @error('building')
                {{ $message }}
                @enderror
            </div>
            @endif
        </div>
        <button class="submit-button" type="submit">新規作成する</button>
    </form>
</div>
<script src="{{ mix('js/user_image.js') }}"></script>

@endsection