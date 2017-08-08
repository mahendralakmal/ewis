@extends('admin.layouts.dashboard')
@section('page_heading','Purchase Order Details')
@section('section')
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                    <div class="panel-title col-md-3">Order No :- {{$order->id}}</div>
                    <div class="panel-title col-md-9 text-right">{{ \App\User::find(\App\ClientsBranch::find($order->clients_branch_id)->agent_id)->name }}</div>
                </div>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <br>
                        <strong>Bill To</strong>
                        @if($order->cp_name !== null || $order->cp_name !=='')<p>{{$order->cp_name}}</p>@endif
                        @if($order->cp_branch !== null || $order->cp_branch !=='')<p>{{$order->cp_branch}}</p>@endif
                        <p>@if($order->cp_address !== null || $order->cp_address !=='') {{$order->cp_address}} @else {{ App\ClientsBranch::find($order->clients_branch_id)->address }} @endif</p>
                        <p>tel: {{$order->cp_telephone}}</p>
{{--                        <p>tel: @if($order->cp_telephone !== null || $order->cp_telephone !==''){{$order->cp_telephone}} @else {{ App\ClientsBranch::find($order->clients_branch_id)->contact_no }}@endif</p>--}}
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <br>
                        <strong>Deliver To</strong>
                        @if($order->del_cp !== null || $order->del_cp !=='')<p>{{$order->del_cp}}</p>@endif
                        @if($order->del_branch !== null || $order->del_branch !=='')<p>{{$order->del_branch}}</p>@endif
                        @if($order->del_address !== null || $order->del_address !=='')<p>{{$order->del_address}}</p>@endif
                        <p>{{ $order->del_tp }}</p>
                        <br>
                    </div>
                </div>
                <table class="table">
                    <thead>
                    <tr>
                        <td><strong>Part Number</strong></td>
                        <td class="col-lg-7 text-center"><strong>Product Name</strong></td>
                        <td><strong>Quantity</strong></td>
                        <td><strong>Unit Price</strong></td>
                        <td><strong>VAT</strong></td>
                        <td class="text-center"><strong>Total Price (Rs.)</strong></td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($order->bucket->items as $item)
                        <tr>
                            <td class="text-center">{{ $item['item'] ['part_no'] }}</td>
                            <td class="text-center">{{ $item['item'] ['name'] }}</td>
                            <td class="text-center">{{ $item['qty'] }}</td>{{----}}
                            <td style="text-align: right">{{number_format((\App\Client_Product::where([['product_id', $item['item'] ['id']],['clients_branch_id', $branch->id ]])->first()->special_price),'2','.',',')}}</td>
                            {{--                            <td>{{$branch->id}}</td>--}}
                            <td class="text-center">@if($item['item'] ['vat_apply'])15% @else 0% @endif</td>
                            <td style="text-align: right">{{ number_format($item['price'],2) }}</td>
                            @endforeach
                        </tr>
                        <tr>
                            <td colspan="5"><h5>Grand Total</h5></td>
                            <td style="border-bottom: double #333; text-align: right">
                                <h5>{{ number_format($order->bucket->totalPrice,2) }}</h5></td>
                        </tr>
                </table>
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

        </div>
    </div>
@stop
