@extends('admin.layouts.dashboard')
@section('page_heading','Manage Clients')
@section('section')
    @if(\App\User::find(\Illuminate\Support\Facades\Session::get('User'))->privilege->client_users)
    <div class="col-md-12 col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Clients</h3>
            </div>
            <div class="panel-body">
                <table class="table">
                    <thead>
                    <tr>
                        <td></td>
                        <td><h5>Client</h5></td>
                        <td><h5>Agent</h5></td>
                        <td><h5>Designation</h5></td>
                        <td><h5>Branch</h5></td>
                        <td><h5>Contact No</h5></td>
                        <td><h5>Email</h5></td>
                        <td class="col-md-4"></td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        @if(!$user->clientuser->count() == 0)
                            @foreach($user->clientuser as $cuser)
                                {{--{{ \App\User::find($cuser->user_id)->approval }}--}}
                                <tr>
                                    <td>@if(\App\User::find($cuser->user_id)->approval === 1)
                                    <i class="fa fa-check green fa-fw"></i>
                                    @endif</td>
                                    <td>{{ $cuser->client->name }}</td>
                                    <td>{{ $cuser->cp_name }}</td>
                                    <td>{{ $cuser->cp_designation }}</td>
                                    <td>{{ $cuser->cp_branch }}</td>
                                    <td>{{ $cuser->cp_telephone }}</td>
                                    <td>{{ $cuser->cp_email }}</td>
                                    <td>
                                        <a @if(\App\User::find($cuser->user_id)->approval != 1) href="/admin/manage-clients/client_user/{{ $cuser->user_id }}/activate"
                                           @else href="/admin/manage-clients/client_user/{{ $cuser->user_id }}/deactivate"
                                           @endif class="btn @if(\App\User::find($cuser->user_id)->approval != 1) btn-success @else btn-danger @endif btn-outline">@if(\App\User::find($cuser->user_id)->approval != 1)
                                                Activate @else Deactivate @endif</a>
                                        <a href="/admin/manage-clients/client_user/{{ $user->id }}"
                                           class="btn btn-primary btn-outline">Update
                                            Profile</a>
                                        <a href="/admin/manage-clients/agent-assign/{{ $user->id }}"
                                           class="btn btn-primary btn-outline">Assign
                                            Agent</a>
                                        <br>
                                        <br>
                                        <a href="/admin/manage-product-list/{{ $user->id }}/brands"
                                           class="btn btn-primary btn-outline">Add
                                            Brands</a>
                                        <a href="/admin/manage-product-list/{{ $user->id }}/categories"
                                           class="btn btn-primary btn-outline">Add
                                            Categories</a>
                                        <a href="/admin/manage-product-list/{{ $user->id }}"
                                           class="btn btn-primary btn-outline">Add
                                            Products</a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @else
        <div class="col-md-offset-3">
            <h2>You are Not Authorize for access this page</h2>
        </div>
    @endif
@stop
