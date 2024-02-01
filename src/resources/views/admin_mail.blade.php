@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin_mail.css') }}">
@endsection

@section('content')

<div class="mail-form">
    <h1 class="mail-form-title">新規メール作成</h1>
    <form class="form" method="post" action="{{ route('admin.mail.send', ['user_id' => $user->id]) }}">
        @csrf
        <table class="form-table">
            <tr class="form-table-tr">
                <td class="form-table-title">メール内容</td>
                <td class="form-table-td">
                    <textarea class="form-textarea" name="contents" id="contents" cols="30" rows="20" placeholder="Message"></textarea>
                </td>
            </tr>
        </table>
        <button class="form-button-submit" type="submit">送信</button>
    </form>
</div>

@endsection