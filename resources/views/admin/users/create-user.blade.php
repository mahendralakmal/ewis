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
                            <tr>
                                <td>{{$user->email}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->designation->designation}}</td>
                                <td>{{$user->nic_pass}}</td>
                                <td><a href="/admin/users/create-users/{{ $user->id }}"
                                       class="btn btn-primary btn-outline">Edit</a> <a href="#"
                                                                                       class="btn btn-danger btn-outline">Delete</a>
                                </td>
                            </tr>
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
        <form class="form-horizontal" role="form" method="POST" action="/admin/users/store">
            {{ csrf_field() }}
            <div class="form-group">
                <div class="col-md-5">
                    <label>Email</label>
                </div>
                <div class="col-md-7">
                    <input type="email" class="form-control" name="email" id="email">
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
                    <input type="text" class="form-control" name="name" id="name">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-5">
                    <label>Designation</label>
                </div>
                <div class="col-md-7">
                    <select type="text" class="form-control" name="designation_id" id="designation_id">
                        <option>Select Designation</option>
                        @foreach($designations as $designation)
                            <option value="{{ $designation->id }}">{{ $designation->designation }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-5">
                    <label>NIC/ Passport No</label>
                </div>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="nic_pass" id="nic_pass" maxlength="12">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-5">
                    {{--<label>Confirm Passworde</label>--}}
                </div>
                <div class="col-md-7">
                    <button class="btn btn-primary btn-outline" type="submit">Add</button>
                </div>
            </div>
        </form>
    </div>
@stop
