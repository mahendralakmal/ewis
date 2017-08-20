@extends('admin.layouts.dashboard')
@section('page_heading','Completion Time')
@section('section')
    @if((\Illuminate\Support\Facades\Session::has('User'))
    && (\App\User::find(\Illuminate\Support\Facades\Session::get('User'))->privilege != null)
    && (\App\User::find(\Illuminate\Support\Facades\Session::get('User'))->privilege->product))

        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Completion Time</h3>
                </div>
                <div class="panel-body">
                    <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 tbl_ori">
                        <div class="special-list-group">
                            <h4>Summery Report</h4>
                            <hr>
                            <div class="col-md-12 col-lg-12">
                                <table class="table responsiv-table table-striped">
                                    <thead>
                                    <tr>
                                        <td rowspan="2" class="text-center">Total No. Of P.O.'s</td>
                                        <td colspan="6" class="text-center">Status Change (Avarage - Hours/ Days)
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">Pending</td>
                                        <td class="text-center">Processing</td>
                                        <td class="text-center">Credit Hold</td>
                                        <td class="text-center">Partial Complete</td>
                                        <td class="text-center">Complete</td>
                                        <td class="text-center">Total Time</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div>
                            <h4>Detailed Report</h4>
                            <hr>
                            <div class="col-md-12 col-lg-12">
                                {{--{{json_encode($timeDiff)}}--}}

                                <table class="table responsiv-table table-striped">
                                    <thead>
                                    <tr>
                                        <td rowspan="2" class="text-center">P.O. No.</td>
                                        <td rowspan="2" class="text-center">P.O. Date</td>
                                        <td rowspan="2" class="text-center">Customer Name</td>
                                        <td rowspan="2" class="text-center">Branch Department</td>
                                        <td rowspan="2" class="text-center">Account Manager</td>
                                        <td colspan="6" class="text-center">Status Change (Avarage - Hours/ Days)
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">Pending</td>
                                        <td class="text-center">Processing</td>
                                        <td class="text-center">Credit Hold</td>
                                        <td class="text-center">Partial Complete</td>
                                        <td class="text-center">Complete</td>
                                        <td class="text-center">Total Time</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($pos as $po)
                                        <tr>
                                            <td>{{$po->po_id}}</td>
                                            <td>{{\App\P_Order::find($po->po_id)->created_at->format('Y-m-d')}}</td>
                                            <td>{{\App\ClientsBranch::find(\App\P_Order::find($po->po_id)->clients_branch_id)->client->name}}</td>
                                            <td>{{\App\ClientsBranch::find(\App\P_Order::find($po->po_id)->clients_branch_id)->name}}</td>
                                            <td>{{\App\User::find(\App\P_Order::find($po->po_id)->agent_id)->name}}</td>

                                            <td>
                                                @if(!empty(\App\PorderHistory::where([['po_id',$po->po_id],['status','P']])->first()))
                                                    Days
                                                    : {{ round((\Carbon\Carbon::parse(\App\PorderHistory::where([['po_id',$po->po_id],['status','P']])->first()->po_datetime)->diffInHours(\Carbon\Carbon::parse(\App\PorderHistory::where([['po_id',$po->po_id],['status','P']])->first()->created_at)))/24, 2) }}
                                                    <br>
                                                    Hours
                                                    : {{ \Carbon\Carbon::parse(\App\PorderHistory::where([['po_id',$po->po_id],['status','P']])->first()->po_datetime)->diffInHours(\Carbon\Carbon::parse(\App\PorderHistory::where([['po_id',$po->po_id],['status','P']])->first()->created_at)) }}
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td>
                                                @if(!empty(\App\PorderHistory::where([['po_id',$po->po_id],['status','OP']])->first()))
                                                    Days
                                                    : {{ round((\Carbon\Carbon::parse(\App\PorderHistory::where([['po_id',$po->po_id],['status','OP']])->first()->po_datetime)->diffInHours(\Carbon\Carbon::parse(\App\PorderHistory::where([['po_id',$po->po_id],['status','OP']])->first()->created_at)))/24, 2) }}
                                                    <br>
                                                    Hours
                                                    : {{ \Carbon\Carbon::parse(\App\PorderHistory::where([['po_id',$po->po_id],['status','OP']])->first()->po_datetime)->diffInHours(\Carbon\Carbon::parse(\App\PorderHistory::where([['po_id',$po->po_id],['status','OP']])->first()->created_at)) }}
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td>
                                                @if(!empty(\App\PorderHistory::where([['po_id',$po->po_id],['status','CH']])->first()))
                                                    Days
                                                    : {{ round((\Carbon\Carbon::parse(\App\PorderHistory::where([['po_id',$po->po_id],['status','CH']])->first()->po_datetime)->diffInHours(\Carbon\Carbon::parse(\App\PorderHistory::where([['po_id',$po->po_id],['status','CH']])->first()->created_at)))/24, 2) }}
                                                    <br>
                                                    Hours
                                                    : {{ \Carbon\Carbon::parse(\App\PorderHistory::where([['po_id',$po->po_id],['status','CH']])->first()->po_datetime)->diffInHours(\Carbon\Carbon::parse(\App\PorderHistory::where([['po_id',$po->po_id],['status','CH']])->first()->created_at)) }}
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td>
                                                @if(!empty(\App\PorderHistory::where([['po_id',$po->po_id],['status','PC']])->first()))
                                                    Days
                                                    : {{ round((\Carbon\Carbon::parse(\App\PorderHistory::where([['po_id',$po->po_id],['status','PC']])->first()->po_datetime)->diffInHours(\Carbon\Carbon::parse(\App\PorderHistory::where([['po_id',$po->po_id],['status','PC']])->first()->created_at)))/24, 2) }}
                                                    <br>
                                                    Hours
                                                    : {{ \Carbon\Carbon::parse(\App\PorderHistory::where([['po_id',$po->po_id],['status','PC']])->first()->po_datetime)->diffInHours(\Carbon\Carbon::parse(\App\PorderHistory::where([['po_id',$po->po_id],['status','PC']])->first()->created_at)) }}
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td>
                                                @if(!empty(\App\PorderHistory::where([['po_id',$po->po_id],['status','C']])->first()))
                                                    Days
                                                    : {{ round((\Carbon\Carbon::parse(\App\PorderHistory::where([['po_id',$po->po_id],['status','C']])->first()->po_datetime)->diffInHours(\Carbon\Carbon::parse(\App\PorderHistory::where([['po_id',$po->po_id],['status','C']])->first()->created_at)))/24, 2) }}
                                                    <br>
                                                    Hours
                                                    : {{ \Carbon\Carbon::parse(\App\PorderHistory::where([['po_id',$po->po_id],['status','C']])->first()->po_datetime)->diffInHours(\Carbon\Carbon::parse(\App\PorderHistory::where([['po_id',$po->po_id],['status','C']])->first()->created_at)) }}
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td>
                                                <?php
                                                $total = 0;
                                                ?>
                                                @if(!empty(\App\PorderHistory::where([['po_id',$po->po_id],['status','P']])->first()))
                                                    <?php
                                                    $total += \Carbon\Carbon::parse(\App\PorderHistory::where([['po_id',$po->po_id],['status','P']])->first()->po_datetime)->diffInHours(\Carbon\Carbon::parse(\App\PorderHistory::where([['po_id',$po->po_id],['status','P']])->first()->created_at));
                                                    ?>
                                                @endif
                                                @if(!empty(\App\PorderHistory::where([['po_id',$po->po_id],['status','OP']])->first()))
                                                    <?php
                                                        $total += \Carbon\Carbon::parse(\App\PorderHistory::where([['po_id',$po->po_id],['status','OP']])->first()->po_datetime)->diffInHours(\Carbon\Carbon::parse(\App\PorderHistory::where([['po_id',$po->po_id],['status','OP']])->first()->created_at));
                                                    ?>
                                                @endif
                                                @if(!empty(\App\PorderHistory::where([['po_id',$po->po_id],['status','CH']])->first()))
                                                    <?php
                                                        $total += \Carbon\Carbon::parse(\App\PorderHistory::where([['po_id',$po->po_id],['status','CH']])->first()->po_datetime)->diffInHours(\Carbon\Carbon::parse(\App\PorderHistory::where([['po_id',$po->po_id],['status','CH']])->first()->created_at));
                                                    ?>
                                                @endif
                                                @if(!empty(\App\PorderHistory::where([['po_id',$po->po_id],['status','PC']])->first()))
                                                    <?php
                                                        $total += \Carbon\Carbon::parse(\App\PorderHistory::where([['po_id',$po->po_id],['status','PC']])->first()->po_datetime)->diffInHours(\Carbon\Carbon::parse(\App\PorderHistory::where([['po_id',$po->po_id],['status','PC']])->first()->created_at));
                                                    ?>
                                                @endif
                                                @if(!empty(\App\PorderHistory::where([['po_id',$po->po_id],['status','C']])->first()))
                                                    <?php
                                                        $total += \Carbon\Carbon::parse(\App\PorderHistory::where([['po_id',$po->po_id],['status','C']])->first()->po_datetime)->diffInHours(\Carbon\Carbon::parse(\App\PorderHistory::where([['po_id',$po->po_id],['status','C']])->first()->created_at));
                                                    ?>
                                                @endif
                                                    Days : {{ round($total/24,2) }}<br>
                                                    Hours : {{ $total }}
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
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
        $("#products").validate({
            rules: {
                part_no: "required",
                name: "required",
                brand_id: "required",
                category_id: "required",
                description: "required",
                default_price: "required"
            }
        });
        $("#brand_id").on('change', function () {
            $.ajax(
                {
                    type: 'get',
                    url: '/admin/manage-product-list/category/' + this.value,
                    success: function (response) {
                        var model = $('#category_id');
                        model.empty();
                        model.append("<option selected>Select Category</option>")
                        $.each(response, function (index, elem) {
                            if (elem.status == 1) {
                                model.append("<option value='" + elem.id + "'>" + elem.title + "</option>")
                            }
                        });
                    }
                }
            );
        });
    </script>
@stop