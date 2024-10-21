<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('admin.orders',['orders'=>$orders]);
    }
    public function createOrder(Request $request)
    {
        $orderData=$request->all();
        $order = Order::create($orderData);
        $coupon = Coupon::find($request->input('coupon_id'));
        $order->coupon()->associate($coupon);
        $order->save();
    }
    public function getOrderDetails($orderId)
    {
        $order = Order::findOrFail($orderId);
        $coupon = $order->coupon;
        return view('admin.orders');
    }
}
