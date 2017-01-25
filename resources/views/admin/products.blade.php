@extends('admin.layouts.dashboard')
@section('page_heading','Categories')
@section('section')
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Product Categories</h3>
            </div>
            <div class="panel-body">
                <table class="table">
                    <thead>
                    <tr>
                        <td><h5>Part No</h5></td>
                        <td><h5>Brand</h5></td>
                        <td><h5>Category</h5></td>
                        <td><h5>Description</h5></td>
                        <td></td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{$product->part_no}}</td>
                            <td>{{$product->category->brand->title}}</td>
                            <td>{{$product->category->title}}</td>
                            <td>{{$product->description}}</td>
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
        <h4>Add new Product</h4>
        <hr>
        <div class="col-md-12">
            <form action="">
                <div class="form-group row">
                    <div class="col-md-4"><label>Title</label></div>
                    <div class="col-md-8">
                        <input type="text" name="title" id="title" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4"><label>Category</label></div>
                    <div class="col-md-8">
                        <select name="category_id" id="category_id" class="form-control">
                            <option>Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->title}}</option>
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
