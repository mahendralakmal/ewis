@extends('master')

@section('content')
    <div class="container-fluid blue-background">
        <div class="container white-background gradiant-background">
            <div class=" col-md-12 profile-head">
                <div class="col-md- col-sm-4 col-xs-12">
                    <img alt="Commercial Bank" src="{{ elixir('img/commercial.jpg') }}" width="209" hight="67" class="img-responsive"/>
                </div><!--col-md-4 col-sm-4 col-xs-12 close-->


                <div class="col-md-5 col-sm-5 col-xs-12 profile-head">
                    <div class="description">
                        <div class="inner">
                            <h5>Commercial Bank</h5>
                            <ul>
                                <li><span class="glyphicon glyphicon-map-marker"></span> Commercial Bank of Ceylon PLC, Commercial House, No 21 , Sir Razik
                                    Fareed
                                    Mawatha, P.O. Box 856 Colombo 01, Sri Lanka.
                                </li>
                                <li><span class="glyphicon glyphicon-phone"></span><a href="#" title="Phone">+94 11 2
                                        48 60 00</a>
                                </li>
                                <li><span class="glyphicon glyphicon-envelope"></span><a href="#" title="Email">info@combank
                                        .lk</a>
                                </li>

                            </ul>
                        </div>
                    </div>


                </div><!--col-md-8 col-sm-8 col-xs-12 close-->


            </div>

            <!-- Nav tabs -->
            <div class="col-md-12">
                <ul class="nav nav-tabs nav-menu" role="tablist">
                    <li class="active">
                        <a href="#agent" role="tab" data-toggle="tab">
                            <i class="fa fa-male"></i>Agent Details
                        </a>
                    </li>

                </ul>

                <!-- Tab panes -->
                <div class="tab-content white-background">
                    <div class="tab-pane fade active in" id="agent">
                        <div class="container">
                            <div class="col-sm-11" style="float:left;">
                                <br clear="all"/>
                                <img alt="agent" src="https://diasp.eu/assets/user/default.png" width="100"
                                     class="img-responsive"/><!--hve-pro close-->
                                <!--col-sm-12 close-->
                                <br clear="all"/>
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4 class="pro-title"></h4>
                                    </div><!--col-md-12 close-->


                                    <div class="col-md-6">

                                        <div class="table-responsive responsiv-table">
                                            <table class="table bio-table">
                                                <tbody>
                                                <tr>
                                                    <td>Agent Name</td>
                                                    <td>: Saman Perera</td>
                                                </tr>
                                                <tr>
                                                    <td>Position</td>
                                                    <td>: Sales Manager</td>
                                                </tr>
                                                <tr>
                                                    <td>Address</td>
                                                    <td>: 123, Blah Street, Blah blah, Colombo45, Sri Lanka</td>
                                                </tr>


                                                </tbody>
                                            </table>
                                        </div><!--table-responsive close-->
                                    </div><!--col-md-6 close-->

                                    <div class="col-md-6">

                                        <div class="table-responsive responsiv-table">
                                            <table class="table bio-table">
                                                <tbody>
                                                <tr>
                                                    <td>Emai Id</td>
                                                    <td>: saman@gmail.com</td>
                                                </tr>
                                                <tr>
                                                    <td>Phone</td>
                                                    <td>: (+94)112 456 789</td>
                                                </tr>
                                                <tr>
                                                    <td>Mobile</td>
                                                    <td>: (+94)73 4 567890</td>
                                                </tr>

                                                </tbody>
                                            </table>
                                        </div><!--table-responsive close-->
                                    </div><!--col-md-6 close-->

                                </div><!--row close-->
                            </div><!--container close-->
                        </div><!--tab-pane close-->
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop