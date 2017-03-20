@extends('master')

@section('theme')
    <div class="container-fluid profile-background"
         style="background-color: {{ \Illuminate\Support\Facades\Session::get('BaseColor') }}">
        <div class="container white-background gradiant-background">
            @if((\Illuminate\Support\Facades\Session::has('User')) && (App\User::find(\Illuminate\Support\Facades\Session::get('User'))->clientuser->first()->client->agent_id != null))
                <div class=" col-md-12 profile-head">
                    <div class="col-md- col-sm-4 col-xs-12">
                        <img alt="{{ App\User::find(\Illuminate\Support\Facades\Session::get('User'))->clientuser->first()->client->name }}"
                             src="{{ elixir(App\User::find(\Illuminate\Support\Facades\Session::get('User'))->clientuser->first()->client->logo)}}"
                             width="209" hight="67" class="img-responsive"/>
                    </div>

                    <div class="col-md-5 col-sm-8 col-xs-12 profile-head pull-right">
                        <div class="description">
                            <div class="inner">
                                <h3>{{ App\User::find(App\User::find(\Illuminate\Support\Facades\Session::get('User'))->clientuser->first()->client->agent_id)->name }}</h3>
                                <h5>Sales Agent</h5>
                                <ul>
                                    <li><span class="glyphicon glyphicon-user"></span> EWIS Peripherals </li>
                                    <li><span class="glyphicon glyphicon-map-marker"></span> No.123, Blah Street, Blah
                                        blah,
                                        Colombo45, Sri Lanka
                                    </li>
                                    <li><span class="glyphicon glyphicon-phone"></span><a href="#" title="Phone">+94 11
                                            230
                                            3050</a>
                                    </li>
                                    <li><span class="glyphicon glyphicon-envelope"></span><a href="#"
                                                                                             title="Email">{{ App\User::find(App\User::find(\Illuminate\Support\Facades\Session::get('User'))->clientuser->first()->client->agent_id)->email }}</a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                @yield('content')
            @else
                <div class="col-md-offset-4">
                    <div style="min-height: 300px; margin-top: 200px">
                        <h2> You Have Not Assign a Agent yet </h2>

                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection