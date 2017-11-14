@extends('theme')

@section('content')
    <!-- Nav tabs -->
    <div class="col-md-12 col-sm-12 col-sx-12 col-lg-12">
        <ul class="nav nav-tabs nav-menu" role="tablist">
            <li class="active">
                <a href="#agent" role="tab" data-toggle="tab"> Purchase History </a>
            </li>
        </ul>
        <form class="form-horizontal" id="frmHistory" enctype="multipart/form-data" role="form" method="POST"
              enctype="multipart/form-data" action="/client-profile/bucket/history/filterbydate">
            {{ csrf_field() }}
            <ul class="nav nav-pills">
                <li role="presentation"><a
                            href="{{ (\Illuminate\Support\Facades\Session::has('User')) ? url('client-profile/'.App\User::find(\Illuminate\Support\Facades\Session::get('User'))->c_user->client_branch->client->id.'/bucket/history'):''}}">All</a>
                </li>
                <li role="presentation"><a
                            href="{{ (\Illuminate\Support\Facades\Session::has('User')) ? url('client-profile/'.App\User::find(\Illuminate\Support\Facades\Session::get('User'))->c_user->client_branch->client->id.'/bucket/history/pending'):''}}">Pending</a>
                </li>
                <li role="presentation"><a
                            href="{{ (\Illuminate\Support\Facades\Session::has('User')) ? url('client-profile/'.App\User::find(\Illuminate\Support\Facades\Session::get('User'))->c_user->client_branch->client->id.'/bucket/history/processing'):''}}">Processing</a>
                </li>
                <li role="presentation" class="credit-hold"><a
                            href="{{ (\Illuminate\Support\Facades\Session::has('User')) ? url('client-profile/'.App\User::find(\Illuminate\Support\Facades\Session::get('User'))->c_user->client_branch->client->id.'/bucket/history/credit-hold'):''}}">Credit
                        Hold</a></li>
                <li role="presentation"><a
                            href="{{ (\Illuminate\Support\Facades\Session::has('User')) ? url('client-profile/'.App\User::find(\Illuminate\Support\Facades\Session::get('User'))->c_user->client_branch->client->id.'/bucket/history/partial-completed'):''}}">Partial
                        Completed</a></li>
                <li role="presentation"><a
                            href="{{ (\Illuminate\Support\Facades\Session::has('User')) ? url('client-profile/'.App\User::find(\Illuminate\Support\Facades\Session::get('User'))->c_user->client_branch->client->id.'/bucket/history/completed'):''}}">Completed</a>
                </li>
                <li role="presentation">
                    <input type="date" id="exd_date" name="exd_date" class="form-control">
                </li>
                <li role="presentation">
                    <button type="submit" id="search" class="btn btn-primary" name="search">Submit</button>
                </li>
            </ul>
        </form>
        <!-- Tab panes -->
        <div class="tab-contents">
            <div class="tab-content white-background">
                <div class="tab-pane fade active in" id="agent">
                    <ul class="container col-md-12 col-sm-12 col-sx-12 col-lg-12">
                        <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12">
                            <table class="table-bordered ">
                                <tr>
                                    <th class="col-md-1">
                                        <center><h5><strong>P.O. No.</strong></h5></center>
                                    </th>
                                    <th class="col-md-3">
                                        <center><h5><strong>Created Date & Time</strong></h5></center>
                                    </th>
                                    <th class="col-md-3">
                                        <center><h5><strong>Account Manager</strong></h5></center>
                                    </th>
                                    <th class="col-md-2">
                                        <center><h5><strong>Branch / Department</strong></h5></center>
                                    </th>
                                    <th class="col-md-2">
                                        <center><h5><strong>Status</strong></h5></center>
                                    </th>
                                    <th class="col-md-2">
                                        <center><h5><strong>Estimated Delivery Date</strong></h5></center>
                                    </th>
                                    <th class="col-md-3">
                                        <center><h5><strong>Details</strong></h5></center>
                                    </th>
                                </tr>
                                @if($orders != null)
                                    @foreach($orders as $porder)
                                        <tr @if(!is_null($porder->exd_date) && (integer)(Carbon\Carbon::parse($porder->exd_date)->diff(\Carbon\Carbon::now())->days) > 0) class="error_tr" @endif>
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
                                                    @elseif($porder->status === "CH") <p style="color: red">Credit
                                                            Hold </p>
                                                    @elseif($porder->status === "PC") Partial Completed
                                                    @elseif($porder->status === "C") Completed
                                                    @elseif($porder->status === "CN") Cancelled
                                                    @endif</center>
                                            </td>
                                            <td>
                                                <center>{{$porder->exd_date}}</center>
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
    </div>
@stop