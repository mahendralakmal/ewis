@extends('admin.layouts.dashboard')
@section('page_heading','Client Profile ')
@section('section')
    @if((Session::has('User'))
    && (\App\User::find(Session::get('User'))->privilege != null)
    && (\App\User::find(Session::get('User'))->privilege->client_prof))
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Clients</h3>
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <td><h5>Name</h5></td>
                                <td><h5>Email</h5></td>
                                <td><h5>Telephone</h5></td>
                                <td class="col-md-3"></td>
                            </tr>
                            </thead>
                            <tbody>

                            @if(\App\User::find(Session::get('User'))->id == 1)
                                @foreach($clients as $client)
                                    <tr>
                                        <td>{{ $client->name }}</td>
                                        <td>{{ $client->email }}</td>
                                        <td>{{ $client->telephone }}</td>
                                        <td>
                                            <a href="/admin/manage-clients/update-profile/{{ $client->id }}"
                                               class="btn btn-primary btn-outline">Edit</a>
                                            <a @if(!$client->approval) href="/admin/manage-clients/approved/{{ $client->id }}"
                                               class="btn btn-primary btn-outline"
                                               @else href="/admin/manage-clients/unapproved/{{ $client->id }}"
                                               class="btn btn-danger btn-outline"@endif>@if(!$client->approval)
                                                    Approve @else Unapprove @endif</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                @if($clients->designation_id == 6 )
                                    @foreach(App\Client::where('user_id',$clients->id)->get() as $cbranch)
                                        <tr>
                                            <td>{{ $cbranch->name }}</td>
                                            <td>{{ $cbranch->email }}</td>
                                            <td>{{ $cbranch->telephone }}</td>
                                            <td>
                                                <a href="/admin/manage-clients/update-profile/{{ $cbranch->id }}"
                                                   class="btn btn-primary btn-outline">Edit</a>
                                                <a @if(!$cbranch->approval) href="/admin/manage-clients/approved/{{ $cbranch->id }}"
                                                   class="btn btn-primary btn-outline"
                                                   @else href="/admin/manage-clients/unapproved/{{ $cbranch->id }}"
                                                   class="btn btn-danger btn-outline"@endif>@if(!$cbranch->approval)
                                                        Approve @else Unapprove @endif</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @foreach(App\User::where('section_head_id',$clients->id)->get() as $user)
                                        @foreach(App\Client::where('user_id',$user->id)->get() as $cbranch)
                                            <tr>
                                                <td>{{ $cbranch->name }}</td>
                                                <td>{{ $cbranch->email }}</td>
                                                <td>{{ $cbranch->telephone }}</td>
                                                <td>
                                                    <a href="/admin/manage-clients/update-profile/{{ $cbranch->id }}"
                                                       class="btn btn-primary btn-outline">Edit</a>
                                                    <a @if(!$cbranch->approval) href="/admin/manage-clients/approved/{{ $cbranch->id }}"
                                                       class="btn btn-primary btn-outline"
                                                       @else href="/admin/manage-clients/unapproved/{{ $cbranch->id }}"
                                                       class="btn btn-danger btn-outline"@endif>@if(!$cbranch->approval)
                                                            Approve @else Unapprove @endif</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        @foreach(App\ClientsBranch::where('agent_id',$user->id)->get() as $cbranch)
                                            @if($cbranch->activation == 0)
                                                <tr>
                                                    <td>{{ $cbranch->client->name }}</td>
                                                    <td>{{ $cbranch->client->email }}</td>
                                                    <td>{{ $cbranch->client->telephone }}</td>
                                                    <td>
                                                        <a href="/admin/manage-clients/update-profile/{{ $cbranch->client->id }}"
                                                           class="btn btn-primary btn-outline">Edit</a>
                                                        <a @if(!$cbranch->client->approval) href="/admin/manage-clients/approved/{{ $cbranch->client->id }}"
                                                           class="btn btn-primary btn-outline"
                                                           @else href="/admin/manage-clients/unapproved/{{ $cbranch->client->id }}"
                                                           class="btn btn-danger btn-outline"@endif>@if(!$cbranch->client->approval)
                                                                Approve @else Unapprove @endif</a>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                        @foreach(App\User::where('section_head_id',$user->id)->get() as $cuser)
                                            @foreach(App\ClientsBranch::where('agent_id',$cuser->id)->get() as $cbranch)
                                                @if($cbranch->activation == 0)
                                                    <tr>
                                                        <td>{{ $cbranch->client->name }}</td>
                                                        <td>{{ $cbranch->client->email }}</td>
                                                        <td>{{ $cbranch->client->telephone }}</td>
                                                        <td>
                                                            <a href="/admin/manage-clients/update-profile/{{ $cbranch->client->id }}"
                                                               class="btn btn-primary btn-outline">Edit</a>
                                                            <a @if(!$cbranch->client->approval) href="/admin/manage-clients/approved/{{ $cbranch->client->id }}"
                                                               class="btn btn-primary btn-outline"
                                                               @else href="/admin/manage-clients/unapproved/{{ $cbranch->client->id }}"
                                                               class="btn btn-danger btn-outline"@endif>@if(!$cbranch->client->approval)
                                                                    Approve @else Unapprove @endif</a>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        @endforeach

                                    @endforeach
                                @else
                                    @foreach(App\Client::where('user_id',$clients->id)->get() as $cbranch)
                                        <tr>
                                            <td>{{ $cbranch->name }}</td>
                                            <td>{{ $cbranch->email }}</td>
                                            <td>{{ $cbranch->telephone }}</td>
                                            <td>
                                                <a href="/admin/manage-clients/update-profile/{{ $cbranch->id }}"
                                                   class="btn btn-primary btn-outline">Edit</a>
                                                <a @if(!$cbranch->approval) href="/admin/manage-clients/approved/{{ $cbranch->id }}"
                                                   class="btn btn-primary btn-outline"
                                                   @else href="/admin/manage-clients/unapproved/{{ $cbranch->id }}"
                                                   class="btn btn-danger btn-outline"@endif>@if(!$cbranch->approval)
                                                        Approve @else Unapprove @endif</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @foreach(App\ClientsBranch::where('agent_id',$clients->id)->get() as $cbranch)
                                        @if($cbranch->activation == 0)
                                            <tr>
                                                <td>{{ $cbranch->client->name }}</td>
                                                <td>{{ $cbranch->client->email }}</td>
                                                <td>{{ $cbranch->client->telephone }}</td>
                                                <td>
                                                    <a href="/admin/manage-clients/update-profile/{{ $cbranch->client->id }}"
                                                       class="btn btn-primary btn-outline">Edit</a>
                                                    <a @if(!$cbranch->client->approval) href="/admin/manage-clients/approved/{{ $cbranch->client->id }}"
                                                       class="btn btn-primary btn-outline"
                                                       @else href="/admin/manage-clients/unapproved/{{ $cbranch->client->id }}"
                                                       class="btn btn-danger btn-outline"@endif>@if(!$cbranch->client->approval)
                                                            Approve @else Unapprove @endif</a>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    @foreach(App\User::where('section_head_id', $clients->id)->get() as $client)
                                        @foreach(App\ClientsBranch::where('agent_id',$client->id)->get() as $cbranch)
                                            <tr>
                                                <td>{{ $cbranch->client->name }}</td>
                                                <td>{{ $cbranch->client->email }}</td>
                                                <td>{{ $cbranch->client->telephone }}</td>
                                                <td>
                                                    <a href="/admin/manage-clients/update-profile/{{ $cbranch->client->id }}"
                                                       class="btn btn-primary btn-outline">Edit</a>
                                                    <a @if(!$cbranch->client->approval) href="/admin/manage-clients/approved/{{ $cbranch->client->id }}"
                                                       class="btn btn-primary btn-outline"
                                                       @else href="/admin/manage-clients/unapproved/{{ $cbranch->client->id }}"
                                                       class="btn btn-danger btn-outline"@endif>@if(!$cbranch->client->approval)
                                                            Approve @else Unapprove @endif</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endforeach
                                @endif
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4">

                @include('admin.messages.success')
                @include('admin.messages.error')

                <form id="clientProfile" @if($id == null)action="/admin/manage-clients/store"
                      @else action="/admin/manage-clients/update" @endif enctype="multipart/form-data" role="form"
                      method="POST" class="form-horizontal">
                    {{ csrf_field() }}
                    <input type="hidden" id="user_id" name="user_id"
                           value="{{ Session::get('User') }}">
                    @if(!$id == null)
                        <input type="hidden" id="id" name="id" value="{{$id->id}}">
                    @endif
                    <div class="form-group row">
                        <div class="col-md-4"><label>Name</label></div>
                        <div class="col-md-8"><input type="text" id="name" name="name" class="form-control"
                                                     @if(!$id == null) value="{{ $id->name }}" disabled @endif>
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
                        <div class="col-md-8"><input type="tel" id="telephone" name="telephone" class="form-control"
                                                     @if(!$id == null) value="{{ $id->telephone }}" @endif></div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-4"><label>Email</label></div>
                        <div class="col-md-8"><input type="email" id="email" name="email" class="form-control"
                                                     @if(!$id == null) value="{{ $id->email }}" @endif></div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-4"><label>Logo</label></div>
                        <div class="col-md-8">
                            <input type="file" id="logo" name="logo">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-4"><label>Profile Colour</label></div>
                        <div class="col-md-8"><input type="color" id="color" name="color" class="form-control"
                                                     @if(!$id == null) value="{{ $id->color }}"
                                                     @else value="#ffffff"@endif></div>
                    </div>
                    <div class="col-md-12">&nbsp;</div>
                    <button type="submit" class="btn btn-primary btn-outline">Submit</button>
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
        $("#clientProfile").validate({
            rules: {
                name: "required",
                address: "required",
                telephone: "required",
                email: {
                    required: true,
                    email: true
                }
            }
        });
    </script>
@stop