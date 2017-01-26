@extends('admin.layouts.dashboard')
@section('page_heading','Manage Users')
@section('section')
    <div class="col-md-9">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Users</h3>
            </div>
            <div class="panel-body">
                <table class="table">
                    <thead>
                    <tr>
                        <td><h5>Username</h5></td>
                        <td><h5>Name</h5></td>
                        <td><h5>Designation</h5></td>
                        <td><h5>NIC</h5></td>
                        <td class="col-md-3"></td>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Lakmal</td>
                        <td>Mahendra Lakmal</td>
                        <td>CTO</td>
                        <td>852220583V</td>
                        <td><a href="#" class="btn btn-primary btn-outline">Approve</a>  <a href="#" class="btn btn-danger btn-outline" disabled>Unapprove</a> </td>
                    </tr>
                    <tr>
                        <td>Amara</td>
                        <td>Amara Kariyawasam</td>
                        <td>Admin</td>
                        <td>822420543V</td>
                        <td><a href="#" class="btn btn-primary btn-outline">Approve</a>  <a href="#" class="btn btn-danger btn-outline" disabled>Unapprove</a> </td>
                    </tr>
                    <tr>
                        <td>Peter</td>
                        <td>Peter Parker</td>
                        <td>Marketting Manager</td>
                        <td>902425545V</td>
                        <td><a href="#" class="btn btn-primary btn-outline">Approve</a>  <a href="#" class="btn btn-danger btn-outline" disabled>Unapprove</a> </td>
                    </tr>
                    <tr>
                        <td>Malfoy</td>
                        <td>Draco Malfoy</td>
                        <td>Marketting Manager</td>
                        <td>902425545V</td>
                        <td><a href="#" class="btn btn-primary btn-outline">Approve</a>  <a href="#" class="btn btn-danger btn-outline" disabled>Unapprove</a> </td>
                    </tr>
                    <tr>
                        <td>Rone</td>
                        <td>Rone Wesley</td>
                        <td>Marketting Manager</td>
                        <td>902325649V</td>
                        <td><a href="#" class="btn btn-primary btn-outline">Approve</a>  <a href="#" class="btn btn-danger btn-outline" disabled>Unapprove</a> </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop
