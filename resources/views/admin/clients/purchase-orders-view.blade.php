@extends('admin.layouts.dashboard')
@section('page_heading','View All / Update Status of Purchase Orders')
@section('section')
    @if((Session::has('User'))
    && (\App\User::find(Session::get('User'))->privilege != null)
    && (\App\User::find(Session::get('User'))->privilege->view_po))

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Purchase Orders</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                            <div class="row">
                                <div class="col-md-2">Date Form</div>
                                <div class="col-md-3"><input type="date" class="form-control" name="from" id="from"
                                                             value="{{$from}}">
                                </div>
                                <div class="col-md-1"> To</div>
                                <div class="col-md-3"><input type="date" class="form-control" name="to" id="to"
                                                             value="{{$to}}"></div>
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
                                        <td><h5>Po. No.</h5></td>
                                        <td><h5>Created Date & Time</h5></td>
                                        <td><h5>Organization</h5></td>
                                        <td><h5>Branch / Department</h5></td>
                                        <td><h5>Customer Account Manager</h5></td>
                                        <td><h5>Attachment</h5></td>
                                        @if(\App\User::find(Session::get('User'))->privilege->change_po_status)
                                            <td><h5>Status</h5></td>
                                            <td><h5>Estimated Delivery Date</h5></td>
                                        @endif
                                        <td></td>
                                    </tr>
                                    </thead>
                                    <tbody class="tablePO">
                                    @foreach($porders as $porder)
                                        <tr @if(((integer)(Carbon\Carbon::parse($porder->created_at)->diff(\Carbon\Carbon::now())->days) > (int)(config('const.P_Order_Pending_Timeout')) && $porder->status === "P") ||
                                ((integer)(Carbon\Carbon::parse($porder->created_at)->diff(\Carbon\Carbon::now())->days) > (int)(config('const.P_Order_Pending_Timeout')) && $porder->status === "OP") ||
                                ((integer)(Carbon\Carbon::parse($porder->created_at)->diff(\Carbon\Carbon::now())->days) > (int)(config('const.P_Order_Pending_Timeout')) && $porder->status === "CH") ||
                                ((integer)(Carbon\Carbon::parse($porder->created_at)->diff(\Carbon\Carbon::now())->days) > (int)(config('const.P_Order_Pending_Timeout')) && $porder->status === "PC"))
                                            class="error_tr"
                                            @elseif($porder->status === 'CN')
                                            class="error_cn"
                                                @endif
                                        >
                                            <td>{{$porder->id}}</td>
                                            <td>{{$porder->created_at}}</td>
                                            <td>{{$porder->client_branch->client->name}}</td>
                                            <td>{{$porder->del_branch}}</td>
                                            <td>{{ \App\User::find(\App\ClientsBranch::find($porder->clients_branch_id)->agent_id)->name }}</td>
                                            @if($porder->file !== null)
                                                <td><a href="{{url('/'.$porder->file)}}">Download Attachment</a>
                                                </td>
                                            @else
                                                <td>No Attachment</td>
                                            @endif
                                            @if(\App\User::find(Session::get('User'))->privilege->change_po_status)
                                                <form method="POST" id="{{$porder->id}}"
                                                      action="/admin/manage-clients/po-details/change_status">
                                                    <td>
                                                        <input type="hidden" id="id" name="id"
                                                               value="{{$porder->id}}">
                                                        {{ csrf_field() }}
                                                        <select id="{{$porder->id}}"
                                                                name="postatus"
                                                                class="form-control postatus">
                                                            @if($porder->status === "P")
                                                                <option value="P"
                                                                        @if($porder->status === "P") selected @endif>
                                                                    Pending
                                                                </option>
                                                                <option value="OP"
                                                                        @if($porder->status === "OP") selected @endif>
                                                                    Processing
                                                                </option>
                                                                <option value="CH" style="color:red"
                                                                        @if($porder->status === "CH") selected @endif>
                                                                    Credit Hold
                                                                </option>
                                                                <option value="PC"
                                                                        @if($porder->status === "PC") selected @endif>
                                                                    Partial
                                                                    Completed
                                                                </option>
                                                                <option value="C"
                                                                        @if($porder->status === "C") selected @endif>
                                                                    Completed
                                                                </option>
                                                                <option value="CN" class="red-background"
                                                                        @if($porder->status === "CN") selected @endif>
                                                                    Cancelled
                                                                </option>
                                                            @elseif($porder->status === "OP")
                                                                <option value="OP"
                                                                        @if($porder->status === "OP") selected @endif>
                                                                    Processing
                                                                </option>
                                                                <option value="CH" style="color:red"
                                                                        @if($porder->status === "CH") selected @endif>
                                                                    Credit Hold
                                                                </option>
                                                                <option value="PC"
                                                                        @if($porder->status === "PC") selected @endif>
                                                                    Partial
                                                                    Completed
                                                                </option>
                                                                <option value="C"
                                                                        @if($porder->status === "C") selected @endif>
                                                                    Completed
                                                                </option>
                                                                <option value="CN" class="red-background"
                                                                        @if($porder->status === "CN") selected @endif>
                                                                    Cancelled
                                                                </option>
                                                            @elseif($porder->status === "CH")
                                                                <option value="CH" style="color:red"
                                                                        @if($porder->status === "CH") selected @endif>
                                                                    Credit Hold
                                                                </option>
                                                                <option value="PC"
                                                                        @if($porder->status === "PC") selected @endif>
                                                                    Partial
                                                                    Completed
                                                                </option>
                                                                <option value="C"
                                                                        @if($porder->status === "C") selected @endif>
                                                                    Completed
                                                                </option>
                                                                <option value="CN" class="red-background"
                                                                        @if($porder->status === "CN") selected @endif>
                                                                    Cancelled
                                                                </option>
                                                            @elseif($porder->status === "PC")
                                                                red-background
                                                                <option value="PC"
                                                                        @if($porder->status === "PC") selected @endif>
                                                                    Partial Complete
                                                                </option>
                                                                <option value="C"
                                                                        @if($porder->status === "C") selected @endif>
                                                                    Completed
                                                                </option>
                                                                <option value="CN"
                                                                        @if($porder->status === "CN") selected @endif>
                                                                    Cancelled
                                                                </option>
                                                            @elseif($porder->status === "C")
                                                                <option value="C" class=""
                                                                        @if($porder->status === "C") selected @endif>
                                                                    Completed
                                                                </option>
                                                            @elseif($porder->status === "CN")
                                                                <option value="CN" class="red-background"
                                                                        @if($porder->status === "CN") selected @endif>
                                                                    Cancelled
                                                                </option>
                                                            @endif
                                                        </select>
                                                    </td>
                                                    <td>

                                                        <input type="date" id="exd_date" name="exd_date"
                                                               @if($porder->status != "P") disabled value="{{$porder->exd_date}}"
                                                               @else value="<?php $date = new DateTime($porder->created_at); $date->modify('+5 day'); echo $date->format('Y-m-d'); ?>"
                                                               @endif class="form-control"></td>
                                                    <td>
                                                        <button class="btn btn-primary btn-outline" name="submit"
                                                                id="submit">Submit
                                                        </button>
                                                    </td>
                                                </form>
                                            @endif
                                            <td>
                                                <a href="{{ url('/admin/manage-clients/po-details/'.$porder->id) }}"
                                                   class="btn btn-success btn-outline">Update Status / View
                                                    Order</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            {{ $porders->links() }}
                        </div>
                    </div>
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
        $("#search").on('click', function () {
            var from = $('#from').val();
            var to = $('#to').val();
            var status = $('#hidStatus').val();
            window.location.replace('/admin/purchase-orders/purchase-orders-view/' + from + '/' + to + '/' + status);
        });

        $(".postatus").on('change', function (e) {
            e.preventDefault();
            var poid = this.id;
            var status = this.value;
            var token = this._token;
            getPoStattus();
        });


        $("#from").on('change', function () {
            getPendingPO($(this).val(), $('#to').val());
            getPoStattus();
        });

        $("#to").on('change', function () {
            getPendingPO($('#from').val(), $(this).val());
            getPoStattus();
        });

        function getDateDiff(start, end) {
            if (start != null)
                from = new Date(start);

            if (end != null)
                to = new Date(end)
            else to = Date.now();

            return Math.round((to - from) / (1000 * 60 * 60 * 24));
        }
    </script>
@stop