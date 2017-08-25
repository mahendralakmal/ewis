@extends('admin.layouts.dashboard')
@section('page_heading','Cancelled Orders')
@section('section')
    @if((\Illuminate\Support\Facades\Session::has('User'))
    && (\App\User::find(\Illuminate\Support\Facades\Session::get('User'))->privilege != null)
    && (\App\User::find(\Illuminate\Support\Facades\Session::get('User'))->privilege->view_po))
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Purchase Orders</h3>
                </div>

                <div class="panel-body">
                    <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
                        <div class="row">
                            <div class="col-md-2">Date  Form</div>
                            <div class="col-md-3"><input type="date" class="form-control" name="from" id="from" value="{{$from}}">
                            </div>
                            <div class="col-md-1"> To</div>
                            <div class="col-md-3"><input type="date" class="form-control" name="to" id="to" value="{{$to}}"></div>
                            <div class="col-md-2">
                                <input type="hidden" id="hidStatus" value="a">
                                <button class="btn" id="search">Search</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="table-responsive tbl_ori">
                            <table class="table">
                                <thead>
                                <tr>
                                    <td><h5>P.O No.</h5></td>
                                    <td><h5>Created Date & Time</h5></td>
                                    <td><h5>Organization</h5></td>
                                    <td><h5>Branch / Department</h5></td>
                                    <td width="200px"><h5>Customer Account Manager</h5></td>
                                    <td width="150px"><h5>Attachment</h5></td>
                                    <td class="col-md-2"></td>
                                </tr>
                                </thead>
                                <tbody class="tableCompleted">
                                {{--@if(Session::get('User') == 1 || \App\User::find(Session::get('User'))->designation_id == 5 || \App\User::find(Session::get('User'))->designation_id == 7)--}}
                                    @foreach($porders as $porder)
                                        <tr class="error_cn">
                                            <td>{{$porder->id}}</td>
                                            <td>{{$porder->created_at}}</td>
                                            <td>{{$porder->client_branch->client->name}}</td>
                                            <td>{{$porder->del_branch}}</td>
                                            <td>{{ \App\User::find(\App\ClientsBranch::find($porder->clients_branch_id)->agent_id)->name }}</td>
                                            @if($porder->file !== null)
                                                <td><a href="{{url('/'.$porder->file)}}">Download Attachment</a></td>
                                            @else
                                                <td>No Attachment</td>
                                            @endif
                                            <td>
                                                <a href="{{ url('/admin/manage-clients/po-details/'.$porder->id) }}"
                                                   class="btn btn-success btn-outline">Update Status / View Order</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">{{ $porders->links() }}</div>
                </div>
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
        $("#search").on('click', function(){
            var from = $('#from').val();
            var to = $('#to').val();
            var status = $('#hidStatus').val();
            window.location.replace('/admin/purchase-orders/purchase-orders-cancelled/'+from+'/'+to);
        });
    </script>
@stop
