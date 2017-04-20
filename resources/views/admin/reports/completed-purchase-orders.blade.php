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

                    <div class="row">
                        <div class="col-md-2 col-sm-3 col-lg-2">
                            <div class="form-group">
                                <select class="form-control" name="client" id="client" data-parsley-required="true">
                                    <option value="n">Select Client</optionvalue>
                                    @foreach ($client as $client)
                                        <option value="{{ $client->id }}">{{ $client->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-4 col-lg-3" id="sandbox-container">
                            <div class="input-daterange input-group" id="datepicker">
                                <input type="text" class="form-control" name="start" id="start" />
                                <span class="input-group-addon">to</span>
                                <input type="text" class="form-control" name="end" id="end" />
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-3 col-lg-2">
                            <div class="form-group">
                                <select id="postatus" name="postatus" class="form-control">
                                    <option value="n">Select Status</option>
                                    <option value="P">Pending</option>
                                    <option value="PC">Partial Completed</option>
                                    <option value="C">Completed</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <table class="table table-condensed">
                        <thead>
                        <tr>
                            <td><h5>Po. No.</h5></td>
                            <td class="col-md-3"><h5>Name</h5></td>
                            <td><h5>Created Date & Time</h5></td>
                            <td><h5>Completed Date & Time</h5></td>
                            <td><h5>Client User</h5></td>
                            <td><h5>Branch</h5></td>
                            <td><h5>Contact Number</h5></td>
                        </tr>
                        </thead>
                        <tbody class="tbody-completed">
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
        //Purchase orders
        function purchase_orders(param1, param2, param3, param4) {
            $.ajax(
                    {
                        type: 'get',
                        url: '/admin/reports/completed-purchase-orders/' + param1 + '/' + param2 + '/' + param3 + '/' + param4,
                        success: function (response) {
                            console.log(response);
                            var model = $('.tbody-completed');
                            model.empty();
                            $.each(response, function (index, elem) {
                                model.append("<tr>");
                                model.append("<td>" + elem.id + "</td>");
                                model.append("<td>" + elem.name + "</td>");
                                model.append("<td>" + elem.created_at + "</td>");
                                model.append("<td>" + elem.updated_at + "</td>");
                                model.append("<td>" + elem.del_cp + "</td>");
                                model.append("<td>" + elem.del_branch + "</td>");
                                model.append("<td>" + elem.del_tp + "</td>");
                                model.append("</tr>");
                            });
                        },
                        error:function (response) {
                            console.log(response);
                        }
                    }
            );
        }

        $("#client").on('change', function () {
            purchase_orders(this.value, $('#postatus').val(), ($('#start').val()!='')?$('#start').val():'n', ($('#end').val()!='')?$('#end').val():'n');
        });

        $("#postatus").on('change', function () {
            purchase_orders($('#client').val(), this.value, ($('#start').val()!='')?$('#start').val():'n', ($('#end').val()!='')?$('#end').val():'n');
        });

        $("#start").on('change', function () {
            purchase_orders($('#client').val(), $('#postatus').val(), this.value, ($('#end').val()!='')?$('#end').val():'n');
        });

        $("#end").on('change', function () {
            purchase_orders($('#client').val(), $('#postatus').val(), ($('#start').val()!='')?$('#start').val():'n', this.value);
        });
    </script>
@stop