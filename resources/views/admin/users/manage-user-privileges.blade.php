@extends('admin.layouts.dashboard')
@section('page_heading','Add Users Privileges')
@section('section')
    @if((\Illuminate\Support\Facades\Session::has('User'))
    && (\App\User::find(\Illuminate\Support\Facades\Session::get('User'))->privilege != null)
    && (\App\User::find(\Illuminate\Support\Facades\Session::get('User'))->privilege->privilege))
    <div class="col-md-12">
        {{--{{ $user->privilege }}<br>--}}
        <label>User : {{ $user->name }} </label><br>
        <label>Email : {{ $user->email }} </label><br>
        <label>Designation : {{ $user->designation->designation }} </label><br>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"></h3>
            </div>
            <form class="form-horizontal"
                  action="@if(!$user->privilege == null) /admin/users/manage-users/privileges/update @else /admin/users/manage-users/privileges/store @endif"
                  method="post">
                @if(!$user->privilege == null)
                    <input type="hidden" id="id" name="id" value="{{ $user->privilege->id }}">
                @endif
                <input type="hidden" id="user_id" name="user_id" value="{{ $user->id }}">
                <input type="hidden" id="created_user_id" name="created_user_id"
                       value="{{ \Illuminate\Support\Facades\Session::get('User') }}">
                {{ csrf_field() }}
                <div class="panel-body row" id="privilegepnl">

                    <div class="col-md-12"><h5>General</h5></div>
                    <div class="col-md-4">
                        <div class="checkbox"><label><input type="checkbox" id="brand" name="brand"
                                                            @if(!$user->privilege == null && $user->privilege->brand == true) checked @endif>
                                Brands</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="checkbox"><label><input type="checkbox" id="category" name="category"
                                                            @if(!$user->privilege == null && $user->privilege->category == true) checked @endif>
                                Categories</label></div>
                    </div>
                    <div class="col-md-4">
                        <div class="checkbox"><label><input type="checkbox" id="product" name="product"
                                                            @if(!$user->privilege == null && $user->privilege->product == true) checked @endif>
                                Products</label></div>
                    </div>
                    <div class="col-md-4">
                        <div class="checkbox"><label><input type="checkbox" id="product_cost" name="product_cost"
                                                            @if(!$user->privilege == null && $user->privilege->product == true) checked @endif>
                                View Product Cost</label></div>
                    </div>
                    <div class="col-md-12"><hr><h5>Manage Users</h5></div>
                    <div class="col-md-4">
                        <div class="checkbox"><label><input type="checkbox" id="add_user" name="add_user"
                                                            @if(!$user->privilege == null && $user->privilege->add_user == true) checked @endif>
                                Add new user</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="checkbox"><label><input type="checkbox" id="user_approve" name="user_approve"
                                                            @if(!$user->privilege == null && $user->privilege->user_approve == true) checked @endif>
                                User
                                Approvals</label></div>
                    </div>
                    <div class="col-md-4">
                        <div class="checkbox"><label><input type="checkbox" id="designation" name="designation"
                                                            @if(!$user->privilege == null && $user->privilege->designation == true) checked @endif>
                                Designations</label></div>
                    </div>
                    <div class="col-md-4">
                        <div class="checkbox"><label><input type="checkbox" id="privilege" name="privilege"
                                                            @if(!$user->privilege == null && $user->privilege->designation == true) checked @endif>
                                Privileges</label></div>
                    </div>
                    <div class="col-md-12"><hr><h5>Manage Clients</h5></div>
                    <div class="col-md-4">
                        <div class="checkbox"><label><input type="checkbox" id="client_prof" name="client_prof"
                                                            @if(!$user->privilege == null && $user->privilege->client_prof == true) checked @endif>
                                Client
                                Profile</label></div>
                    </div>
                    <div class="col-md-4">
                        <div class="checkbox"><label><input type="checkbox" id="client_users" name="client_users"
                                                            @if(!$user->privilege == null && $user->privilege->client_users == true) checked @endif>
                                Client Users</label></div>
                    </div>
                    <div class="col-md-4">
                        <div class="checkbox"><label><input type="checkbox" id="assign_agent" name="assign_agent"
                                                            @if(!$user->privilege == null && $user->privilege->client_users == true) checked @endif>
                                Assign Agent</label></div>
                    </div>
                    <div class="col-md-4">
                        <div class="checkbox"><label><input type="checkbox" id="asign_product" name="asign_product"
                                                            @if(!$user->privilege == null && $user->privilege->client_users == true) checked @endif>
                                Assign Product</label></div>
                    </div>
                    <div class="col-md-12"><hr><h5>Manage Purchase Orders</h5></div>
                    <div class="col-md-4">
                        <div class="checkbox"><label><input type="checkbox" id="view_po" name="view_po"
                                                            @if(!$user->privilege == null && $user->privilege->view_po == true) checked @endif>
                                View Purchase
                                Orders</label></div>
                    </div>
                    <div class="col-md-4">
                        <div class="checkbox"><label><input type="checkbox" id="change_po_status"
                                                            name="change_po_status"
                                                            @if(!$user->privilege == null && $user->privilege->change_po_status == true) checked @endif>
                                Change Status</label></div>
                    </div>
                    <div class="col-md-12"><hr><h5>Reports</h5></div>

                    <div class="col-md-4">&nbsp;</div>
                    <div class="col-md-4">&nbsp;</div>
                    <div class="col-md-12">
                        {{--{{ $user->id  }}--}}
                        @if($user->id !=1 && $user->designation->designation != "Client")
                            <button class="btn btn-primary" type="submit"> @if(!$user->privilege == null) Update @else
                                    Submit @endif</button>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>
    @else
        <div class="col-md-offset-3">
            <h2 class="error">You are Not Authorize for access this page</h2>
        </div>
    @endif
@stop
