@extends('admin.layouts.dashboard')
@section('page_heading','Add New Users')
@section('section')
    <div class="col-md-7">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Users</h3>
            </div>
            <div class="panel-body">
                @if(!$users->count() == 0)
                    <table class="table">
                        <thead>
                        <tr>
                            <td><h5>Email</h5></td>
                            <td><h5>Name</h5></td>
                            <td><h5>Designation</h5></td>
                            <td><h5>NIC</h5></td>
                            <td class="col-md-3"></td>
                        </tr>
                        </thead>
                        <tbody>
                        {{--@if(!empty($user))--}}
                        @foreach($users as $user)
                            @if(!$user->deleted == 1)
                                <tr>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->designation->designation}}</td>
                                    <td>{{$user->nic_pass}}</td>
                                    <td>
                                        {{--<button class="btn btn-primary btn-outline" data-toggle="model" data-target="#userEditModel"> Edit </button>--}}
                                        <a href="/admin/users/create-users/{{ $user->id }}"
                                           class="btn btn-primary btn-outline">Edit</a>
                                        <form method="POST" action="/admin/users/delete" role="form">
                                            {{ csrf_field() }}
                                            <input type="hidden" id="hidId" name="hidId" value="{{ $user->id }}">
                                            <button class="btn btn-danger btn-outline" type="submit">Delete</button>
                                        </form>
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
        <form id="userCreate" class="form-horizontal" role="form" method="POST"
              @if($id === "")action="/admin/users/store"
              @else action="/admin/users/update" @endif>
            {{ csrf_field() }}
            <div class="form-group">
                <div class="col-md-5">
                    <label>Email</label>
                </div>
                <div class="col-md-7">
                    @if(!$id == "")
                        <input type="hidden" id="id" name="id" value="{{$id->id}}">
                    @endif

                    <input type="email" class="form-control" name="email" id="email"
                           @if(!$id == "") value="{{$id->email}}" disabled @endif>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-5">
                    <label>Passworde</label>
                </div>
                <div class="col-md-7">
                    <input type="password" class="form-control" name="password" id="password">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-5">
                    <label>Confirm Passworde</label>
                </div>
                <div class="col-md-7">
                    <input type="password" class="form-control" name="cpassword" id="cpassword">
                </div>
            </div>
            <hr>

            <div class="form-group">
                <div class="col-md-5">
                    <label>Name</label>
                </div>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="name" id="name"
                           @if(!$id == "") value="{{$id->name}}" @endif>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-5">
                    <label>Designation</label>
                </div>
                <div class="col-md-7">
                    <select type="text" class="form-control" name="designation_id" id="designation_id">
                        <option>Select Designation</option>
                        @if(!$id == "")
                            @foreach($designations as $designation)
                                <option value="{{ $designation->id }}"
                                        @if($designation->id ==$id->designation_id) selected @endif>{{ $designation->designation }}</option>
                            @endforeach
                        @else
                            @foreach($designations as $designation)
                                <option value="{{ $designation->id }}">{{ $designation->designation }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-5">
                    <label>NIC/ Passport No</label>
                </div>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="nic_pass" id="nic_pass" maxlength="12"
                           @if(!$id == "") value="{{$id->nic_pass}}" @endif>
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
@stop
