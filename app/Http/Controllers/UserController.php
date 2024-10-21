<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        $orders= Order::where('user_id',auth()->id())->get();
        $products =Product::all();
        $orderItems=OrderItem::all();
        $items = Cart::instance("wishlist")->content();
        return view('users.index',compact('users','orders','products','orderItems','items'));
    }
    public function profile()
    {
        $users = User::where('utype', 'USR')->get();
        $user=Auth::user();
        return view('users.profile',compact('user','users'));
    }
    public function activateUser($id)
    {
        $user = User::findOrFail($id);
        $user -> status =true;
        $user->save();
        return back()->with('status','User activared..');
    }
    public function deactivateUser($id)
    {
        $user = User::findOrFail($id);
        $user -> status =false;
        $user->save();
        return back()->with('status','User deactivared..');
    }
}