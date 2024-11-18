<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Menu;
use App\Models\Table;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::where('user_id', auth()->id())->with('menuItem')->get();
        $subTotal = $this->subTotal($carts);
        return view('cart.index', [
            "carts" => $carts,
            "subTotal" => $subTotal,
            'tables' => Table::all(),
        ]);
    }
    public function add(Request $request)
    {
        $cart = Cart::where('menu_item_id', $request->menuItemId)->where('user_id',auth()->id())->with('menuItem');

        // $cart->exists();
        if ($cart->exists()) {
            $cart = $cart->first();
            $cart->update([
                'quantity' => $cart->quantity + $request->quantity
            ]);
        } else {
            Cart::firstOrCreate([
                'user_id' => auth()->id(),
                'menu_item_id' => $request->menuItemId,
                'quantity' => $request->quantity,
                'price' =>  $request->menuItemPrice,
            ]);
        }
        ;

        $cartCount = count(Cart::where('user_id', auth()->id())->with('menuItem')->get());

        return response()->json(['status' => 200, 'count' => $cartCount]);
    }

    public function destroy(Cart $cart)
    {
        $cart->delete();

        $subTotal = $this->subTotal();

        return response()->json(['status' => 200, 'subTotal' => $subTotal]);
    }

    public function update(Request $request)
    {
        $cart = Cart::where('id', $request->id)->with('menuItem')->first();
        $cart->update([
            'quantity' => $request->quantity
        ]);

        $subTotal = $this->subTotal();

        return response()->json(['status' => 200, 'subTotal' => $subTotal]);
    }

    public function subTotal($carts = null)
    {
        $carts = $carts ?? Cart::where('user_id', auth()->id())->with('menuItem')->get();
        $subTotal = 0;
        foreach ($carts as $cart) {
            $subTotal += $cart->quantity * $cart->menuItem->price;
        }

        return (int)$subTotal;
    }
}
