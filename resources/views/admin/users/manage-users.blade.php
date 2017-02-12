@extends('admin.layouts.dashboard')
@section('page_heading','Manage Users')
@section('section')
    <div class="col-md-9">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Users</h3>
            </div>
            <div class="panel-body">
                @if(!$users->count() == 0)
                    <table class="table">
                        <thead>
                        <tr>
                            <td></td>
                            <td><h5>Email</h5></td>
                            <td><h5>Name</h5></td>
                            <td><h5>Designation</h5></td>
                            <td><h5>NIC/ Passport</h5></td>
                            <td class="col-md-3"></td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            @if(!$user->deleted == 1)
                                <tr>
                                    <td>@if($user->approval == 1)

                                            <i class="fa fa-check green fa-fw"></i>
                                        @endif</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->designation->designation}}</td>
                                    <td>{{$user->nic_pass}}</td>
                                    <td><a href="/admin/users/manage-users/approved/{{ $user->id }}" class="btn btn-primary btn-outline">Approve</a>
                                        <a href="/admin/users/manage-users/unapproved/{{ $user->id }}" class="btn btn-danger btn-outline" @if(!$user->approval == 1) disabled @endif>Unapprove</a> </td>
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
@stop
