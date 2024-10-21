<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class CheckoutController extends Controller
{
    
    public function index()
    {
        return view('checkout');
    }
    public function processCheckout(Request $request)
    {
        $validatedData = $request->validate([
            'billing_name'=>['required','string'],
            'shipping_address'=>['required','string'],
            'payment_method'=>['required','string','in:cod,debit'],
        ]);
        return redirect()->route('thankyou')->with('success !','checkout process successful');
    }
    public function thankyou()
    {
        return view('thankyou');
    }
}
