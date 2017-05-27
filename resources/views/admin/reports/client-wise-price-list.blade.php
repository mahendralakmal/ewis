@extends('admin.layouts.dashboard')
@section('page_heading','Price List by Client')
@section('section')
    @if((\Illuminate\Support\Facades\Session::has('User'))
    && (\App\User::find(\Illuminate\Support\Facades\Session::get('User'))->privilege != null)
    && (\App\User::find(\Illuminate\Support\Facades\Session::get('User'))->privilege->view_po))

        <br>

        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Total Sales</h3>
                </div>
                <div class="panel-body">

                    <div class="row">
                        <div class="col-md-2 col-sm-3 col-lg-2">
                            <div class="form-group">
                                <select class="form-control" name="client" id="client" data-parsley-required="true">
                                    <option value="n">Select Client</option>
                                    @foreach ($client as $client)
                                        <option value="{{ $client->id }}">{{ $client->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-2 col-sm-3 col-lg-2">
                            <div class="form-group">
                                <select class="form-control" name="branch" id="branch" data-parsley-required="true">
                                    <option value="n">Select Branch</option>
                                    {{--@foreach ($client as $client)--}}
                                        {{--<option value="{{ $client->id }}">{{ $client->name }}</option>--}}
                                    {{--@endforeach--}}
                                </select>
                            </div>
                        </div>

                        <div class="col-md-2 col-sm-3 col-lg-2">
                            <div class="form-group">
                                {{--<select class="form-control" name="brand" id="brand" data-parsley-required="true">--}}
                                    {{--<option value="n">Select Client</option>--}}
                                    {{--@foreach ($brands as $brand)--}}
                                        {{--<option value="{{ $client->id }}">{{ $client->name }}</option>--}}
                                    {{--@endforeach--}}
                                {{--</select>--}}
                            </div>
                        </div>
                    </div>
                    <table class="table table-condensed">
                        <thead>
                        <tr>
                            {{--<td><h5>Po. No.</h5></td>--}}
                            <td class="col-md-3"><h5>Brand</h5></td>
                            <td><h5>Category</h5></td>
                            <td><h5>Product</h5></td>
                            <td><h5>Price</h5></td>
                            {{--<td><h5>Branch</h5></td>--}}
                            {{--<td><h5>Contact Number</h5></td>--}}
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
        $("#client").on('change', function () {
            $.ajax(
                {
                    type: 'get',
                    url: '/admin/manage-clients/client_branch/' + $(this).val(),
                    success: function (response) {
                        console.log(response);
                        var model = $('#branch');
                        model.empty();
                        model.append("<option selected>Select Branch</option>")
                        $.each(response, function (index, elem) {
                            model.append("<option value='" + elem.id + "'>" + elem.name + "</option>")
                        });
                    }
                }
            );
        });

        function getBrand(param, index) {
            $.ajax({
                type: 'get',
                url: '/admin/reports/get-brands/' + param,
                success: function (response) {
                    var model = $('#' + index);
                    model.empty();
                    model.append(response);
                }
            })
        }

        function getCategory(param, index) {
            $.ajax({
                type: 'get',
                url: '/admin/reports/get-category/' + param,
                success: function (response) {
                    var model = $('#' + index);
                    model.empty();
                    model.append(response);
                }
            })
        }

        function getProduct(param, index) {
            $.ajax({
                type: 'get',
                url: '/admin/reports/get-product/' + param,
                success: function (response) {
                    var model = $('#' + index);
                    model.empty();
                    model.append(response);
                }
            })
        }

        $("#start").on('change', function () {
            populate_price_list($('#client').val(), this.value, ($('#end').val() != '') ? $('#end').val() : 'n');
        });

        $("#end").on('change', function () {
            populate_price_list($('#client').val(), ($('#start').val() != '') ? $('#start').val() : 'n', this.value);
        });

        function populate_price_list(param1, param2, param3) {
//            alert(param1 + " | " + param2 + " | " + param3);
            $.ajax(
                    {
                        type: 'get',
                        url: '/admin/reports/client-wise-price-list/' + param1 + '/' + param2 + '/' + param3,
                        success: function (response) {
                            console.log(response);
                            var model = $('.tbody-completed');
                            model.empty();
                            $.each(response, function (index, elem) {
                                model.append("<tr>");
                                model.append("<td id=" + 'b_' + index + ">" + getBrand(elem.brand_id, 'b_' + index) + "</td>");
                                model.append("<td id=" + 'c_' + index + ">" + getCategory(elem.c_category_id, 'c_' + index) + "</td>");
                                model.append("<td id=" + 'p_' + index + ">" + getProduct(elem.product_id, 'p_' + index) + "</td>");
                                model.append("<td>" + elem.special_price + "</td>");
                                model.append("</tr>");
                            });
                        },
                        error: function (response) {
                            console.log(response);
                        }
                    }
            );
        }

        $("#client").on('change', function () {
            populate_price_list(this.value, ($('#start').val() != '') ? $('#start').val() : 'n', ($('#end').val() != '') ? $('#end').val() : 'n');
        });

    </script>
@stop