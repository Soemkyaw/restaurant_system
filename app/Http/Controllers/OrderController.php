<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('status', '!=', 'paid')->with('table','orderItems.menuItem')->get();
        return view('order.index',compact('orders'));
    }
    public function store(Request $request)
    {
        $order = Order::where('table_id', $request->table_id)->where('status', '!=', 'paid')->first();
        $menuItems = Cart::where('user_id', auth()->id())->get();

        if ($order) {
            $order->update([
                'total_price' => $order->total_price + $request->subTotal
            ]);
            foreach ($menuItems as $item) {
                $order->orderItems()->create([
                    'menu_item_id' => $item->menu_item_id,
                    'quantity' => $item->quantity,
                    'price' => $item->price
                ]);
            }
        }else{
            $order = Order::create([
                'table_id' => $request->table_id,
                'total_price' => $request->subTotal,
            ]);

            $menuItems = Cart::where('user_id', auth()->id())->get();

            foreach ($menuItems as $item) {
                $order->orderItems()->create([
                    'menu_item_id' => $item->menu_item_id,
                    'quantity' => $item->quantity,
                    'price' => $item->price
                ]);
            }
        }

        Cart::where('user_id', auth()->id())->delete();

        return redirect()->route('menu')->with('success', "Order has been recorded. The kitchen has been notified.");
    }

    public function show(Order $order)
    {
        // dd($order->orderItems);
        $orderItems = $order->orderItems;
        return view('order.show',compact('orderItems'));
    }

    public function update(Order $order)
    {
        $order->update([
            'status' => request()->status
        ]);

        return response()->json(['status' => 200,'message' => 'The order status has been changed to ' . $order->status . '.','orderStatus'=>$order->status]);

    }


    public function printBill(Order $order)
    {
        return view('order.bill',compact('order'));
    }

    public function orderItems()
    {
        $orderItems = OrderItem::whereNotIn('status', ['pending', 'served'])->with('menuItem','order.table')->paginate(10);

        return view('orders-items', [
            'orderItems' => $orderItems
        ]);
    }
}
