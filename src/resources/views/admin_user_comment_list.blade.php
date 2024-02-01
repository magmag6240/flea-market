@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/user_comment_list.css') }}">
@endsection

@section('content')

<div class="user-comment-list-content">
    <h1 class="user-comment-list-title">コメント一覧</h1>
    <table class="comment-list-table">
        <tr class="comment-list-tr">
            <th class="comment-list-th">id</th>
            <th class="comment-list-th">Comment</th>
            <th class="comment-list-th">Item</th>
            <th class="comment-list-th">Date</th>
        </tr>
        @foreach($comments as $comment)
        <tr class="comment-list-tr">
            <td class="comment-list-td">
                {{$comment->id}}
            </td>
            <td class="comment-list-td">
                {{$comment->comments}}
            </td>
            <td class="comment-list-td">
                {{$comment->item->name}}
            </td>
            <td class="comment-list-td">
                {{$comment->created_at}}
            </td>
            <form class="comment-delete-form" action="{{ route('admin.user_comment_delete', ['comment_id' => $comment->id]) }}" method="post">
                @csrf
                @method('delete')
                <td class="comment-list-td">
                    <button class="comment-delete-button">コメント削除</button>
                </td>
            </form>
        </tr>
        @endforeach
    </table>
    <button class="user-list-button" type="button"><a class="user-list-link" href="/admin">戻る</a></button>
</div>

@endsection