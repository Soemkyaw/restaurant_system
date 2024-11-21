<?php

namespace App\Http\Controllers;

use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderItemController extends Controller
{
    public function index()
    {
        $orderItems = OrderItem::whereNotIn('status', ['pending', 'served'])->with('menuItem', 'order.table')->paginate(10);

        return view('orders-items', [
            'orderItems' => $orderItems
        ]);
    }
    public function update(OrderItem $orderItem)
    {
        $orderItem->update([
            'status' => request('status')
        ]);

        return response()->json(['status' => 200, 'message' => 'The order item status has been changed to ' . $orderItem->status . '.', 'orderStatus' => $orderItem->status]);
    }
}
