@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/item_detail.css') }}">
@endsection

@section('content')

<div class="item-detail-content">
    <div class="item-detail-image">
        <img class="item-detail-img" src="{{ $item_detail->image_url }}" alt="">
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
                <a class="comment-link" href="{{ route('user.comment', ['item_id' => $item_detail->id]) }}"></a>
                <span class="comment-count">{{$item_detail->comments->count()}}</span>
            </div>
        </div>
        @if(empty($item_buyer_id))
        @if(Auth::id() !== $item_seller_id)
        <button class="item-purchase-button">
            <a class="item-purchase-link" href="{{ route('user.purchase', ['item_id' => $item_detail->id]) }}">購入する</a>
        </button>
        @endif
        @else
        <div>
            <p>売約済み</p>
        </div>
        @endif
        <div class="item-detail-explanation">
            <p class="explanation-title">商品説明</p>
            <p class="explanation-text">{{ $item_detail->item_detail }}</p>
        </div>
        <div class="item-detail-info">
            <p class="info-title">商品の情報</p>
            <table class="item-detail-table">
                <tr class="item-detail-tr">
                    <td class="item-detail-td">
                        <p class="category-title">カテゴリー</p>
                    </td>
                    <td class="item-detail-td">
                        <div class="category-detail">
                            @foreach($item_detail->categories as $category)
                            <p class="category-detail-text">{{ $category->category }}</p>
                            @endforeach
                        </div>
                    </td>
                </tr>
                <tr class="item-detail-tr">
                    <td class="item-detail-td">
                        <p class="condition-title">商品の状態</p>
                    </td>
                    <td class="item-detail-td">
                        <p class="condition-detail">{{ $item_detail->condition->condition }}</p>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>

@endsection