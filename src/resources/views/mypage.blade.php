@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
@endsection

@section('content')

<div class="mypage-content">
    <div class="user-detail">
        <div class="user-detail-content">
            <div class="user-image"></div>
            <p class="user-name"></p>
        </div>
        <button class="user-profile-button">
            <a class="user-profile-link" href="{{ route('user.profile_edit') }}">プロフィールを編集</a>
        </button>
    </div>
    <div class="user-item-list">
        <div class="js-tab-panel">
            <div class="js-tab-panel-group">
                <p class="js-tab active_tab">出品した商品</p>
                <p class="js-tab inactive_tab">購入した商品</p>
            </div>
            <div class="js-panel active_content">
                @if(!$sell_item->isEmpty())
                @foreach($sell_item as $item)
                <div class="sell-item-detail">
                    <a class="sell-item-detail-link" href="{{ route('user.item_detail', ['item_id' => $item->id]) }}">
                        <img class="sell-item-img" src="{{$item->image_url}}">
                    </a>
                </div>
                @endforeach
                @else
                <div class="sell-item-null">
                    <p class="sell-item-null-text">出品履歴はありません</p>
                </div>
                @endif
            </div>
            <div class="js-panel inactive_content">
                @if(!$purchase_item->isEmpty())
                @foreach($purchase_item as $item)
                <div class="purchase-item-detail">
                    <a class="purchase-item-detail-link" href="{{ route('user.item_detail', ['item_id' => $item->id]) }}">
                        <img class="purchase-item-img" src="{{$item->image_url}}">
                    </a>
                </div>
                @endforeach
                @else
                <div class="purchase-item-null">
                    <p class="purchase-item-null-text">購入履歴はありません</p>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
<script src="{{ mix('js/tab.js') }}"></script>

@endsection