@extends('admin.layouts.dashboard')
@section('page_heading','Branch / Department ')
@section('section')
    @if((\Illuminate\Support\Facades\Session::has('User'))
    && (\App\User::find(\Illuminate\Support\Facades\Session::get('User'))->privilege != null)
    && (\App\User::find(\Illuminate\Support\Facades\Session::get('User'))->privilege->client_prof))
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Branch / Department</h3>
                    </div>
                    <div class="panel-body">
                        <div class="panel-body tbl_ori">
                            <ul class="list-group">
                                @if(Session::get('User') == 1)
                                    @foreach($clients as $client)
                                        @if($client->approval)
                                            <li class="list-group-item">
                                                <a @if($client->client_branch->count() >0)href="#{{ $client->id }}"
                                                   @endif class="list-group-item active" data-toggle="collapse">
                                                    <strong>{{ $client->name }}</strong>
                                                    <span class="badge">@if($client->client_branch->count() >0){{ $client->client_branch->where('activation',0)->count() }}@endif</span>
                                                </a>
                                                @if($client->client_branch->count() >0)
                                                    <div id="{{$client->id}}" class="collapse">
                                                        <table class="table">
                                                            <tbody>
                                                            @foreach($client->client_branch as $branch)
                                                                @if($branch->activation == 0)
                                                                    <tr>
                                                                        <td class="col-md-8">{{ $branch->name }}</td>
                                                                        @if(\App\User::find(Session::get('User'))->privilege->assign_agent == 1)
                                                                            <td>
                                                                                <a href="/admin/manage-clients/agent-assign/{{ $branch->id }}"
                                                                                   class="btn @if($branch->agent_id == '') btn-primary @else btn-success @endif btn-outline">Assign
                                                                                    Account Manager</a>
                                                                            </td>
                                                                        @endif
                                                                        <td>
                                                                            <a href="/admin/manage-clients/create-branch/{{ $branch->id }}/edit"
                                                                               class="btn btn-primary btn-outline">Edit</a>
                                                                        </td>
                                                                    </tr>
                                                                @endif
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                @endif
                                            </li>
                                        @endif
                                    @endforeach
                                @else
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <td><h5>Client</h5></td>
                                            <td><h5>Branch</h5></td>
                                            <td></td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if($clients->designation_id == 6 )
                                            @foreach(App\Client::where('user_id',$clients->id)->get() as $clientt)
                                                @if($client->approval)
                                                    @foreach(App\ClientsBranch::where('agent_id',$clientt->id)->get() as $cbranch)
                                                        <tr>
                                                            <td class="col-md-4">{{ $clientt->name }}</td>
                                                            <td class="col-md-4">{{ $cbranch->name }}</td>
                                                            @if(\App\User::find(Session::get('User'))->privilege->assign_agent == 1)
                                                                <td>
                                                                    <a href="/admin/manage-clients/agent-assign/{{ $cbranch->id }}"
                                                                       class="btn @if($cbranch->agent_id == '') btn-primary @else btn-success @endif btn-outline">Assign
                                                                        Account Manager</a>
                                                                </td>
                                                            @endif
                                                            <td>
                                                                <a href="/admin/manage-clients/create-branch/{{ $cbranch->id }}/edit"
                                                                   class="btn btn-primary btn-outline">Edit</a>
                                                            </td>
                                                            {{--<td class="col-md-2">--}}
                                                                {{--<a href="/admin/manage-clients/create-branch/{{ $cbranch->id }}/remove"--}}
                                                                   {{--class="btn btn-danger btn-outline">Remove</a>--}}
                                                            {{--</td>--}}
                                                        </tr>
                                                    @endforeach
                                                @endif
                                            @endforeach
                                            @foreach(App\User::where('section_head_id',$clients->id)->get() as $user)
                                                @foreach(App\ClientsBranch::where('agent_id',$user->id)->get() as $cbranch)
                                                    @if($cbranch->client->approval && $cbranch->activation == 0)
                                                        <tr>
                                                            <td class="col-md-4">{{ $cbranch->client->name }}</td>
                                                            <td class="col-md-4">{{ $cbranch->name }}</td>
                                                            @if(\App\User::find(Session::get('User'))->privilege->assign_agent == 1)
                                                                <td>
                                                                    <a href="/admin/manage-clients/agent-assign/{{ $cbranch->id }}"
                                                                       class="btn @if($cbranch->agent_id == '') btn-primary @else btn-success @endif btn-outline">Assign
                                                                        Account Manager</a>
                                                                </td>
                                                            @endif
                                                            <td>
                                                                <a href="/admin/manage-clients/create-branch/{{ $cbranch->id }}/edit"
                                                                   class="btn btn-primary btn-outline">Edit</a>
                                                            </td>
                                                            {{--<td class="col-md-2">--}}
                                                                {{--<a href="/admin/manage-clients/create-branch/{{ $cbranch->id }}/remove"--}}
                                                                   {{--class="btn btn-danger btn-outline">Remove</a>--}}
                                                            {{--</td>--}}
                                                        </tr>
                                                    @endif
                                                @endforeach
                                                @foreach(App\User::where('section_head_id',$user->id)->get() as $cuser)
                                                    @foreach(App\ClientsBranch::where('agent_id',$cuser->id)->get() as $cbranch)
                                                        @if($cbranch->client->approval && $cbranch->activation == 0)
                                                            <tr>
                                                                <td class="col-md-4">{{ $cbranch->client->name }}</td>
                                                                <td class="col-md-4">{{ $cbranch->name }}</td>
                                                                @if(\App\User::find(Session::get('User'))->privilege->assign_agent == 1)
                                                                    <td>
                                                                        <a href="/admin/manage-clients/agent-assign/{{ $cbranch->id }}"
                                                                           class="btn @if($cbranch->agent_id == '') btn-primary @else btn-success @endif btn-outline">Assign
                                                                            Account Manager</a>
                                                                    </td>
                                                                @endif
                                                                <td>
                                                                    <a href="/admin/manage-clients/create-branch/{{ $cbranch->id }}/edit"
                                                                       class="btn btn-primary btn-outline">Edit</a>
                                                                </td>
                                                                {{--<td class="col-md-2">--}}
                                                                    {{--<a href="/admin/manage-clients/create-branch/{{ $cbranch->id }}/remove"--}}
                                                                       {{--class="btn btn-danger btn-outline">Remove</a>--}}
                                                                {{--</td>--}}
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                @endforeach

                                            @endforeach
                                        @else
                                            @foreach(App\Client::where('user_id',$clients->id)->get() as $clientt)
                                                @if($clientt->approval)
                                                    @foreach(App\ClientsBranch::where('agent_id',$clientt->id)->get() as $cbranch)
                                                        <tr>
                                                            <td class="col-md-4">{{ $clientt->name }}</td>
                                                            <td class="col-md-4">{{ $cbranch->name }}</td>
                                                            @if(\App\User::find(Session::get('User'))->privilege->assign_agent == 1)
                                                                <td>
                                                                    <a href="/admin/manage-clients/agent-assign/{{ $cbranch->id }}"
                                                                       class="btn @if($cbranch->agent_id == '') btn-primary @else btn-success @endif btn-outline">Assign
                                                                        Account Manager</a>
                                                                </td>
                                                            @endif
                                                            <td>
                                                                <a href="/admin/manage-clients/create-branch/{{ $cbranch->id }}/edit"
                                                                   class="btn btn-primary btn-outline">Edit</a>
                                                            </td>
                                                            {{--<td class="col-md-2">--}}
                                                                {{--<a href="/admin/manage-clients/create-branch/{{ $cbranch->id }}/remove"--}}
                                                                   {{--class="btn btn-danger btn-outline">Remove</a>--}}
                                                            {{--</td>--}}
                                                        </tr>
                                                    @endforeach
                                                @endif
                                            @endforeach
                                            @foreach(App\ClientsBranch::where('agent_id',$clients->id)->get() as $cbranch)
                                                @if($cbranch->client->approval && $cbranch->activation == 0)
                                                    <tr>
                                                        <td class="col-md-4">{{ $cbranch->client->name }}</td>
                                                        <td class="col-md-4">{{ $cbranch->name }}</td>
                                                        @if(\App\User::find(Session::get('User'))->privilege->assign_agent == 1)
                                                            <td>
                                                                <a href="/admin/manage-clients/agent-assign/{{ $cbranch->id }}"
                                                                   class="btn @if($cbranch->agent_id == '') btn-primary @else btn-success @endif btn-outline">Assign
                                                                    Account Manager</a>
                                                            </td>
                                                        @endif
                                                        <td>
                                                            <a href="/admin/manage-clients/create-branch/{{ $cbranch->id }}/edit"
                                                               class="btn btn-primary btn-outline">Edit</a>
                                                        </td>
                                                        {{--<td class="col-md-2">--}}
                                                            {{--<a href="/admin/manage-clients/create-branch/{{ $cbranch->id }}/remove"--}}
                                                               {{--class="btn btn-danger btn-outline">Remove</a>--}}
                                                        {{--</td>--}}
                                                    </tr>
                                                @endif
                                            @endforeach
                                            @foreach(App\User::where('section_head_id', $clients->id)->get() as $client)
                                                @if($client->approval)
                                                    @foreach(App\ClientsBranch::where('agent_id',$client->id)->get() as $cbranch)
                                                        <tr>
                                                            <td class="col-md-4">{{ $cbranch->client->name }}</td>
                                                            <td class="col-md-4">{{ $cbranch->name }}</td>
                                                            @if(\App\User::find(Session::get('User'))->privilege->assign_agent == 1)
                                                                <td>
                                                                    <a href="/admin/manage-clients/agent-assign/{{ $cbranch->id }}"
                                                                       class="btn @if($cbranch->agent_id == '') btn-primary @else btn-success @endif btn-outline">Assign
                                                                        Account Manager</a>
                                                                </td>
                                                            @endif
                                                            <td>
                                                                <a href="/admin/manage-clients/create-branch/{{ $cbranch->id }}/edit"
                                                                   class="btn btn-primary btn-outline">Edit</a>
                                                            </td>
                                                            {{--<td class="col-md-2">--}}
                                                                {{--<a href="/admin/manage-clients/create-branch/{{ $cbranch->id }}/remove"--}}
                                                                   {{--class="btn btn-danger btn-outline">Remove</a>--}}
                                                            {{--</td>--}}
                                                        </tr>
                                                    @endforeach
                                                @endif
                                            @endforeach
                                        @endif

                                        </tbody>
                                    </table>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4">


                @include('admin.messages.success')
                @include('admin.messages.error')
                @if (session()->has('success_message'))
                    <div class="alert alert-success">
                        {{ session()->get('success_message') }}
                    </div>
                @endif

                @if (session()->has('error_message'))
                    <div class="alert alert-danger">
                        {{ session()->get('error_message') }}
                    </div>
                @endif

                <form method="post" id="client_branch" enctype="multipart/form-data"
                      @if($id == null)action="/admin/manage-clients/create-branch"
                      @else action="/admin/manage-clients/update-branch" @endif role="form" class="form-horizontal">
                    {{ csrf_field() }}
                    <input type="hidden" id="user_id" name="user_id"
                           value="{{ \Illuminate\Support\Facades\Session::get('User') }}">
                    @if(!$id == null)
                        <input type="hidden" id="id" name="id" value="{{$id->id}}">
                    @endif

                    <div class="form-group row">
                        <div class="col-md-4"><label>Organization</label></div>
                        <div class="col-md-8">
                            <select name="client_id" id="client_id" class="form-control">
                                <option> Select Client</option>
                                @if(Session::get('User') == 1)
                                    @foreach($clients as $client)
                                        @if($client->approval)
                                            <option value="{{$client->id}}"
                                                    @if((!$id ==null) && ($id->client_id == $client->id)) selected @endif>{{$client->name}}</option>
                                        @endif
                                    @endforeach
                                @else
                                    @if($clients->designation_id == 6 )
                                        @foreach(App\Client::where('user_id',$clients->id)->get() as $cbranch)
                                            @if($cbranch->approval)
                                                <option value="{{$cbranch->id}}"
                                                        @if((!$id ==null) && ($id->client_id == $cbranch->id)) selected @endif>{{$cbranch->name}}</option>
                                            @endif
                                        @endforeach
                                        @foreach(App\User::where('section_head_id',$clients->id)->get() as $user)
                                            @foreach(App\Client::where('user_id',$user->id)->get() as $cbranch)
                                                @if($cbranch->approval)
                                                    <option value="{{$cbranch->id}}"
                                                            @if((!$id ==null) && ($id->client_id == $cbranch->id)) selected @endif>{{$cbranch->name}}</option>
                                                @endif
                                            @endforeach
                                            @foreach(App\ClientsBranch::where('agent_id',$user->id)->get() as $cbranch)
                                                @if($cbranch->client->approval)
                                                    <option value="{{$cbranch->client->id}}"
                                                            @if((!$id ==null) && ($id->client_id == $cbranch->client->id)) selected @endif>{{$cbranch->client->name}}</option>
                                                @endif
                                            @endforeach
                                            @foreach(App\User::where('section_head_id',$user->id)->get() as $cuser)
                                                @foreach(App\ClientsBranch::where('agent_id',$cuser->id)->get() as $cbranch)
                                                    @if($cbranch->client->approval)
                                                        <option value="{{$cbranch->client->id}}"
                                                                @if((!$id ==null) && ($id->client_id == $cbranch->client->id)) selected @endif>{{$cbranch->client->name}}</option>
                                                    @endif

                                                @endforeach
                                            @endforeach

                                        @endforeach
                                    @else
                                        @foreach(App\Client::where('user_id',$clients->id)->get() as $cbranch)
                                            @if($cbranch->approval)
                                                <option value="{{$cbranch->id}}"
                                                        @if((!$id ==null) && ($id->client_id == $cbranch->id)) selected @endif>{{$cbranch->name}}</option>
                                            @endif
                                        @endforeach
                                        @foreach(App\ClientsBranch::where('agent_id',$clients->id)->get() as $cbranch)
                                            @if($cbranch->client->approval)
                                                <option value="{{$cbranch->client->id}}"
                                                        @if((!$id ==null) && ($id->client_id == $cbranch->client->id)) selected @endif>{{$cbranch->client->name}}</option>
                                            @endif
                                        @endforeach
                                        @foreach(App\User::where('section_head_id', $clients->id)->get() as $client)
                                            @foreach(App\ClientsBranch::where('agent_id',$client->id)->get() as $cbranch)
                                                @if($cbranch->client->approval)
                                                    <option value="{{$cbranch->client->id}}"
                                                            @if((!$id ==null) && ($id->client_id == $cbranch->client->id)) selected @endif>{{$cbranch->client->name}}</option>
                                                @endif
                                            @endforeach
                                        @endforeach
                                    @endif
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-4"><label>Name</label></div>
                        <div class="col-md-8"><input type="text" id="name" name="name" class="form-control"
                                                     @if(!$id == null) value="{{ $id->name }}" @endif>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-4"><label>Address</label></div>
                        <div class="col-md-8"><textarea class="form-control" name="address"
                                                        id="address">@if(!$id == null){{ $id->address }} @endif</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-4"><label>Telephone</label></div>
                        <div class="col-md-8"><input type="tel" id="contact_no" name="contact_no" class="form-control"
                                                     @if(!$id == null) value="{{ $id->contact_no }}" @endif></div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-4"><label>Email</label></div>
                        <div class="col-md-8"><input type="email" id="email" name="email" class="form-control"
                                                     @if(!$id == null) value="{{ $id->email }}" @endif></div>
                    </div>

                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-primary btn-outline">Submit</button>
                        &nbsp;</div>
                </form>
            </div>
        </div>
    @else
        <div class="col-md-offset-3">
            <h2 class="error">You are Not Authorize for access this page</h2>
        </div>
    @endif
@stop