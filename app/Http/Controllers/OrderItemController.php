<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Session;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderItemController extends Controller
{
    public function index()
    {
        $orderItems=OrderItem::all();
        return view('orderitems',compact('orderItems'));
    }

    public function store(Request $request,$order)
    {
        $validatedData = $request->validate([
            'product_id'=>'required',
            'order_id'=>'required',
            'price'=>'required',
            'quantity'=>'required',
            'options'=>'nullable',
            'product_name'=>'required',
        ]);
        $cartItems = Cart::instance('cart')->content();

        foreach($cartItems as $item){
            $orderItem = new OrderItem();
            $orderItem ->order_id =$order->id;
            $orderItem ->product_id =$item['product_id'];
            $orderItem ->price =$item['price'];
            $orderItem ->quantity =$item['quantity'];
            $orderItem ->options =$item['options'];
            $orderItem ->product_name =$item['name'];
            $orderItem->save();
        }
        $orderItem->save();
        return redirect()->route('cart.thankyou');
    }
    
}
