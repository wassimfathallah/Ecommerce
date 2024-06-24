<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\product;
use Demo\Product as DemoProduct;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request, category $category)
    {
        $products = product::paginate(10);
        $categories = category::with('products')->has('products')->get();
        $searchTerm = $request->input('search_product');
        if (!empty($searchTerm)) {
            $products = product::where('name', 'like', "%$searchTerm%")->get();
        }
        $category_search = $request->input('category_search');
        if (!empty($category_search)) {

            $products = Product::where('category_id', $category_search)->get();
        }
        $min_price = $request->input('min_price');
        $max_price = $request->input('max_price');
        

        if (!empty($min_price)) {
            if($max_price==""){
                $max_price = Product::orderByDesc('price')->first('price');
                $max_price=($max_price['price']);
            }
            
            $products = Product::whereBetween('price', [$min_price, $max_price])->get();
        }
        return view('home', compact('products', 'categories'));
    }
}
