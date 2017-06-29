@extends('admin.layouts.dashboard')
@section('page_heading','Products')
@section('section')
    @if((\Illuminate\Support\Facades\Session::has('User'))
    && (\App\User::find(\Illuminate\Support\Facades\Session::get('User'))->privilege != null)
    && (\App\User::find(\Illuminate\Support\Facades\Session::get('User'))->privilege->product))

        <div class="col-md-7">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Products</h3>
                </div>
                <div class="panel-body">
                    <ul class="list-group">
                        @foreach($brands as $brand)
                            @if($brand->status)
                                <li class="list-group-item">
                                    <a href="#{{ $brand->id }}" class="list-group-item active"
                                       data-toggle="collapse"><strong>{{ $brand->title }}</strong>
                                        <span class="badge">{{$brand->category->count()}}</span></a>
                                    <div id="{{$brand->id}}" class="collapse">
                                        @foreach($brand->category as $cate)
                                            @if($cate->status)
                                                <a href="#c{{ $cate->id }}" class="list-group-sub-item active"
                                                   data-toggle="collapse"><strong>{{ $cate->title }}</strong>
                                                    <span class="badge">{{$cate->product->count()}}</span></a>
                                                <div id="c{{$cate->id}}" class="collapse">
                                                    {{--{{$cate->product}}--}}
                                                    <table class="table">
                                                        <thead>
                                                        <tr>
                                                            <td><h5>Part No</h5></td>
                                                            <td><h5>Name</h5></td>
                                                            <td><h5>price</h5></td>
                                                            <td></td>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($cate->product as $prod)
                                                            @if($prod->status)
                                                                <tr>
                                                                    <td>{{$prod->part_no}}</td>
                                                                    <td>{{$prod->name}}</td>
                                                                    <td class="text-right">{{$prod->default_price}}</td>
                                                                    <td>
                                                                        <a href="/admin/products/{{$prod->id}}"
                                                                           class="btn btn-primary btn-outline">Edit</a>
                                                                        {{--<a href="/admin/products/{{$prod->id}}/remove"--}}
                                                                           {{--class="btn btn-danger btn-outline">Delete</a>--}}
                                                                    </td>
                                                                </tr>
                                                            @endif
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <h4>Add new Product</h4>
            <hr>
            <div class="col-md-12">
                @include('admin.messages.success')
                @include('admin.messages.error')
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
                        <div class="col-md-4"><label>Part No <span style="color: red">*</span></label></div>
                        <div class="col-md-8">
                            <input type="text" name="part_no" id="part_no" class="form-control"
                                   @if(!$id == null) value="{{ $id->part_no }}" @endif>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-4"><label>Name <span style="color: red">*</span></label></div>
                        <div class="col-md-8">
                            <input type="text" name="name" id="name" class="form-control"
                                   @if(!$id == null) value="{{ $id->name }}" @endif>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-4"><label>Brand <span style="color: red">*</span></label></div>
                        <div class="col-md-8">
                            @if($id == null)
                                <select name="brand_id" id="brand_id" class="form-control">
                                    <option value="">Select Brand</option>
                                    @foreach($brands as $brand)
                                        <option value="{{$brand->id}}">{{$brand->title}}</option>
                                    @endforeach
                                </select>
                            @else
                                <select name="brand_id" id="brand_id" class="form-control">
                                    <option value="">Select Brand</option>
                                    @foreach($brands as $brand)
                                        <option value="{{$brand->id}}"
                                                @if(!$id == null)@if($brand->id==\App\Category::find($id->category_id)->brand->id) selected @endif @endif>{{$brand->title}}</option>
                                    @endforeach
                                </select>
                            @endif
                        </div>
                    </div>


                    <div class="form-group row">
                        <div class="col-md-4"><label>Category <span style="color: red">*</span></label></div>
                        <div class="col-md-8">
                            @if($id == null)
                                <select name="category_id" id="category_id" class="form-control">
                                    <option value="">Select Category</option>
                                </select>
                            @else
                                <select name="category_id" id="category_id" class="form-control">
                                    <option value="">Select Category</option>
                                    @foreach($categories as $category)
                                        @if($category->status != 0)
                                            <option value="{{$category->id}}"
                                                    @if(!$id == null)@if($category->id==$id->category_id) selected @endif @endif>{{$category->title}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-4"><label>Description <span style="color: red">*</span></label></div>
                        <div class="col-md-8">
                        <textarea name="description" id="description"
                                  class="form-control">@if(!$id == null) {{ $id->description }} @endif</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-4"><label>Image <span style="color: red">*</span></label></div>
                        <div class="col-md-8">
                            @if(!$id == null){{ $id->image }}@endif
                            <input type="file" name="image" id="image">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-4"><label>List Price <span style="color: red">*</span></label></div>
                        <div class="col-md-8">
                            <input type="number" name="default_price" id="default_price" class="form-control"
                                   @if((App\User::find(\Illuminate\Support\Facades\Session::get('User'))->designation->id != 1) )
                                   @if((App\User::find(\Illuminate\Support\Facades\Session::get('User'))->privilege->product_cost == 0))
                                   disabled
                                   @endif
                                   @endif
                                   @if(!$id == null) value="{{ $id->default_price }}" @endif>

                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-4"><label>Vat apply</label></div>
                        <div class="col-md-8">
                            <label><input type="checkbox" id="vat_apply" name="vat_apply"
                                          @if(!$id == null && $id->vat_apply == true ) checked @endif></label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-4"><label>Vat</label></div>
                        <div class="col-xs-10 col-sm-11 col-md-7">
                            <input type="number" name="vat" id="vat" class="form-control"
                                   @if((App\User::find(\Illuminate\Support\Facades\Session::get('User'))->designation->id != 1) )
                                   @if((App\User::find(\Illuminate\Support\Facades\Session::get('User'))->privilege->product_cost == 0))
                                   disabled
                                   @endif
                                   @endif
                                   @if(!$id == null) value="{{ $id->vat }}" @endif>
                        </div>
                        <div class="col-xs-1 col-sm-1 col-md-1">%</div>
                    </div>
                    <div class="col-md-12 text-center form-group"><button class="btn btn-primary" name="submit" id="submit">@if(!$id == null) Update @else
                                Add @endif</button></div>
                        <div class="col-md-12 text-center form-group"><a class="btn btn-danger" name="complete" id="complete" href="{{ url ('/admin') }}">Finished Adding Products</a></div>
                </form>
            </div>
        </div>
    @else
        <div class="col-md-offset-3">
            <h2 class="error">You are Not Authorize for access this page</h2>
        </div>
    @endif
@stop
@section('scripts')
    <script>
        $("#products").validate({
            rules: {
                part_no: "required",
                name: "required",
                brand_id: "required",
                category_id: "required",
                description: "required",
                default_price: "required"
            }
        });
        $("#brand_id").on('change', function () {
            $.ajax(
                {
                    type: 'get',
                    url: '/admin/manage-product-list/category/' + this.value,
                    success: function (response) {
                        var model = $('#category_id');
                        model.empty();
                        model.append("<option selected>Select Category</option>")
                        $.each(response, function (index, elem) {
                            if (elem.status == 1) {
                                model.append("<option value='" + elem.id + "'>" + elem.title + "</option>")
                            }
                        });
                    }
                }
            );
        });
    </script>
@stop