<!DOCTYPE html>
<!--[if IE 8]>
<html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]>
<html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<head>
    <meta charset="utf-8"/>
    <title>{{ config('app.admin', 'ewis') }}</title>

    <meta http-equiv="cache-control" content="max-age=0"/>
    <meta http-equiv="cache-control" content="no-cache"/>
    <meta http-equiv="expires" content="0"/>
    {{--<meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />--}}
    <meta http-equiv="pragma" content="no-cache"/>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta content="" name="description"/>
    <meta content="" name="author"/>

    <link rel="shortcut icon" href="{{ elixir('img/favicon.ico') }}">
    <link rel="stylesheet" href="{{ elixir('css/admin_app.css') }}"/>
    <link rel="stylesheet" href="{{ asset("assets/css/sb-admin-2.css") }}"/>
    <link rel="stylesheet" href="{{ asset("assets/css/metisMenu.css") }}"/>
    <link rel="stylesheet" href="{{ asset("assets/css/timeline.css") }}"/>
    <link rel="stylesheet" href="{{ asset("assets/css/font-awesome.css") }}"/>
    <link rel="stylesheet" href="{{ asset("assets/css/bootstrap-datepicker.min.css") }}"/>
</head>
<body>
@yield('body')
</body>
</html>