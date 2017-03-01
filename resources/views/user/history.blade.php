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
                            @foreach($orders as $order)
                                @foreach($order->bucket->items as $item)
                                    <div class="col-lg-6 col-sm-6 col-xs-6 col-md-6 col-md-offset-3 col-lg-offset-3">
                                        <table class="table-bordered col-sm-10 col-lg-10 col-md-10">
                                            <tr>
                                                <td><strong>Product Number</strong></td>
                                                <td><strong>Product Name</strong></td>
                                                <td><strong>Quantity</strong></td>
                                                <td><strong>Price</strong></td>
                                                <td><strong>Total Price</strong></td>
                                            </tr>
                                            <hr>
                                                <tr>
                                                    <td><center>{{ $item['item'] ['part_no'] }}</center></td>
                                                    <td><center>{{ $item['item'] ['name'] }}</center></td>
                                                    <td><center>{{ $item['qty'] }}</center></td>
                                                    <td><center>{{ $item['price'] }}</center></td>
                                                    <td> {{ $order->bucket->totalPrice }}</td>
                                                </tr>
                                            <tr>

                                            </tr>
                                        </table>
                                    </div>
                                @endforeach
                                @endforeach
                        </ul>
                        </div>
                    </div>
                </div>
            </div>
@stop