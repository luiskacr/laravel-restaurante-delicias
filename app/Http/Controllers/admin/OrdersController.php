<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Contracts\View\View;

class OrdersController extends Controller
{
    /**
     * Display an Order index View
     *
     * @return View
     */
    public function index():View
    {
        return view('admin.orders.index')
            ->with('orders', Order::all());
    }

    /**
     * Display a specific Order View
     *
     * @param int $id
     * @return View
     */
    public function show(int $id):View
    {
        $order = Order::findOrFail($id);
        return view('admin.orders.show')
            ->with('order', $order)
            ->with('orderDetails', OrderDetail::where('order', '=', $order->id)->get());
    }
}
