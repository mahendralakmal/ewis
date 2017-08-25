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
                        <div class="row">
                            <div class="col-md-3"><strong>Order No :- {{$order->id}}</strong></div>
                            {{--<div class="col-md-6 text-right">--}}
                            {{--<strong>{{ \App\User::find(\App\ClientsBranch::find($order->clients_branch_id)->agent_id)->name }}</strong>--}}
                            {{--</div>--}}
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <br>
                                <strong>Bill To</strong>
                                @if($order->cp_name !== null || $order->cp_name !=='')<p>{{$order->cp_name}}</p>@endif
                                @if($order->cp_branch !== null || $order->cp_branch !=='')
                                    <p>{{$order->cp_branch}}</p>@endif
                                <p>@if($order->cp_address !== null || $order->cp_address !=='') {{$order->cp_address}} @else {{ App\ClientsBranch::find($order->clients_branch_id)->address }} @endif</p>
                                <p>@if($order->cp_telephone !== null || $order->cp_telephone !==''){{$order->cp_telephone}} @else {{ App\ClientsBranch::find($order->clients_branch_id)->contact_no }}@endif</p>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <br>
                                <strong>Deliver To</strong>
                                @if($order->del_cp !== null || $order->del_cp !=='')<p>{{$order->del_cp}}</p>@endif
                                @if($order->del_branch !== null || $order->del_branch !=='')
                                    <p>{{$order->del_branch}}</p>@endif
                                @if($order->del_address !== null || $order->del_address !=='')
                                    <p>{{$order->del_address}}</p>@endif
                                <p>{{ $order->del_tp }}</p>
                                <br>
                            </div>
                        </div>
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
                                    <td class="text-center">{{ number_format($item['unit_price'],'2','.',',') }}</td>
                                    <td style="text-align: center">@if($item['item'] ['vat_apply'])15% @else
                                            0% @endif</td>
                                    <td style="text-align: right">{{ number_format($item['price'],2) }}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="5"><h5><strong>Grand Total</strong></h5></td>
                                <td style="border-bottom: double #333; text-align: right">
                                    <h5>{{ number_format($order->bucket->totalPrice,2) }}</h5></td>
                            </tr>
                        </table>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
                                <p><strong>Account Manager</strong></p>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
                                <p>{{ \App\User::find(\App\ClientsBranch::find($order->clients_branch_id)->agent_id)->name }}</p>
                            </div>
                        </div>
                        @if($order->file !== null)
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2"><strong>Attachment</strong></div>
                                <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
                                    <a href="{{url('/'.$order->file)}}">Download Attachment</a>
                                </div>
                            </div>
                        @endif
                        @if($order->del_notes !== null && $order->del_notes !== '')
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2"><strong>Special Notes</strong></div>
                                <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
                                    {{ $order->del_notes }}
                                </div>
                            </div>
                        @endif
                    </div>
                </ul>
            </div>
        </div>
    </div>
    </div>
@stop