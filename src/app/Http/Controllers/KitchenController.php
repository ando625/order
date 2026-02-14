<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Carbon\Carbon;

class KitchenController extends Controller
{
    public function index()
    {
        // 今日の注文だけを取得する（前日の残りが出ないように）
        $today = Carbon::today();

        $orders = Order::with('items.menu')
            ->whereIn('status', ['pending', 'cooking', 'ready'])
            ->whereDate('created_at', $today)
            ->orderBy('created_at')
            ->get();

        return view('kitchen.orders', compact('orders'));
    }

    //ステータス変更（調理開始）
    public function start(Order $order)
    {
        $order->update([
            'status' => 'cooking',
        ]);

        return back();
    }

    public function ready(Order $order)
    {
        $order->update([
            'status' => 'ready',
        ]);

        return back();
    }
}
