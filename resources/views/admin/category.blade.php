@extends('admin.layouts.dashboard')
@section('page_heading','Categories')
@section('section')
    @if((\Illuminate\Support\Facades\Session::has('User'))
    && (\App\User::find(\Illuminate\Support\Facades\Session::get('User'))->privilege->category))
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Products</h3>
            </div>
            <div class="panel-body">
                <table class="table">
                    <thead>
                    <tr>
                        <td><h5>title</h5></td>
                        <td><h5>Brand</h5></td>
                        <td><h5>Description</h5></td>
                        <td></td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{$category->title}}</td>
                            <td>{{$category->brand->title}}</td>
                            <td>{{$category->description}}</td>
                            <td>
                                <a href="/admin/categories/{{$category->id}}"
                                   class="btn btn-primary btn-outline">Edit</a>
                                <a href="/admin/categories/{{$category->id}}/remove"
                                   class="btn btn-danger btn-outline">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <h4>Add new Category</h4>
        <hr>
        <div class="col-md-12">
            <form class="form-horizontal" id="categories" enctype="multipart/form-data" role="form" method="POST"
                  @if($id == null) action="/admin/categories/store" @else action="/admin/categories/update" @endif>
                {{ csrf_field() }}
                @if(!$id == null)
                    <input type="hidden" id="id" name="id" value="{{ $id->id }}">
                @endif
                <input type="hidden" id="user_id" name="user_id"
                       value="{{ \Illuminate\Support\Facades\Session::get('User') }}">
                <div class="form-group row">
                    <div class="col-md-4"><label>Title</label></div>
                    <div class="col-md-8">
                        <input type="text" name="title" id="title" class="form-control" @if(!$id == null) value="{{ $id->title }}" @endif>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4"><label>Brand</label></div>
                    <div class="col-md-8">
                        <select name="brand_id" id="brand_id" class="form-control">
                            <option>Select Brand</option>
                            @foreach($brands as $brand)
                                <option value="{{$brand->id}}" @if(!$id == null)@if($brand->id==$id->brand_id) selected @endif @endif>{{$brand->title}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4"><label>Description</label></div>
                    <div class="col-md-8">
                        <textarea name="description" id="description" class="form-control"> @if(!$id == null) {{ $id->description }} @endif</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4"><label>Image</label></div>
                    <div class="col-md-8">
                        <input type="file" name="image" id="image">
                    </div>
                </div>
                <button class="btn btn-primary" name="submit" id="submit">@if(!$id == null) Update @else Add @endif</button>
            </form>
        </div>
    </div>
    @else
        <div class="col-md-offset-3">
            <h2>You are Not Authorize for access this page</h2>
        </div>
    @endif
@stop
