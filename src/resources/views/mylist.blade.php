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
    <div class="like-item-list">
        @foreach($like_items as $item)
        <img class="like-item" src="{{$item->image_url}}">
        @endforeach
    </div>
</div>

@endsection