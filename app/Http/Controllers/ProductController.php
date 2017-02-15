<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Bucket;
use App\Category;
use App\Product;
use Illuminate\Http\Request;

use Session;

class ProductController extends Controller
{
    public function assign_products_to_client()
    {
        $brands = Brand::orderBy('title')->get();
        $categories = Category::orderBy('title')->get();
        $products = Product::orderBy('part_no')->get();
        return view('/admin/clients/manage-product-list', compact('brands', 'categories', 'products'));
    }

    public function admin_index()
    {
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

    public function index($id, $part_no)
    {
        $items = Product::where('part_no',$part_no)->first();
        return view('user/item', compact('items'));
    }

    public function products($id, $brand, $category, Category $category_id)
    {
        $products = $category_id->product;
        return view('user/product', compact('products'));
    }

    public function getAddToBucket(Request $request, $id)
    {
        $product = Product::find($id);
        $oldBucket = Session::has('bucket') ? Session::get('bucket') : null;
        $bucket = new Bucket($oldBucket);
        $bucket->add($product, $product->id);

        $request->session()->put('bucket', $bucket);
        return redirect('user/brands');
    }

    public function show($slug)
    {
        $product = Product::where('part_no', $slug)->firstOrFail();
        $interested = Product::where('part_no', '!=', $slug)->get()->random(1);
        return view('product')->with(['product' => $product, 'interested' => $interested]);
    }
}
