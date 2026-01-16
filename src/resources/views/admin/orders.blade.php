@extends('layouts.adminApp')

@section('css')
<link rel="stylesheet" href="{{asset('css/orders.css')}}">
@endsection

@section('content')

<div class="admin-history-container">
    <h1 class="page-title">注文履歴管理</h1>
    <h2 class="sub-title">
        @if ($mode === 'daily')
            <span class="highlight-gold">{{ $date }}</span> の注文履歴
        @else
            <span class="highlight-gold">{{ $month }}</span> の注文履歴
        @endif
    </h2>

    <form action="{{ route('admin.orders.history') }}" method="get" class="search-form">
    <div class="search-group">

        <div class="input-item">
            <label class="search-label">日付で見る</label>
            <input type="date"
                   name="date"
                   value="{{ request('date') }}"
                   class="search-input">
        </div>

        <div class="input-item">
            <label class="search-label">月で見る</label>
            <input type="month"
                   name="month"
                   value="{{ request('month') }}"
                   class="search-input">
        </div>

        <button type="submit" class="search-button">表示</button>
    </div>
</form>

    <div class="history-content">
    <div class="history-blocks-wrapper">
        @foreach ($orders as $order)
            <div class="order-block">
                <div class="order-block-header">
                    <div class="header-left">
                        <span class="order-id">#{{ $order->order_number }}</span>
                        <span class="order-date">{{ $order->created_at->format('Y/m/d H:i') }}</span>
                    </div>
                </div>

                <table class="order-items-table">
                    <thead>
                        <tr>
                            <th class="col-name">商品名</th>
                            <th class="col-qty">数量</th>
                            <th class="col-price">単価</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->items as $item)
                            <tr>
                                <td class="text-left">{{ $item->menu->name }}</td>
                                <td class="font-en">{{ $item->quantity }}</td>
                                <td class="font-en">¥{{ number_format($item->price) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="order-block-footer">
                    <span class="total-label">注文合計金額</span>
                    <span class="total-amount-value font-en">¥{{ number_format($order->total_price) }}</span>
                </div>
            </div>
        @endforeach
    </div>

    <div class="grand-total-section">
        <span class="grand-total-label">期間内売上総計</span>
        <span class="grand-total-value font-en">¥{{ number_format($totalSales) }}</span>
    </div>
</div>
</div>

@endsection