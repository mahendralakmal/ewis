<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">


    <!-- Stylesheets -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> -->
    <link rel="stylesheet" type="text/css" href="{{ elixir('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset("assets/stylesheets/styles.css") }}"/>
    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
<div class="container welcome">
    <div class="col-md-5 col-md-offset-4">
        <form method="get" action="sampath/brands">
            <div class="user-login">
                <div class="">
                    <div class="col-md-5"><h4>User Login</h4></div>
                    <div class="col-md-7"><img src="{{ elixir('img/ewis-logo.png') }}"></div>
                </div>
                <div>&nbsp;
                    <hr>
                </div>
                <div class="form-group row">
                    <div class="col-md-5"><label>Username</label></div>
                    <div class="col-md-7"><input type="text" name="username" id="username" class="form-control"></div>
                </div>
                <div class="form-group row">
                    <div class="col-md-5"><label>Password</label></div>
                    <div class="col-md-7"><input type="password" name="password" id="password" class="form-control">
                    </div>
                </div>
                <div>&nbsp;
                    <hr>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>
