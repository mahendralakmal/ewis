@extends('admin.layouts.dashboard')
@section('page_heading','Assign A Agent')
@section('section')
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
                    @foreach($ajents as $ajent)
                        <tr>
                            <td>
                                @if($id->client->agent_id === $ajent->id)
                                    <i class="fa fa-check green fa-fw"></i>
                                @endif
                            </td>
                            <td>{{ $ajent->email }}</td>
                            <td>{{ $ajent->name }}</td>
                            <td>{{ $ajent->designation->designation }}</td>
                            <td>
                                <a href="{{ url('/admin/manage-clients/check-assignments/'.$ajent->id) }}" class="btn btn-primary btn-outline">Check Assigned Clients</a>
                                <a href="{{ url('/admin/manage-clients/assign/'.$id->id.'/'.$ajent->id.'/'.$id->client->id) }}" class="btn btn-success btn-outline" @if($id->client->agent_id === $ajent->id) disabled @else @endif>Assigne</a>
                                <a href="{{ url('/admin/manage-clients/remove/'.$id->id.'/'.$ajent->id.'/'.$id->client->id) }}" class="btn btn-danger btn-outline" @if($id->client->agent_id === $ajent->id) @else disabled @endif>Remove</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop