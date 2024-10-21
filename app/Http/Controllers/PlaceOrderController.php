<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Shipping;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Cart;
class PlaceOrderController extends Controller
{
    public function store(Request $request)
    {
        // echo '<pre>';
        // print_r($request->all());die;
        $validatedData = $request->validate([
            'user_id',
            'name'=>'required',
            'phone'=>'required',
            'locality'=>'required',
            'address'=>'required',
            'city'=>'required',
            'state'=>'required',
            'country'=>'required',
            'landmark'=>'required',
            'zip'=>'required',
            'is_shipping_different'=>'nullable',
            'delivered_date'=>'nullable',
            'canceled_date'=>'nullable',
        ]);

        $cartItems = Cart::instance('cart')->content(); 

        $subtotal=Cart::instance('cart')->subtotal() ;
        $tax=Cart::instance('cart')->tax() ; 
        $total=Cart::instance('cart')->total() ; 

        $order = new Order();
        $order->user_id = auth()->user()->id;
        $validatedData['subtotal'] = $subtotal;
        $validatedData['discount'] = 10;
        $validatedData['tax'] = $tax;
        $validatedData['total'] = $total;
        $order->fill($validatedData);
        $order->save();

        $shipping = new Shipping();
        $shipping->order_id=$order->id;
        $shipping->fill($validatedData);
        $shipping->save();
        
        // $cartItems = $request->session()->get('cart');

        foreach($cartItems as $item){ 

            $order->orderItem()->create([
                'product_id' => $item->id,
                'quantity' => $item->qty,
                'product_name' => $item->name,
                'price' => $item->price,
            ]);
            // $orderItem = new OrderItem();
            // $orderItem->order_id = $order->id;
            // $orderItem->product_id= $item->id;
            // $orderItem->quantity= $item['quantity'];
            // $orderItem->price= $item['price'];
            // $orderItem->rstatus= $item['rstatus'];
            // $orderItem->save(); 
        }

        Cart::instance('cart')->destroy();
        
        $transaction=new Transaction();
        $transaction->user_id=auth()->user()->id;
        $transaction->order_id=$order->id;
        // $transaction->mode = $request->input('payment_mode');
        $transaction->status='pending';
        $transaction->save();

        return redirect()->route('cart.thankyou');
    }
}
