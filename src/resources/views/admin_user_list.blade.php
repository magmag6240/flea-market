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
                <p class="user-list-id">{{$data->id}}</p>
            </td>
            <td class="user-list-td">
                <p class="user-list-email">{{$data->email}}</p>
            </td>
            <td class="user-list-td">
                <table class="user-link-table">
                    <tr class="user-link-tr">
                        @if(!($data->comments)->isEmpty())
                        <td class="user-link-td">
                            <a class="user-list-link-active" href="{{ route('admin.user_comment_list', ['user_id' => $data->id]) }}">コメント一覧</a>
                        </td>
                        @else
                        <td class="user-link-td">
                            <a class="user-list-link-inactive">コメント一覧</a>
                        </td>
                        @endif
                    </tr>
                    <tr class="user-link-tr">
                        <td class="user-link-td">
                            <a class="user-list-link-mail" href="{{ route('admin.mail', ['user_id' => $data->id]) }}">メールフォーム</a>
                        </td>
                    </tr>
                    <tr class="user-link-tr">
                        <td class="user-link-td">
                            <form class="user-list-form" action="{{ route('admin.user_delete', ['user_id' => $data->id]) }}" method="post">
                                @csrf
                                @method('delete')
                                <button class="user-delete-button" type="submit">ユーザー削除</button>
                            </form>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        @endforeach
    </table>
    <div class="user-paginate">
        {{$users->onEachSide(0)->links('vendor/pagination/admin_paginate')}}
    </div>
</div>

@endsection