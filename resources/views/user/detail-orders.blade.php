@extends('theme')

@section('content')
            <!-- Nav tabs -->
            <div class="col-md-12 col-sm-12 col-sx-12 col-lg-12">
                <ul class="nav nav-tabs nav-menu" role="tablist">
                    <li class="active">
                        <a href="#agent" role="tab" data-toggle="tab"> Purchase History </a>
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
                                        <td><strong>Part Number</strong></td>
                                        <td style="text-align: center"><strong>Product Name</strong></td>
                                        <td><strong>Quantity</strong></td>
                                        <td><strong>Unit Price</strong></td>
                                        <td><strong>VAT</strong></td>
                                        <td><strong>Total Price (Rs.)</strong></td>
                                        <td class="col-md-3"></td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($order->bucket->items as $item)
                                        <tr>
                                            <td style="text-align: center">{{ $item['item'] ['part_no'] }}</td>
                                            <td style="text-align: center">{{ $item['item'] ['name'] }}</td>
                                            <td style="text-align: center">{{ $item['qty'] }}</td>
                                            <td style="text-align: right">{{number_format((\App\Client_Product::where([['product_id', $item['item'] ['id']],['clients_branch_id', $branch->id ]])->first()->special_price),'2','.',',')}}</td>
                                            <td style="text-align: center">@if($item['item'] ['vat_apply'])15% @else 0% @endif</td>
                                            <td style="text-align: right">{{ number_format($item['price'],2) }}</td>
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <td colspan="5"><h5>Grand Total</h5></td>
                                            <td style="border-bottom: double #333; text-align: right"><h5>{{ number_format($order->bucket->totalPrice,2) }}</h5></td>
                                        </tr>
                                </table>
                            </div>




                        </ul>
                        </div>
                    </div>
                </div>
            </div>
@stop