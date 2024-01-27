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
            <div class="comment">
                <span class="comment-link"></span>
                <p>{{$item_detail->comments->count()}}</p>
            </div>
        </div>
        <div class="comment-history">
            @if($comment_history->isEmpty())
            <p class="comment-null-text">コメントはありません</p>
            @else
            <div class="comment-list">
                @foreach($comment_history as $comment)
                <div class="comment-list-group">
                    <div class="comment-user-detail">
                        <img class="comment-user-img" src="{{ $user_profile->image_url }}" alt="">
                        <p class="comment-user-name">{{ $user_profile->user_name }}</p>
                    </div>
                    <form class="comment-delete-form" action="{{ route('user.comment_delete', ['comment_id' => $comment->id]) }}" method="post">
                        @csrf
                        @method('delete')
                        <p class="comment-text-detail">{{ $comment->comments }}</p>
                        @if($comment->user_id == $user_id)
                        <button type="submit">削除</button>
                        @endif
                    </form>
                </div>
                @endforeach
            </div>
            @endif
        </div>
        <form class="comment-form" action="{{ route('user.comment_store', ['item_id' => $item_detail->id]) }}" method="post">
            @csrf
            <p class="comment-form-title">商品へのコメント</p>
            <input type="text" name="comments">
            <button class="comment-form-button" type="submit">コメントを送信する</button>
        </form>
    </div>
</div>

@endsection