@extends('admin.layouts.dashboard')
@section('page_heading','Add Users Privileges')
@section('section')
    <div class="col-md-12">
        {{--{{ $user }}--}}
        <label>User : {{ $user->name }} </label><br>
        <label>Email : {{ $user->email }} </label><br>
        <label>Designation : {{ $user->designation->designation }} </label><br>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"></h3>
            </div>
            <form class="form-horizontal" action="/admin/users/manage-users/privileges/store" method="post">
                <input type="hidden" id="user_id" name="user_id" value="{{ $user->id }}">
                <input type="hidden" id="created_user_id" name="created_user_id"
                       value="{{ \Illuminate\Support\Facades\Session::get('User') }}">
                <div class="panel-body row">
                    <div class="col-md-4">
                        <div class="checkbox"><label><input type="checkbox" id="brand" name="brand"> Brands</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="checkbox"><label><input type="checkbox" id="category" name="category">
                                Categories</label></div>
                    </div>
                    <div class="col-md-4">
                        <div class="checkbox"><label><input type="checkbox" id="product" name="product">
                                Products</label></div>
                    </div>
                    <div class="col-md-12"><h5>Manage Users</h5></div>
                    <div class="col-md-4">
                        <div class="checkbox"><label><input type="checkbox" id="add-user" name="add-user"> Add new user</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="checkbox"><label><input type="checkbox" id="user-approve" name="user-approve"> User
                                Approvals</label></div>
                    </div>
                    <div class="col-md-4">
                        <div class="checkbox"><label><input type="checkbox" id="designation" name="designation">
                                Designations</label></div>
                    </div>
                    <div class="col-md-12"><h5>Manage Clients</h5></div>
                    <div class="col-md-4">
                        <div class="checkbox"><label><input type="checkbox" id="client-prof" name="client-prof"> Client
                                Profile</label></div>
                    </div>
                    <div class="col-md-4">
                        <div class="checkbox"><label><input type="checkbox" id="client-users" name="client-users">
                                Client Users</label></div>
                    </div>
                    <div class="col-md-12"><h5>Manage Purchase Orders</h5></div>
                    <div class="col-md-4">
                        <div class="checkbox"><label><input type="checkbox" id="view-po" name="view-po"> View Purchase
                                Orders</label></div>
                    </div>
                    <div class="col-md-4">
                        <div class="checkbox"><label><input type="checkbox" id="change-po-status"
                                                            name="change-po-status"> Change Status</label></div>
                    </div>
                    {{--<div class="col-md-12"><h5>Reports</h5></div>--}}
                    <div class="col-md-4">&nbsp;</div>
                    <div class="col-md-4">&nbsp;</div>
                    <div class="col-md-12">
                        @if(!\Illuminate\Support\Facades\Session::get('User') ==1)
                            <button class="btn btn-primary" type="submit"> Submit</button>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop
