@extends('admin.layouts.dashboard')
@section('page_heading','Client Profile ')
@section('section')
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
                <div class="col-md-4"><label>Name</label></div>
                <div class="col-md-8">
                    <select name="client_id" id="client_id" class="form-control">
                        <option> Select Clinet</option>
                        @foreach($clients as $client)
                            <option value="{{$client->id}}"
                                    @if((!$id ==null) && ($id->client_id == $client->id)) selected @endif>{{$client->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-4"><label>Name</label></div>
                <div class="col-md-8"><input type="text" id="cp_name" name="cp_name" class="form-control"
                                             @if(!$id ==null) value="{{ $id->cp_name }}" @endif></div>
            </div>
            <div class="form-group row">
                <div class="col-md-4"><label>Designation</label></div>
                <div class="col-md-8"><input type="text" id="cp_designation" name="cp_designation" class="form-control"
                                             @if(!$id ==null) value="{{ $id->cp_designation }}" @endif></div>
            </div>
            <div class="form-group row">
                <div class="col-md-4"><label>Branch</label></div>
                <div class="col-md-8"><input type="text" id="cp_branch" name="cp_branch" class="form-control"
                                             @if(!$id ==null) value="{{ $id->cp_branch }}" @endif></div>
            </div>
            <div class="form-group row">
                <div class="col-md-4"><label>Telephone</label></div>
                <div class="col-md-8"><input type="tel" id="cp_telephone" name="cp_telephone" class="form-control"
                                             @if(!$id ==null) value="{{ $id->cp_telephone }}" @endif></div>
            </div>
            <div class="form-group row">
                <div class="col-md-4"><label>Email</label></div>
                <div class="col-md-8"><input type="email" id="cp_email" name="cp_email" class="form-control"
                                             @if(!$id ==null) value="{{ $id->cp_email }}" @endif></div>
            </div>
            <button type="submit" class="btn btn-primary btn-outline">Submit</button>
        </form>
    </div>
@stop