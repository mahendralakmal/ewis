@extends('admin.layouts.dashboard')
@section('page_heading','Add New Users')
@section('section')
    <div class="col-md-7">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Designations</h3>
            </div>
            <div class="panel-body">
                @if(!$designations->count() == 0)
                    <table class="table">
                        <thead>
                        <tr>
                            <td><h5>Designation</h5></td>
                            <td class="col-md-3"></td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($designations as $designation)
                            <tr>
                                <td>{{$designation->designation}}</td>
                                <td><a href="#" class="btn btn-primary btn-outline">Edit</a> <a href="#"
                                                                                                class="btn btn-danger btn-outline">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <p>No users found.</p>
                @endif
            </div>
        </div>
    </div>
    <div class="col-md-5">
        <form class="form-horizontal" role="form" method="POST" action="/admin/users/designation/store">
            {{ csrf_field() }}
            <div class="form-group">
                <div class="col-md-5">
                    <label>Designation</label>
                </div>
                <div class="col-md-7">
                    <input type="text" class="form-control" name="designation" id="designation">
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-5">
                    {{--<label>Confirm Passworde</label>--}}
                </div>
                <div class="col-md-7">
                    <button class="btn btn-primary btn-outline" type="submit">Add</button>
                </div>
            </div>
        </form>
    </div>
@stop
