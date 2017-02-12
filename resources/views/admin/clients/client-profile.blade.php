@extends('admin.layouts.dashboard')
@section('page_heading','Client Profile ')
@section('section')
    <div class="col-md-7">
        <form method="post" @if($id->client == null)action="/admin/manage-clients/store" @else action="/admin/manage-clients/update" @endif role="form" class="form-horizontal">
            {{ csrf_field() }}
            <h4>Basic Details</h4><hr>
            @if($id->client == null)
                <input type="hidden" id="user_id" name="user_id" value="{{ $id->id }}">
            @else
                <input type="hidden" id="id" name="id" value="{{ $id->client->id }}">
            @endif
            <div class="form-group row">
                <div class="col-md-4"><label>Name</label></div>
                <div class="col-md-8"><input type="text" id="name" name="name" class="form-control" @if(!$id->client == null) value="{{ $id->client->name }}" disabled @endif></div>
            </div>
            <div class="form-group row">
                <div class="col-md-4"><label>Address</label></div>
                <div class="col-md-8"><textarea class="form-control" name="address" id="address">@if(!$id->client == null){{ $id->client->address }} @endif</textarea></div>
            </div>
            <div class="form-group row">
                <div class="col-md-4"><label>Telephone</label></div>
                <div class="col-md-8"><input type="tel" id="telephone" name="telephone" class="form-control" @if(!$id->client == null) value="{{ $id->client->telephone }}" @endif></div>
            </div>
            <div class="form-group row">
                <div class="col-md-4"><label>Email</label></div>
                <div class="col-md-8"><input type="email" id="email" name="email" class="form-control" @if(!$id->client == null) value="{{ $id->client->email }}" @endif></div>
            </div>
            <div class="form-group row">
                <div class="col-md-4"><label>Logo</label></div>
                <div class="col-md-8"><input type="file" id="logo" name="logo" class="form-control" @if(!$id->client == null) value="{{ $id->client->logo }}" @endif></div>
            </div>
            <div class="form-group row">
                <div class="col-md-4"><label>Profile Colour</label></div>
                <div class="col-md-8"><input type="color" id="color" name="color" class="form-control"  @if(!$id->client == null) value="{{ $id->client->color }}" @else value="#ffffff"@endif></div>
            </div>
            <div class="col-md-12">&nbsp;</div>

            <h4>Contact Persons Details</h4>
            <hr>
            <div class="form-group row">
                <div class="col-md-4"><label>Name</label></div>
                <div class="col-md-8"><input type="text" id="cp_name" name="cp_name" class="form-control" @if(!$id->client == null) value="{{ $id->client->cp_name }}" @endif></div>
            </div>
            <div class="form-group row">
                <div class="col-md-4"><label>Designation</label></div>
                <div class="col-md-8"><input type="text" id="cp_designation" name="cp_designation" class="form-control" @if(!$id->client == null) value="{{ $id->client->cp_designation }}" @endif></div>
            </div>
            <div class="form-group row">
                <div class="col-md-4"><label>Branch</label></div>
                <div class="col-md-8"><input type="text" id="cp_branch" name="cp_branch" class="form-control" @if(!$id->client == null) value="{{ $id->client->cp_branch }}" @endif></div>
            </div>
            <div class="form-group row">
                <div class="col-md-4"><label>Telephone</label></div>
                <div class="col-md-8"><input type="tel" id="cp_telephone" name="cp_telephone" class="form-control" @if(!$id->client == null) value="{{ $id->client->cp_telephone }}" @endif></div>
            </div>
            <div class="form-group row">
                <div class="col-md-4"><label>Email</label></div>
                <div class="col-md-8"><input type="email" id="cp_email" name="cp_email" class="form-control" @if(!$id->client == null) value="{{ $id->client->cp_email }}" @endif></div>
            </div>
            <button type="submit" class="btn btn-primary btn-outline">Submit</button>
        </form>
    </div>
@stop