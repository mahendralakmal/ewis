@extends('admin.layouts.dashboard')
@section('page_heading','View Purchase Orders')
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
                            <td>{{$porder->id}} <input type="hidden" id="id" name="id" value="{{$porder->id}}"></td>
                            <td>{{$porder->created_at}}</td>
                            <td>{{\App\Client::find($porder->client_id)->name}}</td>
                            <td>{{$porder->del_branch}}</td>
                            <td>
                                <select id="postatus" name="postatus" class="form-control">
                                    <option value="P" @if($porder->status === "P") selected @endif>Pending</option>
                                    <option value="PC" @if($porder->status === "PC") selected @endif>Partial Completed</option>
                                    <option value="C" @if($porder->status === "C") selected @endif>Completed</option>
                                </select>
                            </td>
                            <td>
                                <a href="{{ url('/admin/manage-clients/po-details/'.$porder->id) }}" class="btn btn-success btn-outline">View Order</a>
{{--                                <a href="{{ url('/admin/manage-clients/po-details/'.$porder->id.'/change_status') }}" class="btn btn-success btn-outline">Change Status</a>--}}
                            </td>
                        </tr>

                    @endforeach

                </table>
            </div>
        </div>
    </div>
@stop
