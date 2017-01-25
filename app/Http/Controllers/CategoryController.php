<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Category;

class CategoryController extends Controller
{
    public function index($brand, Brand $id)
    {
        $categories = $id->category;
        return view('category', compact('categories'));
    }
}
