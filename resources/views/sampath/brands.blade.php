@extends('master')

@section('content')
    <div class="container-fluid profile-background">
        <div class="container white-background gradiant-background">
            <div class=" col-md-12 profile-head">
                <div class="col-md- col-sm-4 col-xs-12">
                    <img alt="Sampath Bank" src="{{ elixir('img/sampath.jpg') }}" width="209" hight="67" class="img-responsive"/>
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


                </div><!--col-md-8 col-sm-8 col-xs-12 close-->


            </div>

            <!-- Nav tabs -->
            <div class="col-md-12 col-sm-12 col-sx-12 col-lg-12">
                <ul class="nav nav-tabs nav-menu" role="tablist">
                    <li class="active">
                        <a href="#agent" role="tab" data-toggle="tab">
                            <i class="fa fa-male"></i>Brands
                        </a>
                    </li>

                </ul>

                <!-- Tab panes -->
                <div class="tab-content white-background">
                    <div class="tab-pane fade active in" id="agent">
                        <div class="container col-md-12 col-sm-12 col-sx-12 col-lg-12">
                            <div class="row">
                                @foreach ($brands as $brand)
                                    <div class="col-md-2 col-xs-12 col-sm-3 col-lg-2">
                                        <div class="thumbnail">
                                            <div class="caption text-center row">
                                                <a href="{{ url('sampath/brands', [$brand->title,$brand->id]) }}">
                                                    <img src="{{ asset('img/Brands/' . $brand->image) }}" alt="brand" class="img-responsive">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop