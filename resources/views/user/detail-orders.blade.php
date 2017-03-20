@extends('theme')

@section('content')
            <!-- Nav tabs -->
            <div class="col-md-12 col-sm-12 col-sx-12 col-lg-12">
                <ul class="nav nav-tabs nav-menu" role="tablist">
                    <li class="active">
                        <a href="#agent" role="tab" data-toggle="tab">
                            <i class="fa fa-male"></i>Purchase History</a>
                    </li>

                </ul>

                <!-- Tab panes -->
                <div class="tab-content white-background">
                    <div class="tab-pane fade active in" id="agent">
                        <ul class="container col-md-12 col-sm-12 col-sx-12 col-lg-12">
                            <div class="panel-body">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <td><h5>Part Number</h5></td>
                                        <td><h5>Part Name</h5></td>
                                        <td><h5>Quantity</h5></td>
                                        <td><h5>Price</h5></td>
                                        {{--<td></td>--}}
                                        {{--<td><h5>NIC/ Passport</h5></td>--}}
                                        <td class="col-md-3"></td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($order->bucket->items as $item)
                                        <tr>
                                            <td>{{ $item['item'] ['part_no'] }}</td>
                                            <td>{{ $item['item'] ['name'] }}</td>
                                            <td>{{ $item['qty'] }}</td>
                                            {{--<td>{{ $item['price'] }}</td>--}}
                                            <td>{{ number_format($item['price'],2) }}</td>
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <td><h5>Total</h5></td>
                                            <td></td>
                                            <td></td>
                                            <td style="border-bottom: double #333"><h5>{{ number_format($order->bucket->totalPrice,2) }}</h5></td>
                                        </tr>
                                </table>
                            </div>




                        </ul>
                        </div>
                    </div>
                </div>
            </div>
@stop