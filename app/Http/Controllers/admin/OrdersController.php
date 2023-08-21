<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index()
    {
        return view('admin.orders.index')
            ->with('orders', Order::all());
    }

    public function show(int $id)
    {
        $order = Order::findOrFail($id);
        return view('admin.orders.show')
            ->with('order', $order)
            ->with('orderDetails', OrderDetail::where('order', '=', $order->id)->get());
    }
}
