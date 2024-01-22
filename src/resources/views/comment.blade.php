@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/comment.css') }}">
@endsection

@section('content')

<div class="comment-content">
    <div class="item-detail-image">
        <img class="item-detail-img" src="{{ $item_detail->image_url }}" alt="">
    </div>
    <div class="item-detail-text">
        <p class="item-name">{{ $item_detail->name }}</p>
        <span class="item-bland-name">{{ $item_detail->bland_name }}</span>
        <p class="item-price">￥{{ $item_detail->price }}</p>
        <div class="item-reaction">
            <div class="like">
                @if($item_detail->is_liked())
                <a class="unlike-link" href="{{ route('unlike', ['item_id' => $item_detail->id]) }}"></a>
                <p>{{$item_detail->likes->count()}}</p>
                @else
                <a class="like-link" href="{{ route('like', ['item_id' => $item_detail->id]) }}"></a>
                <p>{{$item_detail->likes->count()}}</p>
                @endif
            </div>
            <div class="comments">
                <a class="comment-link" href="{{ route('user.comment', ['item_id' => $item_detail->id]) }}"></a>
                <p>{{$item_detail->comments->count()}}</p>
            </div>
        </div>
    </div>
</div>

@endsection