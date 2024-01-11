@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')

<div class="js-tab-panel">
    <div class="js-tab-panel-group">
        <p class="js-tab active_tab">おすすめ</p>
        <p class="js-tab inactive_tab">マイリスト</p>
    </div>
    <div class="js-panel active_content">
        @if(!$reserve_shops_from_now_on->isEmpty())
        <div class="reserve-detail">
            @foreach($reserve_shops_from_now_on as $item)
            <form class="reserve-delete" action="{{route('reserve.destroy', ['reserve_id' => $item->id ])}}" method="post">
                @method('DELETE')
                @csrf
                <div class="reserve-detail-title">
                    <p class="reserve-number">予約{{$item->id}}</p>
                    @if(is_null($item->menu_id))
                    <button class="reserve-delete-button" type="submit" onclick='return confirm("予約を削除しますか？")'></button>
                    @endif
                </div>
            </form>
            <table class="reserve-table">
                <tr class="reserve-table-tr">
                    <td class="reserve-table-td">Shop</td>
                    <td class="reserve-table-td">{{$item->shop->shop_name}}</td>
                </tr>
                <tr class="reserve-table-tr">
                    <td class="reserve-table-td">Date</td>
                    <td class="reserve-table-td">{{$item->reserve_date}}</td>
                </tr>
                <tr class="reserve-table-tr">
                    <td class="reserve-table-td">Time</td>
                    <td class="reserve-table-td">{{$item->start_time}}</td>
                </tr>
                <tr class="reserve-table-tr">
                    <td class="reserve-table-td">Number</td>
                    <td class="reserve-table-td">{{$item->number}}人</td>
                </tr>
                <tr class="reserve-table-tr">
                    <td class="reserve-table-td">Menu</td>
                    @if(is_null($item->menu_id))
                    <td class="reserve-table-td">座席のみのご予約</td>
                    @else
                    <td class="reserve-table-td">コースプランあり</td>
                    @endif
                </tr>
                <tr class="reserve-table-tr">
                    <td class="reserve-table-td">QR code</td>
                    <td class="reserve-table-td">{{QrCode::generate($item->id)}}</td>
                </tr>
            </table>
            @if(is_null($item->menu_id))
            <button class="reserve-edit-button"><a class="reserve-edit-link" href="{{route('reserve.edit', ['reserve_id' => $item->id ])}}">予約内容変更</a></button>
            @endif
            @endforeach
        </div>
        <div class="reserve-paginate">
            {{ $reserve_shops_from_now_on->links() }}
            全{{ $reserve_shops_from_now_on->total() }}件中{{ $reserve_shops_from_now_on->currentPage() }}件目
        </div>
        @else
        <div class="reserve-null">
            <p class="reserve-null-text">予約予定はありません</p>
        </div>
        @endif
    </div>
    <div class="js-panel inactive_content">
        @if(!$reserve_shops_history->isEmpty())
        <div class="reserve-detail">
            @foreach($reserve_shops_history as $item)
            <div class="reserve-detail-title">
                <p class="reserve-number">予約{{$item->id}}</p>
            </div>
            <table class="reserve-table">
                <tr class="reserve-table-tr">
                    <td class="reserve-table-td">Shop</td>
                    <td class="reserve-table-td">{{$item->shop->shop_name}}</td>
                </tr>
                <tr class="reserve-table-tr">
                    <td class="reserve-table-td">Date</td>
                    <td class="reserve-table-td">{{$item->reserve_date}}</td>
                </tr>
                <tr class="reserve-table-tr">
                    <td class="reserve-table-td">Time</td>
                    <td class="reserve-table-td">{{$item->start_time}}</td>
                </tr>
                <tr class="reserve-table-tr">
                    <td class="reserve-table-td">Number</td>
                    <td class="reserve-table-td">{{$item->number}}人</td>
                </tr>
                <tr class="reserve-table-tr">
                    <td class="reserve-table-td">Menu</td>
                    @if(is_null($item->menu_id))
                    <td class="reserve-table-td">座席のみのご予約</td>
                    @else
                    <td class="reserve-table-td">コースプランあり</td>
                    @endif
                </tr>
                <tr class="reserve-table-tr">
                    <td class="reserve-table-td">QR code</td>
                    <td class="reserve-table-td">{{QrCode::generate($item->id)}}</td>
                </tr>
            </table>
        </div>
        @endforeach
        <div class="reserve-history-paginate">
            {{ $reserve_shops_history->links() }}
            全{{ $reserve_shops_history->total() }}件中{{ $reserve_shops_history->currentPage() }}件目
        </div>
    </div>
    @else
    <div class="reserve-history-null">
        <p class="reserve-history-null-text">予約履歴はありません</p>
    </div>
    @endif
</div>

@endsection