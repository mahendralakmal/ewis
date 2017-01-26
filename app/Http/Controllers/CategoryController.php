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
    public function index($brand, Brand $id)
    {
        $categories = $id->category;
        return view('category', compact('categories'));
    }
}
