@extends('admin.layouts.dashboard')
@section('page_heading','All Products')
@section('section')
    @if((\Illuminate\Support\Facades\Session::has('User'))
    && (\App\User::find(\Illuminate\Support\Facades\Session::get('User'))->privilege != null)
    && (\App\User::find(\Illuminate\Support\Facades\Session::get('User'))->privilege->product))

        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">All Products</h3>
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
                                                            <td class="text-right"><h5>Price</h5></td>
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
                                                                        {{--<a href="/admin/products/{{$prod->id}}"--}}
                                                                           {{--class="btn btn-primary btn-outline">Edit</a>--}}
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