@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/mylist.css') }}">
@endsection

@section('content')

<div class="top-content">
    <div class="top-title">
        <p class="top-title-recommend"><a href="/">おすすめ</a></p>
        <p class="top-title-mylist">マイリスト</p>
    </div>
    <div class="like-product-list">
        @foreach($like_products as $product)
        <img class="like-product" src="{{$product->image_url}}">
        @endforeach
    </div>
</div>

@endsection