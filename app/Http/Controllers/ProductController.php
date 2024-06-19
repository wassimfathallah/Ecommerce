<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Http\Requests\StoreproductRequest;
use App\Http\Requests\UpdateproductRequest;
use App\Models\category;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = product::query()->orderby('created_at', 'desc')->paginate(2);
        $categories = category::all();

         return view('products',compact('products','categories'));  
          }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = category::all();
        $sizes=['S', 'M', 'L', 'XL'];
        $colors=['Black', 'Red', 'Bleu', 'White', 'Grey'];
           return view("product_create",compact('categories','sizes','colors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreproductRequest $request)
    {
         $form_field = $request->validated();
 
        if ($request->hasFile('image')) {
            $form_field['image'] = $request->file('image')->store('products/images', 'public');
        }

        Product::create($form_field);

        return to_route('products.index')->with('seccess', 'the product has been create!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('product_show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = category::all();
        $sizes=['S', 'M', 'L', 'XL'];
        $colors=['Black', 'Red', 'Bleu', 'White', 'Grey'];
        return view('product_edit', compact('product','categories','sizes','colors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $form_field = $request->validated();
        if ($request->hasFile('image')) {
            $form_field['image'] = $request->file('image')->store('products/images', 'public');
        }

        $product->fill($form_field)->save();
        return to_route('products.index')->with('seccess', 'the product has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return to_route('products.index')->with('seccess', 'the product has been deleted !');
    }
}
