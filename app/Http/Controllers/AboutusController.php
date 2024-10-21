<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Contactus;
use App\Models\Product;
use Illuminate\Http\Request;

class AboutusController extends Controller
{
    public function index()
    {
        return view('aboutus');
    }
    public function contactus()
    {
        return view('contactus');
    }  
    public function submitForm(Request $request)
    {
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required|email',
            'phone'=>'required',
            'comment'=>'required'
        ]);
        
        $contactus = new Contactus();
        $contactus->first_name=$request->input('first_name');
        $contactus->last_name=$request->input('last_name');
        $contactus->email=$request->input('email');
        $contactus->phone=$request->input('phone');
        $contactus->comment=$request->input('comment');
        $contactus->save();
        return redirect()->route('app.index')->with('success','Thank you for your message! We will be in rouch soon.');
    }
    public function blog()
    {
        return view('blog');
    }  
    public function blogDetails()
    {
        return view('blogDetails');
    }  
}
