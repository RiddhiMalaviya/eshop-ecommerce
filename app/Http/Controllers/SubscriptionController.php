<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function subscribe(Request $request)
    {
        $request->validate([
            'email'=>'required',
        ]);
        Subscription::create([
            'email'=>$request->email,
        ]);
        return redirect()->back()->with('success','You Have Subscribed Successfully!');
    }
    public function index()
    {
        $subscriptions = Subscription::all();
        return view('subscribe.index', compact('subscriptions'));
    }
}
