@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/sell.css') }}">
@endsection

@section('content')

<div class="sell-content">
    <h1 class="sell-title">商品の出品</h1>
    <form class="sell-form" action="{{ route('user.sell_store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="sell-group">
            <span class="sell-group-title">商品画像</span>
            <div class="sell-group-content">
                <div class="sell-image">
                    <div class="image-preview">
                        <p class="image-preview-text">ファイルが選択されていません</p>
                    </div>
                    <label class="input-image-label" for="item-image">画像を選択する</label>
                    <input class="sell-input-image" type="file" name="item_image" id="item-image" accept=".jpg, .jpeg, .png">
                </div>
                @if ($errors->any())
                <div class="sell-error">
                    @error('image_url')
                    {{ $message }}
                    @enderror
                </div>
                @endif
            </div>
        </div>
        <div class="sell-lot">
            <p class="sell-lot-title">商品の詳細</p>
            <div class="sell-group">
                <span class="sell-group-title">カテゴリー（複数選択可）</span>
                <div class="sell-group-content">
                    @foreach($category as $category)
                    <label class="category-label">
                        <input class="sell-checkbox" type="checkbox" name="category_id[]" value="{{ $category->id }}">
                        <span class="sell-checkbox-text">{{ $category->category }}</span>
                    </label>
                    @endforeach
                    <div class="sell-error">
                        @error('category_id')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="sell-group">
                <span class="sell-group-title">商品の状態</span>
                <div class="sell-group-content">
                    @foreach($condition as $condition)
                    <label class="condition-label">
                        <input class="sell-radio" type="radio" name="condition_id" value="{{ $condition->id }}">
                        <span class="sell-radio-detail">{{ $condition->condition }}</span>
                    </label>
                    @endforeach
                    <div class="sell-error">
                        @error('condition_id')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="sell-lot">
            <p class="sell-lot-title">商品名と説明</p>
            <div class="sell-group">
                <span class="sell-group-title">商品名</span>
                <div class="sell-group-content">
                    <input class="sell-input" type="text" name="name" value="">
                    <div class="sell-error">
                        @error('name')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="sell-group">
                <span class="sell-group-title">ブランド名</span>
                <div class="sell-group-content">
                    <input class="sell-input" type="text" name="brand_name" value="">
                    <div class="sell-error">
                        @error('bland_name')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="sell-group">
                <span class="sell-group-title">商品の説明</span>
                <div class="sell-group-content">
                    <textarea class="sell-textarea" type="text" name="item_detail" value=""></textarea>
                    <div class="sell-error">
                        @error('item_detail')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="sell-lot">
            <p class="sell-lot-title">販売価格</p>
            <div class="sell-group">
                <span class="sell-group-title">販売価格</span>
                <div class="sell-group-content">
                    <input class="sell-input" type="text" name="price" value="">
                    <div class="sell-error">
                        @error('price')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <button class="sell-form-button" type="submit">出品する</button>
    </form>
</div>
<script src="{{ mix('js/item_image.js') }}"></script>

@endsection