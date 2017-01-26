@extends('admin.layouts.dashboard')
@section('page_heading','Categories')
@section('section')
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
                            <td><a href="#" class="btn btn-primary btn-outline">Edit</a> <a href="#"
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
            <form class="form-horizontal" role="form" method="POST" action="/admin/categories/store">
                {{ csrf_field() }}
                <div class="form-group row">
                    <div class="col-md-4"><label>Title</label></div>
                    <div class="col-md-8">
                        <input type="text" name="title" id="title" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4"><label>Brand</label></div>
                    <div class="col-md-8">
                        <select name="brand_id" id="brand_id" class="form-control">
                            <option>Select Brand</option>
                            @foreach($brands as $brand)
                                <option value="{{$brand->id}}">{{$brand->title}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4"><label>Description</label></div>
                    <div class="col-md-8">
                        <textarea name="description" id="description" class="form-control"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4"><label>Image</label></div>
                    <div class="col-md-8">
                        <input type="file" name="image" id="image" class="form-control">
                    </div>
                </div>
                <button class="btn btn-primary" name="submit" id="submit">Add</button>
            </form>
        </div>
    </div>
@stop
