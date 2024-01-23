@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/address_edit.css') }}">
@endsection

@section('content')

<div class="address-edit-content">
    <h1 class="address-edit-title">住所の変更</h1>
    <form class="address-edit-form" action="{{ route('user.address_update', ['item_id' => $item->id]) }}" method="post">
        @csrf
        @method('patch')
        <div class="edit-group">
            <p class="edit-group-title">郵便番号</p>
            <input class="input-postcode" name="postcode" type="postcode" value="{{ old('postcode') }}">
            @if ($errors->any())
            <div class="edit-error">
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
            <div class="edit-error">
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
            <div class="edit-error">
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