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
        @if(count ($errors) > 0)
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <p> {{ $error }}</p>
                @endforeach
            </div>
        @endif
        <form method="post" action="/reset-password" role="form" class="form-horizontal">
            {{ csrf_field() }}
            <div class="user-login">
                <div class="">
                    <div align="middle"><img src="{{ elixir('img/ewis-logo.png') }}"></div>
                    <div align="middle"><h4>Reset Password</h4></div>
                </div>
                <div>&nbsp;
                    <hr>
                </div>
                <div class="form-group row">
                    <div class="col-md-4"><label>User Name</label></div>
                    <div class="col-md-8">
                        <input type="text" class="form-control" value="{{$email->email}}" disabled>
                        <input type="hidden" name="email" id="email" value="{{$email->email}}">
                    </div>
                </div>
                <div>
                    <hr>
                </div>
                <div class="form-group row">
                    <div class="col-md-4"><label>Password</label></div>
                    <div class="col-md-8">
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4"><label>Password</label></div>
                    <div class="col-md-8">
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                    </div>
                </div>
                <div>&nbsp;
                    <hr>
                </div>
                <div align="middle"><button type="submit" class="btn btn-primary">Reset</button></div>
            </div>
        </form>
    </div>
</div>
</body>
</html>
