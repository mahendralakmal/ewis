@extends('admin.layouts.dashboard')
@section('page_heading','Assign Products to Clients')
@section('section')
    @if((\Illuminate\Support\Facades\Session::has('User'))
    && (\App\User::find(\Illuminate\Support\Facades\Session::get('User'))->privilege != null)
    && (\App\User::find(\Illuminate\Support\Facades\Session::get('User'))->privilege->asign_product))
        <div class="col-md-7">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Products</h3>
                </div>
                <div class="panel-body">
                    {{$cp_products}}
                    <table class="table">
                        <thead>
                        <tr>
                            <td><h5>Brand</h5></td>
                            <td><h5>Category</h5></td>
                            <td><h5>Part No</h5></td>
                            <td><h5>Price</h5></td>
                            <td class="col-md-5"></td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cp_products as $product)
                            @if($product->remove == 0)
                                <tr>
                                    <td>{{ App\Product::find($product->product_id)->category->brand->title }}</td>
                                    <td>{{ App\Product::find($product->product_id)->category->title }}</td>
                                    <td>{{ App\Product::find($product->product_id)->part_no }}</td>
                                    <td>{{ $product->special_price }}</td>
                                    <td>
                                        <a href="/admin/manage-product-list/product/details/edit/{{ $product->id }}"
                                           class="btn btn-primary btn-outline">Edit</a>
                                        <a href="/admin/manage-product-list/product/details/remove/{{ $product->id }}"
                                           class="btn btn-danger btn-outline">Remove</a>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <h4>Assign Products</h4>
            <hr>
            <div class="col-md-12">
                <form class="form-horizontal" id="asignProduct" role="form" method="POST"
                      action="@if($cp_id==null) /admin/manage-product-list/product/details/{{ $id->id }}/store @else /admin/manage-product-list/product/details/update @endif"
                >
                    {{ csrf_field() }}
                    <div class="form-group row">

                        @if($cp_id!=null)
                            <input type="hidden" id="id" name="id" value="{{ $cp_id->id }}">
                        @endif
                        <input type="hidden" id="client_id" name="client_id"
                               value="{{ \App\User::find($id->id)->clientuser->first()->client->id }}">
                        <input type="hidden" id="user_id" name="user_id"
                               value="{{ \Illuminate\Support\Facades\Session::get('User') }}">

                        <div class="col-md-4"><label>Brand</label></div>
                        <div class="col-md-8">
                            <select name="brand_id" id="brand_id" class="form-control">
                                <option>Select Brand</option>
                                @foreach($brands as $brand)
                                    <option value="{{$brand->id}}"
                                            @if($cp_id!=null && $brand->id == \App\Product::find($cp_id->product_id)->category->brand->id) selected @endif
                                    >{{$brand->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-4"><label>Category</label></div>
                        <div class="col-md-8">
                            @if($cp_id == null)
                                <select name="category_id" id="category_id" class="form-control">
                                    <option>Select Category</option>
                                </select>
                            @else
                                <select name="category_id" id="category_id" class="form-control">
                                    <option>Select Category</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}"
                                                @if($category->id == \App\Product::find($cp_id->product_id)->category->id) selected @endif
                                        >{{$category->title}}</option>
                                    @endforeach
                                </select>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-4"><label>Product</label></div>
                        <div class="col-md-8">
                            @if($cp_id == null)
                                <select name="product_id" id="product_id" class="form-control">
                                    <option>Select Product</option>
                                </select>
                            @else
                                <select name="product_id" id="product_id" class="form-control">
                                    <option>Select Product</option>
                                    @foreach($cp_products as $product)
                                        <option value="{{$product->id}}"
                                                @if($product->id == \App\Product::find($cp_id->product_id)->category->id) selected @endif
                                        >{{$product->part_no}}</option>
                                    @endforeach
                                </select>
                            @endif
                        </div>
                    </div>
                    @if(\App\User::find(\Illuminate\Support\Facades\Session::get('User'))->privilege->product_cost)
                        <div class="form-group row">
                            <div class="col-md-4"><label>list Price</label></div>
                            <div class="col-md-8">
                                <input type="number" id="list_price" name="list_price" class="form-control"
                                       @if($cp_id != null) value="{{\App\Product::find($cp_id->product_id)->default_price}}" @endif>
                            </div>
                        </div>
                    @else
                        <input type="hidden" id="list_price" name="list_price" value="@if($cp_id != null){{\App\Product::find($cp_id->product_id)->default_price}}@endif">
                    @endif
                    <div class="form-group row">
                        <div class="col-md-4"><label>Vat (%)</label></div>
                        <div class="col-md-8">
                            <input type="number" id="vat" name="vat" class="form-control"
                                   @if($cp_id != null) value="{{\App\Product::find($cp_id->product_id)->vat}}" @endif>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-4"><label>Special Price</label></div>
                        <div class="col-md-8">
                            <input type="number" id="special_price" name="special_price" class="form-control"
                                   @if($cp_id != null) value="{{ number_format($cp_id->special_price,2)}}" @endif>
                        </div>
                    </div>
                    <button class="btn btn-primary" name="submit" id="submit">Add</button>
                </form>
            </div>
        </div>
    @else
        <div class="col-md-offset-3">
            <h2 class="error">You are Not Authorize for access this page</h2>
        </div>
    @endif
@stop
