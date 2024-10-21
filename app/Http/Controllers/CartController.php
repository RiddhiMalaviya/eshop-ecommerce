<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = Cart::instance('cart')->content(); 
        return view('cart',['cartItems'=>$cartItems]);
    }
    public function addToCart(Request $request)
    {
        print_r($request->all());
        $product = Product::find($request->id);
        $price =  $product->sale_price ? $product->sale_price : $product->regular_price;
        Cart::instance('cart')->add($product->id,$product->name,$request->quantity,$price)->associate('App\Models\Product');
        return redirect()->back()->with('message','Success ! Item has been added successfully !');
    }
    public function updateCart(Request $request)
    {
        Cart::instance('cart')->update($request->rowId,$request->quantity);
        return redirect()->route('cart.index');
    }
    public function removeItem(Request $request)
    {
        $rowId = $request->rowId;
        Cart::instance('cart')->remove($rowId);
        return redirect()->route('cart.index');
    }
    public function clearCart()
    {
        Cart::instance('cart')->destroy();
        return redirect()->route('cart.index');
    }
    public function checkout()
    {
        return view('checkout');
    }
    public function thankyou()
    {
        $orders=Order::all();
        $orderItems =OrderItem::all();
        // $cartItems = Cart::instance('cart')->content();
        return view('thankyou',['orderItems'=>$orderItems,'orders'=>$orders]);
    }
    public function applyCoupon(Request $request)
    {
        $couponCode = $request->input('coupon_code');
        $coupon = Coupon::where('coupon_code',$couponCode)->first();
        if($coupon){
            $discount =$coupon->discount;
            foreach(Cart::instance('cart')->content() as $item)
            {
                $item->price = $item->price - ($item->price * $discount / 100);
            }
            return redirect()->route('cart.index')->with('success','Coupon applied successfully.');
        }else{
            return redirect()->route('cart.index')->with('error','Coupon code is invalid.');
        }
    }
}

