@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin_user_list.css') }}">
@endsection

@section('content')

<div class="user-list-content">
    <h1 class="user-list-title">ユーザーリスト</h1>
    <table class="user-list-table">
        <tr class="user-list-tr">
            <th class="user-list-th">id</th>
            <th class="user-list-th">Email</th>
        </tr>
        @foreach($users as $data)
        <tr class="user-list-tr">
            <td class="user-list-td">
                {{$data->id}}
            </td>
            <td class="user-list-td">
                {{$data->email}}
            </td>
            @if(!($data->comments)->isEmpty())
            <td class="user-list-td">
                <a href="{{ route('admin.user_comment_list', ['user_id' => $data->id]) }}">コメント一覧</a>
            </td>
            @else
            <td class="user-list-td">
                <a>コメント一覧</a>
            </td>
            @endif
            <td class="user-list-td">
                <a href="{{ route('admin.mail', ['user_id' => $data->id]) }}">メールフォーム</a>
            </td>
            <form action="{{ route('admin.user_delete', ['user_id' => $data->id]) }}" method="post">
                @csrf
                @method('delete')
                <td class="user-list-td">
                    <button class="user-delete-button" type="submit">ユーザー削除</button>
                </td>
            </form>
        </tr>
        @endforeach
    </table>
    <div class="user-paginate">
        {{$users->links()}}
    </div>
</div>

@endsection