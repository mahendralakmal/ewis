@extends('admin.layouts.dashboard')
@section('page_heading','Client Activation')
@section('section')
    @if((\Illuminate\Support\Facades\Session::has('User'))
    && strtolower((\Illuminate\Support\Facades\Session::get('Type')) !== 'client')
    && (\App\User::find(\Illuminate\Support\Facades\Session::get('User'))->privilege != null)
    && (\App\User::find(\Illuminate\Support\Facades\Session::get('User'))->privilege->client_users))
        <div class="col-md-12 col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Clients</h3>
                </div>
                <div class="panel-body">
                    <ul class="list-group">
                        @foreach($clients as $client)
                            <li class="list-group-item">
                                <a @if($client->client_branch->count() >0)href="#{{ $client->id }}"
                                   @endif class="list-group-item active" data-toggle="collapse">
                                    <strong>{{ $client->name }}</strong>
                                    <span class="badge">@if($client->client_branch->count() >0){{$client->client_branch->count()}}@endif</span>
                                </a>
                                @if($client->client_branch->count() >0)
                                    <div id="{{$client->id}}" class="collapse">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <td><h5>Branch</h5></td>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($client->client_branch as $cbranch)
                                                <tr>
                                                    <td>{{ $cbranch->name }}</td>
                                                {{--</tr>--}}
                                                {{--<tr>--}}
                                                    <td>
                                                        {{--<a @if($cbranch->activation != 1) href="/admin/manage-clients/client_user/{{ $cbranch->id }}/activate"--}}
                                                           {{--@else href="/admin/manage-clients/client_user/{{ $cbranch->id }}/deactivate"--}}
                                                           {{--@endif class="btn @if($cbranch->activation != 1) btn-success @else btn-danger @endif btn-outline">@if($cbranch->activation != 1)--}}
                                                                {{--Activate @else Deactivate @endif</a>--}}
                                                        {{--<a href="#" class="btn btn-success btn-outline">Activate Users</a>--}}
                                                        {{--<a href="/admin/manage-clients/client_user/{{ $cbranch->id }}"--}}
                                                           {{--class="btn btn-primary btn-outline">Update--}}
                                                            {{--Profile</a>--}}
                                                        <a href="/admin/manage-clients/agent-assign/{{ $cbranch->id }}"
                                                           class="btn @if($cbranch->agent_id == '') btn-primary @else btn-success @endif btn-outline">Assign
                                                            Account Manager</a>
                                                        <a href="/admin/manage-product-list/{{ $cbranch->id }}/brands"
                                                           class="btn btn-primary btn-outline">Add
                                                            Brands</a>
                                                        <a href="/admin/manage-product-list/{{ $cbranch->id }}/categories"
                                                           class="btn btn-primary btn-outline">Add
                                                            Categories</a>
                                                        <a href="/admin/manage-product-list/{{ $cbranch->id }}"
                                                           class="btn btn-primary btn-outline">Add
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
                    </ul>

                    {{--<table class="table">--}}
                    {{--<thead>--}}
                    {{--</thead>--}}
                    {{--<tbody>--}}
                    {{--@foreach($clients as $client)--}}


                    {{--@if(!$user->clientuser->count() == 0)--}}
                    {{--@foreach($user->clientuser as $cuser)--}}
                    {{--<tr>--}}
                    {{--<td>@if(\App\User::find($cuser->user_id)->approval === 1)--}}
                    {{--<i class="fa fa-check green fa-fw"></i>--}}
                    {{--@endif</td>--}}
                    {{--<td>{{ $cuser->client->name }}</td>--}}
                    {{--</tr>--}}
                    {{--<tr>--}}
                    {{--<td style="border-top:none;"></td>--}}
                    {{--<td colspan="6" style="border-top:none;">--}}
                    {{--<a @if(\App\User::find($cuser->user_id)->approval != 1) href="/admin/manage-clients/client_user/{{ $cuser->user_id }}/activate"--}}
                    {{--@else href="/admin/manage-clients/client_user/{{ $cuser->user_id }}/deactivate"--}}
                    {{--@endif class="btn @if(\App\User::find($cuser->user_id)->approval != 1) btn-success @else btn-danger @endif btn-outline">@if(\App\User::find($cuser->user_id)->approval != 1)--}}
                    {{--Activate @else Deactivate @endif</a>--}}
                    {{--<a href="/admin/manage-clients/client_user/{{ $user->id }}"--}}
                    {{--class="btn btn-primary btn-outline">Update--}}
                    {{--Profile</a>--}}
                    {{--<a href="/admin/manage-clients/agent-assign/{{ $user->id }}"--}}
                    {{--class="btn btn-primary btn-outline">Assign--}}
                    {{--Account Manager</a>--}}
                    {{--<a href="/admin/manage-product-list/{{ $user->id }}/brands"--}}
                    {{--class="btn btn-primary btn-outline">Add--}}
                    {{--Brands</a>--}}
                    {{--<a href="/admin/manage-product-list/{{ $user->id }}/categories"--}}
                    {{--class="btn btn-primary btn-outline">Add--}}
                    {{--Categories</a>--}}
                    {{--<a href="/admin/manage-product-list/{{ $user->id }}"--}}
                    {{--class="btn btn-primary btn-outline">Add--}}
                    {{--Products</a>--}}
                    {{--</td></tr>--}}
                    {{--@endforeach--}}
                    {{--@endif--}}
                    {{--@endforeach--}}
                    {{--</tbody>--}}
                    {{--</table>--}}

                </div>
            </div>
        </div>
    @else
        <div class="col-md-offset-3">
            <h2 class="error">You are Not Authorize for access this page</h2>
        </div>
    @endif
@stop
