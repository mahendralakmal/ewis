@extends('admin.layouts.dashboard')
@section('page_heading','Agent A Assign ')
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
                        <td><h5>Username</h5></td>
                        <td><h5>Name</h5></td>
                        <td><h5>Designation</h5></td>
                        <td class="col-md-5"></td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($ajents as $ajent)
                        <tr>
                            <td>{{ $ajent->email }}</td>
                            <td>{{ $ajent->name }}</td>
                            <td>{{ $ajent->designation->designation }}</td>
                            <td>
                                <a href="/admin/manage-clients/check-assignments" class="btn btn-primary btn-outline">Check Assigned Clients</a>
                                <a href="#" class="btn btn-success btn-outline">Assigne</a>
                                <a href="#" class="btn btn-danger btn-outline" disabled>Remove</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop