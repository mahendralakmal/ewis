@extends('admin.layouts.dashboard')
@section('page_heading','Manage Clients')
@section('section')
    {{--<div class="col-md-6">--}}
        {{--<div class="form-group row">--}}
            {{--<div class="col-md-5">Client</div>--}}
            {{--<div class="col-md-7">--}}
                {{--<select class="form-control" name="client" id="client">--}}
                    {{--<option>Select Client</option>--}}
                    {{--@foreach($clients as $client)--}}
                        {{--<option value="{{$client->id}}">{{$client->name}}</option>--}}
                    {{--@endforeach--}}
                    {{--<option value="1">COMMERCIAL BANK</option>--}}
                    {{--<option value="2">SEYLAN BANK</option>--}}
                {{--</select>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    <div class="col-md-7">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Products</h3>
            </div>
            <div class="panel-body">
                <table class="table">
                    <thead>
                    <tr>
                        <td><h5>Brand</h5></td>
                        <td><h5>Category</h5></td>
                        <td><h5>Product</h5></td>
                        <td><h5>Price</h5></td>
                        <td class="col-md-5"></td>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Lexmark</td>
                        <td>Printers</td>
                        <td>sx001</td>
                        <td class="text-right">25000.00</td>
                        <td>
                            <a href="/admin/manage-clients/agent-assign" class="btn btn-primary btn-outline">View Details</a>
                            <a href="#" class="btn btn-danger btn-outline">Remove</a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-5">
        <h4>Assign Products</h4>
        <hr>
        <div class="col-md-12">
            <form class="form-horizontal" id="asignProduct" role="form" method="POST" action="/admin/manage-product-list/product/details/{{ $id->id }}/store">
                {{ csrf_field() }}
                <div class="form-group row">
                    <input type="hidden" id="client_id" name="client_id" value="{{ $id->id }}">
                    <input type="hidden" id="user_id" name="user_id"
                           value="{{ \Illuminate\Support\Facades\Session::get('User') }}">
                    <div class="col-md-4"><label>Brand</label></div>
                    <div class="col-md-8">
                        <select name="brand_id" id="brand_id" class="form-control">
                            <option>Select Brand</option>
                            @foreach($brands as $brand)
                            <option value="{{$brand->id}}"
                            >{{$brand->title}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4"><label>Category</label></div>
                    <div class="col-md-8">
                        <select name="category_id" id="category_id" class="form-control">
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4"><label>Product</label></div>
                    <div class="col-md-8">
                        <select name="product_id" id="product_id" class="form-control">
                            <option>Select Product</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4"><label>list Price</label></div>
                    <div class="col-md-8">
                        <input type="number" id="list_price" name="list_price" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4"><label>Special Price</label></div>
                    <div class="col-md-8">
                        <input type="number" id="special_price" name="special_price" class="form-control">
                    </div>
                </div>
                <button class="btn btn-primary" name="submit" id="submit">Add</button>
            </form>
        </div>
    </div>
@stop
