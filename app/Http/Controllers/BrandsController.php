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

    public function store(Request $request)
    {
        Brand::create($request->all());
        return back();
    }

    public function index()
    {
        $brands = Brand::all();
        return view('brands', compact('brands'));
    }

    public function brands()
    {
        $brands = Brand::all();
        return view('user/brands', compact('brands'));
    }
}
