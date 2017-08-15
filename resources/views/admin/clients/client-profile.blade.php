@extends('admin.layouts.dashboard')
@section('page_heading','Organizations ')
@section('section')
    @if((Session::has('User'))
    && (\App\User::find(Session::get('User'))->privilege != null)
    && (\App\User::find(Session::get('User'))->privilege->client_prof))
        {{--<div class="row">--}}
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Organizations</h3>
                    </div>
                    <div class="panel-body">
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <input type="hidden" id="hidUser" name="hidUser" value="{{ Session::get('User') }}">
                            <input type="text" id="search" name="search" placeholder="Search Organization"
                                   class="form-control">
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
                            <div class="table-responsive tbl_ori">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <td><h5>Name</h5></td>
                                        <td><h5>Email</h5></td>
                                        <td><h5>Telephone</h5></td>
                                        <td class="col-md-3"></td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($clients as $client)
                                            <tr>
                                                <td>{{ $client->name }}</td>
                                                <td>{{ $client->email }}</td>
                                                <td>{{ $client->telephone }}</td>
                                                <td>
                                                    <a href="/admin/manage-clients/update-profile/{{ $client->id }}"
                                                       class="btn btn-primary btn-outline">Edit</a>
                                                    <a @if(!$client->approval) href="/admin/manage-clients/approved/{{ $client->id }}"
                                                       class="btn btn-primary btn-outline"
                                                       @else href="/admin/manage-clients/unapproved/{{ $client->id }}"
                                                       class="btn btn-danger btn-outline"@endif>@if(!$client->approval)
                                                            Approve @else Unapprove @endif</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">

                @include('admin.messages.success')
                @include('admin.messages.error')

                <form id="clientProfile" @if($id == null)action="/admin/manage-clients/store"
                      @else action="/admin/manage-clients/update" @endif enctype="multipart/form-data" role="form"
                      method="POST" class="form-horizontal">
                    {{ csrf_field() }}
                    <input type="hidden" id="user_id" name="user_id"
                           value="{{ Session::get('User') }}">
                    @if(!$id == null)
                        <input type="hidden" id="id" name="id" value="{{$id->id}}">
                    @endif
                    <div class="form-group row">
                        <div class="col-md-4"><label>Name</label></div>
                        <div class="col-md-8"><input type="text" id="name" name="name" class="form-control"
                                                     @if(!$id == null) value="{{ $id->name }}" disabled @endif>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-4"><label>Address</label></div>
                        <div class="col-md-8"><textarea class="form-control" name="address"
                                                        id="address">@if(!$id == null){{ $id->address }} @endif</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-4"><label>Telephone</label></div>
                        <div class="col-md-8"><input type="tel" id="telephone" name="telephone" class="form-control"
                                                     @if(!$id == null) value="{{ $id->telephone }}" @endif></div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-4"><label>Email</label></div>
                        <div class="col-md-8"><input type="email" id="email" name="email" class="form-control"
                                                     @if(!$id == null) value="{{ $id->email }}" @endif></div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-4"><label>Logo</label></div>
                        <div class="col-md-8">
                            <input type="file" id="logo" name="logo">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-4"><label>Profile Colour</label></div>
                        <div class="col-md-8"><input type="color" id="color" name="color" class="form-control"
                                                     @if(!$id == null) value="{{ $id->color }}"
                                                     @else value="#ffffff"@endif></div>
                    </div>
                    <div class="col-md-12 text-center">&nbsp;
                        <button type="submit" class="btn btn-primary btn-outline">Submit</button>
                    </div>
                </form>
            </div>
        {{--</div>--}}
    @else
        <div class="col-md-offset-3">
            <h2 class="error">You are Not Authorize for access this page</h2>
        </div>
    @endif
@stop
@section('scripts')
    <script>
        $("#search").on('keyup change', function () {
            var path = window.location.pathname;

            if(this.value != '') {
                $.ajax(
                    {
                        type: 'get',
                        url: '/admin/manage-clients/create-profile/search/' + $('#hidUser').val() + '/' + this.value,
                        success: function (response) {
                            $(".tbl_ori").html(response);
                        }
                    }
                );
            } else {
                window.location.replace(path);
            }
        });

        $("#clientProfile").validate({
            rules: {
                name: "required",
                address: "required",
                telephone: "required",
                email: {
                    required: true,
                    email: true
                }
            }
        });
    </script>
@stop