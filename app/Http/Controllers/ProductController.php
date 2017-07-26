<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\CCategory;
use App\CBrand;
use App\Client_Product;
use App\ClientsBranch;
use App\Product;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

//use Session;

class ProductController extends Controller
{
    public function getAllProducts()
    {
        $id = "";
        $brands = Brand::all();
        $categories = Category::where('status', 1)->get();
        $products = Product::where('status', 1)->get();
        return view('admin.reports.all-products-list', compact('categories', 'products', 'id', 'brands'));
    }

    public function get_products(Client_Product $id)
    {
//        return($id);
        return $id->name . " | " . $id->part_no;
    }

    public function remove_client_products(Client_Product $id)
    {
        $id->update([   'remove' => 1]);
        return back();
    }

    public function update_client_products(Request $request)
    {
        $cprod = Client_Product::find($request->id);

        $cprod->update([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'product_id' => $request->product_id,
            'special_price' => $request->special_price
        ]);
        return back();
    }

    public function edit_client_products(Client_Product $id, Request $request)
    {
        $cp_id = $id;
        $cp_products = Product::all();
        $categories = Category::all();
        $products = $id->product;
        $brands = Brand::orderBy('title')->get();
        return view('/admin/clients/manage-product-list', compact('brands', 'id', 'products', 'cp_id',
            'categories', 'cp_products'));
    }

    public function store_client_products(Request $request)
    {
        if (Client_Product::where([['clients_branch_id', $request->clients_branch_id], ['brand_id', $request->brand_id],
                ['c_category_id', $request->c_category_id], ['product_id', $request->product_id],
                ['remove', '0']])->get()->count() == 0
        ) {

            Client_Product::create($request->all());
            session()->put('success_message','Successfully added..');
        } else {
            session()->put('error_message', 'This Product is already exist.');
        }
        return back();
    }

    public function load_products_deta(Product $id)
    {
        return Response::json($id);
    }

    public function load_cproducts(CCategory $id)
    {
        $products = $id->category->product;
        return Response::json($products);
    }

    public function load_products(Category $id)
    {
        $products = $id->product;
        return Response::json($products);
    }

    public function load_cproducts_ccategorie(CBrand $brand, ClientsBranch $branch)
    {
        $ccategoris = $branch->cbrands->find($brand->id)->c_category;
        return Response::json($ccategoris);
    }

    public function load_ccategory_details(CCategory $id)
    {
        $category = $id->category;
        return Response::json($category);
    }

    public function load_ccategories(CBrand $brand, ClientsBranch $branch)
    {
        $ccategoris = $branch->cbrands->find($brand->id)->brand->category->where('remove',0);
        return Response::json($ccategoris);
    }

    public function load_categories(Brand $id)
    {
        $categoris = $id->category;
        return Response::json($categoris);
    }

    public function assign_products_to_client(ClientsBranch $id)
    {
//        return $id;
        $cp_id = '';
        return view('/admin/clients/manage-product-list', compact('id', 'cp_id'));
    }

    public function delete(Product $id)
    {
        $id->update(['status' => 0]);
        return back();
    }

    public function update(Request $request)
    {
        $this->validate(request(), [
            'part_no' => 'required|max:100',
        ]);
        $product = Product::find($request->id);
        $image = $request->hasFile('image') ? 'storage/' . Storage::disk('local')->put('/products', $request->file('image')) : null;
        if ($request->hasFile('image'))
        $product->update(['part_no' => $request->part_no, 'name' => $request->name, 'category_id' => $request->category_id, 'description' => $request->description,
            'image' => $image, 'user_id' => $request->user_id, 'default_price' => $request->default_price]);
        else
        $product->update(['part_no' => $request->part_no, 'name' => $request->name, 'category_id' => $request->category_id, 'description' => $request->description,
            'user_id' => $request->user_id, 'default_price' => $request->default_price]);

        Session::flash('success', 'Product successfully updated...!');
        return redirect('/admin/products');
    }

    public function edit(Product $id)
    {
        $brands = Brand::all();
        $products = Product::where('status', 1)->get();
        $categories = Category::where('status', 1)->get();
        return view('/admin/products', compact('categories', 'products', 'id', 'brands'));
    }

    public function admin_index()
    {
        $id = "";
        $brands = Brand::all();
        $categories = Category::where('status', 1)->get();
        $products = Product::where('status', 1)->get();
        return view('/admin/products', compact('categories', 'products', 'id', 'brands'));
    }

    public function store(Request $request)
    {
        $this->validate(request(),
            [
                'part_no' => 'required|unique:products|max:100',
                'image' => 'required',
            ],
            [
                'part_no.unique'=>'Part No. Already Exists within Selected Brand / Category....!!!, Please verify and enter the details again.',
                'image.required' => "Please add an image."
            ]
        );

        $product = new Product();
        $image = $request->hasFile('image') ? 'storage/' . Storage::disk('local')->put('/products', $request->file('image')) : null;
        $product->id = $request->id;
        $product->part_no = $request->part_no;
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->description = $request->description;
        $product->image = $image;
        $product->user_id = $request->user_id;
        $product->status = 1;
        $product->default_price = $request->default_price;
        $product->vat_apply = ($request->vat_apply == 'on') ? true : false;
        $product->vat = $request->vat;
        $product->save();

        Session::flash('success', 'Product successfully added...!');

        return back();
    }

    public function index($id, $part_no)
    {
        $items = Product::where('part_no',$part_no)->first();
        return view('user/item', compact('items'));
    }

    public function products($id, $branch, $brand, CCategory $category )
    {
        $products = $category->cproduct;
        return view('user/product', compact('products', 'category'));
    }

    public function show($slug)
    {
        $product = Product::where('part_no', $slug)->firstOrFail();
        $interested = Product::where('part_no', '!=', $slug)->get()->random(1);
        return view('product')->with(['product' => $product, 'interested' => $interested]);
    }
}
