<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::all();
        return view('admin.review',compact('reviews'));
    }
    public function edit(Review $review)
    {
        return view('admin.reviews.edit',compact('review'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'rating'=>'required|integer|between:1,5',
            'comments'=>'required|string',
        ]);
        $review=new Review();
        $review->name=$request->input('name');
        $review->email=$request->input('email');
        $review->rating=$request->input('rating');
        $review->comments=$request->input('comments');
        $review->save();
        $product_id=$request->input('product_id');
        $product = Product::find($product_id);
        $product->updateRatingPercentage();
        return redirect()->back()->with('success','review submitted successfully.');
    }
    public function update(Request $request,Review $review)
    {
        $review->update($request->all());
        return redirect()->route('admin.reviews.index');
    }
    public function destroy(Review $review)
    {
        $review -> delete();
        return redirect()->route('admin.reviews.index');
    }
}
