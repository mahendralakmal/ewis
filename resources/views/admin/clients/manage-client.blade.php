@extends('admin.layouts.dashboard')
@section('page_heading','Manage Clients')
@section('section')
    <div class="col-md-12 col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Clients</h3>
            </div>
            <div class="panel-body">
                <table class="table">
                    <thead>
                    <tr>
                        {{--<td></td>--}}
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
                                {{--{{ $cuser }}--}}
                                <tr>
                                    {{--<td>@if(!$user->client->agent_id == null)--}}
                                    {{--<i class="fa fa-check green fa-fw"></i>--}}
                                    {{--@endif</td>--}}
                                    <td>{{ $cuser->client->name }}</td>
                                    <td>{{ $cuser->cp_name }}</td>
                                    <td>{{ $cuser->cp_designation }}</td>
                                    <td>{{ $cuser->cp_branch }}</td>
                                    <td>{{ $cuser->cp_telephone }}</td>
                                    <td>{{ $cuser->cp_email }}</td>
                                    <td>
                                        <a href="#" class="btn btn-success btn-outline">Activate</a>
                                        <a href="/admin/manage-clients/update-profile/{{ $user->id }}"
                                           class="btn btn-primary btn-outline">Update
                                            Profile</a>
                                        <a href="/admin/manage-clients/agent-assign/{{ $user->id }}"
                                           class="btn btn-primary btn-outline">Assign
                                            Agent</a>
                                        <a href="/admin/manage-product-list/{{ $user->id }}"
                                           class="btn btn-primary btn-outline">Assign
                                            Products</a>
                                        <a href="#" class="btn btn-danger btn-outline" disabled>Deactivate</a>
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
@stop
