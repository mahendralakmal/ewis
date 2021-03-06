@extends('admin.layouts.dashboard')
@section('page_heading','Manage Users')
@section('section')
    @if((\Illuminate\Support\Facades\Session::has('User'))
    && (\App\User::find(\Illuminate\Support\Facades\Session::get('User'))->privilege != null)
    && (\App\User::find(\Illuminate\Support\Facades\Session::get('User'))->privilege->user_approve))
    <div class="row">
        <div class="col-sx-12 col-sm-12 col-md-12 col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Users</h3>
                </div>
                <div class="panel-body">
                    @if(!$users->count() == 0)
                        <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <td></td>
                                <td><h5>Email</h5></td>
                                <td><h5>Name</h5></td>
                                <td><h5>Designation</h5></td>
                                <td><h5>NIC/ Passport</h5></td>
                                <td></td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                @if(!$user->deleted == 1 && $user->designation_id != 2)
                                    <tr>
                                        <td width="100px">@if($user->approval == 1)

                                                <i class="fa fa-check green fa-fw"></i>
                                            @endif</td>
                                        <td width="100px">{{$user->email}}</td>
                                        <td width="100px">{{$user->name}}</td>
                                        <td width="100px">{{$user->designation->designation}}</td>
                                        <td width="100px">{{$user->nic_pass}}</td>
                                        <td width="200px">
                                            {{--                                        {{ $user->designation->designation }}--}}
                                            {{--{{ $user->designation_id }}--}}
                                            {{--@if(strtolower($user->designation->designation) != "client")--}}
                                                <a href="/admin/users/manage-users/{{ $user->id }}/privileges"
                                                   class="btn btn-primary btn-outline">Privileges</a>
                                            {{--@endif--}}

                                            @if(strtolower($user->designation->designation) != "super admin")
                                                <a @if($user->approval != 1) href="/admin/users/manage-users/approved/{{ $user->id }}"
                                                   @else
                                                   href="/admin/users/manage-users/unapproved/{{ $user->id }}"
                                                   @endif
                                                   class="btn @if(!$user->approval == 1) btn-primary @else btn-danger @endif btn-outline">@if(!$user->approval == 1)
                                                        Approve @else Unapprove @endif</a>

                                            @endif
                                        </td>

                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                        </div>
                    @else
                        <p>No users found.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @else
        <div class="col-md-offset-3">
            <h2 class="error">You are Not Authorize for access this page</h2>
        </div>
    @endif
@stop
