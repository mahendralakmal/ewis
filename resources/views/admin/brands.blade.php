@extends('admin.layouts.dashboard')
@section('page_heading','Brands')
@section('section')
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Brand Categories</h3>
            </div>
            <div class="panel-body">
                <table class="table">
                    <thead>
                    <tr>
                        <td><h5>title</h5></td>
                        <td><h5>Description</h5></td>
                        <td></td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($brands as $brand)
                        <tr>
                            <td>{{$brand->title}}</td>
                            <td>{{$brand->description}}</td>
                            <td><a href="#" class="btn btn-primary btn-outline">Edit</a>  <a href="#" class="btn btn-danger btn-outline">Delete</a> </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <h4>Add new Brand</h4><hr>
        <div class="col-md-12">
            <form action="">
                <div class="form-group row">
                    <div class="col-md-4"><label>Title</label></div>
                    <div class="col-md-8">
                        <input type="text" name="title" id="title" class="form-control">
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
