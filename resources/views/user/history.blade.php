@extends('theme')

@section('content')
            <!-- Nav tabs -->
            <div class="col-md-12 col-sm-12 col-sx-12 col-lg-12">
                <ul class="nav nav-tabs nav-menu" role="tablist">
                    <li class="active">
                        <a href="#agent" role="tab" data-toggle="tab"> Purchase History </a>
                    </li>

                </ul>

                <!-- Tab panes -->
                <div class="tab-content white-background">
                    <div class="tab-pane fade active in" id="agent">
                        <ul class="container col-md-12 col-sm-12 col-sx-12 col-lg-12">



                    {{--{{$months->created_at}}--}}
                                {{--<div class="row">--}}
                                    {{--<div class="col-md-5">Select Month</div>--}}
                                    {{--<div class="col-md-7">--}}
                                        {{--<div class="form-group">--}}
                                            {{--<div class='input-group date' id='datetimepicker'>--}}
                                                {{--<input type='text' class="form-control" />--}}
                                                {{--<span class="input-group-addon">--}}
                                                    {{--<span class="glyphicon glyphicon-calendar">--}}
                                                    {{--</span>--}}
                                                {{--</span>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                    <div class="col-lg-11 col-sm-11 col-xs-11 col-md-11 col-md-offset-1 col-lg-offset-1">
                                        <table class="table-bordered col-sm-12 col-lg-12 col-md-12">
                                            <tr>
                                                <td class="col-md-2"><center><h5>Po. No.</h5></center></td>
                                                <td class="col-md-5"><center><h5>Created Date & Time</h5></center></td>
                                                <td class="col-md-5"><center><h5>Account Manager</h5></center></td>
                                                <td class="col-md-5"><center><h5>Branch</h5></center></td>
                                                <td class="col-md-5"><center><h5>Status</h5></center></td>
                                                {{--<td><h5>NIC/ Passport</h5></td>--}}
                                                <td class="col-md-3"><center>Details</center></td>
                                            </tr>
                                            <hr>

                                                @foreach($orders as $porder)
                                                <tr>
{{--                                                    <td>{{ $porder->client_branch }}</td>--}}
                                                    <td class="col-md-3"><center>{{$porder->id}}</center></td>
                                                    <td class="col-md-3"><center>{{$porder->created_at}}</center></td>

                                                    <td class="col-md-3"><center>{{App\User::find($porder->client_branch->agent_id)->name}}</center></td>

                                                    <td class="col-md-3"><center>{{$porder->del_branch}}</center></td>
                                                    <td class="col-md-3"><center>@if($porder->status === "P") Pending
                                                        @elseif($porder->status === "PC") Partial Completed
                                                        @elseif($porder->status === "C") Completed
                                                            @endif</center>
                                                    </td>
                                                    <td class="col-md-3"><a href="{{ url('/client-profile/po-details/'.$porder->id) }}" class="btn btn-success">View Order</a></td>
                                                </tr>
                                                @endforeach



                                            <tr>
                                                <td> </td>
                                                <td> </td>
                                                <td> </td>
                                            </tr>
                                        </table>
                                    </div>
{{--@endforeach--}}
                        </ul>
                        </div>
                    </div>
                </div>
            </div>
@stop