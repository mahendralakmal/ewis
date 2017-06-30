@extends('admin.layouts.dashboard')
@section('page_heading','Credit Hold Orders')
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
                            <div class="col-md-1">Date</div>
                            <div class="col-md-1">Form</div>
                            <div class="col-md-4"><input type="date" class="form-control" name="from" id="from"></div>
                            <div class="col-md-1">To</div>
                            <div class="col-md-4"><input type="date" class="form-control" name="to" id="to"></div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <td><h5>P.O. No.</h5></td>
                                    <td><h5>Created Date & Time</h5></td>
                                    <td><h5>Organization</h5></td>
                                    <td><h5>Branch / Department</h5></td>
                                    <td width="200px"><h5>Customer Account Manager</h5></td>
                                    <td width="150px"><h5>Attachment</h5></td>
                                    <td class="col-md-2"></td>
                                </tr>
                                </thead>
                                <tbody class="tablePC">
                                @if(Session::get('User') == 1 || \App\User::find(Session::get('User'))->designation_id == 5 || \App\User::find(Session::get('User'))->designation_id == 7)
                                    @foreach($porders as $porder)
                                        <tr @if((integer)(Carbon\Carbon::parse($porder->created_at)->diff(\Carbon\Carbon::now())->days) > (int)(config('const.P_Order_Pending_Timeout')))class="error_tr"@endif>
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
                                @else
                                    @if($porders->designation_id == 6 )
                                        @foreach(App\User::where('section_head_id',$porders->id)->get() as $cbranch)
                                            @foreach(App\ClientsBranch::where('agent_id',$cbranch->id)->get() as $tbranch)
                                                @foreach(App\P_Order::where([['clients_branch_id',$tbranch->id], ['status', 'CH']])->get() as $porder)
                                                    <tr @if((integer)(Carbon\Carbon::parse($porder->created_at)->diff(\Carbon\Carbon::now())->days) > (int)(config('const.P_Order_Pending_Timeout')))class="error_tr"@endif>
                                                        <td>{{$porder->id}}</td>
                                                        <td>{{$porder->created_at}}</td>
                                                        <td>{{$porder->client_branch->client->name}}</td>
                                                        <td>{{$porder->del_branch}}</td>
                                                        <td>{{ \App\User::find(\App\ClientsBranch::find($porder->clients_branch_id)->agent_id)->name }}</td>
                                                        @if($porder->file !== null)
                                                            <td><a href="{{url('/'.$porder->file)}}">Download
                                                                    Attachment</a>
                                                            </td>
                                                        @else
                                                            <td>No Attachment</td>
                                                        @endif
                                                        <td>
                                                            <a href="{{ url('/admin/manage-clients/po-details/'.$porder->id) }}"
                                                               class="btn btn-success btn-outline">Update Status / View
                                                                Order</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endforeach
                                            @foreach(App\User::where('section_head_id',$cbranch->id)->get() as $sbranch)
                                                @foreach(App\ClientsBranch::where('agent_id',$sbranch->id)->get() as $tbranch)
                                                    @foreach(App\P_Order::where([['clients_branch_id',$tbranch->id], ['status', 'CH']])->get() as $porder)
                                                        <tr @if((integer)(Carbon\Carbon::parse($porder->created_at)->diff(\Carbon\Carbon::now())->days) > (int)(config('const.P_Order_Pending_Timeout')))class="error_tr"@endif>
                                                            <td>{{$porder->id}}</td>
                                                            <td>{{$porder->created_at}}</td>
                                                            <td>{{$porder->client_branch->client->name}}</td>
                                                            <td>{{$porder->del_branch}}</td>
                                                            <td>{{ \App\User::find(\App\ClientsBranch::find($porder->clients_branch_id)->agent_id)->name }}</td>
                                                            @if($porder->file !== null)
                                                                <td><a href="{{url('/'.$porder->file)}}">Download
                                                                        Attachment</a>
                                                                </td>
                                                            @else
                                                                <td>No Attachment</td>
                                                            @endif
                                                            <td>
                                                                <a href="{{ url('/admin/manage-clients/po-details/'.$porder->id) }}"
                                                                   class="btn btn-success btn-outline">Update Status /
                                                                    View
                                                                    Order</a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endforeach
                                            @endforeach

                                            @foreach(App\ClientsBranch::where('agent_id',$porders->id)->get() as $cbranch)
                                                @foreach(App\P_Order::where([['clients_branch_id',$cbranch->id], ['status', 'CH']])->get() as $porder)
                                                    <tr @if((integer)(Carbon\Carbon::parse($porder->created_at)->diff(\Carbon\Carbon::now())->days) > (int)(config('const.P_Order_Pending_Timeout')))class="error_tr"@endif>
                                                        <td>{{$porder->id}}</td>
                                                        <td>{{$porder->created_at}}</td>
                                                        <td>{{$porder->client_branch->client->name}}</td>
                                                        <td>{{$porder->del_branch}}</td>
                                                        <td>{{ \App\User::find(\App\ClientsBranch::find($porder->clients_branch_id)->agent_id)->name }}</td>
                                                        @if($porder->file !== null)
                                                            <td><a href="{{url('/'.$porder->file)}}">Download
                                                                    Attachment</a>
                                                            </td>
                                                        @else
                                                            <td>No Attachment</td>
                                                        @endif
                                                        <td>
                                                            <a href="{{ url('/admin/manage-clients/po-details/'.$porder->id) }}"
                                                               class="btn btn-success btn-outline">Update Status / View
                                                                Order</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endforeach
                                        @endforeach
                                    @else
                                        @foreach(App\User::where('section_head_id',$porders->id)->get() as $sbranch)
                                            @foreach(App\ClientsBranch::where('agent_id',$sbranch->id)->get() as $tbranch)
                                                @foreach(App\P_Order::where([['clients_branch_id',$tbranch->id], ['status', 'CH']])->get() as $porder)
                                                    <tr @if((integer)(Carbon\Carbon::parse($porder->created_at)->diff(\Carbon\Carbon::now())->days) > (int)(config('const.P_Order_Pending_Timeout')))class="error_tr"@endif>
                                                        <td>{{$porder->id}}</td>
                                                        <td>{{$porder->created_at}}</td>
                                                        <td>{{$porder->client_branch->client->name}}</td>
                                                        <td>{{$porder->del_branch}}</td>
                                                        <td>{{ \App\User::find(\App\ClientsBranch::find($porder->clients_branch_id)->agent_id)->name }}</td>
                                                        @if($porder->file !== null)
                                                            <td><a href="{{url('/'.$porder->file)}}">Download
                                                                    Attachment</a>
                                                            </td>
                                                        @else
                                                            <td>No Attachment</td>
                                                        @endif
                                                        <td>
                                                            <a href="{{ url('/admin/manage-clients/po-details/'.$porder->id) }}"
                                                               class="btn btn-success btn-outline">Update Status / View
                                                                Order</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endforeach
                                        @endforeach

                                        @if(App\ClientsBranch::where('agent_id',$porders->id)->count() >0)
                                            @foreach(App\ClientsBranch::where('agent_id',$porders->id)->get() as $cbranch)
                                                @if(App\P_Order::where('clients_branch_id',$cbranch->id)->count() > 0)
                                                    @foreach(App\P_Order::where([['clients_branch_id',$cbranch->id], ['status', 'CH']])->get() as $porder)
                                                        <tr @if((integer)(Carbon\Carbon::parse($porder->created_at)->diff(\Carbon\Carbon::now())->days) > (int)(config('const.P_Order_Pending_Timeout')))class="error_tr"@endif>
                                                            <td>{{$porder->id}}</td>
                                                            <td>{{$porder->created_at}}</td>
                                                            <td>{{$porder->client_branch->client->name}}</td>
                                                            <td>{{$porder->del_branch}}</td>
                                                            <td>{{ \App\User::find(\App\ClientsBranch::find($porder->clients_branch_id)->agent_id)->name }}</td>
                                                            @if($porder->file !== null)
                                                                <td><a href="{{url('/'.$porder->file)}}">Download
                                                                        Attachment</a>
                                                                </td>
                                                            @else
                                                                <td>No Attachment</td>
                                                            @endif
                                                            <td>
                                                                <a href="{{ url('/admin/manage-clients/po-details/'.$porder->id) }}"
                                                                   class="btn btn-success btn-outline">Update Status /
                                                                    View
                                                                    Order</a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @else
                                                @endif
                                            @endforeach
                                        @endif
                                    @endif
                                @endif
                                </tbody>
                            </table>
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
        $("#from").on('change', function () {
            getPartialCompletePO($(this).val(), $('#to').val());
        });
        $("#to").on('change', function () {
            getPartialCompletePO($('#from').val(), $(this).val());
        });

        function getPartialCompletePO(from, to) {
            if (from != '' && to != '') {
                if (Date.parse(from) < Date.parse(to)) {
                    $.ajax({
                        type: 'get',
                        url: '/admin/manage-clients/purchase-orders/' + from + '/' + to + '/PC',
                        success: function (response) {
                            console.log(response);
                            var model = $('.tablePC');
                            model.empty();
                            $.each(response, function (index, elem) {
//                                var now = new Date.now();
//                                var old = new Date(elem.created_at);
//                                var now = (elem.created_at - new Date.now()) / (1000 * 60 * 60 * 24);
                                if (elem.file != null) {
//                                    if (now > 13)
//                                        model.append("<tr class='error_tr'>" +
//                                    else
                                    model.append("<tr>" +
                                        "<td>" + elem.id +
                                        "</td><td>" + elem.created_at +
                                        "</td><td>" + elem.name +
                                        "</td><td>" + elem.del_branch +
                                        "</td><td>" + elem.user +
                                        "</td><td><a href='/" + elem.file + "'>Download Attachment</a>" +
                                        "</td><td><a target='_blank' href='/admin/manage-clients/po-details/" + elem.id +
                                        "' class='btn btn-success btn-outline'>View Order</a></td></tr>");
                                } else {
//                                    if (now > 13)
//                                        model.append("<tr class='error_tr'>" +
//                                    else
                                    model.append("<tr>" +
                                        "<td>" + elem.id +
                                        "</td><td>" + elem.created_at +
                                        "</td><td>" + elem.name +
                                        "</td><td>" + elem.del_branch +
                                        "</td><td>" + elem.user +
                                        "</td><td> No Attachment " + "</td>" +
                                        "<td><a target='_blank' href='/admin/manage-clients/po-details/" + elem.id +
                                        "' class='btn btn-success btn-outline'>View Order</a></td></tr>");

                                }

                            });
                        }
                    });
                } else {
                    $('#alert').append('<span class="col-md-12 alert alert-danger">check entered dates</span>');
                    setTimeout(function () {
                        $('.alert').hide(3000);
                    }, 5000);
                }
            }

        }
    </script>
@stop