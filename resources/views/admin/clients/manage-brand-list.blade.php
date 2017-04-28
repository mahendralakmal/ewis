@extends('admin.layouts.dashboard')
@section('page_heading','Assign Brands to Clients')
@section('section')
    @if((\Illuminate\Support\Facades\Session::has('User'))
    && (\App\User::find(\Illuminate\Support\Facades\Session::get('User'))->privilege != null)
    && (\App\User::find(\Illuminate\Support\Facades\Session::get('User'))->privilege->asign_product))
        <div class="col-md-7">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Brands</h3>
                </div>
                <div class="panel-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <td><h5>Brand</h5></td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cbrands as $cbrand)
                            @if($cbrand->remove == 0)
                                <tr>
                                    <td>{{ App\Brand::find($cbrand->brand_id)->title }}</td>
                                    <td>
                                        {{--<a href="/admin/manage-product-list/brand/details/edit/{{ $cbrand->id }}"--}}
                                           {{--class="btn btn-primary btn-outline">Edit</a>--}}
                                        <a href="/admin/manage-product-list/brand/details/remove/{{ $cbrand->id }}"
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
            <h4>Assign Brands</h4>
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
                        action="@if($cp_id==null) /admin/manage-product-list/brand/details/{{ $id->id }}/store @else /admin/manage-product-list/brand/details/update @endif"
                >
                    {{ csrf_field() }}
                    <div class="form-group row">

                        @if($cp_id!=null)
                            <input type="hidden" id="id" name="id" value="{{ $cp_id->id }}">
                        @endif
                        <input type="hidden" id="clients_branch_id" name="clients_branch_id" value="{{ $id->id }}">
                        <input type="hidden" id="user_id" name="user_id"
                               value="{{ \Illuminate\Support\Facades\Session::get('User') }}">

                        <div class="col-md-4"><label>Brand</label></div>
                        <div class="col-md-8">
                            <select name="brand_id" id="brand_id" class="form-control">
                                <option>Select Brand</option>
                                @foreach($brands as $brand)
                                    <option value="{{$brand->id}}"
                                            @if($cp_id!=null && $brand->id == $cbrands[0]['brand_id']) selected @endif
                                    >{{$brand->title}}</option>
                                @endforeach
                            </select>
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
