@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
@endsection

@section('content')

<div class="mypage-content">
    <div class="user-detail">
        @if(!empty($user_profile))
        <div class="user-detail-content">
            <img class="user-image" src="/storage/users/{{$user_profile->image_url}}">
            <p class="user-name">{{ $user_profile->user_name }}</p>
        </div>
        <button class="user-profile-button">
            <a class="user-profile-link" href="{{ route('user.profile_edit') }}">プロフィールを編集</a>
        </button>
        @else
        <p class="user-detail-text">ユーザー情報</p>
        <a class="profile-create-link" href="{{ route('user.profile_edit') }}">プロフィールを登録</a>
        @endif
    </div>
    <div class="user-item-list">
        <div class="js-tab-panel">
            <div class="js-tab-panel-group">
                <p class="js-tab active_tab">出品した商品</p>
                <p class="js-tab inactive_tab">購入した商品</p>
            </div>
            <div class="js-panel active_content">
                @if(!$sell_item->isEmpty())
                <div class="sell-item-detail">
                    @foreach($sell_item as $item)
                    <a class="sell-item-detail-link" href="{{ route('user.item_detail', ['item_id' => $item->id]) }}">
                        <img class="sell-item-img" src="/storage/items/{{$item->image_url}}">
                    </a>
                    @endforeach
                </div>
                @else
                <div class="sell-item-null">
                    <p class="sell-item-null-text">出品履歴はありません</p>
                </div>
                @endif
            </div>
            <div class="js-panel inactive_content">
                @if(!$purchase_item->isEmpty())
                <div class="purchase-item-detail">
                    @foreach($purchase_item as $item)
                    <a class="purchase-item-detail-link" href="{{ route('user.item_detail', ['item_id' => $item->id]) }}">
                        <img class="purchase-item-img" src="/storage/items/{{$item->image_url}}">
                    </a>
                    @endforeach
                </div>
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