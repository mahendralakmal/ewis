<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>@yield('title', 'EWIS Peripherals')</title>
    <meta name="description" content="EWIS Peripherals">

    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Store CSRF token for AJAX calls -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Stylesheets -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> -->
    <link rel="stylesheet" type="text/css" href="{{ elixir('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset("assets/stylesheets/styles.css") }}"/>

@yield('extra-css')

<!-- Favicon and Apple Icons -->
    <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}">
</head>
<body>

<header>
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ elixir('img/ewis-logo.png') }}">{{ config('app.name', 'Ewis Peripherals') }}</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#">About</a></li>

                        {{--{{App\User::find(\Illuminate\Support\Facades\Session::get('User'))->clientuser->first()->client->id}}--}}
                        <li><a href="{{ url('client-profile/'.App\User::find(\Illuminate\Support\Facades\Session::get('User'))->clientuser->first()->client->id.'/bucket') }}>Bucket <span class="badge">{{ \Illuminate\Support\Facades\Session::has('bucket') ? \Illuminate\Support\Facades\Session::get('bucket')->totalQty : '' }}</span> </a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-haspopup="true" aria-expanded="false">{{ App\User::find(\Illuminate\Support\Facades\Session::get('User'))->clientuser->first()->client->name }}<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href={{ url('client-profile/'.App\User::find(\Illuminate\Support\Facades\Session::get('User'))->clientuser->first()->client->id) }}>User Profile</a></li>
                                <li><a href={{ url('client-profile/'.App\User::find(\Illuminate\Support\Facades\Session::get('User'))->clientuser->first()->client->id.'/brands') }}>User Dashboard</a></li>
                                <li><a href="{{ url('#') }}">Puchase History</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="{{ url('/signout') }}">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </div>
    </nav>
</header>
@yield('theme')
@yield('shop')
{{--@yield('content')--}}

<footer>
    <div class="container">
        <div class="container-fluid col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <p><img src="/img/brands/lexmark.png"> <img src="/img/brands/casio.png"> <img src="/img/brands/ricoh.png"> <img src="/img/brands/kodak.png"> <img src="/img/brands/konica.png"> <img src="/img/brands/solar.png"> <img src="/img/brands/turbn.png"> <img src="/img/brands/fujifilm.png"> <img src="/img/brands/riello.png"> </p>
        </div>
    </div>
    <hr>
    <div class="container">
            <div class="container-fluid col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <p class="text-muted">Design & Developed by  <a href="http://proitsolutions.lk">ProIT Solutions</a></p>
            </div>
    </div>
</footer>
<!-- JavaScript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
@yield('extra-js')

</body>
</html>
