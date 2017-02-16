<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Bucket;
use App\Category;
use App\Product;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Session;

class ProductController extends Controller
{
    public function delete(Product $id)
    {
        $id->update(['status' => 0]);
        return back();
    }

    public function update(Request $request)
    {
        $product = Product::find($request->id);
        $image = $request->hasFile('image') ? 'storage/' . Storage::disk('local')->put('/products', $request->file('image')) : null;
        $product->update(['part_no' => $request->part_no, 'category_id' => $request->category_id, 'description' => $request->description,
            'image' => $image, 'user_id' => $request->user_id, 'default_price'=> $request->default_price]);

        return redirect('/admin/products');
    }

    public function edit(Product $id)
    {
        $products = Product::where('status', 1)->get();
        $categories = Category::where('status', 1)->get();
        return view('/admin/products', compact('categories', 'products', 'id'));
    }

    public function assign_products_to_client()
    {
        $brands = Brand::orderBy('title')->get();
        $categories = Category::orderBy('title')->get();
        $products = Product::orderBy('part_no')->get();
        return view('/admin/clients/manage-product-list', compact('brands', 'categories', 'products'));
    }

    public function admin_index()
    {
        $id = "";
        $categories = Category::where('status', 1)->get();
        $products = Product::where('status', 1)->get();
        return view('/admin/products', compact('categories', 'products', 'id'));
    }

    public function store(Request $request)
    {
        $product = new Product();

        $image = $request->hasFile('image') ? 'storage/' . Storage::disk('local')->put('/products', $request->file('image')) : null;
        $product->part_no = $request->part_no;
        $product->category_id = $request->category_id;
        $product->description = $request->description;
        $product->image = $image;
        $product->user_id = $request->user_id;
        $product->default_price = $request->default_price;
        $product->save();

        return back();
    }

    public function index($id, $part_no)
    {
        $items = Product::where('part_no', $part_no)->first();
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
