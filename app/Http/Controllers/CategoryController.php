<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\CBrand;
use App\CCategory;
use App\ClientsBranch;
use App\Clientuser;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function get_categories(CCategory $id)
    {
        return $id->category->title;
    }

    public function remove_client_category(CCategory $id)
    {

        if ($id->cproduct->count() > 0) {
            foreach ($id->cproduct as $cproduct) {
                $cproduct->update(['remove' => 1]);
            }
        }
        $id->update(['remove' => 1]);
        return back();
    }

    public function store_client_category(Request $request)
    {
        if (CCategory::where([['clients_branch_id', $request->clients_branch_id], ['category_id', $request->category_id], ['remove', '0']])->get()->count() == 0) {
            CCategory::create($request->all());
            session()->put('success_message', 'Successfully added..');
        } else {
            session()->put('error_message', 'This category is already exist.');
        }
        return back();
    }

    public function assign_category_to_client(ClientsBranch $id)
    {
        $cp_id = '';
        return view('/admin/clients/manage-category-list', compact('id', 'cp_id'));
    }

    public function delete(Category $id)
    {
        $id->update(['status' => 0]);
        return back();
    }

    public function update(Request $request)
    {
        $cate = Category::find($request->id);
        $image = $request->hasFile('image') ? 'storage/' . Storage::disk('local')->put('/categories', $request->file('image')) : null;
        $cate->update([
            'title' => $request->title,
            'brand_id' => $request->brand_id,
            'description' => $request->description,
            'image' => $image,
            'user_id' => $request->user_id
        ]);

        Session::flash('success', 'Category successfully updated...!');
        return redirect('/admin/categories');
    }

    public function edit(Category $id)
    {
        $brands = Brand::orderBy('title')->get();
        $categories = Category::where('status', 1)->get();
        return view('/admin/category', compact('categories', 'brands', 'id'));
    }

    public function admin_index()
    {
        $id = '';
        $brands = Brand::orderBy('title')->get();
        $categories = Category::where('status', 1)->orderBy('brand_id')->get();
        return view('/admin/category', compact('categories', 'brands', 'id'));
    }

    public function store(Request $request)
    {
        $this->validate(request(), [
            'category_key' => 'unique:categories',
        ]);
        $cate = new Category();
        $cate->title = $request->title;
        $cate->user_id = $request->user_id;
        $cate->brand_id = $request->brand_id;
        $cate->description = $request->description;
        $cate->category_key = $request->category_key;
        $cate->image = $request->hasFile('image') ? 'storage/' . Storage::disk('local')->put('/categories', $request->file('image')) : null;
        $cate->save();
        Session::flash('success', 'Category successfully added...!');
        return back();
    }

    public function index($id, $brand, Brand $brand_id)
    {
        $categories = $brand_id->category;
        return view('user/category', compact('categories'));
    }

    public function category($id, $brand, CBrand $brand_id)
    {
        $categories = $brand_id->c_category;
        //$cuser = Clientuser::where('user_id', Session::get('User'))->first();
//        $categories = CCategory::where([['clients_branch_id', $cuser->clients_branch_id], ['remove', 0],['c_brand_id',$brand_id->id]])->get();
        //       dd($brand_id);
        return view('user/category', compact('categories'));
    }
}
