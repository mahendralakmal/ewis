<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

</head>
<body style="width: 894px">
{{--<h5>Order Completed</h5>--}}
<h2>Your password has been successfully reset</h2>
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
    </tr>
    <tr>
        <td>
            <p>Dear {{$user->email}}</p>
            <h5>Your password has been successfully reset</h5>
        </td>
    </tr>
    <tr>
        <td colspan="2"><hr><img src="{{ url('/img/footer.png') }}" width="100%"></td>
    </tr>
</table>
</body>
</html>