@extends('admin.layouts.dashboard')
@section('page_heading','Users')
@section('section')
    @if((\Illuminate\Support\Facades\Session::has('User'))
        && (\App\User::find(\Illuminate\Support\Facades\Session::get('User'))->privilege != null)
        && (\App\User::find(\Illuminate\Support\Facades\Session::get('User'))->privilege->client_users))
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-7 col-md-7">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Users</h3>
                    </div>
                    <div class="panel-body">
                        @if(!$users->count() == 0)
                            <div class="table-responsive tbl_ori">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <td><h5>Organization</h5></td>
                                        <td><h5>Branch / Department</h5></td>
                                        <td><h5>Email</h5></td>
                                        <td><h5>Name</h5></td>
                                        <td class="col-md-3"></td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(Session::get('User') == 1)
                                        @foreach($users as $user)
                                            @if(!$user->deleted == 1 && $user->designation_id == 2)
                                                <tr>
                                                    <td>{{$user->c_user->client->name}}</td>
                                                    <td>{{$user->c_user->client_branch->name}}</td>
                                                    <td>{{$user->email}}</td>
                                                    <td>{{$user->name}}</td>
                                                    {{--<td>{{$user->designation->designation}}</td>--}}
                                                    <td class="col-md-6">
                                                        <form method="POST" action="/admin/users/delete" role="form">
                                                            <a href="/admin/manage-clients/client_user/{{ $user->id }}"
                                                               class="btn btn-primary btn-outline">Profile</a>
                                                            <a href="/admin/manage-clients/create-clientuser/{{ $user->id }}"
                                                               class="btn btn-primary btn-outline">Edit</a>
                                                            <a href="@if($user->approval == 0 ) /admin/manage-clients/client_user/{{ $user->id }}/activate @else /admin/manage-clients/client_user/{{ $user->id }}/deactivate @endif"
                                                               class="btn @if($user->approval == 0 ) btn-primary @else btn-danger @endif btn-outline">@if($user->approval == 0 )
                                                                    Approve @else Unapprove @endif</a>

                                                            {{ csrf_field() }}
                                                            <input type="hidden" id="hidId" name="hidId"
                                                                   value="{{ $user->id }}">
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    @else
                                        @if($users->designation_id == 6 )
                                            @foreach(App\Client::where('user_id',$users->id)->get() as $client)
                                                @foreach($client->client_branch as $cbranch)
                                                    @foreach($cbranch->client_user as $cuser)
                                                        <tr>
                                                            <td>{{$client->name}}</td>
                                                            <td>{{$cbranch->name}}</td>
                                                            <td>{{$cuser->user->email}}</td>
                                                            <td>{{$cuser->user->name}}</td>
                                                            {{--<td>{{$cuser->user->designation->designation}}</td>--}}
                                                            <td class="col-md-6">
                                                                <form method="POST" action="/admin/users/delete"
                                                                      role="form">
                                                                    <a href="/admin/manage-clients/client_user/{{ $cuser->user->id }}"
                                                                       class="btn btn-primary btn-outline">Profile</a>
                                                                    <a href="/admin/manage-clients/create-clientuser/{{ $cuser->user->id }}"
                                                                       class="btn btn-primary btn-outline">Edit</a>
                                                                    <a href="@if($cuser->user->approval == 0 ) /admin/manage-clients/client_user/{{ $cuser->user->id }}/activate @else /admin/manage-clients/client_user/{{ $cuser->user->id }}/deactivate @endif"
                                                                       class="btn @if($cuser->user->approval == 0 ) btn-primary @else btn-danger @endif btn-outline">@if($cuser->user->approval == 0 )
                                                                            Approve @else Unapprove @endif</a>

                                                                    {{ csrf_field() }}
                                                                    <input type="hidden" id="hidId" name="hidId"
                                                                           value="{{ $cuser->user->id }}">
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endforeach
                                            @endforeach
                                            @foreach(App\User::where('section_head_id',$users->id)->get() as $user)
                                                @foreach(App\Client::where('user_id',$user->id)->get() as $client)
                                                    @foreach($client->client_branch as $cbranch)
                                                        @foreach($cbranch->client_user as $cuser)
                                                            <tr>
                                                                <td>{{$client->name}}</td>
                                                                <td>{{$cbranch->name}}</td>
                                                                <td>{{$cuser->user->email}}</td>
                                                                <td>{{$cuser->user->name}}</td>
                                                                {{--<td>{{$cuser->user->designation->designation}}</td>--}}
                                                                <td class="col-md-6">
                                                                    <form method="POST" action="/admin/users/delete"
                                                                          role="form">
                                                                        <a href="/admin/manage-clients/client_user/{{ $cuser->user->id }}"
                                                                           class="btn btn-primary btn-outline">Profile</a>
                                                                        <a href="/admin/manage-clients/create-clientuser/{{ $cuser->user->id }}"
                                                                           class="btn btn-primary btn-outline">Edit</a>
                                                                        <a href="@if($cuser->user->approval == 0 ) /admin/manage-clients/client_user/{{ $cuser->user->id }}/activate @else /admin/manage-clients/client_user/{{ $cuser->user->id }}/deactivate @endif"
                                                                           class="btn @if($cuser->user->approval == 0 ) btn-primary @else btn-danger @endif btn-outline">@if($cuser->user->approval == 0 )
                                                                                Approve @else Unapprove @endif</a>

                                                                        {{ csrf_field() }}
                                                                        <input type="hidden" id="hidId" name="hidId"
                                                                               value="{{ $cuser->user->id }}">
                                                                    </form>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @endforeach
                                                @endforeach
                                                @foreach(App\ClientsBranch::where('agent_id',$user->id)->get() as $cbranch)
                                                    @foreach($cbranch->client_user as $cuser)
                                                        <tr>
                                                            <td>{{$cbranch->client->name}}</td>
                                                            <td>{{$cbranch->name}}</td>
                                                            <td>{{$cuser->user->email}}</td>
                                                            <td>{{$cuser->user->name}}</td>
                                                            {{--<td>{{$cuser->user->designation->designation}}</td>--}}
                                                            <td class="col-md-6">
                                                                <form method="POST" action="/admin/users/delete"
                                                                      role="form">
                                                                    <a href="/admin/manage-clients/client_user/{{ $cuser->user->id }}"
                                                                       class="btn btn-primary btn-outline">Profile</a>
                                                                    <a href="/admin/manage-clients/create-clientuser/{{ $cuser->user->id }}"
                                                                       class="btn btn-primary btn-outline">Edit</a>
                                                                    <a href="@if($cuser->user->approval == 0 ) /admin/manage-clients/client_user/{{ $cuser->user->id }}/activate @else /admin/manage-clients/client_user/{{ $cuser->user->id }}/deactivate @endif"
                                                                       class="btn @if($cuser->user->approval == 0 ) btn-primary @else btn-danger @endif btn-outline">@if($cuser->user->approval == 0 )
                                                                            Approve @else Unapprove @endif</a>

                                                                    {{ csrf_field() }}
                                                                    <input type="hidden" id="hidId" name="hidId"
                                                                           value="{{ $cuser->user->id }}">
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endforeach
                                                @foreach(App\User::where('section_head_id',$user->id)->get() as $cuser)
                                                    @foreach(App\ClientsBranch::where('agent_id',$cuser->id)->get() as $cbranch)
                                                        @foreach($cbranch->client_user as $cuser)
                                                            <tr>
                                                                <td>{{$cbranch->client->name}}</td>
                                                                <td>{{$cbranch->name}}</td>
                                                                <td>{{$cuser->user->email}}</td>
                                                                <td>{{$cuser->user->name}}</td>
                                                                {{--<td>{{$cuser->user->designation->designation}}</td>--}}
                                                                <td class="col-md-6">
                                                                    <form method="POST" action="/admin/users/delete"
                                                                          role="form">
                                                                        <a href="/admin/manage-clients/client_user/{{ $cuser->user->id }}"
                                                                           class="btn btn-primary btn-outline">Profile</a>
                                                                        <a href="/admin/manage-clients/create-clientuser/{{ $cuser->user->id }}"
                                                                           class="btn btn-primary btn-outline">Edit</a>
                                                                        <a href="@if($cuser->user->approval == 0 ) /admin/manage-clients/client_user/{{ $cuser->user->id }}/activate @else /admin/manage-clients/client_user/{{ $cuser->user->id }}/deactivate @endif"
                                                                           class="btn @if($cuser->user->approval == 0 ) btn-primary @else btn-danger @endif btn-outline">@if($cuser->user->approval == 0 )
                                                                                Approve @else Unapprove @endif</a>

                                                                        {{ csrf_field() }}
                                                                        <input type="hidden" id="hidId" name="hidId"
                                                                               value="{{ $cuser->user->id }}">
                                                                    </form>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @endforeach
                                                @endforeach

                                            @endforeach
                                        @else
                                            @foreach(App\Client::where('user_id',$users->id)->get() as $client)
                                                @foreach($client->client_branch as $cbranch)
                                                    @foreach($client->client_branch->client_user as $cuser)
                                                        <tr>
                                                            <td>{{$client->name}}</td>
                                                            <td>{{$cbranch->name}}</td>
                                                            <td>{{$cuser->user->email}}</td>
                                                            <td>{{$cuser->user->name}}</td>
                                                            {{--<td>{{$cuser->user->designation->designation}}</td>--}}
                                                            <td class="col-md-6">
                                                                <form method="POST" action="/admin/users/delete"
                                                                      role="form">
                                                                    <a href="/admin/manage-clients/client_user/{{ $cuser->user->id }}"
                                                                       class="btn btn-primary btn-outline">Profile</a>
                                                                    <a href="/admin/manage-clients/create-clientuser/{{ $cuser->user->id }}"
                                                                       class="btn btn-primary btn-outline">Edit</a>
                                                                    <a href="@if($cuser->user->approval == 0 ) /admin/manage-clients/client_user/{{ $cuser->user->id }}/activate @else /admin/manage-clients/client_user/{{ $cuser->user->id }}/deactivate @endif"
                                                                       class="btn @if($cuser->user->approval == 0 ) btn-primary @else btn-danger @endif btn-outline">@if($cuser->user->approval == 0 )
                                                                            Approve @else Unapprove @endif</a>

                                                                    {{ csrf_field() }}
                                                                    <input type="hidden" id="hidId" name="hidId"
                                                                           value="{{ $cuser->user->id }}">
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endforeach
                                            @endforeach
                                            @foreach(App\ClientsBranch::where('agent_id',$users->id)->get() as $cbranch)
                                                @foreach($cbranch->client_user as $cuser)
                                                    <tr>
                                                        <td>{{$cuser->client->name}}</td>
                                                        <td>{{$cbranch->name}}</td>
                                                        <td>{{$cuser->user->email}}</td>
                                                        <td>{{$cuser->user->name}}</td>
                                                        {{--<td>{{$cuser->user->designation->designation}}</td>--}}
                                                        <td class="col-md-6">
                                                            <form method="POST" action="/admin/users/delete"
                                                                  role="form">
                                                                <a href="/admin/manage-clients/client_user/{{ $cuser->user->id }}"
                                                                   class="btn btn-primary btn-outline">Profile</a>
                                                                <a href="/admin/manage-clients/create-clientuser/{{ $cuser->user->id }}"
                                                                   class="btn btn-primary btn-outline">Edit</a>
                                                                <a href="@if($cuser->user->approval == 0 ) /admin/manage-clients/client_user/{{ $cuser->user->id }}/activate @else /admin/manage-clients/client_user/{{ $cuser->user->id }}/deactivate @endif"
                                                                   class="btn @if($cuser->user->approval == 0 ) btn-primary @else btn-danger @endif btn-outline">@if($cuser->user->approval == 0 )
                                                                        Approve @else Unapprove @endif</a>

                                                                {{ csrf_field() }}
                                                                <input type="hidden" id="hidId" name="hidId"
                                                                       value="{{ $cuser->user->id }}">
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endforeach
                                            @foreach(App\User::where('section_head_id', $users->id)->get() as $user)
                                                @foreach(App\ClientsBranch::where('agent_id',$user->id)->get() as $cbranch)
                                                    @foreach($cbranch->client_user as $cuser)
                                                        <tr>
                                                            <td>{{$cbranch->client->name}}</td>
                                                            <td>{{$cbranch->name}}</td>
                                                            <td>{{$cuser->user->email}}</td>
                                                            <td>{{$cuser->user->name}}</td>
                                                            {{--<td>{{$cuser->user->designation->designation}}</td>--}}
                                                            <td class="col-md-6">
                                                                <form method="POST" action="/admin/users/delete"
                                                                      role="form">
                                                                    <a href="/admin/manage-clients/client_user/{{ $cuser->user->id }}"
                                                                       class="btn btn-primary btn-outline">Profile</a>
                                                                    <a href="/admin/manage-clients/create-clientuser/{{ $cuser->user->id }}"
                                                                       class="btn btn-primary btn-outline">Edit</a>
                                                                    <a href="@if($cuser->user->approval == 0 ) /admin/manage-clients/client_user/{{ $cuser->user->id }}/activate @else /admin/manage-clients/client_user/{{ $cuser->user->id }}/deactivate @endif"
                                                                       class="btn @if($cuser->user->approval == 0 ) btn-primary @else btn-danger @endif btn-outline">@if($cuser->user->approval == 0 )
                                                                            Approve @else Unapprove @endif</a>

                                                                    {{ csrf_field() }}
                                                                    <input type="hidden" id="hidId" name="hidId"
                                                                           value="{{ $cuser->user->id }}">
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endforeach
                                            @endforeach

                                        @endif
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <p>No users found.</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-5 col-md-5">
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
                                   value="{{ Session::get('User') }}">
                            @if(!$id == "")
                                <input type="email" class="form-control" name="email" id="email" value="{{$id->email}}">
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
                        <div class="col-md-12 text-center">
                            <button class="btn btn-primary btn-outline" type="submit">@if($id === "")Add @else
                                    Update @endif</button>
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
@section('scripts')
    <script>
        $("#userCreate").validate({
            rules: {
                email: {
                    required: true,
                    email: true
                },
                password: {
                    required: true,
//                    passwordcheck:true,
                    minlength: 6,
                    maxlength: 12
                },
                cpassword: {
                    equalTo: "#password"
                },
                name: "required",
                nic_pass: {
                    required: true,
                    maxlength: 12,
                    minlength: 7
                },
            },
//            messages:{
//                password:{
//                    passwordcheck:"Password must contain a special character, a Capital letter, a simple letter and a numeric.s",
//                }
//            }
        });

        {{--$.validator.addMethod("passwordcheck", function(value) {--}}
        {{--return /^[A-Za-z0-9\d=!\-@._*]*$/.test(value) // consists of only these--}}
        {{--&& /[a-z]/.test(value) // has a lowercase letter--}}
        {{--&& /\d/.test(value) // has a digit--}}
        {{--});--}}
    </script>
@stop
