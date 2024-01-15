@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/top.css') }}">
@endsection

@section('content')

<div class="top-content">
    <div class="js-tab-panel">
        <div class="js-tab-panel-group">
            <p class="js-tab active_tab">おすすめ</p>
            <p class="js-tab inactive_tab">マイリスト</p>
        </div>
        <div class="js-panel active_content">
            @foreach($recommend_item as $product)
            <img class="recommend-product" src="{{$product->image_url}}">
            @endforeach
        </div>
        <div class="js-panel inactive_content">
            @foreach($mylist_item as $product)
            <img class="mylist-product" src="{{$product->image_url}}">
            @endforeach
        </div>
    </div>
</div>
<script src="{{ mix('js/tab.js') }}"></script>
@endsection