@extends('admin.layouts.dashboard')
@section('page_heading','Client Profile ')
@section('section')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Clients</h3>
                </div>
                <div class="panel-body">
                    <table class="table">
                        <thead>
                        <tr>
                            {{--<td></td>--}}
                            <td><h5>Name</h5></td>
                            <td><h5>Email</h5></td>
                            <td><h5>Telephone</h5></td>
                            {{--<td><h5>Logo</h5></td>--}}
                            {{--<td><h5>Color</h5></td>--}}
                            <td class="col-md-3"></td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($clients as $client)
                            <tr>
                                <td>{{ $client->name }}</td>
                                <td>{{ $client->email }}</td>
                                <td>{{ $client->telephone }}</td>
                                {{--<td style="padding: 10px;"><span style="background-color: {{ $client->color }}; height: 10px; width: 10px;"></span></td>--}}
                                <td>
                                    <a href="/admin/manage-clients/update-profile/{{ $client->id }}" class="btn btn-primary btn-outline">Edit</a>
                                    <a @if(!$client->approval) href="/admin/manage-clients/approved/{{ $client->id }}" class="btn btn-primary btn-outline" @else href="/admin/manage-clients/unapproved/{{ $client->id }}" class="btn btn-danger btn-outline"@endif>@if(!$client->approval) Approve @else Unapprove @endif</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-4">
            <form method="post" id="clientProfile" enctype="multipart/form-data"
                  @if($id == null)action="/admin/manage-clients/store"
                  @else action="/admin/manage-clients/update" @endif role="form" class="form-horizontal">
                {{ csrf_field() }}
                <input type="hidden" id="user_id" name="user_id"
                       value="{{ \Illuminate\Support\Facades\Session::get('User') }}">

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
                    <div class="col-md-8"><input type="file" id="logo" name="logo"></div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4"><label>Profile Colour</label></div>
                    <div class="col-md-8"><input type="color" id="color" name="color" class="form-control"
                                                 @if(!$id == null) value="{{ $id->color }}"
                                                 @else value="#ffffff"@endif></div>
                </div>
                <div class="col-md-12">&nbsp;</div>
                <button type="submit" class="btn btn-primary btn-outline">Submit</button>
            </form>
        </div>
    </div>

@stop