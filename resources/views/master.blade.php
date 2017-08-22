<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>@yield('title', 'EWIS Peripherals')</title>
    <meta http-equiv="cache-control" content="max-age=0" />
    <meta http-equiv="cache-control" content="no-cache" />
    <meta http-equiv="expires" content="0" />
    <meta http-equiv="pragma" content="no-cache" />
    <meta name="description" content="EWIS Peripherals">

    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Store CSRF token for AJAX calls -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Stylesheets -->
    <link rel="stylesheet" type="text/css" href="{{ elixir('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset("assets/stylesheets/styles.css") }}"/>
    <link rel="stylesheet" href="{{ asset("assets/css/bootstrap-datetimepicker.min.css") }}"/>
    <link rel="stylesheet" href="{{ asset("assets/font-awesome/css/font-awesome.min.css") }}"/>

@yield('extra-css')

    <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}">
</head>
<body>
@if((\Illuminate\Support\Facades\Session::has('LoggedIn')) && (\Illuminate\Support\Facades\Session::get('LoggedIn')) && (strtolower(\Illuminate\Support\Facades\Session::get('Type')) == 'client'))
<header>
    <nav class="navbar navbar-default navbar-fixed-top">
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
                    <a class="navbar-brand" href="{{ url('/ewis-home') }}"><img
                                src="{{ elixir('img/ewis-logo.png') }}">{{ config('app.name', 'Ewis Peripherals') }}</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="/">Home</a></li>

                        <li>
                            <a href="{{ (\Illuminate\Support\Facades\Session::has('User')) ? url('client-profile/'.App\User::find(\Illuminate\Support\Facades\Session::get('User'))->c_user->client_branch->client->id.'/bucket') :"" }}">Bucket
                                <span class="badge">{{ \Illuminate\Support\Facades\Session::has('bucket') ? \Illuminate\Support\Facades\Session::get('bucket')->totalQty : "" }}</span>
                            </a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-haspopup="true"
                               aria-expanded="false">{{ (\Illuminate\Support\Facades\Session::has('User')) ? App\User::find(\Illuminate\Support\Facades\Session::get('User'))->c_user->client_branch->client->name:"" }}
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li>
                                    {{--{{Session::get('User')}}--}}
                                    <a href={{ (Session::has('User')) ? url('client-profile/'.App\User::find(Session::get('User'))->c_user->id.'/'):'' }}>Edit Profile</a>
                                </li>
                                {{--<li>--}}
                                    {{--<a href={{ (\Illuminate\Support\Facades\Session::has('User')) ? url('client-profile/'.App\User::find(\Illuminate\Support\Facades\Session::get('User'))->c_user->client_branch->client->id.'/brands'):'' }}>User
                                        Dashboard</a>--}}
                                    {{--<a href={{ url('/') }} >--}}
                                        {{--User Dashboard </a>--}}
                                {{--</li>--}}
                                <li>
                                    <a href="{{ (\Illuminate\Support\Facades\Session::has('User')) ? url('client-profile/'.App\User::find(\Illuminate\Support\Facades\Session::get('User'))->c_user->client_branch->client->id.'/bucket/history'):'' }}">Puchase
                                        History</a></li>
                                {{--<li role="separator" class="divider"></li>--}}
                            </ul>
                        </li>
                        <li><a href="{{ url('/signout') }}">Logout</a></li>
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
        <img src="/img/brands/lexmark.png"> <img src="/img/brands/casio.png"> <img src="/img/brands/ricoh.png">
                <img src="/img/brands/kodak.png"> <img src="/img/brands/konica.png"> <img src="/img/brands/solar.png">
                <img src="/img/brands/turbn.png"> <img src="/img/brands/fujifilm.png"> <img
                        src="/img/brands/riello.png">
    </div>
    <hr>
    <div class="container">
        <div class="container-fluid col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <p class="text-muted">“Copyright © E-WIS Peripherals (Pvt) Ltd.2017, All Right Reserved”</p>
        </div>
    </div>
</footer>
<!-- JavaScript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
@yield('scripts')
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="{{ asset("assets/js/bootstrap-datetimepicker.js") }}"></script>
<script type="text/javascript">
    $(function () {
        $('#datetimepicker').datetimepicker({
            viewMode: 'years',
            format: 'MM/YYYY'
        });
    });
</script>
@yield('extra-js')
@else
    <script type="text/javascript">
        window.location = "{{url('/')}}";
    </script>
@endif
</body>
</html>
