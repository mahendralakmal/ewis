@extends('admin.layouts.dashboard')
@section('page_heading','Partial Complete Orders')
@section('section')
    @if((\Illuminate\Support\Facades\Session::has('User'))
    && (\App\User::find(\Illuminate\Support\Facades\Session::get('User'))->privilege != null)
    && (\App\User::find(\Illuminate\Support\Facades\Session::get('User'))->privilege->view_po))
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Purchase Orders</h3>
                </div>

                <div class="panel-body">


                    <div class="col-md-7 row">
                        <div class="col-md-1">Date</div>
                        <div class="col-md-1"> Form</div>
                        <div class="col-md-4"><input type="date" class="form-control" name="from" id="from"></div>
                        <div class="col-md-1"> To</div>
                        <div class="col-md-4"><input type="date" class="form-control" name="to" id="to"></div>
                    </div>
                    <div class="col-md-5" id="alert"></div>
                    <table class="table">
                        <thead>
                        <tr>
                            <td><h5>Po. No.</h5></td>
                            <td><h5>Created Date & Time</h5></td>
                            <td><h5>Client</h5></td>
                            <td><h5>Branch</h5></td>
                            {{--<td><h5>Status</h5></td>--}}
                            {{--<td><h5>NIC/ Passport</h5></td>--}}
                            <td class="col-md-3"></td>
                        </tr>
                        </thead>
                        <tbody class="tablePC">
                        @foreach($porder as $porder)
                            <tr>
                                <td>{{$porder->id}}</td>
                                <td>{{$porder->created_at}}</td>
                                <td>{{$porder->client_branch->client->name}}</td>
                                <td>{{$porder->del_branch}}</td>
                                {{--<td>@if($porder->status === "P") Pending--}}
                                    {{--@elseif($porder->status === "PC") Partial Completed--}}
                                    {{--@elseif($porder->status === "C") Completed--}}
                                    {{--@endif--}}
                                {{--</td>--}}
                                <td><a href="{{ url('/admin/manage-clients/po-details/'.$porder->id) }}"
                                       class="btn btn-success btn-outline">Update Status / View Order</a></td>
                            </tr>

                        @endforeach

                    </table>
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
            getPendingPO($(this).val(), $('#to').val());
        });
        $("#to").on('change', function () {
            getPendingPO($('#from').val(), $(this).val());
        });

        function getPendingPO(from, to) {
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
                                model.append("<tr><td>" + elem.id +
                                        "</td><td>" + elem.created_at +
                                        "</td><td>" + elem.name +
                                        "</td><td>" + elem.del_branch +
                                        "</td><td><a target='_blank' href='/admin/manage-clients/po-details/" + elem.id + "' class='btn btn-success btn-outline'>Update Status / View Order</a></td></tr>");
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