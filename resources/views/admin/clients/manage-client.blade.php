@extends('admin.layouts.dashboard')
@section('page_heading','Client Manager')
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
