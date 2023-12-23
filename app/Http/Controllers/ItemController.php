<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Item::paginate(10);
        return view('items.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('items.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'item_id' => 'required|numeric|digits:16',
            'nama' => 'required|string|min:3',
            'harga' => 'required|numeric|min:1',
            'stok' => 'required|numeric|min:1',
        ]);

        $item = Item::create([
            'id' => $validated['item_id'],
            'nama' => $validated['nama'],
            'harga' => $validated['harga'],
            'stok' => $validated['stok'],
        ]);

        return redirect()->route('items.index')->with('success', 'Item added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        return view('items.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        return view('items.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $item)
    {
        $validated = $request->validate([
            'item_id' => 'required|numeric|digits:16',
            'nama' => 'required|string|min:3',
            'harga' => 'required|numeric|min:1',
            'stok' => 'required|numeric|min:1',
        ]);

        $item->update([
            'id' => $validated['item_id'],
            'nama' => $validated['nama'],
            'harga' => $validated['harga'],
            'stok' => $validated['stok'],
        ]);

        return redirect()->route('items.index')->with('success', 'Item updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        $item->delete();
        return redirect()->route('items.index')->with('success', 'Item deleted successfully.');
    }
}
