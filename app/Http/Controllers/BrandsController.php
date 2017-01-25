<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;

class BrandsController extends Controller
{
    public function admin_index(){
        $brands = Brand::all();
        return view('/admin/brands', compact('brands'));
    }
}
