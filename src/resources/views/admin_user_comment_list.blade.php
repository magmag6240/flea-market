@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin_user_comment_list.css') }}">
@endsection

@section('content')

<div class="user-comment-list-content">
    <h1 class="user-comment-list-title">コメント一覧</h1>
    <table class="comment-list-table">
        <tr class="comment-list-tr">
            <th class="comment-list-th">id</th>
            <th class="comment-list-th">Comment</th>
            <th class="comment-list-th">Date</th>
        </tr>
        @foreach($comments as $comment)
        <tr class="comment-list-tr">
            <td class="comment-list-td">
                <p class="comment-list-id">{{$comment->id}}</p>
            </td>
            <td class="comment-list-td">
                <p class="comment-list-comments">{{$comment->comments}}</p>
            </td>
            <td class="comment-list-td">
                <p class="comment-list-date">{{$comment->created_at}}</p>
            </td>
            <form class="comment-delete-form" action="{{ route('admin.user_comment_delete', ['comment_id' => $comment->id]) }}" method="post">
                @csrf
                @method('delete')
                <td class="comment-list-td">
                    <button class="comment-delete-button">削除</button>
                </td>
            </form>
        </tr>
        @endforeach
    </table>
    <div class="user-comment-paginate">
        {{$comments->onEachSide(0)->links('vendor/pagination/admin_paginate')}}
    </div>
    <button class="user-list-button" type="button"><a class="user-list-link" href="/admin">戻る</a></button>
</div>

@endsection