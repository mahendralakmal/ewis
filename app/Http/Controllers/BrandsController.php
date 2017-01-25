<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Category;

class BrandsController extends Controller
{
        public function index()
    {
        $brands = Brand::all();
//        return $brands;
        return view('brands', compact('brands'));
    }
}
