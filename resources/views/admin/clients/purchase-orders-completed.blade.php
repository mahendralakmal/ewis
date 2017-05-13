@extends('admin.layouts.dashboard')
@section('page_heading','Completed Orders')
@section('section')
    @if((\Illuminate\Support\Facades\Session::has('User'))
    && (\App\User::find(\Illuminate\Support\Facades\Session::get('User'))->privilege != null)
    && (\App\User::find(\Illuminate\Support\Facades\Session::get('User'))->privilege->view_po))
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Purchase Orders</h3>
            </div>

            <div class="panel-body">
                <table class="table">
                    <thead>
                    <tr>
                        <td><h5>Po. No.</h5></td>
                        <td><h5>Created Date & Time</h5></td>
                        <td><h5>Client</h5></td>
                        <td><h5>Branch</h5></td>
                        <td><h5>Status</h5></td>
                        <td class="col-md-3"></td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($porder as $porder)
                        <tr>
                            <td>{{$porder->id}}</td>
                            <td>{{$porder->created_at}}</td>
                            <td>{{$porder->client_branch->client->name}}</td>
                            <td>{{$porder->del_branch}}</td>
                            <td>@if($porder->status === "P") Pending
                                @elseif($porder->status === "PC") Partial Completed
                                @elseif($porder->status === "C") Completed
                                @endif
                            </td>
                            <td><a href="{{ url('/admin/manage-clients/po-details/'.$porder->id) }}" class="btn btn-success btn-outline">Update Status / View Order</a></td>
                        </tr>

                    @endforeach

                </table>
            </div>
        </div>
    </div>
    @else
        <div class="col-md-offset-3">
            <h2 class="error">You are Not Authorize for access this page</h2>
        </div>
    @endif
@stop
