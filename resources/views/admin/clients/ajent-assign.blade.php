@extends('admin.layouts.dashboard')
@section('page_heading','Client Profile ')
@section('section')
    <div class="col-md-7">
        <form method="post" action="" role="form" class="form-horizontal">
            {{ csrf_field() }}
            <h4>Basic Details</h4><hr>
            <div class="form-group row">
                <div class="col-md-4"><label>Name</label></div>
                <div class="col-md-8"><input type="text" id="name" name="name" class="form-control"></div>
            </div>
            <div class="form-group row">
                <div class="col-md-4"><label>Address</label></div>
                <div class="col-md-8"><textarea class="form-control" name="address" id="address"></textarea></div>
            </div>
            <div class="form-group row">
                <div class="col-md-4"><label>Telephone</label></div>
                <div class="col-md-8"><input type="tel" id="tel" name="tel" class="form-control"></div>
            </div>
            <div class="form-group row">
                <div class="col-md-4"><label>Email</label></div>
                <div class="col-md-8"><input type="email" id="email" name="email" class="form-control"></div>
            </div>
            <div class="form-group row">
                <div class="col-md-4"><label>Logo</label></div>
                <div class="col-md-8"><input type="file" id="logo" name="logo" class="form-control"></div>
            </div>
            <div class="form-group row">
                <div class="col-md-4"><label>Profile Colour</label></div>
                <div class="col-md-8"><input type="color" id="color" name="color" class="form-control" value="#ffffff"></div>
            </div>
            <div class="col-md-12">&nbsp;</div>

            <h4>Contact Persons Details</h4>
            <hr>
            <div class="form-group row">
                <div class="col-md-4"><label>Name</label></div>
                <div class="col-md-8"><input type="text" id="contact_name" name="contact_name" class="form-control"></div>
            </div>
            <div class="form-group row">
                <div class="col-md-4"><label>Designation</label></div>
                <div class="col-md-8"><input type="text" id="contact_name" name="contact_name" class="form-control"></div>
            </div>
            <div class="form-group row">
                <div class="col-md-4"><label>Branch</label></div>
                <div class="col-md-8"><input type="text" id="contact_name" name="contact_name" class="form-control"></div>
            </div>
            <div class="form-group row">
                <div class="col-md-4"><label>Telephone</label></div>
                <div class="col-md-8"><input type="tel" id="tel" name="tel" class="form-control"></div>
            </div>
            <div class="form-group row">
                <div class="col-md-4"><label>Email</label></div>
                <div class="col-md-8"><input type="email" id="email" name="email" class="form-control"></div>
            </div>
            <button type="submit" class="btn btn-primary btn-outline">Submit</button>
        </form>
    </div>
@stop