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
        @foreach($items as $item)
        <a class="recommend-item-detail-link" href="{{ route('user.item_detail', ['item_id' => $item->id]) }}">
            <img class="recommend-item-img" src="/storage/items/{{$item->image_url}}">
        </a>
        @endforeach
    </div>
</div>

@endsection