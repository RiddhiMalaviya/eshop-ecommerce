<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.products',['products'=>$products]);
    }
    public function create()
    {
        $categories=Category::all();
        $brands=Brand::all();
        return view('product.create',compact('categories','brands'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'slug'=>'required',
            'category'=>'required',
            'brand'=>'required',
            'short_description'=>'required',
            'description'=>'required',
            'regular_price'=>'required|numeric',
            'sale_price'=>'required|numeric',
            'SKU'=>'required',
            'stock_status'=>'required',
            'quantity'=>'required|integer|min:0',
            'image'=>'required',
            'images'=>'required',
        ]);
        
        $products=new Product();
        $products->name = $request->input('name');
        $products->slug = $request->input('slug');
        $products->category = $request->input('category_name');
        $products->brand = $request->input('brand_name');
        $products->short_description =  $request->input('short_description');
        $products->description =  $request->input('description');
        $products->regular_price =  $request->input('regular_price');
        $products->sale_price =  $request->input('sale_price');
        $products->SKU = $request->input('SKU');
        $products->stock_status =  $request->input('stock_status');
        $products->quantity =  $request->input('quantity');
        $products->image =  $request->input('image');
        $products->images =  $request->input('images');
        $products->save();
        return redirect()->route('admin.products')->with('success','Product Created successfully.');
    }
    public function edit(Product $product)
    {
        return view('product.edit',['product'=>$product]);
    }
    public function update(Request $request,Product $product)
    {
        $request->validate([
            'name'=>'required',
            'slug'=>'required',
            'short_description'=>'required',
            'description'=>'required',
            'regular_price'=>'required|numeric',
            'sale_price' => 'required|numeric',
            'SKU'=>'required',
            'stock_status'=>'required',
            'quantity'=>'required|integer|min:0',
            'image'=>'required',
            'images'=>'required',
        ]);
        
        $product->update([
            'name'=>$request->name,
            'slug   '=>$request->slug  ,
            'short_description' => $request->short_description,
            'description' => $request->description,
            'regular_price' => $request->regular_price,
            'sale_price' => $request->sale_price,
            'SKU'=>$request->SKU,
            'stock_status' => $request->stock_status,
            'quantity' => $request->quantity,
            'image' => $request->image,
            'images' => $request->images,
        ]);
        return redirect()->route('admin.products')->with('success','Product Updated successfully.');
    }
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index')->with('success','Product deleted successfully.');
    }
    
}
