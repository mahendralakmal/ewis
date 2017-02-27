<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Bucket;
use App\Category;
use App\Client;
use App\Client_Assign_Product;
use App\Product;
use App\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Session;

class ProductController extends Controller
{
    public function store_client_products(Request $request){
//        return $request->all();
        Client_Assign_Product::create($request->all());
        return back();
    }

    public function load_products_deta(Product $id){
        return Response::json($id->default_price);
    }

    public function load_products(Category $id){
        $products = $id->product;
        return Response::json($products);
    }

    public function load_categories(Brand $id){
        $categoris = $id->category;
        return Response::json($categoris);
    }

    public function assign_products_to_client(User $id)
    {
        $brands = Brand::orderBy('title')->get();
        return view('/admin/clients/manage-product-list', compact('brands', 'id'));
    }

    public function delete(Product $id)
    {
        $id->update(['status' => 0]);
        return back();
    }

    public function update(Request $request)
    {
        $product = Product::find($request->id);
        $image = $request->hasFile('image') ? 'storage/' . Storage::disk('local')->put('/products', $request->file('image')) : null;
        $product->update(['part_no' => $request->part_no, 'name' => $request->name,'category_id' => $request->category_id, 'description' => $request->description,
            'image' => $image, 'user_id' => $request->user_id, 'default_price'=> $request->default_price]);

        return redirect('/admin/products');
    }

    public function edit(Product $id)
    {
        $products = Product::where('status', 1)->get();
        $categories = Category::where('status', 1)->get();
        return view('/admin/products', compact('categories', 'products', 'id'));
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
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->description = $request->description;
        $product->image = $image;
        $product->user_id = $request->user_id;
        $product->status = 1;
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

    public function show($slug)
    {
        $product = Product::where('part_no', $slug)->firstOrFail();
        $interested = Product::where('part_no', '!=', $slug)->get()->random(1);
        return view('product')->with(['product' => $product, 'interested' => $interested]);
    }
}
