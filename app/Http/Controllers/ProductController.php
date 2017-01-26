<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function admin_index(){
        $categories = Category::all();
//        $categories = Category::orderBy('title')->get();
        $products = Product::all();
        return view('/admin/products', compact('categories', 'products'));
    }

    public function store(Request $request)
    {
//        return $request->all();
        Product::create($request->all());
        return back();
    }

    public function index($category, Category $id)
    {
        $products = $id->product;
        return view('shop', compact('products'));
    }


    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        $interested = Product::where('slug', '!=', $slug)->get()->random(4);

        return view('product')->with(['product' => $product, 'interested' => $interested]);
    }
}
