@extends('admin.layouts.dashboard')
@section('page_heading','Add Users Privileges')
@section('section')
    <div class="col-md-12">
        {{ $user->userpermission }}
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
                        <div class="checkbox"><label><input type="checkbox" id="brand" name="brand" @if(!$user->userpermission == null && $user->userpermission->brand == true) checked @endif> Brands</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="checkbox"><label><input type="checkbox" id="category" name="category" @if(!$user->userpermission == null && $user->userpermission->category == true) checked @endif>
                                Categories</label></div>
                    </div>
                    <div class="col-md-4">
                        <div class="checkbox"><label><input type="checkbox" id="product" name="product" @if(!$user->userpermission == null && $user->userpermission->product == true) checked @endif>
                                Products</label></div>
                    </div>
                    <div class="col-md-12"><h5>Manage Users</h5></div>
                    <div class="col-md-4">
                        <div class="checkbox"><label><input type="checkbox" id="add_user" name="add_user" @if(!$user->userpermission == null && $user->userpermission->add_user == true) checked @endif> Add new user</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="checkbox"><label><input type="checkbox" id="user_approve" name="user_approve" @if(!$user->userpermission == null && $user->userpermission->user_approve == true) checked @endif> User
                                Approvals</label></div>
                    </div>
                    <div class="col-md-4">
                        <div class="checkbox"><label><input type="checkbox" id="designation" name="designation">
                                Designations</label></div>
                    </div>
                    <div class="col-md-12"><h5>Manage Clients</h5></div>
                    <div class="col-md-4">
                        <div class="checkbox"><label><input type="checkbox" id="client_prof" name="client_prof"> Client
                                Profile</label></div>
                    </div>
                    <div class="col-md-4">
                        <div class="checkbox"><label><input type="checkbox" id="client_users" name="client_users">
                                Client Users</label></div>
                    </div>
                    <div class="col-md-12"><h5>Manage Purchase Orders</h5></div>
                    <div class="col-md-4">
                        <div class="checkbox"><label><input type="checkbox" id="view_po" name="view_po"> View Purchase
                                Orders</label></div>
                    </div>
                    <div class="col-md-4">
                        <div class="checkbox"><label><input type="checkbox" id="change_po_status"
                                                            name="change_po_status"> Change Status</label></div>
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
