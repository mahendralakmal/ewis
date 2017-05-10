@extends('admin.layouts.dashboard')
@section('page_heading')
    Assign Products to
    <strong>@if($cp_id==null){{ $id->client->name }}@else{{ $id->ccategory->c_brand->client->client->name }}@endif</strong>
@stop
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
                        @if($cp_id==null)
                            @foreach($id->cbrands as $cbrand)
                                @if($cbrand->remove !=1)
                                    <li class="list-group-item">
                                        <a href="#{{ $cbrand->id }}" class="list-group-item active"
                                           data-toggle="collapse"><strong>{{ $cbrand->brand->title }}</strong>
                                            <span class="badge">{{$cbrand->c_category->where('remove',0)->count()}}</span>
                                        </a>
                                        <div id="{{ $cbrand->id }}" class="collapse">
                                            @foreach($cbrand->c_category as $ccategory)
                                                @if($ccategory->remove !=1)
                                                    <a href="#c{{ $ccategory->id }}" class="list-group-sub-item active"
                                                       data-toggle="collapse"><strong>{{ $ccategory->category->title }}</strong>
                                                        <span class="badge">{{$ccategory->cproduct->where('remove',0)->count()}}</span>
                                                    </a>
                                                    <div id="c{{$ccategory->id}}" class="collapse">
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
                                                            @foreach($ccategory->cproduct as $product)
                                                                @if($product->remove == 0)
                                                                    <tr>
                                                                        <td>{{$product->product->part_no}}</td>
                                                                        <td>{{$product->product->name}}</td>
                                                                        <td>{{$product->product->description}}</td>
                                                                        <td class="text-right">{{$product->special_price}}</td>
                                                                        <td>
                                                                            <a href="/admin/manage-product-list/product/details/edit/{{$product->id}}"
                                                                               class="btn btn-primary btn-outline">Edit</a>
                                                                            <a href="/admin/manage-product-list/product/details/remove/{{$product->id}}"
                                                                               class="btn btn-danger btn-outline">Delete</a>
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
                        @else
                            @foreach((App\ClientsBranch::find($id->ccategory->c_brand->client->id))->cbrands as $cbrand)
                                @if($cbrand->remove !=1)
                                    <li class="list-group-item">
                                        <a href="#{{ $cbrand->id }}" class="list-group-item active"
                                           data-toggle="collapse"><strong>{{ $cbrand->brand->title }}</strong>
                                            <span class="badge">{{$cbrand->c_category->where('remove',0)->count()}}</span>
                                        </a>
                                        <div id="{{ $cbrand->id }}" class="collapse">
                                            @foreach($cbrand->c_category as $ccategory)
                                                @if($ccategory->remove !=1)
                                                    <a href="#c{{ $ccategory->id }}" class="list-group-sub-item active"
                                                       data-toggle="collapse"><strong>{{ $ccategory->category->title }}</strong>
                                                        <span class="badge">{{$ccategory->cproduct->where('remove',0)->count()}}</span>
                                                    </a>
                                                    <div id="c{{$ccategory->id}}" class="collapse">
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
                                                            @foreach($ccategory->cproduct as $product)
                                                                @if($product->remove == 0)
                                                                    <tr>
                                                                        <td>{{$product->product->part_no}}</td>
                                                                        <td>{{$product->product->name}}</td>
                                                                        <td>{{$product->product->description}}</td>
                                                                        <td class="text-right">{{$product->special_price}}</td>
                                                                        <td>
                                                                            <a href="/admin/manage-product-list/product/details/edit/{{$product->id}}"
                                                                               class="btn btn-primary btn-outline">Edit</a>
                                                                            <a href="/admin/manage-product-list/product/details/remove/{{$product->id}}"
                                                                               class="btn btn-danger btn-outline">Delete</a>
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
                        @endif
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <h4>Assign Products</h4>
            <hr>
            <div class="col-md-12">

                @if (session()->has('success_message'))
                    <div class="alert alert-success">
                        {{ session()->get('success_message') }}
                    </div>
                @endif

                @if (session()->has('error_message'))
                    <div class="alert alert-danger">
                        {{ session()->get('error_message') }}
                    </div>
                @endif

                <form class="form-horizontal" id="asignProduct" role="form" method="POST"
                      action="@if($cp_id==null) /admin/manage-product-list/product/details/{{ $id->id }}/store @else /admin/manage-product-list/product/details/update @endif"
                >
                    {{ csrf_field() }}
                    @if($cp_id!=null)
                        <input type="hidden" id="id" name="id" value="{{ $cp_id->id }}">
                    @endif


                    <input type="hidden" id="clients_branch_id" name="clients_branch_id" value="{{ $id->id }}">
                    <input type="hidden" id="user_id" name="user_id"
                           value="{{ \Illuminate\Support\Facades\Session::get('User') }}">
                    <div class="form-group">
                        <div class="col-md-4"><label>Brand</label></div>
                        <div class="col-md-8">


                            <select name="brand_id" id="c_brand_id" class="form-control">
                                <option>Select Brand</option>
                                @if($cp_id==null)
                                    @foreach($id->cbrands as $cbrand)
                                        @if($cbrand->remove !=1)
                                            <option value="{{$cbrand->id}}"
                                            >{{$cbrand->brand->title}}</option>
                                        @endif
                                    @endforeach
                                @else
                                    @foreach((App\ClientsBranch::find($id->ccategory->c_brand->client->id))->cbrands as $cbrand)
                                        @if($cbrand->remove !=1)
                                            <option @if($id->brand_id == $cbrand->id) selected @endif value="{{$cbrand->id}}"
                                            >{{$cbrand->brand->title}}</option>
                                        @endif
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-4"><label>Category</label></div>
                        <div class="col-md-8">
                            <select name="c_category_id" id="c_category_id" class="form-control">
                                <option>Select Category</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-4"><label>Product</label></div>
                        <div class="col-md-8">
                            @if($cp_id == null)
                                <select name="product_id" id="product_id" class="form-control">
                                    <option>Select Part No</option>
                                </select>
                            @else
                                <select name="product_id" id="product_id" class="form-control">
                                    <option>Select Product</option>
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
                                       @if(strtolower(App\User::find(\Illuminate\Support\Facades\Session::get('User'))->designation->designation) != 'super admin')
                                               readonly
                                       @endif
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
@section('scripts')
    <script>
        $("#c_brand_id").on('change', function () {
            $.ajax(
                    {
                        type: 'get',
                        url: '/admin/manage-product-list/cproduct/' + this.value + '/' + $('#clients_branch_id').val(),
                        success: function (response) {
                            var model = $('#c_category_id');
                            model.empty();
                            model.append("<option selected>Select Category</option>")
                            $.each(response, function (index, elem) {
                                if (elem.remove == 0) {
                                    $.ajax({
                                        type: 'get',
                                        url: '/admin/manage-product-list/ccategory/category/' + elem.id,
                                        success: function (res) {
                                            model.append("<option value='" + elem.id + "'>" + res.title + "</option>")
                                        }
                                    });
                                }
                            });
                        }
                    }
            );
        });

        $("#c_category_id").on('change', function () {
            $.ajax(
                    {
                        type: 'get',
                        url: '/admin/manage-product-list/cproduct/' + this.value,
                        success: function (response) {
                            var model = $('#product_id');
                            model.empty();
                            model.append("<option selected>Select Part No</option>")
                            $.each(response, function (index, elem) {
                                model.append("<option value='" + elem.id + "'>" + elem.part_no + ' | ' + elem.name + "</option>");
                            });
                        }
                    }
            );
        });
    </script>
@stop
