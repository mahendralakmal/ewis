<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\CBrand;
use App\Client_Product;
use App\ClientsBranch;
use App\Clientuser;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class BrandsController extends Controller
{
    public function get_brands(Brand $brands)
    {
        return $brands->title;
    }

    public function remove_client_brands(CBrand $id)
    {
        $id->update(['remove' => 1]);
        return back();
    }

    public function store_client_brands(Request $request)
    {
        session()->forget('success_message');
        session()->forget('error_message');
        if(CBrand::where([['clients_branch_id', $request->clients_branch_id],['brand_id', $request->brand_id],['remove','0']])->get()->count()==0) {
            CBrand::create($request->all());
            session()->put('success_message','Successfully added..');
        } else{
            session()->put('error_message','This brand is already exist.');
        }
        return back();
    }

    public function assign_brands_to_client(ClientsBranch $id, Request $request)
    {
        //clear the sessions here
//        Session::flush('success_message');
//        Session::flush('error_message');
        $cp_id = '';
        $cbrands = CBrand::where('clients_branch_id', $id->id)->get();
        $brands = Brand::orderBy('title')->get();
        return view('/admin/clients/manage-brand-list', compact('brands', 'id', 'cbrands', 'cp_id'));
    }

    public function admin_index()
    {
        $id = '';
        $brands = Brand::where('status', 1)->get();
        return view('/admin/brands', compact('brands', 'id'));
    }

    public function store(Request $request)
    {
        $this->validate(request(), [
            'title' => 'required|unique:brands|max:100',
        ]);

        $brand = new Brand();
        $brand->title = $request->title;
        $brand->user_id = $request->user_id;
        $brand->description = $request->description;
        $brand->image = $request->hasFile('image') ? 'storage/' . Storage::disk('local')->put('/brands', $request->file('image')) : null;
        $brand->save();
        Session::flash('success', 'Brand successfully added...!');
        return back();
    }

    public function edit(Brand $id)
    {
        $brands = Brand::where('status', 1)->get();
        return view('/admin/brands', compact('brands', 'id'));
    }

    public function update(Request $request)
    {
        $this->validate(request(), [
            'title' => 'required|max:100',
        ]);
        $brand = Brand::find($request->id);
        $image = $request->hasFile('image') ? 'storage/' . Storage::disk('local')->put('/brands', $request->file('image')) : null;
        $brand->update(['title' => $request->title, 'description' => $request->description, 'image' => $image, 'user_id' => $request->user_id]);

        Session::flash('success', 'Brand successfully updated...!');

        return redirect('/admin/brands');
    }

    public function delete(Brand $id)
    {
        $id->update(['status' => 0]);
        return back();
    }

    public function brands()
    {
        $cuser = Clientuser::where('user_id', Session::get('User'))->first();
        $brands = CBrand::where([['client_id', $cuser->client_id], ['remove', 0]])->get();
        return view('user/brands', compact('brands'));
    }


}
