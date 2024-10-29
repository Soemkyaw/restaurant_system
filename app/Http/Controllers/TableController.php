<?php

namespace App\Http\Controllers;

use App\Models\Table;
use Illuminate\Http\Request;

class TableController extends Controller
{
    public function index()
    {
        return view('admin.tables.index',[
            'tables' => Table::latest()->get()
        ]);
    }

    public function create()
    {
        return view('admin.tables.create');
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => ['required','min:2'],
            'seat' => ['required','numeric']
        ]);

        Table::create($attributes);

        return redirect()->route('tables');
    }

    public function edit(Table $table)
    {
        return view('admin.tables.edit', compact('table'));
    }

    public function update(Table $table,Request $request)
    {
        $attributes = $request->validate([
            'name' => ['required', 'min:2'],
            'seat' => ['required']
        ]);

        $table->update($attributes);

        return redirect()->route('tables');
    }

    public function destroy(Table $table)
    {
        // dd($table->name);
        $table->delete();

        return redirect()->route('tables');
    }
}
