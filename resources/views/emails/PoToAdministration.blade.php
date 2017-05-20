<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

</head>

<body style="width: 894px">
<center><h2>Purchase Order</h2></center>
<table width="100%" border="0">
    <tr>
        {{--<td>--}}
        {{--<img src="{{ url('/img/ewis-logo.png') }}" style="width: 150px;"><br>--}}
        {{--<p>Head Office<br>--}}
        {{--No 142, Yathama Building,<br>--}}
        {{--Galle Road,<br>--}}
        {{--Colombo 03,<br>--}}
        {{--Sri Lanka.<br>--}}
        {{--Phone:117 496000<br>--}}
        {{--Fax: 112 380580</p>--}}
        {{--</td>--}}
        <td>
            <p><strong>Date / Time: </strong> {{ $order->created_at }}</p>
            <p><strong>P.O Reference#: </strong> {{ $order->id }}</p>
            <br>
            <p><strong>Customer Name: </strong>{{ $client_branch->client->name }} </p>
            <br>
            <p><strong>Contact Name: </strong>{{ $order->del_cp }} </p>
        </td>
    </tr>
    <tr>
        <td>
            <strong>Bill To</strong>
            {{--<p>{{ $client_branch->name }}</p>--}}
            {{--<strong>Billing Address</strong>--}}
            <p>{{ $client_branch->address }}</p>
            <p>tel: {{ $client_branch->contact_no }}</p>

        </td>
        <td>
            <strong>Deliver To</strong>
            {{--<p>{{ $order->del_cp }}</p>--}}
            {{--<strong>Delivery Address</strong>--}}
            <p>{{ $client_branch->address }}</p>
            {{--<strong>Special Notes for the delivery</strong>--}}
            <p>{{ $order->del_tp }}</p>
        </td>
    </tr>
    <tr>
        <td>
            <center><h4>Purchase Order Details</h4></center>
            <table width="100%" border="1">
                <tr>
                    <td width="15%" style="background-color: #2a88bd; min-height: 25px; color: #000;"><h5>Product Number</h5></td>
                    <td width="45%" style="background-color: #2a88bd; min-height: 25px; color: #000;"><h5>Description</h5></td>
                    <td width="10%" style="background-color: #2a88bd; min-height: 25px; color: #000;"><h5>Quantity</h5></td>
                    <td width="10%" style="background-color: #2a88bd; min-height: 25px; color: #000;"><h5>Unit Price</h5></td>
                    <td width="10%" style="background-color: #2a88bd; min-height: 25px; color: #000;"><h5>Vat (%)</h5></td>
                    <td width="10%" style="background-color: #2a88bd; min-height: 25px; color: #000;"><h5>Total Price</h5></td>
                </tr>
                @foreach($order->bucket->items as $porder)
                    <tr>
                        <td style="text-align: center">{{ $porder['item'] ['part_no'] }}</td>
                        <td style="text-align: center">{{ $porder['item'] ['name'] }}</td>
                        <td style="text-align: center">{{ $porder['qty'] }}</td>
                        <td style="text-align: right">{{number_format((\App\Client_Product::where([['product_id', $porder['item'] ['id']],['clients_branch_id', $user->c_user->client_branch->id ]])->first()->special_price),'2','.',',')}}</td>
                        <td style="text-align: center">@if($porder['item'] ['vat_apply'])15% @else 0% @endif</td>
                        <td style="text-align: right">{{number_format($porder['price'],'2','.',',') }}</td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="5">Grand Total</td>
                    <td>{{number_format($order->bucket->totalPrice,'2','.',',')}}</td>
                </tr>
            </table>
            <p><strong>Account Manager : </strong> {{ (\App\User::find($client_branch->agent_id)->name) }}</p>
            <p><strong>Special Notes : </strong> {{$order->del_notes}}</p>
        </td>
    </tr>
    <tr>
        <td colspan="2"><hr><img src="{{ url('/img/footer.png') }}" width="100%"></td>
    </tr>
</table>
</body>
</html>