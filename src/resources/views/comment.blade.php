@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/comment.css') }}">
@endsection

@section('content')

<div class="comment-content">
    <div class="item-detail-image">
        <img class="item-detail-img" src="/storage/items/{{ $item_detail->image_url }}" alt="">
    </div>
    <div class="item-detail-text">
        <p class="item-name">{{ $item_detail->name }}</p>
        <p class="item-brand-name">{{ $item_detail->brand_name }}</p>
        <p class="item-price">{{ $item_detail->price }}</p>
        <div class="item-reaction">
            <div class="like">
                @if($item_detail->is_liked())
                <a class="unlike-link" href="{{ route('unlike', ['item_id' => $item_detail->id]) }}"></a>
                <span class="like-count">{{$item_detail->likes->count()}}</span>
                @else
                <a class="like-link" href="{{ route('like', ['item_id' => $item_detail->id]) }}"></a>
                <span class="like-count">{{$item_detail->likes->count()}}</span>
                @endif
            </div>
            <div class="comment">
                <span class="comment-link"></span>
                <span class="comment-count">{{$item_detail->comments->count()}}</span>
            </div>
        </div>
        <div class="comment-history">
            @if($comment_history->isEmpty())
            <p class="comment-null-text">コメントはありません</p>
            @else
            <div class="comment-list">
                @foreach($comment_history as $comment)
                <div class="comment-list-group">
                    @if($comment->user_id == $user_id)
                    <div class="self-comment-detail">
                        <img class="self-comment-img" src="/storage/users/{{ $comment->user->profile->image_url }}" alt="">
                        <p class="self-comment-name">{{ $comment->user->profile->user_name }}</p>
                    </div>
                    @else
                    <div class="other-comment-detail">
                        <img class="other-comment-img" src="/storage/users/{{ $comment->user->profile->image_url }}" alt="">
                        <p class="other-comment-name">{{ $comment->user->profile->user_name }}</p>
                    </div>
                    @endif
                    <form class="comment-delete-form" action="{{ route('user.comment_delete', ['comment_id' => $comment->id]) }}" method="post">
                        @csrf
                        @method('delete')
                        @if($comment->user_id == $user_id)
                        <button class="comment-delete-button" type="submit">削除</button>
                        <p class="self-comment-text-detail">{{ $comment->comments }}</p>
                        @else
                        <p class="other-comment-text-detail">{{ $comment->comments }}</p>
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
            <textarea class="comment-textarea" type="text" name="comments"></textarea>
            <button class="comment-form-button" type="submit">コメントを送信する</button>
        </form>
    </div>
</div>

@endsection