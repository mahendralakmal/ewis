@extends('admin.layouts.dashboard')
@section('page_heading','Manage Clients')
@section('section')
    <div class="col-md-10">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Clients</h3>
            </div>
            <div class="panel-body">
                <table class="table">
                    <thead>
                    <tr>
                        <td><h5>Client</h5></td>
                        <td><h5>Address</h5></td>
                        <td class="col-md-6"></td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        @if(!$user->client == null)
                            <tr>
                                <td>{{ $user->client->name }}</td>
                                <td>{{ $user->client->address }}</td>
                                <td>
                                    <a href="#" class="btn btn-success btn-outline">Activate</a>
                                    <a href="/admin/manage-clients/update-profile/{{ $user->id }}" class="btn btn-primary btn-outline">Update
                                        Profile</a>
                                    <a href="/admin/manage-clients/agent-assign" class="btn btn-primary btn-outline">Assign
                                        Agent</a>
                                    <a href="#" class="btn btn-danger btn-outline" disabled>Deactivate</a>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop
