@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')

<div class="top-content">
    <div class="top-tag">
        <p class="tag-recommend">おすすめ</p>
        <p class="tag-mylist"><a class="mylist-link" href="/mylist">マイリスト</a></p>
    </div>
    <div class="recommend-product-list">
        @foreach($recommend as $product)
        <div>
            
        </div>
        @endforeach
    </div>
</div>

@endsection