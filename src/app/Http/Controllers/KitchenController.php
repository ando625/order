<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class KitchenController extends Controller
{
    public function index()
    {
        $orders = Order::with('items.menu')
            ->whereIn('status', ['pending', 'cooking', 'ready'])
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
