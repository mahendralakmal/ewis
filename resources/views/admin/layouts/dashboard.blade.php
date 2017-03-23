@extends('admin.layouts.plane')

@section('body')
    @if((\Illuminate\Support\Facades\Session::has('LoggedIn')) && (\Illuminate\Support\Facades\Session::get('LoggedIn')) && (strtolower(\Illuminate\Support\Facades\Session::has('type') !== 'client')))
        <div id="wrapper">
            <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{ url ('/admin') }}"><img
                                src="{{ elixir('img/ewis-logo.png') }}">{{ config('app.admin', 'Laravel') }}</a>
                </div>
                <ul class="nav navbar-top-links navbar-right">
                    <li><a href="{{ url('/admin/manage-clients/pending-purchase-orders') }}">Pending<span
                                    class="badge">{{App\P_Order::where('status', 'P' )->count()}}</span></a></li>
                    <li><a href="{{ url('/admin/manage-clients/pc-purchase-orders') }}">Partial Completed<span
                                    class="badge">{{App\P_Order::where('status', 'PC' )->count()}}</span></a></li>
                    <li><a href="{{ url('/signout') }}">Signout</a></li>
                </ul>
                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">

                        <ul class="nav" id="side-menu">
                            <li {{ (Request::is('*dashbord') ? 'class="active"' : '') }}>
                                <a href="{{ url ('/admin') }}">Home</a>
                            </li>
                            @if((\App\User::find(\Illuminate\Support\Facades\Session::get('User'))->privilege->brand))
                                <li {{ (Request::is('*dashbord') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('/admin/brands') }}">Brands</a>
                                </li>
                            @endif
                            @if((\App\User::find(\Illuminate\Support\Facades\Session::get('User'))->privilege->category))
                                <li {{ (Request::is('*charts') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('/admin/categories') }}">Categories</a>
                                </li>
                            @endif
                            @if((\App\User::find(\Illuminate\Support\Facades\Session::get('User'))->privilege->product))
                                <li {{ (Request::is('*tables') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('/admin/products') }}">Products</a>
                                </li>
                            @endif
                            <li>
                                @if(
                                (\App\User::find(\Illuminate\Support\Facades\Session::get('User'))->privilege->designation) ||
                                (\App\User::find(\Illuminate\Support\Facades\Session::get('User'))->privilege->add_user) ||
                                (\App\User::find(\Illuminate\Support\Facades\Session::get('User'))->privilege->user_approve)
                                )
                                    <a href="#">Manage Users<span class="fa arrow"></span></a>
                                    <ul class="nav nav-second-level">
                                        @if((\App\User::find(\Illuminate\Support\Facades\Session::get('User'))->privilege->designation))
                                            <li {{ (Request::is('*buttons') ? 'class="active"' : '') }}>
                                                <a href="{{ url ('/admin/users/manage-user-designations' ) }}">Designations</a>
                                            </li>
                                        @endif
                                        @if((\App\User::find(\Illuminate\Support\Facades\Session::get('User'))->privilege->add_user))
                                            <li {{ (Request::is('*panels') ? 'class="active"' : '') }}>
                                                <a href="{{ url ('/admin/users/create-users') }}">Add New User</a>
                                            </li>
                                        @endif
                                        @if((\App\User::find(\Illuminate\Support\Facades\Session::get('User'))->privilege->user_approve))
                                            <li {{ (Request::is('*buttons') ? 'class="active"' : '') }}>
                                                <a href="{{ url ('/admin/users/manage-users' ) }}">User Approvals</a>
                                            </li>
                                        @endif
                                    </ul>
                                @endif
                            </li>
                            <li>@if(
                                (\App\User::find(\Illuminate\Support\Facades\Session::get('User'))->privilege->client_prof) ||
                                (\App\User::find(\Illuminate\Support\Facades\Session::get('User'))->privilege->client_users)
                                )
                                    <a href="#">Manage Clients<span
                                                class="fa arrow"></span></a>
                                    <ul class="nav nav-second-level">
                                        @if((\App\User::find(\Illuminate\Support\Facades\Session::get('User'))->privilege->client_prof))
                                            <li {{ (Request::is('*buttons') ? 'class="active"' : '') }}>
                                                <a href="{{ url ('/admin/manage-clients/create-profile' ) }}">Client
                                                    Profile</a>
                                            </li>
                                        @endif
                                        @if((\App\User::find(\Illuminate\Support\Facades\Session::get('User'))->privilege->client_users))
                                            <li {{ (Request::is('*panels') ? 'class="active"' : '') }}>
                                                <a href="{{ url ('/admin/manage-clients') }}">Client Users</a>
                                            </li>
                                        @endif
                                    </ul>
                                @endif
                            </li>
                            <li>@if(
                                (\App\User::find(\Illuminate\Support\Facades\Session::get('User'))->privilege->view_po) ||
                                (\App\User::find(\Illuminate\Support\Facades\Session::get('User'))->privilege->change_po_status)
                                )
                                    <a href="#">Manage Purchase Orders<span
                                                class="fa arrow"></span></a>
                                    <ul class="nav nav-second-level">
                                        @if((\App\User::find(\Illuminate\Support\Facades\Session::get('User'))->privilege->view_po))
                                            <li {{ (Request::is('*panels') ? 'class="active"' : '') }}>
                                                <a href="{{ url ('/admin/manage-clients/view-purchase-orders') }}">View
                                                    Purchase
                                                    Orders</a>
                                            </li>
                                        @endif
                                        @if((\App\User::find(\Illuminate\Support\Facades\Session::get('User'))->privilege->change_po_status))
                                            <li {{ (Request::is('*panels') ? 'class="active"' : '') }}>
                                                <a href="{{ url ('/admin/manage-clients/pending-purchase-orders') }}">Pending
                                                    Purchase Orders</a>
                                            </li>
                                        @endif
                                        @if((\App\User::find(\Illuminate\Support\Facades\Session::get('User'))->privilege->change_po_status))
                                            <li {{ (Request::is('*panels') ? 'class="active"' : '') }}>
                                                <a href="{{ url ('/admin/manage-clients/pc-purchase-orders' ) }}">Partial
                                                    Complete Purchase Orders</a>
                                            </li>
                                        @endif
                                    </ul>
                                @endif
                            </li>
                            <li>
                                @if(
                                (\App\User::find(\Illuminate\Support\Facades\Session::get('User'))->privilege->view_reports)
                                )
                                    <a href="#">Reports<span
                                                class="fa arrow"></span></a>
                                    <ul class="nav nav-second-level">
                                        @if((\App\User::find(\Illuminate\Support\Facades\Session::get('User'))->privilege->view_reports))
                                            <li {{ (Request::is('*panels') ? 'class="active"' : '') }}>
                                                <a href="{{ url ('/admin/manage-clients/completed-purchase-orders' ) }}">Purchase
                                                    Orders by Clients</a>
                                            </li>
                                        @endif
                                        @if((\App\User::find(\Illuminate\Support\Facades\Session::get('User'))->privilege->view_reports))
                                            <li {{ (Request::is('*panels') ? 'class="active"' : '') }}>
                                                <a href="{{ url ('#') }}"></a>
                                            </li>
                                        @endif
                                    </ul>
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">@yield('page_heading')</h1>
                    </div>
                </div>
                <div class="row">
                    @yield('section')

                </div>
            </div>
            <footer id="footer">
                <p>Design &amp; Developed by Pro IT Solutions.</p>
            </footer>
        </div>
    @else
        <script type="text/javascript">
            window.location = "{{url('/')}}";
        </script>
    @endif
@stop