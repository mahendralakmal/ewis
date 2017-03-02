@extends('admin.layouts.dashboard')
@section('page_heading','Purchase Order Details')
@section('section')
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Users</h3>
            </div>
            {{--{{ $porder[0]['bucket'] }}--}}
            <div class="panel-body">
                <table class="table">
                    <thead>
                    <tr>
                        <td><h5>Part Number</h5></td>
                        <td><h5>Part Name</h5></td>
                        <td><h5>Quantity</h5></td>
                        <td><h5>Price</h5></td>
                        <td><h5>Total</h5></td>
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
                            <td>{{ $item['price'] }}</td>

                            {{--<td>{{$order->id}}</td>--}}
                            {{--<td>{{$order->created_at}}</td>--}}
                            {{--<td>{{\App\Client::find($porder->client_id)->name}}</td>--}}
                            {{--<td>{{$porder->del_branch}}</td>--}}
                            {{--<td>@if($porder->status === "P") Pending--}}
                                {{--@elseif($porder->status === "cp") Partial Completed--}}
                                {{--@elseif($porder->status === "c") Completed--}}
                                {{--@endif--}}
                            {{--</td>--}}
                            {{--<td><a href="{{ url('/admin/manage-clients/po-details') }}" class="btn btn-success">View Order</a></td>--}}


                    @endforeach
                            <td> {{ $order->bucket->totalPrice }}</td>
                        </tr>
                </table>
            </div>
        </div>
    </div>
@stop
