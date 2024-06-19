<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Http\Requests\StorecategoryRequest;
use App\Http\Requests\UpdatecategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = category::query()->orderby('created_at', 'desc')->paginate(5);
        return view('categories',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorecategoryRequest $request)
    {
        $form_field = $request->validated();
        if ($request->hasFile('image')) {
            $form_field['image'] = $request->file('image')->store('categories/images', 'public');
        }
         category::create($form_field);
        return to_route('categories.index')->with('success', 'the product has been create!');
       }

    /**
     * Display the specified resource.
     */
    public function show(category $category)
    {
        $products = $category->products()->paginate(10);
         return view('products', compact('products'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(category $category)
    {
        return view('category_edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatecategoryRequest $request, category $category)
    {
        $form_field = $request->validated();
        if ($request->hasFile('image')) {
            $form_field['image'] = $request->file('image')->store('products/images', 'public');
        }

        $category->fill($form_field)->save();
        return to_route('categories.index')->with('seccess', 'the category has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(category $category)
    {

        $category->delete();
        return to_route('categories.index')->with('seccess', 'the product has been deleted !');
    }
}
