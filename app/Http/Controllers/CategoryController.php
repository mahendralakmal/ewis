<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\CBrand;
use App\CCategory;
use App\Clientuser;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function remove_client_category(CCategory $id)
    {
        $id->update(['remove' => 1]);
        return back();
    }

    public function store_client_category(Request $request)
    {
//        return $request->all();
        CCategory::create($request->all());
        return back();
    }

    public function assign_category_to_client(User $id, Request $request)
    {
        $cp_id = '';
        $brands = Brand::all();
        $cbrands = CBrand::where([['user_id', $request->session()->get('User')], ['client_id', $id->clientuser->first()->client->id]])->get();
        $ccategories = CCategory::where([['user_id', $request->session()->get('User')], ['client_id', $id->clientuser->first()->client->id]])->get();
        $categories = Category::orderBy('title')->get();
        return view('/admin/clients/manage-category-list', compact('categories', 'id', 'ccategories', 'cp_id', 'cbrands', 'brands'));
    }

    public function delete(Category $id)
    {
        $id->update(['status' => 0]);
        return back();
    }

    public function update(Request $request)
    {
        $cate = Category::find($request->id);
        $image = $request->hasFile('image') ? 'storage/' . Storage::disk('local')->put('/categories', $request->file('image')) : null;
        $cate->update([
            'title' => $request->title,
            'brand_id' => $request->brand_id,
            'description' => $request->description,
            'image' => $image,
            'user_id' => $request->user_id
        ]);

        Session::flash('success', 'Category successfully updated...!');
        return redirect('/admin/categories');
    }

    public function edit(Category $id)
    {
        $brands = Brand::orderBy('title')->get();
        $categories = Category::where('status', 1)->get();
        return view('/admin/category', compact('categories', 'brands', 'id'));
    }

    public function admin_index()
    {
        $id = '';
        $brands = Brand::orderBy('title')->get();
        $categories = Category::where('status', 1)->orderBy('brand_id')->get();
        return view('/admin/category', compact('categories', 'brands', 'id'));
    }

    public function store(Request $request)
    {
        $this->validate(request(), [
            'category_key' => 'unique:categories',
        ]);
        $cate = new Category();
        $cate->title = $request->title;
        $cate->user_id = $request->user_id;
        $cate->brand_id = $request->brand_id;
        $cate->description = $request->description;
        $cate->category_key = $request->category_key;
        $cate->image = $request->hasFile('image') ? 'storage/' . Storage::disk('local')->put('/categories', $request->file('image')) : null;
        $cate->save();
        Session::flash('success', 'Category successfully added...!');
        return back();
    }

    public function index($id, $brand, Brand $brand_id)
    {
        $categories = $brand_id->category;
        return view('user/category', compact('categories'));
    }

    public function category($id, $brand, Brand $brand_id)
    {
        $cuser = Clientuser::where('user_id', Session::get('User'))->first();
        $categories = CCategory::where([['client_id', $cuser->client_id], ['remove', 0],['brand_id',$brand_id->id]])->get();
        return view('user/category', compact('categories'));
    }
}
