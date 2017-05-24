@extends('master')

@section('theme')
    <div class="container-fluid profile-background"
         style="background-color: {{ \Illuminate\Support\Facades\Session::get('BaseColor') }}">
        <div class="container white-background gradiant-background">
            @if((\Illuminate\Support\Facades\Session::has('User')) && (App\User::find(\Illuminate\Support\Facades\Session::get('User'))->c_user->client_branch->agent_id != null))
                <div class=" col-md-12 profile-head">
                    <div class="col-md- col-sm-4 col-xs-12">
                        <img alt="{{ App\User::find(\Illuminate\Support\Facades\Session::get('User'))->c_user->client_branch->client->name }}"
                             src="{{ elixir(App\User::find(\Illuminate\Support\Facades\Session::get('User'))->c_user->client_branch->client->logo)}}"
                             width="209" hight="67" class="img-responsive"/>
                    </div>

                    <div class="col-md-6 col-sm-8 col-xs-12 profile-head pull-right">
                        <div class="description">
                            <div class="inner">
                                <h3>Customer Account Manager Details</h3>
                                <ul>
                                    <li><span class="fa fa-user-circle-o"></span>&nbsp;&nbsp;{{ App\User::find(App\User::find(\Illuminate\Support\Facades\Session::get('User'))->c_user->client_branch->agent_id)->name }}</li>
                                    <li><span class="fa fa-university"></span> EWIS Peripherals (Pvt) Ltd</li>
                                    <li><span class="fa fa-map-marker"></span>&nbsp;&nbsp;&nbsp;No.142, Yathama Building,
                                        Galle Road,
                                        Colombo 03,
                                        Sri Lanka.
                                    </li>
                                    <li><span class="fa fa-phone-square"></span>&nbsp;&nbsp;<a href="#" title="Phone">+94 11 749 6000</a>
                                    </li>
                                    <li><span class="fa fa-envelope"></span><a href="#" title="Email">&nbsp;&nbsp;{{ App\User::find(App\User::find(\Illuminate\Support\Facades\Session::get('User'))->c_user->client_branch->agent_id)->email }}</a>
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