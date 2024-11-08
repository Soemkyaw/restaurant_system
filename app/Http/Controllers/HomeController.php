<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Menu;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function recipes()
    {
        return view('menu-page',[
            'recipes' => Menu::all(),
            'cartCount' => count(Cart::where('user_id',auth()->id())->get())
        ]);
    }
}
