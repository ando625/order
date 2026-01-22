@extends('layouts.adminApp')

@section('css')
<link rel="stylesheet" href="{{ asset('css/kitchen.css')}}">
@endsection

@section('content')

<div class="kitchen-container">
    <h1 class="page-title">KITCHEN MONITOR</h1>

    <div class="orders-grid">
        @foreach ($orders as $order)
        <!-- ステータスごとにクラスを切り替え (pending/cooking) -->
        <div class="order-card status-{{ $order->status }}">
            <div class="order-card-header">
                <span class="order-number">#{{ $order->order_number }}</span>
                <span class="order-time">{{ $order->created_at->format('H:i') }}</span>
            </div>

            <div class="order-items">
                <ul>
                    @foreach ($order->items as $item)
                    <li>
                        <span class="item-name">
                            {{ $item->menu->name }}
                            @if($item->option)
                                ({{ $item->option}})
                            @endif
                        </span>
                        <span class="item-qty">× {{ $item->quantity }}</span>
                    </li>
                    @endforeach
                </ul>
            </div>

            <div class="order-actions">
                @if ($order->status === 'pending')
                <form method="post" action="{{ route('admin.kitchen.orders.start', $order) }}">
                    @csrf
                    <button class="btn btn-start">調理開始</button>
                </form>
                @endif

                @if ($order->status === 'cooking')
                <form method="post" action="{{ route('admin.kitchen.orders.ready', $order) }}">
                    @csrf
                    <button class="btn btn-ready">完成</button>
                </form>
                @endif
            </div>
            
            <div class="status-badge">{{ $order->status_label }}</div>
        </div>
        @endforeach
    </div>
</div>

<script>
    setInterval(() => {
        location.reload();
    }, 5000);
</script>

@endsection