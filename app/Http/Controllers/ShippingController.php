<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shipping;

class ShippingController extends Controller
{
    public function store(Request $request,$orderId)
    {
        $request->validate([
            'order_id'=>'required',
            's_name'=>'required',
            's_phone'=>'required',
            's_locality'=>'required',
            's_landmark'=>'required',
            's_address'=>'required',
            's_city'=>'required',
            's_country'=>'required',
            's_state'=>'required',
            's_zip'=>'required',
            's_type'=>'required'
        ]);
        $shipping = Shipping::create([
            'order_id'=>$orderId,
            'name'=>$request->input('s_name'),
            'phone'=>$request->input('s_phone'),
            'locality'=>$request->input('s_locality'),
            'landmark'=>$request->input('s_landmark'),
            'address'=>$request->input('s_address'),
            'city'=>$request->input('s_city'),
            'country'=>$request->input('s_country'),
            'state'=>$request->input('s_state'),
            'zip'=>$request->input('s_zip'),
            'type'=>$request->input('s_type'),
        ]);
        $shipping->save();
        return redirect()->route('cart.thankyou');
    }
    
}
