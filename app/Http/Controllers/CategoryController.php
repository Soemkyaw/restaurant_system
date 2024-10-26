<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.category.index',[
            'categories' => Category::latest()->get()
        ]);
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => ['required', 'min:3']
        ]);
        Category::create($attributes);

        return redirect()->route('categories');
    }

    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    public function update(Category $category,Request $request)
    {
        $attributes = $request->validate([
            'name' => ['required', 'min:3', 'max:100']
        ]);
        // $attributes['slug'] = Str::slug($attributes['name']);

        $category->update($attributes);

        return redirect()->route('categories');
    }

    public function destory(Category $category)
    {
        $category->delete();

        return redirect()->route('categories');
    }
}
