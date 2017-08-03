@extends('admin.layouts.dashboard')
@section('page_heading','Purchase Orders By Status')
@section('section')
    @if((\Illuminate\Support\Facades\Session::has('User'))
    && (\App\User::find(\Illuminate\Support\Facades\Session::get('User'))->privilege != null)
    && (\App\User::find(\Illuminate\Support\Facades\Session::get('User'))->privilege->view_po))

        <br>
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    @if($status == 'P')<h3 class="panel-title">Pending Purchase Orders</h3>
                    @elseif($status == 'OP')<h3 class="panel-title">Processing Purchase Orders</h3>
                    @elseif($status == 'CH')<h3 class="panel-title">Credit Hold Purchase Orders</h3>
                    @elseif($status == 'PC')<h3 class="panel-title">Partial Completed Purchase Orders</h3>
                    @elseif($status == 'C')<h3 class="panel-title">Completed Purchase Orders</h3>
                    @endif
                </div>
                <div class="panel-body">
                    <form action="" method="post" id="po" name="po">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-2 col-sm-3 col-lg-2">
                                <div class="form-group">
                                    <select id="postatus" name="postatus" class="form-control">
                                        <option value="">Select Status</option>
                                        <option value="P">Pending</option>
                                        <option value="OP">Processing</option>
                                        <option value="CH">Credit Hold</option>
                                        <option value="PC">Partial Completed</option>
                                        <option value="C">Completed</option>
                                    </select>
                                </div>
                            </div>
                            {{--<div class="col-md-3 col-sm-4 col-lg-3" id="sandbox-container">--}}
                            <div class="col-md-6 row">
                                {{--<div class="col-md-1">Date</div>--}}
                                <div class="col-md-1"> Form Date</div>
                                <div class="col-md-4"><input type="date" class="form-control" name="from" id="from">
                                </div>
                                <div class="col-md-1"> To Date</div>
                                <div class="col-md-4"><input type="date" class="form-control" name="to" id="to"></div>
                            </div>
                            {{--</div>--}}

                            <div class="col-md-2 col-sm-3 col-lg-2">
                                <div class="form-group">
                                    <button class="btn btn-primary"> Submit</button>
                                </div>
                            </div>
                        </div>
                        {{--@if($po !="")--}}
                        <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 tbl_ori">
                            <table class="table table-condensed">
                                <tbody class="tbody-completed">
                                <table class="table table-condensed">
                                    <thead>

                                    @if($status == 'C')

                                        <tr>
                                            <td class="text-center"><h5>P.O. No.</h5></td>
                                            <td class="text-center"><h5>Created Date & Time</h5></td>
                                            <td class="text-center"><h5>Completed Date & Time</h5></td>
                                            <td class="text-center"><h5>Organization</h5></td>
                                            <td class="text-center"><h5>Contact Name</h5></td>
                                            <td class="text-right"><h5>Grand Total</h5></td>
                                        </tr>
                                    @else
                                        <tr>
                                            <td class="text-center"><h5>P.O. No.</h5></td>
                                            <td class="text-center"><h5>Created Date & Time</h5></td>
                                            <td class="text-center"><h5>Organization</h5></td>
                                            <td class="text-center"><h5>Contact Name</h5></td>
                                            <td class="text-right"><h5>Grand Total</h5></td>
                                        </tr>
                                    @endif
                                    </thead>
                                </table>
                                <div class="tbl_ori_inner">
                                    <table class="table table-condensed">
                                        <tbody>
                                        @if($start !="" && $end!="")
                                            @if($p_orders->count()>0)
                                                @foreach($p_orders as $order)
                                                    @if($order->status == $status)
                                                        <tr>
                                                            <td class="text-center"><a
                                                                        href="{{ url('/admin/manage-clients/po-details/'.$order->id) }}">{{$order->id}}</a>
                                                            </td>
                                                            <td class="text-center">{{$order->created_at}}</td>
                                                            @if($order->status == 'C')
                                                                <td class="text-center">{{$order->updated_at}}</td> @endif
                                                            <td class="text-center">{{$order->client_branch->client->name}}</td>
                                                            <td class="text-center">{{$order->del_cp}}</td>
                                                            <td class="text-right">{{number_format($order->bucket->totalPrice,2)}}</td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td> No records found...!</td>
                                                </tr>
                                            @endif
                                        @else
                                            @if($p_orders->count()>0)
                                                @foreach($p_orders as $order)
                                                    @if($order->status == $status)
                                                        <tr>
                                                            <td class="text-center"><a
                                                                        href="{{ url('/admin/manage-clients/po-details/'.$order->id) }}">{{$order->id}}</a>
                                                            </td>
                                                            <td class="text-center">{{$order->created_at}}</td>
                                                            @if($order->status == 'C')
                                                                <td class="text-center">{{$order->updated_at}}</td> @endif
                                                            <td class="text-center">{{$order->client_branch->client->name}}</td>
                                                            <td class="text-center">{{$order->del_cp}}</td>
                                                            <td class="text-right">{{number_format($order->bucket->totalPrice,2)}}</td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td> No records found...!</td>
                                                </tr>
                                            @endif
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                                </td>
                                </tr>
                                {{--@endif--}}
                                </tbody>
                            </table>
                        </div>
                        {{--@endif--}}
                    </form>
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
        $("#po").validate({
            rules: {
                postatus: "required"
            }
        });
    </script>
@stop