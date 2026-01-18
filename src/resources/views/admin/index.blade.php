@extends('layouts.adminApp')


@section('css')
<link rel="stylesheet" href="{{asset('css/index.css')}}">
@endsection

@section('content')
<div class="admin-order-container">
    <h1 class="page-title">現在のオーダー状況</h1>

    <div class="order-grid">
        @foreach ($orders as $order)
        <div class="order-card status-{{ $order->status }}">
            <div class="order-header">
                <span class="order-number">
                    注文番号: #{{$order->order_number}}
                </span>
                <span class="order-time">
                    {{$order->created_at->format('H:i')}}
                </span>
                <span class="status-badge">
                    {{ $order->status_label }}
                </span>
            </div>

            <table class="order-table">
                <thead>
                    <tr>
                        <th class="col-name">商品名</th>
                        <th class="col-qty">数量</th>
                        <th class="col-price">金額</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->items as $item)
                    <tr>
                        <td class="col-name">{{$item->menu->name}}</td>
                        <td class="col-qty">{{$item->quantity}}</td>
                        <td class="col-price">¥{{number_format($item->price * $item->quantity)}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="order-footer">
                <div class="total-section">
                    <span class="total-label">合計金額</span>
                    <span class="total-value">
                        ¥{{ number_format($order->total_price) }}
                    </span>
                </div>

                <form action="{{route('admin.orders.handed', $order)}}" method="post">
                    @csrf
                    <button type="submit" class="done-button">受け渡し完了</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</div>


@endsection