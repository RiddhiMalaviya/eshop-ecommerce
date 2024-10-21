<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banners=Banner::all();
        return view('admin.banners',['banners'=>$banners]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('banner.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'slug'=>'required',
            'image'=>'required',
            'description'=>'required',
            'status'=>'required',
        ]);
        
        Banner::create([
            'title'=>$request->input('title'),
            'slug'=>$request->input('slug'),
            'image'=>$request->input('image'),
            'description'=>$request->input('description'),
            'status'=>$request->input('status'),
        ]);
        return redirect()->route('admin.banners')->with('success','Banner Created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Banner $banner)
    {
        return view('banner.show',compact('banner'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Banner $banner)
    {
        return view('banner.edit',['banner'=>$banner]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Banner $banner)
    {
        $request->validate([
            'title'=>'required',
            'slug'=>'required',
            'image'=>'required',
            'description'=>'required',
            'status'=>'required',
        ]);
        
        $banner->update([
            'title'=>$request->title,
            'slug'=>$request->slug,
            'image'=>$request->image,
            'description'=>$request->description,
            'status'=>$request->status,
        ]);
        return redirect()->route('admin.banners')->with('success','Banner Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Banner $banner)
    {
        $banner->delete();
        return redirect()->route('admin.banners')->with('success','Banner Deleted successfully.');
    }
}
