<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Menu;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function menu()
    {
        $specialCategoryId = Category::where('name', 'specials')->pluck('id')->first();
        $specialMenuItems = Menu::where('category_id', $specialCategoryId)->get();
        $menuItems = Menu::where('category_id','!=',$specialCategoryId)->get();
        $categories = Category::all();

        return view('menu-page',[
            'specialMenuItems' => $specialMenuItems,
            'menuItems' => $menuItems,
            'cartCount' => count(Cart::where('user_id',auth()->id())->get()),
            'categories' => $categories
        ]);
    }
}
