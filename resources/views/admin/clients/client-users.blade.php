@extends('admin.layouts.dashboard')
@section('page_heading','Client User Profile ')
@section('section')
    @if((Session::has('User'))
    && (\App\User::find(Session::get('User'))->privilege != null)
    && (\App\User::find(Session::get('User'))->privilege->client_prof))
        <div class="col-md-7">
            <form method="post" id="clientProfile" enctype="multipart/form-data"
                  @if($id == null)action="/admin/manage-clients/agent-assign/store"
                  @else action="/admin/manage-clients/agent-assign/update" @endif role="form" class="form-horizontal">
                {{ csrf_field() }}

                <input type="hidden" id="created_user" name="created_user"
                       value="{{ \Illuminate\Support\Facades\Session::get('User') }}">
                <input type="hidden" id="user_id" name="user_id" value="{{ $user->id }}">
                @if(!$id ==null)
                    <input type="hidden" id="id" name="id" value="{{ $id->id }}">
                @endif
                <h4>Contact Persons Details</h4>
                <hr>
                <div class="form-group row">
                    <div class="col-md-4"><label>Client</label></div>
                    <div class="col-md-8">
                        <select name="client_id" id="client_id" class="form-control">
                            <option> Select Client</option>
                            {{--@if(Session::get('User') == 1)--}}
                            @if(!$id ==null)
                                @foreach($clients as $client)
                                    <option value="{{$client->id}}"
                                            @if((!$id ==null) && ($id->client_id == $client->id)) selected @endif>{{$client->name}}</option>
                                @endforeach
                            @endif
                            {{--@else--}}
                                {{--@foreach($clients as $branch)--}}
                                    {{--<option value="{{$branch->id}}"--}}
                                            {{--@if((!$id ==null) && ($id->client_id == $branch->id)) selected @endif>{{$branch->name}}</option>--}}
                                {{--@endforeach--}}
                            {{--@endif--}}
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4"><label>Name</label></div>
                    <div class="col-md-8">
                        <input type="text" id="cp_name" name="cp_name" class="form-control"
                               @if(!$id ==null) value="{{ $id->cp_name }}" @else value="{{ $user->name }}" @endif>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4"><label>Designation</label></div>
                    <div class="col-md-8"><label class="form-control">{{ $user->designation->designation }}</label>
                        <input type="hidden" id="cp_designation" name="cp_designation"
                               value="{{ $user->designation->designation }}"></div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4"><label>Branch</label></div>
                    <div class="col-md-8">
                        <select name="branch_id" id="branch_id" class="form-control">
                            <option>Select Branch</option>
                            @if(!$id ==null)
                                @foreach($id->client_branch->client->client_branch as $branch)
                                    <option value="{{$branch->id}}"
                                            @if((!$id ==null) && ($id->clients_branch_id == $branch->id)) selected @endif>{{$branch->name}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4"><label>Telephone</label></div>
                    <div class="col-md-8"><input type="tel" id="cp_telephone" name="cp_telephone" class="form-control"
                                                 @if(!$id ==null) value="{{ $id->cp_telephone }}" @endif></div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4"><label>Email</label></div>
                    <div class="col-md-8">
                        <label class="form-control">{{ $user->email }}</label>
                        <input type="hidden" id="cp_email" name="cp_email"
                               @if(!$id ==null) value="{{ $id->cp_email }}" @else value="{{ $user->email }}" @endif>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-outline">Submit</button>
            </form>
        </div>
    @else
        <div class="col-md-offset-3">
            <h2 class="error">You are Not Authorize for access this page</h2>
        </div>
    @endif
@stop
@section('scripts')
    <script>
        $("#client_id").on('change', function () {
            $.ajax(
                    {
                        type: 'get',
                        url: '/admin/manage-clients/client_branch/' + $(this).val(),
                        success: function (response) {
                            console.log(response);
                            var model = $('#branch_id');
                            model.empty();
                            model.append("<option selected>Select Branch</option>")
                            $.each(response, function (index, elem) {
                                model.append("<option value='" + elem.id + "'>" + elem.name + "</option>")
                            });
                        }
                    }
            );
        });
    </script>
@stop