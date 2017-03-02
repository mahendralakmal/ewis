@extends('admin.layouts.dashboard')
@section('page_heading','Manage Users')
@section('section')
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Users</h3>
            </div>
            {{--{{ $porder[0]['bucket'] }}--}}
            <div class="panel-body">
                <table class="table">
                    <thead>
                    <tr>
                        <td><h5>Po. No.</h5></td>
                        <td><h5>Created Date & Time</h5></td>
                        <td><h5>Client</h5></td>
                        <td><h5>Branch</h5></td>
                        <td><h5>Status</h5></td>
                        {{--<td><h5>NIC/ Passport</h5></td>--}}
                        <td class="col-md-3"></td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($porder as $porder)
                        <tr>
                            <td>{{$porder->id}}</td>
                            <td>{{$porder->created_at}}</td>
                            <td>{{\App\Client::find($porder->client_id)->name}}</td>
                            <td>{{$porder->del_branch}}</td>
                            <td>@if($porder->status === "P") Pending
                                @elseif($porder->status === "cp") Partial Completed
                                @elseif($porder->status === "c") Completed
                                @endif
                            </td>
                            <td><button href="{{ url ('/admin/manage-clients/po-details') }}" class="btn btn-success">View Order</button></td>
                        </tr>

                    @endforeach

                </table>
            </div>
        </div>
    </div>
@stop
