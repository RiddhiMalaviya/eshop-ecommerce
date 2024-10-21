<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::all();
        return view('admin.brand',['brands'=>$brands]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('brand.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request ->validate([
            'name'=>'required',
            'slug'=>'required',
            'image'=>'required',
        ]);
        Brand::create([
            'name'=>$request->input('name'),
            'slug'=>$request->input('slug'),
            'image'=>$request->input('image'),
        ]);
        return redirect()->route('admin.brand')->with('success','Brand Created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        return view('brand.show',compact('brands'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        return view('brand.edit',['brand'=>$brand]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brand $brand)
    {
        $request ->validate([
            'name'=>'required',
            'slug'=>'required',
            'image'=>'required',
        ]);
        $brand->update([
            'name'=>$request->input('name'),
            'slug'=>$request->input('slug'),
            'image' => $request->input('image'),
        ]);
        return redirect()->route('admin.brand')->with('success','Brand Updated successfully.'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        $brand -> delete();
        return redirect()->route('admin.brand')->with('success','Brand Deleted successfully.'); 
    }
}
