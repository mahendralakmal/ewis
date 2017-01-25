<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductsCategorycontroller extends Controller
{
    public function index()
    {
        $procat = ProductsCategory::all();
        return view('procat', compact('products_categories'));
    }
}
