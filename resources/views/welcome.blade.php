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
    <div class="col-md-5 col-md-offset-4">
        @if(count ($errors) > 0)
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                <p> {{ $error }}</p>
                @endforeach
            </div>
        @endif
        <form method="post" action="/signin" role="form" class="form-horizontal">
            {{ csrf_field() }}
            <div class="user-login">
                <div class="">
                    <div class="col-md-5"><h4>User Login</h4></div>
                    <div class="col-md-7"><img src="{{ elixir('img/ewis-logo.png') }}"></div>
                </div>
                <div>&nbsp;
                    <hr>
                </div>
                <div class="form-group row">
                    <div class="col-md-4"><label>Username</label></div>
                    <div class="col-md-8"><input type="text" name="email" id="email" class="form-control"></div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4"><label>Password</label></div>
                    <div class="col-md-8"><input type="password" name="password" id="password" class="form-control">
                    </div>
                </div>
                @if(!$error == '')
                <div class="alert alert-danger">
                    <label>{{ $error }}</label>
                </div>
                @endif
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
