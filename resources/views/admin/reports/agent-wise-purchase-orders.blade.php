@extends('admin.layouts.dashboard')
@section('page_heading','Purchase Orders by Account Manager')
@section('section')
    @if((\Illuminate\Support\Facades\Session::has('User'))
    && (\App\User::find(\Illuminate\Support\Facades\Session::get('User'))->privilege != null)
    && (\App\User::find(\Illuminate\Support\Facades\Session::get('User'))->privilege->view_po))

        <br>
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Account Manager P.O's</h3>
                </div>
                <div class="panel-body">
                    <form action="" method="post" id="po">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-2 col-sm-3 col-lg-2">
                                <div class="form-group">
                                    <select class="form-control" name="agent" id="agent" data-parsley-required="true">
                                        <option value="n">Select Account Manager</option>
                                        @foreach($agents as $user)
                                            @if(\App\ClientsBranch::where('agent_id', $user->id)->count() > 0)
                                                <option value="{{ \App\ClientsBranch::where('agent_id', $user->id)->first()->agent->id }}">{{ \App\ClientsBranch::where('agent_id', $user->id)->first()->agent->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            {{--<div class="col-md-2"><label>Created Date</label></div>--}}
                            <div class="col-md-7 row">
                                <div class="col-md-1">Date</div>
                                <div class="col-md-1"> Form</div>
                                <div class="col-md-4"><input type="date" class="form-control" name="from" id="from"></div>
                                <div class="col-md-1"> To</div>
                                <div class="col-md-4"><input type="date" class="form-control" name="to" id="to"></div>
                            </div>

                            <div class="col-md-2 col-sm-2 col-lg-2">
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
                                @foreach($branch as $branch)
                                    @if( $branch->activation  !== 1)
                                        <tr>
                                            <td><strong>{{$branch->client->name}} - {{$branch->name}}</strong></td>
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
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    {{--                                                        @foreach($po->client_branch as $brnch)--}}
                                                    {{--@if($branch->p_orders->count()>0)--}}
                                                        {{--@foreach( $branch->p_orders as $order)--}}
                                                            @if($start !="" && $end!="" && $agents!="")
                                                            @foreach($p_orders->whereBetween('p__orders.created_at', [$start, $end])->get() as $porder)
                                                                @if($porder->status == $status)
                                                                <tr>
                                                                    <td>{{$porder->id}}</td>
                                                                    <td>{{$porder->created_at}}</td>
                                                                    <td>{{$porder->created_at}}</td>
                                                                    <td>{{$porder->del_cp}}</td>
                                                                    <td>{{$porder->del_tp}}</td>
                                                                </tr>
                                                                @endif
                                                            @endforeach
                                                                {{--@else--}}
                                                                    {{--<tr>--}}
                                                                        {{--<td>{{$porder->id}}</td>--}}
                                                                        {{--<td>{{$porder->created_at}}</td>--}}
                                                                        {{--<td>{{$porder->created_at}}</td>--}}
                                                                        {{--<td>{{$porder->del_cp}}</td>--}}
                                                                        {{--<td>{{$porder->del_tp}}</td>--}}
                                                                    {{--</tr>--}}
                                                                {{--@endif--}}
                                                            {{--@endforeach--}}
                                                                {{--@endif--}}
                                                        {{--@endforeach--}}

                                                    @else
                                                        <tr>
                                                            <td> No records found...!</td>
                                                        </tr>
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