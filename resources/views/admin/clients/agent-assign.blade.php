@extends('admin.layouts.dashboard')
@section('page_heading')
    <strong>{{ $id->client->name }} - {{ $id->name }}</strong>
    <br>
@stop
@section('section')
    @if((\Illuminate\Support\Facades\Session::has('User'))
    && (\App\User::find(\Illuminate\Support\Facades\Session::get('User'))->privilege != null)
    && (\App\User::find(\Illuminate\Support\Facades\Session::get('User'))->privilege->assign_agent))
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Assign Customer Account Manager</h3>
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
                        @if(Session::get('User') ==1)
                            @foreach($users as $user)
                                @if($user->designation_id != 2)
                                    <tr>
                                        <td>
                                            @if($user->id === $id->agent_id)
                                                <i class="fa fa-check green fa-fw"></i>
                                            @endif
                                        </td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->designation->designation }}</td>
                                        <td>
                                            <a href="{{ url('/admin/manage-clients/check-assignments/'.$user->id) }}"
                                               class="btn btn-primary btn-outline">Check Assigned Clients</a>

                                            <a href="@if($user->id === $id->agent_id)
                                            {{ url('/admin/manage-clients/remove/'.$id->id.'/'.$user->id) }}
                                            @else
                                            {{ url('/admin/manage-clients/assign/'.$id->id.'/'.$user->id) }}
                                            @endif
                                                    " class="btn @if($user->id === $id->agent_id)
                                                    btn-danger
                                                    @else
                                                    btn-success
                                                    @endif
                                                    btn-outline">
                                                @if($user->id === $id->agent_id) Remove @else
                                                    Assign @endif
                                            </a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        @else
                            @if(App\ClientsBranch::where('agent_id',$users->id)->count() > 0)
                                <tr>
                                    <td>
                                        @if($users->id === $id->agent_id)
                                            <i class="fa fa-check green fa-fw"></i>
                                        @endif
                                    </td>
                                    <td>{{ $users->email }}</td>
                                    <td>{{ $users->name }}</td>
                                    <td>{{ $users->designation->designation }}</td>
                                    <td>
                                        <a href="{{ url('/admin/manage-clients/check-assignments/'.$users->id) }}"
                                           class="btn btn-primary btn-outline">Check Assigned Clients</a>
                                        <a href="@if($users->id === $id->agent_id)
                                        {{ url('/admin/manage-clients/remove/'.$id->id.'/'.$users->id) }}
                                        @else
                                        {{ url('/admin/manage-clients/assign/'.$id->id.'/'.$users->id) }}
                                        @endif
                                                " class="btn @if($users->id === $id->agent_id)
                                                btn-danger
                                                @else
                                                btn-success
                                                @endif
                                                btn-outline">
                                            @if($users->id === $id->agent_id) Remove @else
                                                Assign @endif
                                        </a>
                                    </td>
                                </tr>
                            @endif
                            @foreach(App\User::where('section_head_id',$users->id)->get() as $user)
                                @if($user->designation_id != 2)
                                    @foreach(App\User::where('section_head_id',$user->id)->get() as $suser)
                                        @if($suser->designation_id != 2)
                                            <tr>
                                                <td>
                                                    @if($suser->id === $id->agent_id)
                                                        <i class="fa fa-check green fa-fw"></i>
                                                    @endif
                                                </td>
                                                <td>{{ $suser->email }}</td>
                                                <td>{{ $suser->name }}</td>
                                                <td>{{ $suser->designation->designation }}</td>
                                                <td>
                                                    <a href="{{ url('/admin/manage-clients/check-assignments/'.$suser->id) }}"
                                                       class="btn btn-primary btn-outline">Check Assigned Clients</a>
                                                    <a href="@if($suser->id === $id->agent_id)
                                                    {{ url('/admin/manage-clients/remove/'.$id->id.'/'.$suser->id) }}
                                                    @else
                                                    {{ url('/admin/manage-clients/assign/'.$id->id.'/'.$suser->id) }}
                                                    @endif
                                                            " class="btn @if($suser->id === $id->agent_id)
                                                            btn-danger
                                                            @else
                                                            btn-success
                                                            @endif
                                                            btn-outline">
                                                        @if($suser->id === $id->agent_id) Remove @else
                                                            Assign @endif
                                                    </a>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    <tr>
                                        <td>
                                            @if($user->id === $id->agent_id)
                                                <i class="fa fa-check green fa-fw"></i>
                                            @endif
                                        </td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->designation->designation }}</td>
                                        <td>
                                            <a href="{{ url('/admin/manage-clients/check-assignments/'.$user->id) }}"
                                               class="btn btn-primary btn-outline">Check Assigned Clients</a>
                                            <a href="@if($user->id === $id->agent_id)
                                            {{ url('/admin/manage-clients/remove/'.$id->id.'/'.$user->id) }}
                                            @else
                                            {{ url('/admin/manage-clients/assign/'.$id->id.'/'.$user->id) }}
                                            @endif
                                                    " class="btn @if($user->id === $id->agent_id)
                                                    btn-danger
                                                    @else
                                                    btn-success
                                                    @endif
                                                    btn-outline">
                                                @if($user->id === $id->agent_id) Remove @else
                                                    Assign @endif
                                            </a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        @endif
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