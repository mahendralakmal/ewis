@extends('admin.layouts.dashboard')
@section('page_heading','Add New Users')
@section('section')
    @if((\Illuminate\Support\Facades\Session::has('User'))
    && (\App\User::find(\Illuminate\Support\Facades\Session::get('User'))->privilege != null)
    && (\App\User::find(\Illuminate\Support\Facades\Session::get('User'))->privilege->add_user))
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Users</h3>
                </div>
                <div class="panel-body">
                    @if(!$users->count() == 0)
                        <table class="table">
                            <thead>
                            <tr>
                                <td><h5>Email</h5></td>
                                <td><h5>Name</h5></td>
                                <td><h5>Designation</h5></td>
                                <td class="col-md-3"></td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                @if(!$user->deleted == 1)
                                    @if($user->designation_id == 2)
                                        <tr>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->designation->designation}}</td>
                                            <td class="col-md-6">
                                                <form method="POST" action="/admin/users/delete" role="form">
                                                    <a href="/admin/manage-clients/client_user/{{ $user->id }}"
                                                       class="btn btn-primary btn-outline">Profile</a>
                                                    <a href="/admin/manage-clients/create-clientuser/{{ $user->id }}"
                                                       class="btn btn-primary btn-outline">Edit</a>
                                                    <a href="@if($user->approval == 0 ) /admin/manage-clients/client_user/{{ $user->id }}/activate @else /admin/manage-clients/client_user/{{ $user->id }}/deactivate @endif"
                                                       class="btn @if($user->approval == 0 ) btn-primary @else btn-danger @endif btn-outline">@if($user->approval == 0 )
                                                            Approve @else Unapprove @endif</a>
                                                    @if($user->designation_id !== 1)
                                                        <button class="btn btn-danger btn-outline" type="submit">Delete
                                                        </button>

                                                    @endif
                                                    {{ csrf_field() }}
                                                    <input type="hidden" id="hidId" name="hidId"
                                                           value="{{ $user->id }}">
                                                </form>
                                            </td>
                                        </tr>
                                    @endif
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>No users found.</p>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-4">
            @include('admin.messages.success')
            @include('admin.messages.error')
            <form id="userCreate" class="form-horizontal" role="form" method="POST"
                  @if($id === "")action="/admin/users/store"
                  @else action="/admin/users/update" @endif>
                {{ csrf_field() }}
                <div class="form-group">
                    <div class="col-md-5">
                        <label>Email</label>
                    </div>
                    <div class="col-md-7">
                        @if(!$id == "")
                            <input type="hidden" id="id" name="id" value="{{$id->id}}">
                        @endif


                        <input type="hidden" id="user_id" name="user_id"
                               value="{{ \Illuminate\Support\Facades\Session::get('User') }}">
                        @if(!$id == "")
                            <label class="form-control">{{$id->email}}</label>
                            <input type="hidden" name="email" id="email" value="{{$id->email}}">
                        @else
                            <input type="email" class="form-control" name="email" id="email">
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-5">
                        <label>Password</label>
                    </div>
                    <div class="col-md-7">
                        <input type="password" class="form-control" name="password" id="password">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-5">
                        <label>Confirm Password</label>
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
                        <input type="text" class="form-control" name="name" id="name"
                               @if(!$id == "") value="{{$id->name}}" @endif>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-5">
                        <label>Designation</label>
                    </div>
                    <div class="col-md-7">
                        <label class="form-control">Client</label>
                        <input type="hidden" name="designation_id" id="designation_id" value="{{$designation->id}}">
                        {{--<select type="text" class="form-control" name="designation_id" id="designation_id">--}}
                        {{--@if(!$id == "")--}}
                        {{--@foreach($designations as $designation)--}}
                        {{--@if($designation->id ==2)--}}
                        {{--<option value="{{ $designation->id}}"--}}
                        {{--@if($designation->id ==2) selected @endif>{{ $designation->designation }}</option>--}}
                        {{--@endif--}}
                        {{--@endforeach--}}
                        {{--@else--}}
                        {{--@foreach($designations as $designation)--}}
                        {{--@if($designation->id ==2)--}}
                        {{--<option value="{{ $designation->id ="2" }}">{{ $designation->designation }}</option>--}}
                        {{--@endif--}}
                        {{--@endforeach--}}
                        {{--@endif--}}
                        {{--</select>--}}
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-5">
                        <label>NIC/ Passport No</label>
                    </div>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="nic_pass" id="nic_pass" maxlength="12"
                               @if(!$id == "") value="{{$id->nic_pass}}" @endif>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-5">
                        {{--<label>Confirm Passworde</label>--}}
                    </div>
                    <div class="col-md-7">
                        <button class="btn btn-primary btn-outline" type="submit">@if($id === "")Add @else
                                Update @endif</button>
                    </div>
                </div>
            </form>
        </div>
    @else
        <div class="col-md-offset-3">
            <h2 class="error">You are Not Authorize for access this page</h2>
        </div>
    @endif
@stop
