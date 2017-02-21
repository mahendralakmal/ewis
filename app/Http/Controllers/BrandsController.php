<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BrandsController extends Controller
{
    public function admin_index()
    {
        $id = '';
        $brands = Brand::where('status', 1)->get();
        return view('/admin/brands', compact('brands', 'id'));
    }

    public function store(Request $request)
    {
        $brand = new Brand();
        $brand->title = $request->title;
        $brand->user_id = $request->user_id;
        $brand->description = $request->description;
        $brand->image = $request->hasFile('image') ? 'storage/' . Storage::disk('local')->put('/brands', $request->file('image')) : null;
        $brand->save();
        return back();
    }

    public function edit(Brand $id)
    {
        $brands = Brand::where('status', 1)->get();
        return view('/admin/brands', compact('brands', 'id'));
    }

    public function update(Request $request)
    {
        $brand = Brand::find($request->id);
        $image = $request->hasFile('image') ? 'storage/' . Storage::disk('local')->put('/brands', $request->file('image')) : null;
        $brand->update(['title' => $request->title, 'description' => $request->description, 'image' => $image, 'user_id' => $request->user_id]);

        return redirect('/admin/brands');
    }

    public function delete(Brand $id)
    {
        $id->update(['status' => 0]);
        return back();
    }

    public function brands()
    {
        $brands = Brand::all();
        return view('user/brands', compact('brands'));
    }


}
