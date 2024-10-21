<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CategoryController extends Controller
{
    // public function __construct(CategoryService $category_service)
    // {
    //     $this->authorizeResource(Category::class, 'category');
    //     $this->category_service = $category_service;
    // }

    public function index()
    {
        $categories =Category::all();
        return view('admin.categories', compact('categories'));
    }

    public function create(): View
    {
        return view('category.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name'=>'required',
            'slug'=>'required',
            'image'=>'required'
        ]);
        Category::create([
            'name'=>$request->input('name'),
            'slug'=>$request->input('slug'),
            'image'=>$request->input('image'),
        ]);
        return redirect()->route('admin.categories');
    }

    public function edit(Category $category): View
    {
        return view('category.edit', ['category' => $category]);
    }

    public function update(Request $request, Category $category): RedirectResponse
    {
        $request->validate([
            'name'=>'required',
            'slug'=>'required',  
            'image'=>'required'      
        ]);
        $category->update([
            'name'=>$request->name,
            'slug'=>$request->slug,  
            'image'=>$request->image         
        ]);
        return redirect()->route('admin.categories');
    }

    public function destroy(Category $category): RedirectResponse
    {
        $category->delete();
        return redirect()->route('category.index')->with('flash_message', 'Category successfully deleted!');
    }
}
