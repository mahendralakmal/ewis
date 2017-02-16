<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function delete(Category $id)
    {
        $id->update(['status' => 0]);
        return back();
    }

    public function update(Request $request)
    {
        $cate = Category::find($request->id);
        $image = $request->hasFile('image') ? 'storage/' . Storage::disk('local')->put('/categories', $request->file('image')) : null;
        $cate->update(['title' => $request->title, 'brand_id' => $request->brand_id, 'description' => $request->description, 'image' => $image, 'user_id' => $request->user_id]);

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
        $categories = Category::where('status', 1)->get();
        return view('/admin/category', compact('categories', 'brands', 'id'));
    }

    public function store(Request $request)
    {
        $cate = new Category();
        $cate->title = $request->title;
        $cate->brand_id = $request->brand_id;
        $cate->description = $request->description;
        $cate->image = $request->hasFile('image') ? 'storage/' . Storage::disk('local')->put('/categories', $request->file('image')) : null;
        $cate->save();
        return back();
    }

    public function index($id, $brand, Brand $brand_id)
    {
        $categories = $brand_id->category;
        return view('user/category', compact('categories'));
    }

    public function category($id, $brand, Brand $brand_id)
    {
        $categories = $brand_id->category;
        return view('user/category', compact('categories'));
    }
}
