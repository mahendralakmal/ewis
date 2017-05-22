@extends('admin.layouts.dashboard')
@section('page_heading','View All / Update Status of Purchase Orders')
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
                            <td><h5>Attachment</h5></td>
                            @if(\App\User::find(Session::get('User'))->privilege->change_po_status)
                                <td><h5>Status</h5></td>
                            @endif
                            <td class="col-md-3"></td>
                        </tr>
                        </thead>
                        <tbody class="tablePO">
                        @if(Session::get('User') == 1)
                            @foreach($porders as $porder)
                                <tr>
                                    <td>{{$porder->id}}</td>
                                    <td>{{$porder->created_at}}</td>
                                    <td>{{$porder->client_branch->client->name}}</td>
                                    <td>{{$porder->del_branch}}</td>
                                    @if($porder->file !== null){
                                    <td><a href="{{url('/'.$porder->file)}}">Download Attachment</a></td>
                                    @else
                                        <td>No Attachment</td>
                                    @endif
                                    @if(\App\User::find(Session::get('User'))->privilege->change_po_status)
                                        <td>
                                            <form method="get" id="{{$porder->id}}" action="">
                                                <input type="hidden" id="id" name="id" value="{{$porder->id}}">
                                                <select id="{{$porder->id}}" name="postatus"
                                                        class="form-control postatus">
                                                    @if($porder->status === "P")
                                                        <option value="P" @if($porder->status === "P") selected @endif>
                                                            Pending
                                                        </option>
                                                        <option value="OP"
                                                                @if($porder->status === "OP") selected @endif>
                                                            Processing
                                                        </option>
                                                        <option value="PC"
                                                                @if($porder->status === "PC") selected @endif>
                                                            Partial
                                                            Completed
                                                        </option>
                                                        <option value="C" @if($porder->status === "C") selected @endif>
                                                            Completed
                                                        </option>
                                                    @elseif($porder->status === "OP")
                                                        <option value="OP"
                                                                @if($porder->status === "OP") selected @endif>
                                                            Processing
                                                        </option>
                                                        <option value="PC"
                                                                @if($porder->status === "PC") selected @endif>
                                                            Partial
                                                            Completed
                                                        </option>
                                                        <option value="C" @if($porder->status === "C") selected @endif>
                                                            Completed
                                                        </option>
                                                    @elseif($porder->status === "PC")
                                                        <option value="PC"
                                                                @if($porder->status === "PC") selected @endif>
                                                            Partial
                                                            Completed
                                                        </option>
                                                        <option value="C" @if($porder->status === "C") selected @endif>
                                                            Completed
                                                        </option>
                                                    @elseif($porder->status === "C")
                                                        <option value="C" @if($porder->status === "C") selected @endif>
                                                            Completed
                                                        </option>
                                                    @endif
                                                </select>
                                            </form>
                                        </td>
                                    @endif
                                    <td>
                                        <a href="{{ url('/admin/manage-clients/po-details/'.$porder->id) }}"
                                           class="btn btn-success btn-outline">Update Status / View Order</a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            @foreach($porders as $user)
                                @foreach(App\User::where('section_head_id',$user->id)->get() as $cbranch)
                                    @foreach(App\ClientsBranch::where('agent_id',$cbranch->id)->get() as $tbranch)
                                        @foreach(App\P_Order::where('clients_branch_id',$tbranch->id)->get() as $porder)
                                            <tr>
                                                <td>{{$porder->id}}</td>
                                                <td>{{$porder->created_at}}</td>
                                                <td>{{$porder->client_branch->client->name}}</td>
                                                <td>{{$porder->del_branch}}</td>
                                                @if($porder->file !== null){
                                                <td><a href="{{url('/'.$porder->file)}}">Download Attachment</a></td>
                                                @else
                                                    <td>No Attachment</td>
                                                @endif
                                                @if(\App\User::find(Session::get('User'))->privilege->change_po_status)
                                                    <td>
                                                        <form method="get" id="{{$porder->id}}" action="">
                                                            <input type="hidden" id="id" name="id" value="{{$porder->id}}">
                                                            <select id="{{$porder->id}}" name="postatus"
                                                                    class="form-control postatus">
                                                                @if($porder->status === "P")
                                                                    <option value="P" @if($porder->status === "P") selected @endif>
                                                                        Pending
                                                                    </option>
                                                                    <option value="OP"
                                                                            @if($porder->status === "OP") selected @endif>
                                                                        Processing
                                                                    </option>
                                                                    <option value="PC"
                                                                            @if($porder->status === "PC") selected @endif>
                                                                        Partial
                                                                        Completed
                                                                    </option>
                                                                    <option value="C" @if($porder->status === "C") selected @endif>
                                                                        Completed
                                                                    </option>
                                                                @elseif($porder->status === "OP")
                                                                    <option value="OP"
                                                                            @if($porder->status === "OP") selected @endif>
                                                                        Processing
                                                                    </option>
                                                                    <option value="PC"
                                                                            @if($porder->status === "PC") selected @endif>
                                                                        Partial
                                                                        Completed
                                                                    </option>
                                                                    <option value="C" @if($porder->status === "C") selected @endif>
                                                                        Completed
                                                                    </option>
                                                                @elseif($porder->status === "PC")
                                                                    <option value="PC"
                                                                            @if($porder->status === "PC") selected @endif>
                                                                        Partial
                                                                        Completed
                                                                    </option>
                                                                    <option value="C" @if($porder->status === "C") selected @endif>
                                                                        Completed
                                                                    </option>
                                                                @elseif($porder->status === "C")
                                                                    <option value="C" @if($porder->status === "C") selected @endif>
                                                                        Completed
                                                                    </option>
                                                                @endif
                                                            </select>
                                                        </form>
                                                    </td>
                                                @endif
                                                <td>
                                                    <a href="{{ url('/admin/manage-clients/po-details/'.$porder->id) }}"
                                                       class="btn btn-success btn-outline">Update Status / View Order</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endforeach
                                    @foreach(App\User::where('section_head_id',$cbranch->id)->get() as $sbranch)
                                        @foreach(App\ClientsBranch::where('agent_id',$sbranch->id)->get() as $tbranch)
                                            @foreach(App\P_Order::where('clients_branch_id',$tbranch->id)->get() as $porder)
                                                <tr>
                                                    <td>{{$porder->id}}</td>
                                                    <td>{{$porder->created_at}}</td>
                                                    <td>{{$porder->client_branch->client->name}}</td>
                                                    <td>{{$porder->del_branch}}</td>
                                                    @if($porder->file !== null){
                                                    <td><a href="{{url('/'.$porder->file)}}">Download Attachment</a></td>
                                                    @else
                                                        <td>No Attachment</td>
                                                    @endif
                                                    @if(\App\User::find(Session::get('User'))->privilege->change_po_status)
                                                        <td>
                                                            <form method="get" id="{{$porder->id}}" action="">
                                                                <input type="hidden" id="id" name="id" value="{{$porder->id}}">
                                                                <select id="{{$porder->id}}" name="postatus"
                                                                        class="form-control postatus">
                                                                    @if($porder->status === "P")
                                                                        <option value="P" @if($porder->status === "P") selected @endif>
                                                                            Pending
                                                                        </option>
                                                                        <option value="OP"
                                                                                @if($porder->status === "OP") selected @endif>
                                                                            Processing
                                                                        </option>
                                                                        <option value="PC"
                                                                                @if($porder->status === "PC") selected @endif>
                                                                            Partial
                                                                            Completed
                                                                        </option>
                                                                        <option value="C" @if($porder->status === "C") selected @endif>
                                                                            Completed
                                                                        </option>
                                                                    @elseif($porder->status === "OP")
                                                                        <option value="OP"
                                                                                @if($porder->status === "OP") selected @endif>
                                                                            Processing
                                                                        </option>
                                                                        <option value="PC"
                                                                                @if($porder->status === "PC") selected @endif>
                                                                            Partial
                                                                            Completed
                                                                        </option>
                                                                        <option value="C" @if($porder->status === "C") selected @endif>
                                                                            Completed
                                                                        </option>
                                                                    @elseif($porder->status === "PC")
                                                                        <option value="PC"
                                                                                @if($porder->status === "PC") selected @endif>
                                                                            Partial
                                                                            Completed
                                                                        </option>
                                                                        <option value="C" @if($porder->status === "C") selected @endif>
                                                                            Completed
                                                                        </option>
                                                                    @elseif($porder->status === "C")
                                                                        <option value="C" @if($porder->status === "C") selected @endif>
                                                                            Completed
                                                                        </option>
                                                                    @endif
                                                                </select>
                                                            </form>
                                                        </td>
                                                    @endif
                                                    <td>
                                                        <a href="{{ url('/admin/manage-clients/po-details/'.$porder->id) }}"
                                                           class="btn btn-success btn-outline">Update Status / View Order</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endforeach
                                    @endforeach
                                @endforeach
                            @endforeach
                        @endif
                        </tbody>
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
        $(".postatus").on('change', function () {
            var poid = this.id;
            $.ajax({
                type: 'get',
                url: '/admin/manage-clients/po-details/change_status/' + poid + '/' + this.value,
                success: function (response) {
                }
            });
        });

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
                        url: '/admin/manage-clients/purchase-orders/' + from + '/' + to + '/a',
                        success: function (response) {
                            console.log(response);
                            var model = $('.tablePO');
                            model.empty();
                            $.each(response, function (index, elem) {
                                model.append("<tr><td>" + elem.id +
                                        "</td><td>" + elem.created_at +
                                        "</td><td>" + elem.name +
                                        "</td><td>" + elem.del_branch +
                                        "</td><td><form method='get' id='" + elem.id + "' action=''>" +

                                        "<input type='hidden' id='id' name='id' value='" + elem.id + "'>" +
                                        "<select id='" + elem.id + "' name='postatus' class='form-control postatus'>" +
                                        {{--"<option value='P' @if($porder->status === 'P') selected @endif>Pending </option>" +--}}
                                                {{--"<option value='OP' @if($porder->status === 'OP') selected @endif>Processing </option>" +--}}
                                                {{--"<option value='OP' @if($porder->status === 'PC') selected @endif>Partial Completed </option>" +--}}
                                                {{--"<option value='C' @if($porder->status === 'C') selected @endif>Completed </option>" +--}}
                                                "</select>" +
                                        "</form></td><td><a target='_blank' href='/admin/manage-clients/po-details/" + elem.id + "' class='btn btn-success btn-outline'>Update Status / View Order</a></td></tr>");
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