@extends('theme')

@section('content')
            <div class="col-md-12">
                <ul class="nav nav-tabs nav-menu" role="tablist">
                    <li class="active">
                        <a href="#agent" role="tab" data-toggle="tab">
                            <i class="fa fa-user-secret"></i> Edit Details
                        </a>
                    </li>

                </ul>
                <div class="tab-content white-background">
                    <div class="tab-pane fade active in" id="agent">
                        <div class="container">
                            <div class="col-sm-11" style="float:left;">
                                <br clear="all"/>
                                <br clear="all"/>
                                <div class="row">
                                    <div class="col-md-8">
                                        @include('admin.messages.success')
                                        @include('admin.messages.error')
                                        <h4 class="pro-title">Edit Profile</h4>
                                    <form method="POST" id="cp_update" enctype="multipart/form-data" action="/admin/manage-clients/cp_update" class="form-horizontal">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <input type="hidden" id="id" name="id" value="{{$id->id}}">
                                            <input type="hidden" value="{{$id->user_id}}" name="user_id" id="user_id">
                                            <input type="hidden" value="{{$id->client_id}}" name="client_id" id="client_id">
                                            <div class="col-md-3">
                                                <label>Contact Person</label>
                                            </div>
                                            <div class="col-md-7">
                                                <input type="text"  value="{{$id->cp_name}}" class="form-control" name="cp_name" id="cp_name">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-3">
                                                <label>Designation</label>
                                            </div>
                                            <div class="col-md-7">
                                                <input type="text" value="{{$id->cp_designation}}" class="form-control" name="cp_designation" id="cp_designation">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-3">
                                                <label>Branch Name</label>
                                            </div>
                                            <div class="col-md-7">
                                                <label>{{$id->client_branch->name}}</label>
                                                <input type="hidden" id="clients_branch_id" name="clients_branch_id" value="{{$id->client_branch->id}}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-3">
                                                <label>Contact Number</label>
                                            </div>
                                            <div class="col-md-7">
                                                <input type="text" class="form-control" value="{{$id->cp_telephone}}" name="cp_telephone" id="cp_telephone" maxlength="12">
                                                Eg: +94 xxxxxxxx
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-3">
                                                <label>Contact Email</label>
                                            </div>
                                            <div class="col-md-7">
                                                <input type="text" class="form-control" value="{{$id->cp_email}}" name="cp_email" id="cp_email" maxlength="12">
                                                Eg: xxxxxxxxx@xxxx.com
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-7">
                                                <button class="btn btn-primary btn-outline" type="submit" value="save-form">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                    </div><!--col-md-6 close-->
                            </div><!--container close-->
                        </div>
                        </div><!--tab-pane close-->
                    </div>
                </div>
            </div>
@stop

@section('scripts')
    <script>
        $("#cp_update").validate({
            rules: {
                cp_name: "required",
                cp_designation: "required",
                cp_telephone: 'required',
                cp_email: 'required',
                clients_branch_id: 'required'
            }
        });
    </script>
@stop