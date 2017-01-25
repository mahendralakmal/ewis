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
}
