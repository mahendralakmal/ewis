@extends('admin.layouts.dashboard')
@section('page_heading','Add New User Designation')
@section('section')
    @if(\App\User::find(\Illuminate\Support\Facades\Session::get('User'))->privilege->designation)
    <div class="col-md-7">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Designations</h3>
            </div>
            <div class="panel-body">
                @if(!$designations->count() == 0)
                    <table class="table">
                        <thead>
                        <tr>
                            <td><h5>Designation</h5></td>
                            <td class="col-md-3"></td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($designations as $designation)
                            @if(!$designation->deleted == 1)
                            <tr>
                                <td>{{$designation->designation}}</td>
                                <td>
                                    <a href="/admin/users/manage-user-designations/{{ $designation->id }}" class="btn btn-primary btn-outline">Edit</a>
                                </td>
                            </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <p>No users found.</p>
                @endif
            </div>
        </div>
    </div>
    <div class="col-md-5">
        <form class="form-horizontal" role="form" method="POST" @if($id === "") action="/admin/users/designation/store" @else action="/admin/users/designation/update" @endif>
            {{ csrf_field() }}
            @if(!$id == "")
                <input type="hidden" id="id" name="id" value="{{$id->id}}">
            @endif
            <div class="form-group">
                <div class="col-md-5">
                    <label>Designation</label>
                </div>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="designation" id="designation" @if(!$id == "") value="{{$id->designation}}" @endif>
                    <input type="hidden" id="user_id" name="user_id" value="{{ \Illuminate\Support\Facades\Session::get('User') }}">
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-5">
                    {{--<label>Confirm Passworde</label>--}}
                </div>
                <div class="col-md-7">
                    <button class="btn btn-primary btn-outline" type="submit">@if($id === "")Add @else
                            Update @endif</button>
                </div>
            </div>
        </form>
    </div>
    @else
        <div class="col-md-offset-3">
            <h2>You are Not Authorize for access this page</h2>
        </div>
    @endif
@stop
