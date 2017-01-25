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
}
