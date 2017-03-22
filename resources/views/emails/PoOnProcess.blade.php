<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

</head>
<body>
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
            <p>date: {{ $order->updated_at }}</p>
            <p>PO#: {{ $order->id }}</p>
        </td>
    </tr>
    <tr>
        <td>
            <strong>Contact Person</strong>
            <p>{{ $client->name }}</p>
            <strong>Billing Address</strong>
            <p>{{ $client->address }}</p>
            <p>tel: {{ $client->telephone }}</p>
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
            <h5>Purchase Order Acknowledgement</h5>
            <p>Your order is being Processed. Please contact sales department for further details</p>

        </td>
    </tr>
    <tr>
        <td colspan="2"><hr><img src="{{ url('/img/footer.png') }}" width="100%"></td>
    </tr>
</table>
</body>
</html>