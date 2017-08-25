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
                    <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">
                        <table class="table-bordered ">
                            <tr>
                                <td class="col-md-2">
                                    <center><h5>Po. No.</h5></center>
                                </td>
                                <td class="col-md-3">
                                    <center><h5>Created Date & Time</h5></center>
                                </td>
                                <td class="col-md-3">
                                    <center><h5>Account Manager</h5></center>
                                </td>
                                <td class="col-md-2">
                                    <center><h5>Branch / Department</h5></center>
                                </td>
                                <td class="col-md-2">
                                    <center><h5>Status</h5></center>
                                </td>
                                <td class="col-md-3">
                                    <center>Details</center>
                                </td>
                            </tr>
                            <hr>
                            @if($orders != null)
                                @foreach($orders as $porder)
                                    <tr>
                                        <td>
                                            <center>{{$porder->id}}</center>
                                        </td>
                                        <td>
                                            <center>{{$porder->created_at}}</center>
                                        </td>

                                        <td>
                                            <center>{{App\User::find($porder->client_branch->agent_id)->name}}</center>
                                        </td>

                                        <td>
                                            <center>{{$porder->del_branch}}</center>
                                        </td>
                                        <td>
                                            <center>@if($porder->status === "P") Pending
                                                @elseif($porder->status === "OP") Processing
                                                @elseif($porder->status === "CH") <p style="color: red">Credit Hold </p>
                                                @elseif($porder->status === "PC") Partial Completed
                                                @elseif($porder->status === "C") Completed
                                                @elseif($porder->status === "CN") Cancelled
                                                @endif</center>
                                        </td>
                                        <td><a href="{{ url('/client-profile/po-details/'.$porder->id) }}"
                                               class="btn btn-success">View Order</a></td>
                                    </tr>
                                @endforeach
                            @endif


                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </table>
                    </div>
                </ul>
            </div>
        </div>
    </div>
    </div>
@stop