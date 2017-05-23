@extends('admin.layouts.dashboard')
@section('page_heading','Categories')
@section('section')
    @if((\Illuminate\Support\Facades\Session::has('User'))
    && (\App\User::find(\Illuminate\Support\Facades\Session::get('User'))->privilege != null)
    && (\App\User::find(\Illuminate\Support\Facades\Session::get('User'))->privilege->category))
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Categories</h3>
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
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <td><h5>Category</h5></td>
                                                <td><h5>Description</h5></td>
                                                <td></td>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($brand->category as $cate)
                                                @if($cate->status)
                                                    <tr>
                                                        <td>{{$cate->title}}</td>
                                                        <td>{{$cate->description}}</td>
                                                        <td>
                                                            <a href="/admin/categories/{{$cate->id}}"
                                                               class="btn btn-primary btn-outline">Edit</a>
                                                            {{--<a href="/admin/categories/{{$cate->id}}/remove"--}}
                                                               {{--class="btn btn-danger btn-outline">Delete</a>--}}
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <h4>Add new Category</h4>
            <hr>
            <div class="col-md-12">
                @include('admin.messages.success')
                @include('admin.messages.error')
                <form class="form-horizontal" id="categories" enctype="multipart/form-data" role="form" method="POST"
                      @if($id == null) action="/admin/categories/store" @else action="/admin/categories/update" @endif>
                    {{ csrf_field() }}
                    @if(!$id == null)
                        <input type="hidden" id="id" name="id" value="{{ $id->id }}">
                    @endif
                    <input type="hidden" id="user_id" name="user_id"
                           value="{{ \Illuminate\Support\Facades\Session::get('User') }}">
                    <div class="form-group row">
                        <div class="col-md-4"><label>Category <span style="color: red">*</span></label></div>
                        <div class="col-md-8">
                            <input type="text" name="title" id="title" class="form-control"
                                   @if(!$id == null) value="{{ $id->title }}" @endif>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-4"><label>Brand <span style="color: red">*</span></label></div>
                        <div class="col-md-8">
                            <select name="brand_id" id="brand_id" class="form-control">
                                <option value="">Select Brand</option>
                                @foreach($brands as $brand)
                                    <option value="{{$brand->id}}"
                                            @if(!$id == null)@if($brand->id==$id->brand_id) selected @endif @endif>{{$brand->title}}</option>

                                @endforeach
                            </select> 
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
                            @if(!$id == null){{ $id->image }}@endif
                            <input type="file" name="image" id="image">
                        </div>
                    </div>
                    <input type="hidden" id="category_key" name="category_key">
                    <div class="col-md-12 text-center form-group"><button class="btn btn-primary" name="submit" id="submit">@if(!$id == null) Update @else
                                Add @endif</button></div>
                    <div class="col-md-12 text-center form-group"><a class="btn btn-danger" name="complete" id="complete" href="{{ url ('/admin') }}">Finished Adding Categories</a></div>
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
        $("#categories").validate({
            rules: {
                title: "required",
                brand_id: "required",
                description: 'required'
            }
        });


        $('#title').on('change', function () {
            categoryKeyFix();
        })
        $('#brand_id').on('change', function () {
            categoryKeyFix();
        })

        function categoryKeyFix() {
            if (!$('#title').val() == '' && !$('#brand_id').val() == '')
                $('#category_key').val($('#title').val() + "_" + $('#brand_id').val());
        }

    </script>
@stop