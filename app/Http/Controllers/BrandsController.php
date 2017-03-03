<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\CBrand;
use App\Client_Product;
use App\Clientuser;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class BrandsController extends Controller
{
    public function remove_client_brands(CBrand $id){
//        return $id;
        $id->update(['remove'=>1]);
        return back();
    }

    public function edit_client_products(CBrand $id, Request $request){
        $cp_id = $id;
        $cbrands = CBrand::where([['user_id',$request->session()->get('User')],['client_id', $id->client_id]])->get();
        $brands = Brand::orderBy('title')->get();
        return view('/admin/clients/manage-brand-list', compact('brands', 'id', 'cbrands','cp_id'));
    }

    public function store_client_brands(Request $request){
        CBrand::create($request->all());
        return back();
    }

    public function assign_brands_to_client(User $id, Request $request){
        $cp_id = '';
        $cbrands = CBrand::where([['user_id',$request->session()->get('User')],['client_id', $id->clientuser->first()->client->id]])->get();
        $brands = Brand::orderBy('title')->get();
        return view('/admin/clients/manage-brand-list', compact('brands', 'id', 'cbrands','cp_id'));
    }

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
//        return Session::get('User');
        $cuser = Clientuser::where('user_id', Session::get('User'))->first();
//        return $cuser->client_id;
//        $cp_product = Client_Product::where('client_id', $cuser->client->id)->get();
//        return $cp_product;

        $brands = CBrand::where('client_id', $cuser->client_id)->get();
//        return $brands;
        return view('user/brands', compact('brands','cp_product'));
    }


}
