<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $order = Order::create([
            'table_id' => $request->table_id,
            'total_price' => $request->total,
        ]);

        $menuItems = Cart::where('user_id', auth()->id())->get();

        foreach ($menuItems as $item) {
            $order->orderItems()->create([
                'menu_item_id' => $item->menu_item_id,
                'quantity' => $item->quantity,
                'price' => $item->price
            ]);
        }

        Cart::where('user_id', auth()->id())->delete();

        return redirect()->route('menu')->with('success', "Order has been recorded. The kitchen has been notified.");
    }
}
