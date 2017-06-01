@extends('admin.layouts.dashboard')
@section('page_heading','Purchase Orders by Client')
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
                    @elseif($status == 'PC')<h3 class="panel-title">Partial Completed Purchase Orders</h3>
                    @elseif($status == 'C')<h3 class="panel-title">Completed Purchase Orders</h3>
                    @endif
                </div>
                <div class="panel-body">
                    <form action="" method="post" id="po">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-2 col-sm-3 col-lg-2">
                                <div class="form-group">
                                    <select class="form-control" name="client" id="client" data-parsley-required="true">
                                        <option value="n">Select Client</option>
                                        @foreach ($clients as $client)
                                            <option value="{{ $client->id }}">{{ $client->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 row">
                                <div class="col-md-1"> Form Date</div>
                                <div class="col-md-4"><input type="date" class="form-control" name="from" id="from"></div>
                                <div class="col-md-1"> To Date</div>
                                <div class="col-md-4"><input type="date" class="form-control" name="to" id="to"></div>
                            </div>
                            <div class="col-md-2 col-sm-3 col-lg-2">
                                <div class="form-group">
                                    <select id="postatus" name="postatus" class="form-control">
                                        <option value="n">Select Status</option>
                                        <option value="P">Pending</option>
                                        <option value="OP">Processing</option>
                                        <option value="PC">Partial Completed</option>
                                        <option value="C">Completed</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-3 col-lg-2">
                                <div class="form-group">
                                    <button class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                        @if($po !="")
                            <table class="table table-condensed">
                                <tbody class="tbody-completed">
                                <tr>
                                    <td><h4><strong>{{$po->name}}</strong></h4></td>
                                </tr>
                                @foreach($po->client_branch as $branch)
                                    @if( $branch->activation !== 1)
                                    <tr>
                                        <td><strong>{{$branch->name}} Branch</strong></td>
                                    </tr>
                                    <tr>
                                        <td>
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
                                                <tbody>
                                                @if($start !="" && $end!="")
                                                    @if($branch->p_orders->count()>0)
                                                        @foreach($p_orders as $porder)
                                                            @if($porder->status == $status && $porder->clients_branch_id === $branch->id)
                                                                <tr>
                                                                    <td class="text-center"><a href="{{ url('/admin/manage-clients/po-details/'.$porder->id) }}">{{$porder->id}}</a></td>
                                                                    <td class="text-center">{{$porder->created_at}}</td>
                                                                    @if($porder->status == 'C') <td class="text-center">{{$porder->updated_at}}</td> @endif
                                                                    <td class="text-center">{{$porder->client_branch->client->name}}</td>
                                                                    <td class="text-center">{{$porder->del_cp}}</td>
                                                                    <td class="text-right">{{number_format($porder->bucket->totalPrice,2)}}</td>
                                                                </tr>
                                                            @endif
                                                        @endforeach
                                                    @else
                                                        <tr>
                                                            <td class="alert-danger"> No records found...!</td>
                                                        </tr>
                                                    @endif
                                                @else
                                                    @if($branch->p_orders->count()>0)
                                                        @foreach($p_orders as $porder)
                                                            @if($porder->status == $status && $porder->clients_branch_id === $branch->id)
                                                                <tr>
                                                                    <td class="text-center"><a href="{{ url('/admin/manage-clients/po-details/'.$porder->id) }}">{{$porder->id}}</a></td>
                                                                    <td class="text-center">{{$porder->created_at}}</td>
                                                                    @if($porder->status == 'C') <td class="text-center">{{$porder->updated_at}}</td> @endif
                                                                    <td class="text-center">{{$porder->client_branch->client->name}}</td>
                                                                    <td class="text-center">{{$porder->del_cp}}</td>
                                                                    <td class="text-right">{{number_format($porder->bucket->totalPrice,2)}}</td>
                                                                </tr>
                                                            @endif
                                                        @endforeach
                                                    @else
                                                        <tr>
                                                            <td class="alert-danger"> No records found...!</td>
                                                        </tr>
                                                    @endif

                                                @endif

                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                        @endif
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