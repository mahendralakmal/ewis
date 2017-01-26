@extends('admin.layouts.dashboard')
@section('page_heading','Add New Users')
@section('section')
    <div class="col-md-7">
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
                        <td><a href="#" class="btn btn-primary btn-outline">Edit</a>  <a href="#" class="btn btn-danger btn-outline">Delete</a> </td>
                    </tr>
                    <tr>
                        <td>Amara</td>
                        <td>Amara Kariyawasam</td>
                        <td>Admin</td>
                        <td>822420543V</td>
                        <td><a href="#" class="btn btn-primary btn-outline">Edit</a>  <a href="#" class="btn btn-danger btn-outline">Delete</a> </td>
                    </tr>
                    <tr>
                        <td>Malfoy</td>
                        <td>Draco Malfoy</td>
                        <td>Marketting Manager</td>
                        <td>902425545V</td>
                        <td><a href="#" class="btn btn-primary btn-outline">Edit</a>  <a href="#" class="btn btn-danger btn-outline">Delete</a> </td>
                    </tr>
                    <tr>
                        <td>Rone</td>
                        <td>Rone Wesley</td>
                        <td>Marketting Manager</td>
                        <td>902325649V</td>
                        <td><a href="#" class="btn btn-primary btn-outline">Edit</a>  <a href="#" class="btn btn-danger btn-outline">Delete</a> </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-5">
        <form method="POST" action="" class="form-horizontal">
            <div class="form-group">
                <div class="col-md-5">
                    <label>User Name</label>
                </div>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="username" id="username">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-5">
                    <label>Passworde</label>
                </div>
                <div class="col-md-7">
                    <input type="password" class="form-control" name="password" id="password">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-5">
                    <label>Confirm Passworde</label>
                </div>
                <div class="col-md-7">
                    <input type="password" class="form-control" name="cpassword" id="cpassword">
                </div>
            </div>
            <hr>

            <div class="form-group">
                <div class="col-md-5">
                    <label>Name</label>
                </div>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="name" id="name">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-5">
                    <label>Designation</label>
                </div>
                <div class="col-md-7">
                    <select type="text" class="form-control" name="designation" id="designation">
                        <option>Select Designation</option>
                        <option value="1">Admi</option>
                        <option value="2">CTO</option>
                        <option value="3">Marketting Manager</option>
                        <option value="4">Sales Executive</option>
                        <option value="4">Client</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-5">
                    <label>NIC</label>
                </div>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="nic" id="nic" maxlength="12">
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-5">
                    {{--<label>Confirm Passworde</label>--}}
                </div>
                <div class="col-md-7">
                    <button class="btn btn-primary btn-outline" type="submit">Add</button>
                </div>
            </div>
        </form>
    </div>
@stop
