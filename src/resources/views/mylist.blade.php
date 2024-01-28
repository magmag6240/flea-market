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
        <a class="like-item-detail-link" href="{{ route('user.item_detail', ['item_id' => $item->item_id]) }}">
            <img class="like-item-img" src="{{$item->image_url}}">
        </a>
        @endforeach
    </div>
</div>

@endsection