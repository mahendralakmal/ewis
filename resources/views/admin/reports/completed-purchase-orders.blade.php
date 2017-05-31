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
                    <h3 class="panel-title">Client POs</h3>
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
                            <div class="col-md-2"><label>Created Date</label></div>
                            <div class="col-md-3 col-sm-4 col-lg-3" id="sandbox-container">
                                <div class="input-daterange input-group" id="datepicker">
                                    <input type="text" class="form-control" name="start" id="start"/>
                                    <span class="input-group-addon">to</span>
                                    <input type="text" class="form-control" name="end" id="end"/>
                                </div>
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
                                    <button class="btn btn-primary"> Submit</button>
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
                                                <tr>
                                                    <td><h5>Po. No.</h5></td>
                                                    <td><h5>Created Date & Time</h5></td>
                                                    <td><h5>Completed Date & Time</h5></td>
                                                    <td><h5>Client User</h5></td>
                                                    <td><h5>Contact Number</h5></td>
                                                    <td><h5>Grand Total</h5></td>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @if($start !="" && $end!="")
                                                    @if($branch->p_orders->count()>0)
                                                        @foreach($branch->p_orders as $order)
                                                            @if($order->status == $status)
{{--                                                            {{$order}}--}}
                                                                <tr>
                                                                    <td>{{$order->id}}</td>
                                                                    <td>{{$order->created_at}}</td>
                                                                    <td>{{$order->created_at}}</td>
                                                                    <td>{{$order->del_cp}}</td>
                                                                    <td>{{$order->del_tp}}</td>
                                                                    <td>{{$order->totalPrice}}</td>
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