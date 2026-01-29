<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Menu;
use App\Models\Order;
use App\Models\OrderItem;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();

        $menus = Menu::where('is_active', true);

        if($request->filled('category')){
            $menus->where('category_id', $request->category);
        }

        $menus = $menus->get();

        return view('customer.menu', compact('categories','menus'));
    }

    public function cart()
    {
        return view('customer.cart');
    }

    public function store(Request $request)
    {
        $cart = $request->cart;

        // 注文を作成
        $order = Order::create([
            'total_price' => collect($cart)
                ->sum(fn($item)=>$item['price']*$item['quantity']),
        ]);

        //注文の詳細を保存
        foreach ($cart as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'menu_id' => $item['id'],
                'price' => $item['price'],
                'quantity' => $item['quantity'],
                'option' => $item['option'] ?? null,
            ]);

        }
        return response()->json(['success' => true]);
    }

    
}
