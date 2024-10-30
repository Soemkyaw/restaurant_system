<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StoreMenuRequest;
use App\Http\Requests\UpdateMenuRequest;

class MenuController extends Controller
{
    public function index()
    {
        return view('admin.menu.index',[
            'menus' => Menu::latest()->get()
        ]);
    }

    public function create()
    {
        return view('admin.menu.create',[
            'categories' => Category::all()
        ]);
    }

    public function store(StoreMenuRequest $request)
    {
        // dd($request->file('image'));
        $attributes = $request->all();
        $attributes['image'] = $request->file('image')->store('menu-images','public');

        Menu::create($attributes);

        return redirect()->route('menus');
    }

    public function show(Menu $menu)
    {
        return view('admin.menu.show', compact('menu'));
    }

    public function edit(Menu $menu)
    {
        return view('admin.menu.edit',[
            'menu' => $menu,
            'categories' => Category::all()
        ]);
    }

    public function update(Menu $menu,UpdateMenuRequest $request)
    {
        $attributes = $request->all();

        if ($request->hasFile('image')) {
            $attributes['image'] = $request->file('image')->store('menu-images', 'public');
        }

        $menu->update($attributes);

        return redirect()->route('menus');
    }

    public function destroy(Menu $menu)
    {
        $menu->delete();

        return redirect()->route('menus');
    }
}
