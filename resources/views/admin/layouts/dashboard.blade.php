@extends('admin.layouts.plane')

@section('body')
    @if((\Illuminate\Support\Facades\Session::get('LoggedIn')) && (\Illuminate\Support\Facades\Session::get('Type') === 'Super Admin'))
        <div id="wrapper">

            <!-- Navigation -->
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
                <!-- /.navbar-header -->

                <ul class="nav navbar-top-links navbar-right">

                    <!-- /.dropdown -->
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                            </li>
                            {{--<li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>--}}
                            </li>
                            <li class="divider"></li>
                            <li><a href="{{ url ('login') }}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                    <li><a href="{{ url('/signout') }}">Sign out</a> </li>
                    <!-- /.dropdown -->
                </ul>
                <!-- /.navbar-top-links -->

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            {{--<li class="sidebar-search">--}}
                            {{--<div class="input-group custom-search-form">--}}
                            {{--<input type="text" class="form-control" placeholder="Search...">--}}
                            {{--<span class="input-group-btn">--}}
                            {{--<button class="btn btn-default" type="button">--}}
                            {{--<i class="fa fa-search"></i>--}}
                            {{--</button>--}}
                            {{--</span>--}}
                            {{--</div>--}}
                            {{--<!-- /input-group -->--}}
                            {{--</li>--}}
                            <li {{ (Request::is('*dashbord') ? 'class="active"' : '') }}>
                                <a href="{{ url ('/admin') }}"><!-- <i class="fa fa-home fa-fw"></i> --> Home</a>
                            </li>
                            <li {{ (Request::is('*dashbord') ? 'class="active"' : '') }}>
                                <a href="{{ url ('/admin/brands') }}"><!-- <i class="fa fa-trademark fa-fw"></i> -->
                                    Brands</a>
                            </li>
                            <li {{ (Request::is('*charts') ? 'class="active"' : '') }}>
                                <a href="{{ url ('/admin/categories') }}">
                                    <!-- <i class="fa fa-bar-chart-o fa-fw"></i> --> Categories</a>
                                <!-- /.nav-second-level -->
                            </li>
                            <li {{ (Request::is('*tables') ? 'class="active"' : '') }}>
                                <a href="{{ url ('/admin/products') }}"><!-- <i class="fa fa-table fa-fw"></i> -->
                                    Products</a>
                            </li>
                            {{--<li {{ (Request::is('*forms') ? 'class="active"' : '') }}>--}}
                            {{--<a href="{{ url ('/admin/manage-users') }}"><!-- <i class="fa fa-edit fa-fw"></i> --> Manage Users</a>--}}
                            {{--</li>--}}
                            <li>
                                <a href="#"><!-- <i class="fa fa-wrench fa-fw"></i> --> Manage Users<span
                                            class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li {{ (Request::is('*panels') ? 'class="active"' : '') }}>
                                        <a href="{{ url ('/admin/users/create-users') }}">Add New User</a>
                                    </li>
                                    <li {{ (Request::is('*buttons') ? 'class="active"' : '') }}>
                                        <a href="{{ url ('/admin/users/manage-users' ) }}">User Approvals</a>
                                    </li>
                                    <li {{ (Request::is('*buttons') ? 'class="active"' : '') }}>
                                        <a href="{{ url ('/admin/users/manage-user-designations' ) }}">Designations</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><!-- <i class="fa fa-wrench fa-fw"></i> --> Manage Clients<span
                                            class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li {{ (Request::is('*buttons') ? 'class="active"' : '') }}>
                                        <a href="{{ url ('/admin/manage-clients/create-profile' ) }}">Client Profile</a>
                                    </li>
                                    {{--<li {{ (Request::is('*panels') ? 'class="active"' : '') }}>--}}
                                        {{--<a href="{{ url ('/admin/manage-clients/approval') }}">Client Approval</a>--}}
                                    {{--</li>--}}
                                    <li {{ (Request::is('*panels') ? 'class="active"' : '') }}>
                                        <a href="{{ url ('/admin/manage-clients') }}">Client Users</a>
                                    </li>
                                    {{--<li {{ (Request::is('*buttons') ? 'class="active"' : '') }}>--}}
                                    {{--<a href="{{ url ('/admin/manage-clients' ) }}">Manage Agents</a>--}}
                                    {{--</li>--}}
                                </ul>
                            </li>
                            <li>
                                <a href="#"><!-- <i class="fa fa-wrench fa-fw"></i> --> Manage Purchase Orders<span
                                            class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li {{ (Request::is('*panels') ? 'class="active"' : '') }}>
                                        <a href="{{ url ('#') }}">Pending</a>
                                    </li>
                                    <li {{ (Request::is('*panels') ? 'class="active"' : '') }}>
                                        <a href="{{ url ('#') }}">Partial Completed</a>
                                    </li>
                                    <li {{ (Request::is('*buttons') ? 'class="active"' : '') }}>
                                        <a href="{{ url ('#' ) }}">Completed</a>
                                    </li>
                                    {{--<li {{ (Request::is('*buttons') ? 'class="active"' : '') }}>--}}
                                    {{--<a href="{{ url ('/admin/manage-clients' ) }}">Manage Agents</a>--}}
                                    {{--</li>--}}
                                </ul>
                            </li>
                            <li>
                                <a href="#"><!-- <i class="fa fa-wrench fa-fw"></i> --> Reports<span
                                            class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    {{--<li {{ (Request::is('*panels') ? 'class="active"' : '') }}>--}}
                                        {{--<a href="{{ url ('/admin/manage-clients/approval') }}">Client Approval</a>--}}
                                    {{--</li>--}}
                                    {{--<li {{ (Request::is('*panels') ? 'class="active"' : '') }}>--}}
                                        {{--<a href="{{ url ('/admin/manage-clients') }}">Client Profile</a>--}}
                                    {{--</li>--}}
                                    {{--<li {{ (Request::is('*buttons') ? 'class="active"' : '') }}>--}}
                                        {{--<a href="{{ url ('/admin/manage-product-list' ) }}">Product List</a>--}}
                                    {{--</li>--}}
                                    {{--<li {{ (Request::is('*buttons') ? 'class="active"' : '') }}>--}}
                                    {{--<a href="{{ url ('/admin/manage-clients' ) }}">Manage Agents</a>--}}
                                    {{--</li>--}}
                                </ul>
                            </li>
                        <!--
                        <li>
                            <a href="#"><i class="fa fa-sitemap fa-fw"></i> Multi-Level Dropdown<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#">Second Level Item</a>
                                </li>
                                <li>
                                    <a href="#">Second Level Item</a>
                                </li>
                                <li>
                                    <a href="#">Third Level <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-files-o fa-fw"></i> Sample Pages<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li {{ (Request::is('*blank') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('/admin/blank') }}">Blank Page</a>
                                </li>
                                <li>
                                    <a href="{{ url ('login') }}">Login Page</a>
                                </li>
                            </ul>
                        </li>
                        <li {{ (Request::is('*documentation') ? 'class="active"' : '') }}>
                            <a href="{{ url ('/admin/documentation') }}"><i class="fa fa-file-word-o fa-fw"></i> Documentation</a>
                        </li> -->
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
            <footer>
                <p>Design &amp; Developed by Pro IT Solutions.</p>
            </footer>
        </div>
    @elde
        {{ redirect('/') }}
    @endif
@stop