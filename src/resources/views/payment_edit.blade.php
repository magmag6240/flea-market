@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/payment_edit.css') }}">
@endsection

@section('content')

<div class="payment-edit-content">
    <h1 class="payment-edit-title">支払方法の変更</h1>
    <form class="payment-edit-form" action="{{ route('user.payment_update', ['item_id' => $item->id]) }}" method="post">
        @csrf
        @method('patch')
        <div class="edit-group">
            <p class="edit-group-title">支払方法</p>
            @foreach($payments as $method)
            <label class="payment-label">
                <input class="input-payment" name="payment_id" type="radio" value="{{ $method->id }}">
                <span class="payment-method">{{ $method->method_name }}</span>
            </label>
            @endforeach
        </div>
        <button class="update-button" type="submit">更新する</button>
    </form>
</div>

@endsection