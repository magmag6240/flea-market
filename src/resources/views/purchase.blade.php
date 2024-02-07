@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/purchase.css') }}">
@endsection

@section('content')

<div class="purchase-content">
    <form class="purchase-form" action="{{ route('user.purchase_store', ['item_id' => $item->id]) }}" method="post">
        @csrf
        @method('patch')
        <div class="purchase-form-edit">
            <div class="item-detail">
                <img class="item-img" src="{{ $item->image_url }}" alt="">
                <div class="item-detail-text">
                    <p class="item-name">{{ $item->name }}</p>
                    <p class="item-price">{{ $item->price }}</p>
                </div>
            </div>
            <div class="payment-method">
                <p class="payment-method-title">支払い方法</p>
                <a class="payment-edit-link" href="{{ route('user.payment_edit', ['item_id' => $item->id]) }}">変更する</a>
            </div>
            <div class="user-address">
                <p class="user-address-title">配送先</p>
                <a class="address-edit-link" href="{{ route('user.address_edit', ['item_id' => $item->id]) }}">変更する</a>
            </div>
        </div>
        <div class="purchase-form-confirm">
            <div class="confirm-content">
                <div class="confirm-item-price">
                    <p class="confirm-title">商品代金</p>
                    <p class="confirm-preview">{{ $item->price }}</p>
                </div>
                <div class="confirm-payment-amount">
                    <p class="confirm-title">支払い金額</p>
                    <p class="confirm-preview">{{ $item->price }}</p>
                </div>
                <div class="confirm-payment-method">
                    <p class="confirm-title">支払い方法</p>
                    <p class="confirm-preview">{{ $profile->payment->method_name }}</p>
                </div>
            </div>
            <button class="purchase-button" type="submit">購入する</button>
            <form class="stripe-form" action="{{route('stripe.store', ['item_id' => $item->id] )}}" method="post">
                @csrf
                <script src="https://checkout.stripe.com/checkout.js"
                    class="stripe-button" data-key="{{ env('STRIPE_KEY') }}"
                    data-amount="{{$item->price}}"
                    data-name="お支払い画面"
                    data-label="決済"
                    data-description="現在はデモ画面です"
                    data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                    data-locale="auto"
                    data-currency="JPY">
                </script>
            </form>
        </div>
    </form>
</div>

@endsection