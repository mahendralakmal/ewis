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
                    <tr>
                        <td>SAMPATH BANK</td>
                        <td>Sampath Bank PLC, No 110 , Sir James Peiris Mawatha, Colombo 02, Sri Lanka.</td>
                        <td>
                            <a href="#" class="btn btn-success btn-outline" disabled>Activate</a>  <a href="/admin/manage-clients/update-profile" class="btn btn-primary btn-outline">Update Profile</a> <a href="#" class="btn btn-primary btn-outline">Assign Agent</a>  <a href="#" class="btn btn-danger btn-outline">Deactivate</a>
                        </td>
                    </tr>
                    <tr>
                        <td>COMMERCIA BANK</td>
                        <td>Commercial Bank of Ceylon PLC, Commercial House, No 21 , Sir Razik Fareed Mawatha, P.O. Box 856 Colombo 01, Sri Lanka.</td>
                        <td>
                            <a href="#" class="btn btn-success btn-outline">Activate</a>  <a href="/admin/manage-clients/update-profile" class="btn btn-primary btn-outline">Update Profile</a> <a href="#" class="btn btn-primary btn-outline">Assign Agent</a>  <a href="#" class="btn btn-danger btn-outline" disabled>Deactivate</a>
                        </td>
                    </tr>
                    <tr>
                        <td>SEYLAN BANK</td>
                        <td>902425545V</td>
                        <td>
                            <a href="#" class="btn btn-success btn-outline">Activate</a>  <a href="/admin/manage-clients/update-profile" class="btn btn-primary btn-outline">Update Profile</a> <a href="#" class="btn btn-primary btn-outline">Assign Agent</a>  <a href="#" class="btn btn-danger btn-outline" disabled>Deactivate</a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop
