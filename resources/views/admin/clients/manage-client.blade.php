@extends('admin.layouts.dashboard')
@section('page_heading','Client Manager')
@section('section')
    @if((Session::has('User'))
    && strtolower((Session::get('Type')) !== 'client')
    && (\App\User::find(Session::get('User'))->privilege != null)
    && (\App\User::find(Session::get('User'))->privilege->client_users)
    ||(\App\User::find(Session::get('User'))->privilege->client_branch)
    || (\App\User::find(Session::get('User'))->privilege->manage_client)
    || (\App\User::find(Session::get('User'))->privilege->assign_agent)
    || (\App\User::find(Session::get('User'))->privilege->asign_brand)
    || (\App\User::find(Session::get('User'))->privilege->asign_category)
    )
        <div class="col-md-12 col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Clients</h3>
                </div>
                <div class="panel-body">
                    <ul class="list-group">
                        @if($user->id == 1)
                            @foreach($users as $user)
                                <li class="list-group-item">
                                    <a @if(App\User::where('section_head_id',$user->id)->count() > 0)href="#{{ $user->id }}"
                                       @endif class="list-group-item active" data-toggle="collapse">
                                        <strong>{{ $user->name }}</strong>
                                        <span class="badge">@if(App\User::where('section_head_id',$user->id)->count() >0){{App\User::where('section_head_id',$user->id)->count()}}@endif</span>
                                    </a>
                                    <div id="{{$user->id}}" class="collapse">
                                        @foreach(App\User::where('section_head_id',$user->id)->get() as $secHead)
                                            <a href="#c{{ $secHead->id }}" class="list-group-sub-item active"
                                               data-toggle="collapse"><strong>{{ $secHead->name }}</strong>
                                                <span class="badge">@if(App\User::where('section_head_id',$secHead->id)->count() > 0){{App\User::where('section_head_id',$secHead->id)->count()}}@endif</span></a>
                                            <div id="c{{$secHead->id}}" class="collapse">
                                                @if(App\ClientsBranch::where('agent_id',$secHead->id)->count() > 0)
                                                    <a @if(App\ClientsBranch::where('agent_id',$secHead->id)->count() > 0)href="#s{{ $secHead->id }}"
                                                       @endif class="list-group-sub-item item2 active"
                                                       data-toggle="collapse"><strong>{{ $secHead->name }}</strong>
                                                        <span class="badge">@if(App\ClientsBranch::where('agent_id',$secHead->id)->count() > 0){{App\ClientsBranch::where('agent_id',$secHead->id)->count()}}@endif</span></a>
                                                    <div id="s{{$secHead->id}}" class="collapse">
                                                        <table class="table">
                                                            <thead>
                                                            <tr>
                                                                <td><h5>Client</h5></td>
                                                                <td><h5>Branch</h5></td>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach(App\ClientsBranch::where('agent_id',$secHead->id)->get() as $cbranch)
                                                                @if($cbranch->activation == 0)
                                                                    <tr>
                                                                        <td class="col-md-4">{{ $cbranch->client->name }}</td>
                                                                        <td class="col-md-2">{{ $cbranch->name }}</td>
                                                                        <td class="col-md-6">
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
                                                @foreach(App\User::where('section_head_id',$secHead->id)->get() as $cam)
                                                    <a @if(App\ClientsBranch::where('agent_id',$cam->id)->count() > 0)href="#c{{ $cam->id }}"
                                                       @endif class="list-group-sub-item item2 active"
                                                       data-toggle="collapse"><strong>{{ $cam->name }}</strong>
                                                        <span class="badge">@if(App\ClientsBranch::where('agent_id',$cam->id)->count() > 0){{App\ClientsBranch::where('agent_id',$cam->id)->count()}}@endif</span></a>
                                                    <div id="c{{$cam->id}}" class="collapse">
                                                        <table class="table">
                                                            <thead>
                                                            <tr>
                                                                <td><h5>Client</h5></td>
                                                                <td><h5>Branch</h5></td>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach(App\ClientsBranch::where('agent_id',$cam->id)->get() as $cbranch)
                                                                @if($cbranch->activation == 0)
                                                                    <tr>
                                                                        <td class="col-md-4">{{ $cbranch->client->name }}</td>
                                                                        <td class="col-md-2">{{ $cbranch->name }}</td>
                                                                        <td class="col-md-6">
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
                                                @endforeach
                                            </div>
                                        @endforeach
                                    </div>
                                </li>
                            @endforeach
                        @else
                            @if($user->designation->id == 4 && $user->id == Session::get('User'))
                                <li class="list-group-item">
                                    <a @if(App\ClientsBranch::where('agent_id',$user->id)->count() > 0)href="#{{ $user->id }}"
                                       @endif class="list-group-item active" data-toggle="collapse">
                                        <strong>{{ $user->name }}</strong>
                                        <span class="badge">@if(App\ClientsBranch::where('agent_id',$user->id)->count() > 0){{App\ClientsBranch::where('agent_id',$user->id)->count()}}@endif</span>
                                    </a>
                                    <div id="{{$user->id}}" class="collapse">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <td><h5>Client</h5></td>
                                                <td><h5>Branch</h5></td>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach(App\ClientsBranch::where('agent_id',$user->id)->get() as $cbranch)
                                                @if($cbranch->activation == 0)
                                                    <tr>
                                                        <td class="col-md-4">{{ $cbranch->client->name }}</td>
                                                        <td class="col-md-2">{{ $cbranch->name }}</td>
                                                        <td class="col-md-6">
                                                            @if(\App\User::find(Session::get('User'))->privilege->assign_agent == 1)
                                                                <a href="/admin/manage-clients/agent-assign/{{ $cbranch->id }}"
                                                                   class="btn @if($cbranch->agent_id == '') btn-primary @else btn-success @endif btn-outline">Assign
                                                                    Account Manager</a>
                                                            @endif
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
                                </li>

                            @else
                                @foreach($users as $user)
                                    <li class="list-group-item">
                                        <a @if(App\User::where('section_head_id',$user->id)->count() > 0)href="#{{ $user->id }}"
                                           @endif class="list-group-item active" data-toggle="collapse">
                                            <strong>{{ $user->name }}</strong>
                                            <span class="badge">@if(App\User::where('section_head_id',$user->id)->count() >0){{App\User::where('section_head_id',$user->id)->count()}}@endif</span>
                                        </a>
                                        <div id="{{$user->id}}" class="collapse">

                                            @if(App\ClientsBranch::where('agent_id',$user->id)->count() > 0)
                                                <a @if(App\ClientsBranch::where('agent_id',$user->id)->count() > 0)href="#s{{ $user->id }}"
                                                   @endif class="list-group-sub-item item2 active"
                                                   data-toggle="collapse"><strong>{{ $user->name }}</strong>
                                                    <span class="badge">@if(App\ClientsBranch::where('agent_id',$user->id)->count() > 0){{App\ClientsBranch::where('agent_id',$user->id)->count()}}@endif</span></a>
                                                <div id="s{{$user->id}}" class="collapse">
                                                    <table class="table">
                                                        <thead>
                                                        <tr>
                                                            <td><h5>Client</h5></td>
                                                            <td><h5>Branch</h5></td>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach(App\ClientsBranch::where('agent_id',$user->id)->get() as $cbranch)
                                                            @if($cbranch->activation == 0)
                                                                <tr>
                                                                    <td class="col-md-4">{{ $cbranch->client->name }}</td>
                                                                    <td class="col-md-2">{{ $cbranch->name }}</td>
                                                                    <td class="col-md-6">
                                                                        @if(\App\User::find(Session::get('User'))->privilege->assign_agent == 1)
                                                                        <a href="/admin/manage-clients/agent-assign/{{ $cbranch->id }}"
                                                                           class="btn @if($cbranch->agent_id == '') btn-primary @else btn-success @endif btn-outline">Assign
                                                                            Account Manager</a>
                                                                        @endif
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

                                            @foreach(App\User::where('section_head_id',$user->id)->get() as $secHead)
                                                <a href="#c{{ $secHead->id }}" class="list-group-sub-item active"
                                                   data-toggle="collapse"><strong>{{ $secHead->name }}</strong>
                                                    <span class="badge">@if(App\User::where('section_head_id',$secHead->id)->count() > 0){{App\User::where('section_head_id',$secHead->id)->count()}}@endif</span></a>
                                                <div id="c{{$secHead->id}}" class="collapse">
                                                    @if(App\ClientsBranch::where('agent_id',$secHead->id)->count() > 0)
                                                        <a @if(App\ClientsBranch::where('agent_id',$secHead->id)->count() > 0)href="#s{{ $secHead->id }}"
                                                           @endif class="list-group-sub-item item2 active"
                                                           data-toggle="collapse"><strong>{{ $secHead->name }}</strong>
                                                            <span class="badge">@if(App\ClientsBranch::where('agent_id',$secHead->id)->count() > 0){{App\ClientsBranch::where('agent_id',$secHead->id)->count()}}@endif</span></a>
                                                        <div id="s{{$secHead->id}}" class="collapse">
                                                            <table class="table">
                                                                <thead>
                                                                <tr>
                                                                    <td><h5>Client</h5></td>
                                                                    <td><h5>Branch</h5></td>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                @foreach(App\ClientsBranch::where('agent_id',$secHead->id)->get() as $cbranch)
                                                                    @if($cbranch->activation == 0)
                                                                        <tr>
                                                                            <td class="col-md-4">{{ $cbranch->client->name }}</td>
                                                                            <td class="col-md-2">{{ $cbranch->name }}</td>
                                                                            <td class="col-md-6">
                                                                                @if(\App\User::find(Session::get('User'))->privilege->assign_agent == 1)
                                                                                <a href="/admin/manage-clients/agent-assign/{{ $cbranch->id }}"
                                                                                   class="btn @if($cbranch->agent_id == '') btn-primary @else btn-success @endif btn-outline">Assign
                                                                                    Account Manager</a>
                                                                                @endif
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
                                                    @foreach(App\User::where('section_head_id',$secHead->id)->get() as $cam)
                                                        <a @if(App\ClientsBranch::where('agent_id',$cam->id)->count() > 0)href="#c{{ $cam->id }}"
                                                           @endif class="list-group-sub-item item2 active"
                                                           data-toggle="collapse"><strong>{{ $cam->name }}</strong>
                                                            <span class="badge">@if(App\ClientsBranch::where('agent_id',$cam->id)->count() > 0){{App\ClientsBranch::where('agent_id',$cam->id)->count()}}@endif</span></a>
                                                        <div id="c{{$cam->id}}" class="collapse">
                                                            <table class="table">
                                                                <thead>
                                                                <tr>
                                                                    <td><h5>Client</h5></td>
                                                                    <td><h5>Branch</h5></td>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                @foreach(App\ClientsBranch::where('agent_id',$cam->id)->get() as $cbranch)
                                                                    @if($cbranch->activation == 0)
                                                                        <tr>
                                                                            <td class="col-md-4">{{ $cbranch->client->name }}</td>
                                                                            <td class="col-md-2">{{ $cbranch->name }}</td>
                                                                            <td class="col-md-6">
                                                                                @if(\App\User::find(Session::get('User'))->privilege->assign_agent == 1)
                                                                                <a href="/admin/manage-clients/agent-assign/{{ $cbranch->id }}"
                                                                                   class="btn @if($cbranch->agent_id == '') btn-primary @else btn-success @endif btn-outline">Assign
                                                                                    Account Manager</a>
                                                                                @endif
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
                                                    @endforeach
                                                </div>
                                            @endforeach
                                        </div>
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
