<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Order;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function index()
    {
        $countItem = Item::all()->count();
        $countOrder = Order::all()->count();
        $countMP = Order::all()->where('status', '=', 'Menunggu Pembayaran')->count();
        $countSelesai = Order::all()->where('status', '=', 'Selesai')->count();

        return view('index', compact('countItem', 'countOrder', 'countMP', 'countSelesai'));
    }
}
