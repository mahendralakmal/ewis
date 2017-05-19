@extends('admin.layouts.dashboard')
@section('page_heading','Client Manager')
@section('section')
    @if((Session::has('User'))
    && strtolower((Session::get('Type')) !== 'client')
    && (\App\User::find(Session::get('User'))->privilege != null)
    && (\App\User::find(Session::get('User'))->privilege->client_users)
    )
        <div class="col-md-12 col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Clients</h3>
                </div>
                <div class="panel-body">
                    <ul class="list-group">
                        @if($user->id == 1)
                            @foreach($clients as $client)
                                <li class="list-group-item">
                                    <a @if($client->client_branch->count() > 0)href="#{{ $client->id }}"
                                       @endif class="list-group-item active" data-toggle="collapse">
                                        <strong>{{ $client->name }}</strong>
                                        <span class="badge">@if($client->client_branch->count() >0){{$client->client_branch->count()}}@endif</span>
                                    </a>
                                    @if($client->client_branch->count() > 0)
                                        <div id="{{$client->id}}" class="collapse">
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <td><h5>Branch</h5></td>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($client->client_branch as $cbranch)
                                                    @if($cbranch->activation == 0)
                                                        <tr>
                                                            <td>{{ $cbranch->name }}</td>
                                                            <td>
                                                                <a href="/admin/manage-clients/agent-assign/{{ $cbranch->id }}"
                                                                   class="btn @if($cbranch->agent_id == '') btn-primary @else btn-success @endif btn-outline">Assign
                                                                    Account Manager</a>
                                                                <a href="/admin/manage-product-list/{{ $cbranch->id }}/brands"
                                                                   class="btn @if($cbranch->cbrands->where('remove',0)->count()>0) btn-success @else btn-primary @endif btn-outline">Add
                                                                    Brands</a>
                                                                <a href="/admin/manage-product-list/{{ $cbranch->id }}/categories"
                                                                   class="btn @if($cbranch->ccategory->where('remove',0)->count()>0) btn-success @else btn-primary @endif btn-outline">Add
                                                                    Categories</a>
                                                                <a href="/admin/manage-product-list/{{ $cbranch->id }}"
                                                                   class="btn @if($cbranch->cproduct->where('remove',0)->count()>0) btn-success @else btn-primary @endif btn-outline">Add
                                                                    Products</a>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    @endif
                                </li>
                            @endforeach
                        @else
                            @if($sh->count() >0)
                                @foreach($sh as $shu)
                                    {{--<strong>User :{{$shu->name}}</strong><br>{{$shu}}<br>--}}
                                    <li class="list-group-item">
                                        <a href="#{{ $shu->id }}" class="list-group-item active"
                                           data-toggle="collapse"><strong>{{ $shu->name }}</strong>
                                            <span class="badge">@if($shu->clients->count() > 0){{$shu->clients->count()}}@endif</span>
                                        </a>
                                        <div id="{{$shu->id}}" class="collapse">
                                            @foreach($shu->clients as $client)
                                                <a href="#c{{ $client->id }}" class="list-group-sub-item active"
                                                   data-toggle="collapse"><strong>{{ $client->name }}</strong>
                                                    <span class="badge">@if($client->client_branch->count() > 0){{$client->client_branch->count()}}@endif</span></a>
                                                <div id="c{{$client->id}}" class="collapse">
                                                    @foreach($client->client_branch as $c_Branch)
                                                        <a href="#c{{ $c_Branch->id }}"
                                                           class="list-group-sub-item item2 active"
                                                           data-toggle="collapse"><strong>{{ $c_Branch->name }}</strong>
                                                            <span class="badge">@if($c_Branch->client_user->count() > 0){{$c_Branch->client_user->count()}}@endif</span></a>
                                                        <div id="c{{$c_Branch->id}}" class="collapse">
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
                                                                @foreach($c_Branch->client_user as $c_User)
                                                                    @if(!$c_User->user->deleted == 1 && $c_User->user->designation_id == 2)

                                                                        <tr>
                                                                            <td>{{$c_User->user->email}}</td>
                                                                            <td>{{$c_User->user->name}}</td>
                                                                            <td>{{$c_User->user->designation->designation}}</td>

                                                                            <td class="col-md-6">
                                                                                <form method="POST"
                                                                                      action="/admin/users/delete"
                                                                                      role="form">
                                                                                    <a href="/admin/manage-clients/client_user/{{ $user->id }}"
                                                                                       class="btn btn-primary btn-outline">Profile</a>
                                                                                    <a href="/admin/manage-clients/create-clientuser/{{ $user->id }}"
                                                                                       class="btn btn-primary btn-outline">Edit</a>
                                                                                    <a href="@if($user->approval == 0 ) /admin/manage-clients/client_user/{{ $user->id }}/activate @else /admin/manage-clients/client_user/{{ $user->id }}/deactivate @endif"
                                                                                       class="btn @if($user->approval == 0 ) btn-primary @else btn-danger @endif btn-outline">@if($user->approval == 0 )
                                                                                            Approve @else
                                                                                            Unapprove @endif</a>
                                                                                    @if($user->designation_id !== 1)
                                                                                        <button class="btn btn-danger btn-outline"
                                                                                                type="submit">
                                                                                            Delete
                                                                                        </button>
                                                                                        {{----}}
                                                                                    @endif
                                                                                    {{ csrf_field() }}
                                                                                    <input type="hidden" id="hidId"
                                                                                           name="hidId"
                                                                                           value="{{ $user->id }}">
                                                                                </form>
                                                                            </td>
                                                                        </tr>
                                                                    @endif
                                                                @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @endforeach
                                        </div>
                                    </li>
                                @endforeach
                            @else
                                @foreach($clients as $client)
                                    <li class="list-group-item">
                                        <a @if((\App\Client::find($client->id)->client_branch->count()) >0)href="#{{ $client->id }}"
                                           @endif class="list-group-item active" data-toggle="collapse">
                                            <strong>{{ $client->name }}</strong>
                                            <span class="badge">@if((\App\Client::find($client->id)->client_branch->count()) >0){{(\App\Client::find($client->id)->client_branch->count())}}@endif</span>
                                        </a>
                                        @if((\App\Client::find($client->id)->client_branch->count()) >0)
                                            <div id="{{$client->id}}" class="collapse">
                                                <table class="table">
                                                    <thead>
                                                    <tr>
                                                        <td><h5>Branch</h5></td>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach((\App\Client::find($client->id)->client_branch) as $cbranch)
                                                        <tr>
                                                            <td>{{ $cbranch->name }}</td>
                                                            <td>
                                                                <a href="/admin/manage-clients/agent-assign/{{ $cbranch->id }}"
                                                                   class="btn @if($cbranch->agent_id == '') btn-primary @else btn-success @endif btn-outline">Assign
                                                                    Account Manager</a>
                                                                <a href="/admin/manage-product-list/{{ $cbranch->id }}/brands"
                                                                   class="btn @if($cbranch->cbrands->where('remove',0)->count()>0) btn-success @else btn-primary @endif btn-outline">Add
                                                                    Brands</a>
                                                                <a href="/admin/manage-product-list/{{ $cbranch->id }}/categories"
                                                                   class="btn @if($cbranch->ccategory->where('remove',0)->count()>0) btn-success @else btn-primary @endif btn-outline">Add
                                                                    Categories</a>
                                                                <a href="/admin/manage-product-list/{{ $cbranch->id }}"
                                                                   class="btn @if($cbranch->cproduct->where('remove',0)->count()>0) btn-success @else btn-primary @endif btn-outline">Add
                                                                    Products</a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        @endif
                                    </li>
                                @endforeach
                            @endif
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    @else
        <div class="col-md-offset-3">
            <h2 class="error">You are Not Authorize for access this page</h2>
        </div>
    @endif
@stop
