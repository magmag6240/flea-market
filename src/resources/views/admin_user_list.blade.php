@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin_user_list.css') }}">
@endsection

@section('content')

<div class="search-content">
    <h1 class="search-title">「{{$keyword}}」の検索結果</h1>
    <div class="search-result-list">
        @foreach($recommend_items as $item)
        <a class="search-item-detail-link" href="{{ route('user.item_detail', ['item_id' => $item->id]) }}">
            <img class="search-item-img" src="{{$item->image_url}}">
        </a>
        @endforeach
    </div>
</div>

@endsection