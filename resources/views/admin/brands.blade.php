@extends('admin.layouts.dashboard')
@section('page_heading','Brands')
@section('section')
    @if((\Illuminate\Support\Facades\Session::has('User'))
    && (\App\User::find(\Illuminate\Support\Facades\Session::get('User'))->privilege != null)
    && (\App\User::find(\Illuminate\Support\Facades\Session::get('User'))->privilege->brand))
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Brand Categories</h3>
                </div>
                <div class="panel-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <td><h5>Title</h5></td>
                            <td><h5>Description</h5></td>
                            <td></td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($brands as $brand)
                            @if($brand->status)
                                <tr>
                                    <td>{{$brand->title}}</td>
                                    <td>{{$brand->description}}</td>
                                    <td>
                                        <a href="/admin/brands/{{$brand->id}}"
                                           class="btn btn-primary btn-outline">Edit</a>
                                        <a href="/admin/brands/{{$brand->id}}/remove"
                                           class="btn btn-danger btn-outline">Delete</a>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <h4>Add new Brand</h4>
            <hr>
            <div class="col-md-12">
                @include('admin.messages.success')
                @include('admin.messages.error')

                <form class="form-horizontal" id="brands" enctype="multipart/form-data" role="form" method="POST"
                      enctype="multipart/form-data" @if($id == null)action="/admin/brands/store"
                      @else action="/admin/brands/update" @endif>
                    {{ csrf_field() }}
                    @if(!$id == null)
                        <input type="hidden" id="id" name="id" value="{{ $id->id }}">
                    @endif
                    <input type="hidden" id="user_id" name="user_id"
                           value="{{ \Illuminate\Support\Facades\Session::get('User') }}">
                    <div class="form-group row">
                        <div class="col-md-4"><label>Title <span style="color: red">*</span></label></div>
                        <div class="col-md-8">
                            <input type="text" name="title" id="title" class="form-control"
                                   @if(!$id == null) value="{{ $id->title }}" @endif>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-4"><label>Description <span style="color: red">*</span></label></div>
                        <div class="col-md-8">
                            <textarea name="description" id="description"
                                      class="form-control">@if(!$id == null) {{ $id->description }} @endif</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-4"><label>Image <span style="color: red">*</span></label></div>
                        <div class="col-md-8">
                            <input type="file" id="image" name="image">
                        </div>
                    </div>
                    <button class="btn btn-primary" name="submit" id="submit">@if(!$id == null) Update @else
                            Add @endif</button>
                </form>
            </div>
        </div>
    @else
        <div class="col-md-offset-3">
            <h2 class="error">You are Not Authorized to access this page</h2>
        </div>
    @endif
@stop

@section('scripts')
    <script>
        $("#brands").validate({
            rules: {
                title: "required",
                brand_id: "required",
                description: 'required',
                image: "required"
            }
        });
    </script>
@stop