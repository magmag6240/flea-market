@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/recommend.css') }}">
@endsection

@section('content')

<div class="top-content">
    <div class="top-title">
        <p class="top-title-recommend">おすすめ</p>
        <p class="top-title-mylist"><a class="mylist-link" href="/mylist">マイリスト</a></p>
    </div>
    <div class="recommend-list">
        @foreach($recommend_items as $item)
        <img class="recommend-item" src="{{$item->image_url}}">
        @endforeach
    </div>
</div>

@endsection