<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coupons=Coupon::all();
        return view('admin.coupon',compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('coupon.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'coupon_code'=>'required',
            'type'=>'required',
            'value'=>'required',
            'expiry_date'=>'nullable',
            'status'=>'required'
        ]);
        Coupon::create([
            'coupon_code'=>$request->input('coupon_code'),
            'type'=>$request->input('type'),
            'value'=>$request->input('value'),
            'expiry_date'=>$request->input('expiry_date'),
            'status'=>$request->input('status'),
        ]);
        return redirect()->route('admin.coupons');
    }

    /**
     * Display the specified resource.
     */
    public function show(Coupon $coupon)
    {
        return view('admin.coupon',compact('coupon'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Coupon $coupon)
    {
        return view('coupon.edit',['coupon'=>$coupon]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Coupon $coupon)
    {
        $request->validate([
            'coupon_code'=>'required',
            'type'=>'required',
            'value'=>'required',
            'expiry_date'=>'nullable',
            'status'=>'required'
        ]);
        $coupon->update($request->all());
        return redirect()->route('admin.coupons');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Coupon $coupon)
    {
        $coupon->delete();
        return redirect()->route('admin.coupons');
    }
}
