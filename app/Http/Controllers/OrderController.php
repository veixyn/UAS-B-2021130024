<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function order()
    {
        $items = Item::all();
        return view('order', compact('items'));
    }

    public function createOrder(Request $request)
    {
        $validated = $request->validate([
            'status' => 'required|string',
            'items' => 'required|array',
            'items.*.item_id' => 'required|exists:items,id',
            'items.*.quantity' => 'required|integer|min:1',
        ]);

        $order = Order::create([
            'status' => $validated['status'],

        ]);

        foreach ($request->input('items') as $item) {
            $itemId = $item['item_id'];
            $quantity = $item['quantity'];

            // Cek stok
            $availableStock = Item::find($itemId)->stok;

            if ($availableStock < $quantity) {
                return redirect()->route('order')->with('error', 'Stok habis / tidak mencukupi.' . $itemId);
            }

            $order->items()->attach($itemId, ['quantity' => $quantity]);

            $item = Item::find($itemId);
            $item->stok -= $quantity;
            $item->save();
        }

        return redirect()->route('orderList')->with('success', 'Order Placed.');
    }

    public function orderList()
    {
        $orders = Order::paginate(10);
        return view('list', compact('orders'));
    }

    public function orderDetail(Order $order)
    {
        $orderDetails = Order::join('order_item', 'orders.id', '=', 'order_item.order_id')
            ->join('items', 'order_item.item_id', '=', 'items.id')
            ->where('orders.id', $order->id)
            ->get(['order_item.item_id', 'order_item.quantity', 'items.nama', 'items.harga']);

        $total = 0;
        foreach ($orderDetails as $detail) {
            $total += $detail->quantity * $detail->harga * 1.11;
        }

        return view('detail', compact('order', 'orderDetails', 'total'));
    }
}
