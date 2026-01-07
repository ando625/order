<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Carbon\Carbon;

class OrderController extends Controller
{
    //未受け渡し一覧
    public function index()
    {
        $orders = Order::with([
            'items.menu'
            ])
            ->where('status', '!=', 'handed')//受け渡し完了
            ->whereDate('created_at', Carbon::today())
            ->orderBy('created_at', 'asc')//古い順で並べるasc
            ->get();

        return view('admin.index', compact('orders'));
    }

    // 受け渡し一覧
    public function handed(Order $order)
    {
        $order->update([
            'status' => 'handed',
        ]);

        return redirect()->route('admin.index');
    }
}
