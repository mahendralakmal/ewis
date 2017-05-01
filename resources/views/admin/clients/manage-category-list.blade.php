@extends('admin.layouts.dashboard')
@section('page_heading')
    Assign Categories to <strong>{{ $id->client->name }}</strong>
@stop
@section('section')
    @if((\Illuminate\Support\Facades\Session::has('User'))
    && (\App\User::find(\Illuminate\Support\Facades\Session::get('User'))->privilege != null)
    && (\App\User::find(\Illuminate\Support\Facades\Session::get('User'))->privilege->asign_product))
        <div class="col-md-7">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Categories</h3>
                </div>
                <div class="panel-body">
                    <div class="panel-body">
                        <ul class="list-group">
                            @foreach($id->cbrands as $cbrand)
                                {{--{{ $cbrand->brand->title }} | {{ $cbrand->brand->count() }}--}}
                                <li class="list-group-item">
                                    <a @if($cbrand->brand->count() >0)href="#{{ $cbrand->id }}"
                                       @endif class="list-group-item active" data-toggle="collapse">
                                        <strong>{{ $cbrand->brand->title }}</strong>
                                        <span class="badge">@if($cbrand->brand->count() >0){{$cbrand->c_category->count()}}@endif</span>
                                    </a>
                                    @if($cbrand->brand->count() >0)
                                        <div id="{{$cbrand->id}}" class="collapse">
                                            <table class="table">
                                                <tbody>
                                                    @foreach($cbrand->c_category as $category)
                                                        @if($category->remove == 0)
                                                            <tr>
                                                                <td>{{ $category->category->title }}</td>
                                                                <td>
                                                                    <a href="/admin/manage-product-list/category/details/remove/{{ $category->id }}"
                                                                       class="btn btn-danger btn-outline">Remove</a>
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <h4>Assign Categories</h4>
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
                      action="@if($cp_id==null) /admin/manage-product-list/category/details/{{ $id->id }}/store @else /admin/manage-product-list/category/details/update @endif"
                >
                    {{ csrf_field() }}
                    <div class="form-group row">

                        @if($cp_id!=null)
                            <input type="hidden" id="id" name="id" value="{{ $cp_id->id }}">
                        @endif
                        {{--{{ $id }}--}}
                        <input type="hidden" id="clients_branch_id" name="clients_branch_id" value="{{ $id->id }}">
                        <input type="hidden" id="user_id" name="user_id"
                               value="{{ \Illuminate\Support\Facades\Session::get('User') }}">
                        <div class="form-group">
                            <div class="col-md-4"><label>Brand</label></div>
                            <div class="col-md-8">


                                <select name="c_brand_id" id="c_brand_id" class="form-control">
                                    <option>Select Brand</option>
                                    @foreach($id->cbrands as $cbrand)
                                        @if($cbrand->remove !=1)
                                            <option value="{{$cbrand->id}}"
                                            >{{$cbrand->brand->title}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-4"><label>Category</label></div>
                            <div class="col-md-8">
                                <select name="category_id" id="c_category_id" class="form-control">
                                    <option>Select Category</option>
                                </select>
                            </div>
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
                        url: '/admin/manage-product-list/ccategory/' + this.value + '/' + $('#clients_branch_id').val(),
                        success: function (response) {
                            var model = $('#c_category_id');
                            model.empty();
                            model.append("<option selected>Select Category</option>")
                            $.each(response, function (index, elem) {
                                model.append("<option value='" + elem.id + "'>" + elem.title + "</option>")
                            });
                        }
                    }
            );
        });
    </script>
@stop