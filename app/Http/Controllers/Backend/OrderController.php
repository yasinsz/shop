<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Order;
use App\OrderItem;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(OrderItem $orderItem)
    {
        $order = request()->user()->orders()->get();
        $orderItem = request()->user()->orders()->get();

        return view('backend/orders/index', [
            'orders' => $order,
            'orderItems' => $orderItem
        ]);
    }

    public function show(Order $order, OrderItem $orderItem)
    {
        return view('admin.orders.show', $order, $orderItem);
    }
}
