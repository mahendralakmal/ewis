<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'EWIS Peripherals')</title>


    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">


    <link rel="stylesheet" type="text/css" href="{{ elixir('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset("assets/stylesheets/styles.css") }}"/>
    <!-- Styles -->
</head>
<body>
<div class="container welcome">
    <div class="col-md-6 col-md-offset-3">
        <div class="">
            <div class="col-md-5"><h4>Reset Password</h4></div>
            <div class="col-md-7"><img src="{{ elixir('img/ewis-logo.png') }}"></div>
        </div>
        <div>
            <H4>Your password reset request has been sent Successfully</H4>
            <p>You will receive an e-mail to reset your password. Once you've change / have reset your
                password click here to <a href="/">Sign In.</a></p>
        </div>
    </div>
</div>
</body>
</html>
