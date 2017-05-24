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
                    <li> Welcome {{App\User::find(Session::get('User'))->name}} </li>
                    <li>
                        <a href="{{ url('/admin/manage-clients/purchase-orders-pending') }}">Pending
                            <span class="badge pending"></span>
                        </a>
                    </li>
                    <li><a href="{{ url('/admin/manage-clients/purchase-orders-partial-completed') }}">Partial Completed
                            <span class="badge partialComplet"></span></a></li>
                    <li><a href="{{ url('/signout') }}">Signout</a></li>
                </ul>
                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">

                        <ul class="nav" id="side-menu">
                            <li {{ (Request::is('*dashbord') ? 'class="active"' : '') }}>
                                <a href="{{ url ('/admin') }}">Home</a>
                            </li>

                            @if((\App\User::find(Session::get('User'))->privilege->brand))
                                <li {{ (Request::is('*dashbord') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('/admin/brands') }}">Brands</a>
                                </li>
                            @endif
                            @if((\App\User::find(Session::get('User'))->privilege->category))
                                <li {{ (Request::is('*charts') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('/admin/categories') }}">Categories</a>
                                </li>
                            @endif
                            @if((\App\User::find(Session::get('User'))->privilege->product))
                                <li {{ (Request::is('*tables') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('/admin/products') }}">Products</a>
                                </li>
                            @endif
                            <li>
                                @if(
                                (\App\User::find(Session::get('User'))->privilege->designation) ||
                                (\App\User::find(Session::get('User'))->privilege->add_user) ||
                                (\App\User::find(Session::get('User'))->privilege->user_approve)
                                )
                                    <a href="#">Manage Internal Users<span class="fa arrow"></span></a>
                                    <ul class="nav nav-second-level">
                                        @if((\App\User::find(Session::get('User'))->privilege->designation))
                                            <li {{ (Request::is('*buttons') ? 'class="active"' : '') }}>
                                                <a href="{{ url ('/admin/users/manage-user-designations' ) }}">Designations (Add / Edit)</a>
                                            </li>
                                        @endif
                                        @if((\App\User::find(Session::get('User'))->privilege->add_user))
                                            <li {{ (Request::is('*panels') ? 'class="active"' : '') }}>
                                                <a href="{{ url ('/admin/users/create-users') }}">Users (Add / Edit)</a>
                                            </li>
                                        @endif
                                        @if((\App\User::find(Session::get('User'))->privilege->user_approve))
                                            <li {{ (Request::is('*buttons') ? 'class="active"' : '') }}>
                                                <a href="{{ url ('/admin/users/manage-users' ) }}">User Manager (Privileges / Approvals)</a>
                                            </li>
                                        @endif
                                    </ul>
                                @endif
                            </li>
                            <li>@if(
                                (\App\User::find(Session::get('User'))->privilege->client_prof) ||
                                (\App\User::find(Session::get('User'))->privilege->client_users) ||
                                (\App\User::find(Session::get('User'))->privilege->client_branch) ||
                                (\App\User::find(Session::get('User'))->privilege->manage_client)||
                                (\App\User::find(Session::get('User'))->privilege->assign_agent)||
                                (\App\User::find(Session::get('User'))->privilege->asign_brand)||
                                (\App\User::find(Session::get('User'))->privilege->asign_category)
                                )
                                    <a href="#">Manage External Customers<span
                                                class="fa arrow"></span></a>
                                    <ul class="nav nav-second-level">

                                        @if((\App\User::find(Session::get('User'))->privilege->client_prof))
                                            <li {{ (Request::is('*buttons') ? 'class="active"' : '') }}>
                                                <a href="{{ url ('/admin/manage-clients/create-profile' ) }}">Organization (Add / Edit / Approve)
                                                </a>
                                            </li>
                                        @endif
                                        @if((\App\User::find(Session::get('User'))->privilege->client_branch))
                                            <li {{ (Request::is('*buttons') ? 'class="active"' : '') }}>
                                                <a href="{{ url ('/admin/manage-clients/create-branch' ) }}">Branch / Department (Add / Edit)</a>
                                            </li>
                                        @endif
                                        @if((\App\User::find(Session::get('User'))->privilege->client_users))
                                            <li {{ (Request::is('*panels') ? 'class="active"' : '') }}>
                                                <a href="{{ url ('/admin/manage-clients/create-clientuser') }}">Users (Add / Edit / Approve / Profile)</a>
                                            </li>
                                        @endif
                                        @if((\App\User::find(Session::get('User'))->privilege->manage_client))
                                            <li {{ (Request::is('*panels') ? 'class="active"' : '') }}>
                                                <a href="{{ url ('/admin/manage-clients') }}">Client Manager</a>
                                            </li>
                                        @endif
                                    </ul>
                                @endif
                            </li>
                            <li>@if(
                                (\App\User::find(Session::get('User'))->privilege->view_po) ||
                                (\App\User::find(Session::get('User'))->privilege->change_po_status)
                                )
                                    <a href="#">Manage Purchase Orders<span
                                                class="fa arrow"></span></a>
                                    <ul class="nav nav-second-level">
                                        @if((\App\User::find(Session::get('User'))->privilege->view_po))
                                            <li {{ (Request::is('*panels') ? 'class="active"' : '') }}>
                                                <a href="{{ url ('/admin/manage-clients/purchase-orders-view') }}">View All / Update Status</a>
                                            </li>
                                        @endif
                                        @if((\App\User::find(Session::get('User'))->privilege->view_po))
                                            <li {{ (Request::is('*panels') ? 'class="active"' : '') }}>
                                                <a href="{{ url ('/admin/manage-clients/purchase-orders-pending') }}">Pending</a>
                                            </li>
                                        @endif
                                        @if((\App\User::find(Session::get('User'))->privilege->view_po))
                                            <li {{ (Request::is('*panels') ? 'class="active"' : '') }}>
                                                <a href="{{ url ('/admin/manage-clients/purchase-orders-partial-completed' ) }}">Partial
                                                    Complete</a>
                                            </li>
                                        @endif
                                        @if((\App\User::find(Session::get('User'))->privilege->view_po))
                                            <li {{ (Request::is('*panels') ? 'class="active"' : '') }}>
                                                <a href="{{ url ('/admin/manage-clients/purchase-orders-completed' ) }}">Completed</a>
                                            </li>
                                        @endif
                                    </ul>
                                @endif
                            </li>
                            <li>
                                @if(
                                (\App\User::find(Session::get('User'))->privilege->view_reports)
                                )
                                    <a href="#">Reports<span
                                                class="fa arrow"></span></a>
                                    <ul class="nav nav-second-level">
                                        @if((\App\User::find(Session::get('User'))->privilege->view_reports))
                                            <li {{ (Request::is('*panels') ? 'class="active"' : '') }}>
                                                <a href="{{ url ('/admin/reports/completed-purchase-orders' ) }}">Purchase
                                                    Orders by Clients</a>
                                            </li>
                                        @endif
                                        @if((\App\User::find(Session::get('User'))->privilege->view_reports))
                                            <li {{ (Request::is('*panels') ? 'class="active"' : '') }}>
                                                <a href="{{ url ('/admin/reports/client-wise-price-list' ) }}">Price
                                                    List By Customer</a>
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
            <footer id="footer" class="col-md-12">
                <p class="text-muted">Design & Developed by <a href="http://proitsolutions.lk">ProIT Solutions</a></p>
            </footer>
        </div>
    @else
        <script type="text/javascript">
            window.location = "{{url('/')}}";
        </script>
    @endif


    <script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
    <script type="text/javascript" src="{{ elixir('js/bootstrap-datepicker.min.js') }}"></script>
    <script src="http://cdn.jsdelivr.net/jquery.validation/1.15.0/jquery.validate.min.js"></script>
    <script src="http://cdn.jsdelivr.net/jquery.validation/1.15.0/additional-methods.min.js"></script>
    @yield('scripts')
    <script>

        $(window).on("load", function () {
            getPoStattus();
        });

        function getPoStattus(){
            $.ajax(
                    {
                        type: 'get',
                        url: '/admin/getPendingPoCount',
                        success: function (response) {
                            console.log(response);
                            var model = $('.pending');
                            model.text(response);
                        }
                    }
            );
            $.ajax(
                    {
                        type: 'get',
                        url: '/admin/getPCompletePoCount',
                        success: function (response) {
                            console.log(response);
                            var model = $('.partialComplet');
                            model.text(response);
                        }
                    }
            );
        }

        setTimeout(function () {
            if ($('.alert').length > 0) {
                $('.alert').toggle(3000);
                $.ajax({
                    type: 'get',
                    url: '/admin/clean',
                });
            }
        }, 5000)

        //end of purchase order

        $('#sandbox-container .input-daterange').datepicker({format: "dd-mm-yyyy"});



        $("#vat_apply").on('change', function () {
            if (($(this).val() == "on") && ($("#vat").val() == '')) {
                $("#vat").val('15');
            } else {
                $("#vat").val('');
            }
        });

        $("#P_client").on('change', function () {
            $.ajax(
                    {
                        type: 'get',
                        url: '/admin/manage-clients/purchase-orders-partial-completed/' + this.value,
                        success: function (response) {
                            console.log(response);
                            var model = $('.tbody-completed');
                            model.empty();
                            $.each(response, function (index, elem) {
//                        model.append("<option value='" + elem.id + "'>" + elem.part_no + "</option>")
                                model.append("<tr>");
                                model.append("<td>" + elem.id + "</td>");
                                model.append("<td>" + elem.created_at + "</td>");
                                model.append("<td>" + elem.del_cp + "</td>");
                                model.append("<td>" + elem.del_branch + "</td>");
                                model.append("<td>" + elem.del_tp + "</td>");
                                model.append("<td>" + elem.status + "</td>");
                                model.append("</tr>");
                            });
                        }
                    }
            );
        });


        $("#product_id").on('change', function () {
            $.ajax(
                    {
                        type: 'get',
                        url: '/admin/manage-product-list/product/details/' + this.value,
                        success: function (response) {
                            $('#list_price').val(response.default_price);
                            $('#list_price').prop('readonly', true);
                            $('#vat').val(response.vat);
                            $('#vat').prop('readonly', true);
                            var model = $('#description');
                            model.empty();
                            model.append("<div class='col-md-4'><label>Description</label></div>");
                            model.append("<div class='col-md-8'><label class='lightslategrey'>" + response.description + "</label></div>");
                        }
                    }
            );
        });


        $("#category_id").on('change', function () {
            $.ajax(
                    {
                        type: 'get',
                        url: '/admin/manage-product-list/product/' + this.value,
                        success: function (response) {
                            var model = $('#product_id');
                            model.empty();
                            model.append("<option selected>Select Products</option>")
                            $.each(response, function (index, elem) {
                                model.append("<option value='" + elem.id + "'>" + elem.name + "</option>")
                            });
                        }
                    }
            );
        });




        $("#asignProduct").validate({
            rules: {
                brand_id: "required",
                category_id: "required",
                product_id: "required",
                list_price: "required",
                special_price: "required",
            }
        });


        $("#categories").validate({
            rules: {
                title: "required",
                brand_id: "required",
                image: "required"
            }
        });

        $("#brands").validate({
            rules: {
                title: "required",
                image: "required"
            }
        });

        $("#clientProfile").validate({
            rules: {
                name: "required",
                email: {
                    required: true,
                    email: true
                },
                address: {
                    required: true
                },
                telephone: {
                    required: true
                },
                logo: {
                    required: true
                },
                color: {
                    required: true
                },
                cp_name: {
                    required: true
                },
                cp_designation: {
                    required: true
                },
                cp_branch: {
                    required: true
                },
                cp_telephone: {
                    required: true
                },
                cp_email: {
                    required: true
                }
            }
        });

    </script>

    <script src="http://demo.startlaravel.com/sb-admin-laravel/assets/scripts/frontend.js"
            type="text/javascript"></script>

    <script type="text/javascript" src="{{ elixir('js/app.js') }}"></script>
@stop
