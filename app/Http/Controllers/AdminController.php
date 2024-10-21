<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Contactus;
use App\Models\Order;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }
    // public function adminDashboard()
    // {
    //     $paidOrdersByMonth = Order::where('status','paid')->groupBy('month')
    //     ->selectRaw('MONTH(created_at)as month,COUNT(*) as count')->get();
    //     //$data = [];
    //     return view('admin.index',compact('paidOrdersByMonth'));
    // }
    
    public function orders()
    {
        $orders=Order::all();
        return view('admin.orders',['orders'=>$orders]);
    }
    public function category()
    {
        $categories=Category::all();
        return view('admin.categories',['categories'=>$categories]);
    }
    public function user()
    {
        $users = User::where('utype', 'USR')->get(); // Fetch users with utype=USR
        return view('admin.users', ['users' => $users]);
    }
    
    public function post()
    {
        $post=Post::all();
        return view('admin.post',compact('post'));
    }
    public function activateUser(User $user)
    {
        $user->update(['active' => true]);
        return redirect()->route('admin.activate')->with('success', 'User activated successfully.');
    }
    
    public function deactivateUser(User $user)
    {
        $user->update(['active' => false]);
        return redirect()->back()->with('success', 'User deactivated successfully.');
    }
    public function contactus()
    {
        $contactuses=Contactus::all();
        return view('admin.contactus',['contactuses'=>$contactuses]);
    }
}