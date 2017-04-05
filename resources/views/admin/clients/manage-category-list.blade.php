@extends('admin.layouts.dashboard')
@section('page_heading','Assign Categories to Clients')
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
                    <table class="table">
                        <thead>
                        <tr>
                            <td><h5>Category</h5></td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($ccategories as $ccategory)
                            @if($ccategory->remove == 0)
                                <tr>
                                    <td>{{ App\Category::find($ccategory->category_id)->title }}</td>
                                    <td>
                                        <a href="/admin/manage-product-list/category/details/remove/{{ $ccategory->id }}"
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
            <h4>Assign Categories</h4>
            <hr>
            <div class="col-md-12">
                <form class="form-horizontal" id="asignProduct" role="form" method="POST"
                      action="@if($cp_id==null) /admin/manage-product-list/category/details/{{ $id->id }}/store @else /admin/manage-product-list/category/details/update @endif"
                >
                    {{ csrf_field() }}
                    <div class="form-group row">

                        @if($cp_id!=null)
                            <input type="hidden" id="id" name="id" value="{{ $cp_id->id }}">
                        @endif
                        {{--{{ $id }}--}}
                        <input type="hidden" id="client_id" name="client_id"
                               value="{{ \App\User::find($id->id)->clientuser->first()->client->id }}">
                        <input type="hidden" id="user_id" name="user_id"
                               value="{{ \Illuminate\Support\Facades\Session::get('User') }}">
                        <div class="form-group">
                            <div class="col-md-4"><label>Brand</label></div>
                            <div class="col-md-8">


                                <select name="c_brand_id" id="brand_id" class="form-control">
                                    <option>Select Brand</option>
                                    @foreach($cbrands as $cbrand)
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
                                <select name="category_id" id="category_id" class="form-control">
                                    <option>Select Category</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}"
                                                @if($cp_id!=null && $category->id == $ccategories[0]['category_id']) selected @endif
                                        >{{$category->title}}</option>
                                    @endforeach
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
