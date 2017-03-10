@extends('admin.layouts.dashboard')
@section('page_heading','Products')
@section('section')
    @if((\Illuminate\Support\Facades\Session::has('User'))
    && (\App\User::find(\Illuminate\Support\Facades\Session::get('User'))->privilege != null)
    && (\App\User::find(\Illuminate\Support\Facades\Session::get('User'))->privilege->product))
    <div class="col-md-7">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Product Categories</h3>
            </div>
            <div class="panel-body">
                <table class="table">
                    <thead>
                    <tr>
                        <td><h5>Part No</h5></td>
                        <td><h5>Name</h5></td>
                        <td><h5>Brand</h5></td>
                        <td><h5>Category</h5></td>
                        {{--<td><h5>Description</h5></td>--}}
                        <td class="text-right"><h5>Price</h5></td>
                        <td></td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{$product->part_no}}</td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->category->brand->title}}</td>
                            <td>{{$product->category->title}}</td>
                            {{--<td>{{$product->description}}</td>--}}
                            <td class="text-right">{{$product->default_price}}</td>
                            <td class="col-md-3">
                                <a href="/admin/products/{{$product->id}}"
                                   class="btn btn-primary btn-outline">Edit</a>
                                <a href="/admin/products/{{$product->id}}/remove"
                                   class="btn btn-danger btn-outline">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-5">
        <h4>Add new Product</h4>
        <hr>
        <div class="col-md-12">
            <form class="form-horizontal" id="products" enctype="multipart/form-data" role="form" method="POST"
                  @if($id == null) action="/admin/products/store"
                  @else action="/admin/products/update" @endif>
                {{ csrf_field() }}
                @if(!$id == null)
                    <input type="hidden" id="id" name="id" value="{{ $id->id }}">
                @endif

                    <input type="hidden" id="user_id" name="user_id"
                       value="{{ \Illuminate\Support\Facades\Session::get('User') }}">
                <div class="form-group row">
                    <div class="col-md-4"><label>Part No</label></div>
                    <div class="col-md-8">
                        <input type="text" name="part_no" id="part_no" class="form-control"
                               @if(!$id == null) value="{{ $id->part_no }}" @endif>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4"><label>Name</label></div>
                    <div class="col-md-8">
                        <input type="text" name="name" id="name" class="form-control"
                               @if(!$id == null) value="{{ $id->name }}" @endif>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4"><label>Brand</label></div>
                    <div class="col-md-8">
                        @if($id == null)
                            <select name="brand_id" id="brand_id" class="form-control">
                                <option>Select Brand</option>
                                @foreach($brands as $brand)
                                    <option value="{{$brand->id}}">{{$brand->title}}</option>
                                @endforeach
                            </select>
                        @else
                            <select name="brand_id" id="brand_id" class="form-control">
                                <option>Select Brand</option>
                                @foreach($brands as $brand)
                                    <option value="{{$brand->id}}"
                                            @if(!$id == null)@if($brand->id==\App\Category::find($id->category_id)->brand->id) selected @endif @endif>{{$brand->title}}</option>
                                @endforeach
                            </select>
                        @endif
                    </div>
                </div>


                <div class="form-group row">
                    <div class="col-md-4"><label>Category</label></div>
                    <div class="col-md-8">
                        @if($id == null)
                            <select name="category_id" id="category_id" class="form-control">
                                <option>Select Category</option>
                            </select>
                        @else
                            <select name="category_id" id="category_id" class="form-control">
                                <option>Select Category</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}"
                                            @if(!$id == null)@if($category->id==$id->category_id) selected @endif @endif>{{$category->title}}</option>
                                @endforeach
                            </select>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4"><label>Description</label></div>
                    <div class="col-md-8">
                        <textarea name="description" id="description"
                                  class="form-control">@if(!$id == null) {{ $id->description }} @endif</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4"><label>Image</label></div>
                    <div class="col-md-8">
                        <input type="file" name="image" id="image">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-4"><label>List Price</label></div>
                    <div class="col-md-8">
                        <input type="number" name="default_price" id="default_price" class="form-control"
                               @if(!$id == null) value="{{ $id->default_price }}" @endif>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-4"><label>Vat apply</label></div>
                    <div class="col-md-8">
                        <label><input type="checkbox" id="vat_apply" name="vat_apply"
                                      @if(!$id == null && $id->vat_apply == true ) checked @endif>
                            Brands</label>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4"><label>Vat</label></div>
                    <div class="col-md-7">
                        <input type="number" name="vat" id="vat" class="form-control"
                               @if(!$id == null) value="{{ $id->vat }}" @endif>
                    </div>
                    <div class="col-md-1">%</div>
                </div>
                <button class="btn btn-primary" name="submit" id="submit">@if(!$id == null) Update @else
                        Add @endif</button>
            </form>
        </div>
    </div>
    @else
        <div class="col-md-offset-3">
            <h2 class="error">You are Not Authorize for access this page</h2>
        </div>
    @endif
@stop
