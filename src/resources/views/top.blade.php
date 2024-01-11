@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')

<div class="top-content">
    <div class="js-tab">
        <div class="js-tab-group">
            <p class="js-tab active_tab">おすすめ</p>
            <p class="js-tab inactive_tab">マイリスト</p>
        </div>
        <div class="js-panel active_content">
            <div class="recommends">
                @foreach($recommends as $item)
                @endforeach
            </div>
        </div>
        <div class="js-panel inactive_content">
            @if(!$like->isEmpty())
            <div class="my-list">
                @foreach($my_list as $item)
                @endforeach
            </div>
            <div class="mylist-paginate">
                {{ $mylist->links() }}
            </div>
            @else
            <div class="mylist-null">
                <p class="mylist-null-text">お気に入りの商品が登録されていません</p>
            </div>
            @endif
        </div>
    </div>
</div>

@endsection