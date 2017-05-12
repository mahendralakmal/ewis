<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

</head>

<body style="width: 894px">
<table width="100%" border="0">
    <tr>
        <td>
            <img src="{{ url('/img/ewis-logo.png') }}" style="width: 150px;"><br>
            <p>Head Office<br>
                No 142, Yathama Building,<br>
                Galle Road,<br>
                Colombo 03.<br>
                Phone:117 496000<br>
                Fax: 112 380580</p>
        </td>
        <td>
            <h2>Purchase Order</h2>
            <p>date: {{ $order->created_at }}</p>
            <p>PO#: {{ $order->id }}</p>
        </td>
    </tr>
    <tr>
        <td>
            <strong>Contact Person</strong>
            <p>{{ $client_branch->name }}</p>
            <strong>Billing Address</strong>
            <p>{{ $client_branch->address }}</p>
            <p>tel: {{ $client_branch->contact_no }}</p>
            <strong>Special Notes</strong>
            <p>{{ $order->cp_notes }}</p>
        </td>
        <td>
            <strong>Contact Person</strong>
            <p>{{ $order->del_cp }}</p>
            <strong>Delivery Address</strong>
            <p>{{ $order->del_branch }}</p>
            <strong>Special Notes for the delivery</strong>
            <p>{{ $order->del_notes }}</p>
        </td>
    </tr>
    <tr>
        <td clospan="2">
            <h5>Purchas Details</h5>
            <table width="100%" border="0">
                <tr>
                    <td width="15%" style="background-color: #2a88bd; min-height: 25px; color: #000;"><h5>Product Number</h5></td>
                    <td width="65%" style="background-color: #2a88bd; min-height: 25px; color: #000;"><h5>Product Name</h5></td>
                    <td width="10%" style="background-color: #2a88bd; min-height: 25px; color: #000;"><h5>Quantity</h5></td>
                    <td width="10%" style="background-color: #2a88bd; min-height: 25px; color: #000;"><h5>Price</h5></td>
                </tr>
                @foreach($order->bucket->items as $porder)
                    <tr>
                        <td>{{ $porder['item'] ['part_no'] }}</td>
                        <td>{{ $porder['item'] ['name'] }}</td>
                        <td>{{ $porder['qty'] }}</td>
                        <td>{{ $porder['price'] }}</td>
                    </tr>
                @endforeach
            </table>
        </td>
    </tr>

    <tr>
        <td colspan="2"><hr><img src="{{ url('/img/footer.png') }}" width="100%"></td>
    </tr>
</table>
</body>
</html>