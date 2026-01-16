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
            'items.menu'])
            ->whereIn('status', ['pending', 'cooking', 'ready'])//受け渡し完了
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


    public function history(Request $request)
    {
        // 日付が来ていたら「日別」
        if ($request->filled('date')) {

            $date = $request->input('date');

            $orders = Order::with('items.menu')
                ->whereDate('created_at', $date)
                ->orderBy('created_at')
                ->get();

            $totalSales = $orders->sum('total_price');

            return view('admin.orders', [
                'orders' => $orders,
                'mode' => 'daily',
                'date' => $date,
                'totalSales' => $totalSales,
            ]);
        }

        // 月別（デフォルト）
        $month = $request->input('month', now()->format('Y-m'));

        $orders = Order::with('items.menu')
            ->whereBetween('created_at', [
                Carbon::parse($month)->startOfMonth(),
                Carbon::parse($month)->endOfMonth(),
            ])
            ->orderBy('created_at')
            ->get();

        $totalSales = $orders->sum('total_price');

        return view('admin.orders', [
            'orders' => $orders,
            'mode' => 'monthly',
            'month' => $month,
            'totalSales' => $totalSales,
        ]);
    }


}
