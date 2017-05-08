@extends('admin.layouts.dashboard')
@section('page_heading','Check Assignments')
@section('section')
    {{--{{ $id }}--}}
    <div class="col-md-6">
        <div class="form-group row">
            <div class="col-md-5">Username</div>
            <div class="col-md-7"><label>{{ $id->email }}</label></div>
        </div>
        <div class="form-group row">
            <div class="col-md-5">Full Name</div>
            <div class="col-md-7"><label>{{ $id->name }}</label></div>
        </div>
        <div class="form-group row">
            <div class="col-md-5">Designation</div>
            <div class="col-md-7"><label>{{ $id->designation->designation }}</label></div>
        </div>
    </div>
    <div class="col-md-10">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Assigned Clients</h3>
            </div>
            <div class="panel-body">
                <table class="table">
                    <thead>
                    <tr>
                        <td><h5>Client</h5></td>
                        <td><h5>Branch</h5></td>
                        <td><h5>Address</h5></td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($clients as $client)
                        <tr>
                            <td>{{ $client->client->name }}</td>
                            <td>{{ $client->name }}</td>
                            <td>{{ $client->address }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop