@extends('master')

@section('theme')
    <div class="container-fluid profile-background" style="background-color: {{ \Illuminate\Support\Facades\Session::get('BaseColor') }}">
        <div class="container white-background gradiant-background">
            <div class=" col-md-12 profile-head">
                <div class="col-md- col-sm-4 col-xs-12">
                    <img alt="{{ App\User::find(\Illuminate\Support\Facades\Session::get('User'))->client->name }}" src="{{ elixir( App\User::find(\Illuminate\Support\Facades\Session::get('User'))->client->logo) }}" width="209" hight="67" class="img-responsive"/>
                </div><!--col-md-4 col-sm-4 col-xs-12 close-->


                <div class="col-md-5 col-sm-8 col-xs-12 profile-head">
                    <div class="description">
                        <div class="inner">
                            <h3>Saman Perera</h3>
                            <h5>Sales Agent</h5>
                            <ul>
                                <li><span class="glyphicon glyphicon-user"></span> Ewis Peripherals </li>
                                <li><span class="glyphicon glyphicon-map-marker"></span> No.123, Blah Street, Blah blah, Colombo45, Sri Lanka
                                </li>
                                <li><span class="glyphicon glyphicon-phone"></span><a href="#" title="Phone">+94 11 2
                                        30 30
                                        50</a>
                                </li>
                                <li><span class="glyphicon glyphicon-envelope"></span><a href="#" title="Email">saman.perera@ewis.lk</a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            @yield('content')
        </div>
    </div>
@endsection