<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Menu;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $subTotal = $this->subTotal();
        return view('cart.index', [
            "carts" => Cart::where('user_id', auth()->id())->get(),
            "subTotal" => $subTotal
        ]);
    }
    public function add(Request $request)
    {
        log(auth()->id());
        $cart = Cart::where('menu_item_id', $request->menu_item_id);

        $cart->exists();
        if ($cart->exists()) {
            $cart = $cart->first();
            $cart->update([
                'quantity' => $cart->quantity + $request->quantity
            ]);
        } else {
            Cart::firstOrCreate([
                'user_id' => auth()->id(),
                'menu_item_id' => $request->menu_item_id,
                'quantity' => $request->quantity,
            ]);
        }
        ;


        $cartCount = count(Cart::where('user_id', auth()->id())->get());

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
        $cart = Cart::where('id', $request->id)->first();
        $cart->update([
            'quantity' => $request->quantity
        ]);

        $subTotal = $this->subTotal();

        return response()->json(['status' => 200, 'subTotal' => $subTotal]);
    }

    public function subTotal()
    {
        $carts = Cart::where('user_id', auth()->id())->get();
        $subTotal = 0;
        foreach ($carts as $cart) {
            $subTotal += $cart->quantity * $cart->menuItem->price;
        }

        return $subTotal;
    }
}
