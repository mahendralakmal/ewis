@extends('admin.layouts.dashboard')
@section('page_heading','Assign an Agent')
@section('section')
    @if((\Illuminate\Support\Facades\Session::has('User'))
    && (\App\User::find(\Illuminate\Support\Facades\Session::get('User'))->privilege != null)
    && (\App\User::find(\Illuminate\Support\Facades\Session::get('User'))->privilege->assign_agent))
    <div class="col-md-10">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Agents</h3>
            </div>
            <div class="panel-body">
                <table class="table">
                    <thead>
                    <tr>
                        <td></td>
                        <td><h5>Username</h5></td>
                        <td><h5>Name</h5></td>
                        <td><h5>Designation</h5></td>
                        <td class="col-md-5"></td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        @if(strtolower($user->designation->designation) != "client")
                            <tr>
                                <td>
                                    @if($user->id === $id->clientuser->first()->client->agent_id)
                                        <i class="fa fa-check green fa-fw"></i>
                                    @endif
                                </td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->designation->designation }}</td>
                                <td>
                                    <a href="{{ url('/admin/manage-clients/check-assignments/'.$user->id) }}"
                                       class="btn btn-primary btn-outline">Check Assigned Clients</a>
                                    <a href="@if($user->id === $id->clientuser->first()->client->agent_id)
                                    {{ url('/admin/manage-clients/remove/'.$id->id.'/'.$user->id.'/'.$id->clientuser->first()->client->id) }}
                                    @else
                                    {{ url('/admin/manage-clients/assign/'.$id->id.'/'.$user->id.'/'.$id->clientuser->first()->client->id) }}
                                    @endif
                                            " class="btn @if($user->id === $id->clientuser->first()->client->agent_id)
                                            btn-danger
                                            @else
                                            btn-success
                                            @endif
                                            btn-outline">
                                        @if($user->id === $id->clientuser->first()->client->agent_id) Remove @else
                                            Assign @endif
                                    </a>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @else
        <div class="col-md-offset-3">
            <h2 class="error">You are Not Authorize for access this page</h2>
        </div>
    @endif
@stop