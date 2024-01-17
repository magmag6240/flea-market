@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/sell.css') }}">
@endsection

@section('content')

<div class="sell-content">
    <h1 class="sell-title">商品の出品</h1>
    <form class="sell-form" action="" method="post">
        @csrf
        @method('patch')
        <div class="sell-group">
            <p class="sell-group-title">商品画像</p>
            <div class="sell-group-content">
                <input class="sell-input" type="text" name="name" value="">
                <div class="sell-error">
                    @error('name')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="sell-lot">
            <p class="sell-lot-title">商品の詳細</p>
            <div class="sell-group">
                <p class="sell-group-title">カテゴリー</p>
                <div class="sell-group-content">
                    <input class="sell-input" type="text" name="" value="">
                    <div class="sell-error">
                        @error('category_id')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="sell-group">
                <p class="sell-group-title">商品の状態</p>
                <div class="sell-group-content">
                    <input class="sell-input" type="text" name="" value="">
                    <div class="sell-error">
                        @error('name')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="sell-lot">
            <p class="sell-lot-title">商品名と説明</p>
            <div class="sell-group">
                <p class="sell-group-title">商品名</p>
                <div class="sell-group-content">
                    <input class="sell-input" type="text" name="" value="">
                    <div class="sell-error">
                        @error('name')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="sell-group">
                <p class="sell-group-title">商品の説明</p>
                <div class="sell-group-content">
                    <input class="sell-input" type="text" name="" value="">
                    <div class="sell-error">
                        @error('name')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="sell-lot">
            <p class="sell-lot-title">販売価格</p>
            <div class="sell-group">
                <p class="sell-group-title">販売価格</p>
                <div class="sell-group-content">
                    <input class="sell-input" type="text" name="" value="">
                    <div class="sell-error">
                        @error('name')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <button class="sell-form-button" type="submit">出品する</button>
    </form>
</div>

@endsection