<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Menu;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }
    public function menu()
    {
        $specialCategoryId = Category::where('name', 'specials')->pluck('id')->first();
        $specialMenuItems = Menu::where('category_id', $specialCategoryId)->get();
        $menuItems = Menu::where('category_id','!=',$specialCategoryId)->filter(request(['search','category']));
        $categories = Category::all();

        return view('menu-page',[
            'specialMenuItems' => $specialMenuItems,
            'menuItems' => $menuItems->get(),
            'cartCount' => count(Cart::where('user_id',auth()->id())->get()),
            'categories' => $categories
        ]);
    }

    public function showMenuItem(Menu $menu)
    {
        $randomMenuItems = Menu::inRandomOrder()->limit(3)->get();
        $cartCount = count(Cart::where('user_id', auth()->id())->get());

        return view('menu-item',[
            'menuItem' => $menu,
            'randomMenuItems' => $randomMenuItems,
            'cartCount' => $cartCount,
        ]);
    }
}
