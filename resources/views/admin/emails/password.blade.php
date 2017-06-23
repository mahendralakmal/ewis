
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

</head>
<body style="width: 894px">
{{--<h5>Order Completed</h5>--}}
<h2>Password Rest Request</h2>
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
            Click here to reset your password: <a href="{{ url('password/reset/'.$token) }}">{{$token}}</a>
        </td>
    </tr>
    <tr>
        <td colspan="2"><hr><img src="{{ url('/img/footer.png') }}" width="100%"></td>
    </tr>
</table>
</body>
</html>