@extends('admin.layouts.dashboard')
@section('page_heading','Assign Products to Clients')
@section('section')
    @if((\Illuminate\Support\Facades\Session::has('User'))
    && (\App\User::find(\Illuminate\Support\Facades\Session::get('User'))->privilege != null)
    && (\App\User::find(\Illuminate\Support\Facades\Session::get('User'))->privilege->asign_product))
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Products</h3>
                </div>
                <div class="panel-body">
                    <ul class="list-group">
                        @foreach($cbrands as $c_brand)
                            @if($c_brand->remove !=1)
                                <li class="list-group-item">
                                    <a href="#{{ $c_brand->id }}" class="list-group-item active"
                                       data-toggle="collapse"><strong>{{ $c_brand->brand->title }}</strong>
                                        <span class="badge">{{$c_brand->c_category->count()}}</span>
                                    </a>
                                    <div id="{{$c_brand->id}}" class="collapse">
                                        @foreach($c_brand->c_category as $cate)
                                            <a href="#c{{ $cate->id }}" class="list-group-sub-item active"
                                               data-toggle="collapse"><strong>{{ $cate->category->title }}</strong>
                                                <span class="badge">{{$cate->cproduct->count()}}</span>
                                            </a>
                                            <div id="c{{$cate->id}}" class="collapse">
                                                {{--{{$cate->cproduct->first()}}--}}
                                                <table class="table">
                                                    <thead>
                                                    <tr>
                                                        <td><h5>Part No</h5></td>
                                                        <td><h5>Name</h5></td>
                                                        <td><h5>Description</h5></td>
                                                        <td><h5>price</h5></td>
                                                        <td class="col-md-3"></td>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($cate->cproduct as $prod)
                                                        @if(!$prod->remove)
                                                            <tr>
                                                                <td>{{$prod->product->part_no}}</td>
                                                                <td>{{$prod->product->name}}</td>
                                                                <td>{{$prod->product->description}}</td>
                                                                <td class="text-right">{{$prod->special_price}}</td>
                                                                <td>
                                                                    <a href="/admin/products/{{$prod->id}}"
                                                                       class="btn btn-primary btn-outline">Edit</a>
                                                                    <a href="/admin/products/{{$prod->id}}/remove"
                                                                       class="btn btn-danger btn-outline">Delete</a>
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        @endforeach
                                    </div>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-4">
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
                            <select name="brand_id" id="c_brand_id" class="form-control">
                                <option>Select Brand</option>
                                {{--@foreach($brands as $brand)--}}
                                @foreach($cbrands as $cbrand)
                                    @if($cbrand->remove !=1)
                                        {{--@if($brand->id == $cbrand->brand_id)--}}
                                        <option value="{{$cbrand->id}}"
                                                @if($cp_id!=null && $cbrand->id == \App\Product::find($cp_id->product_id)->category->brand->id) selected @endif
                                        >{{$cbrand->brand->title}}</option>
                                        {{--@endif--}}
                                    @endif
                                @endforeach
                                {{--@endforeach--}}
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-4"><label>Category</label></div>
                        <div class="col-md-8">
                            @if($cp_id == null)
                                <select name="c_category_id" id="c_category_id" class="form-control">
                                    <option>Select Category</option>
                                </select>
                            @else
                                <select name="c_category_id" id="c_category_id" class="form-control">
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
                    <div class="form-group row" id="description">
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
                        <input type="hidden" id="list_price" name="list_price"
                               value="@if($cp_id != null){{\App\Product::find($cp_id->product_id)->default_price}}@endif">
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
