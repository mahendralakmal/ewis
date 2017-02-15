<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function admin_index(){
        $brands = Brand::orderBy('title')->get();
        $categories = Category::all();
        return view('/admin/category', compact('categories', 'brands'));
    }

    public function store(Request $request)
    {
//        return $request->all();
        Category::create($request->all());
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
