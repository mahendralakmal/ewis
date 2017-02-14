@extends('master')

@section('content')
    <div class="container-fluid profile-background" style="background-color: {{ \Illuminate\Support\Facades\Session::get('BaseColor') }}">
        <div class="container white-background gradiant-background">
            <div class=" col-md-12 profile-head">
                <div class="col-md- col-sm-4 col-xs-12">
                    <img alt="Sampath Bank" src="{{ elixir('img/sampath.jpg') }}" width="209" hight="67" class="img-responsive"/>
                </div>


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

            <!-- Nav tabs -->
            <div class="col-md-12 col-sm-12 col-sx-12 col-lg-12">
                <ul class="nav nav-tabs nav-menu" role="tablist">
                    <li class="active">
                        <a href="#agent" role="tab" data-toggle="tab">
                            <i class="fa fa-male"></i>Products
                        </a>
                    </li>

                </ul>

                <!-- Tab panes -->
                <div class="tab-content white-background">
                    <div class="tab-pane fade active in" id="agent">
                        <div class="container col-md-12 col-sm-12 col-sx-12 col-lg-12">
                            <div class="row">
                                @if($products->count()!= 0)
                                    @foreach ($products as $product)
                                        <div class="col-md-2 col-xs-12 col-sm-3 col-lg-2">
                                            <div class="thumbnail">
                                                <div class="caption text-center">
                                                    <a href="{{ url('shop', [$product->part_no]) }}">
                                                        <img src="{{ asset('img/Products/' . $product->image) }}" alt="product"
                                                             class="img-responsive">
                                                        <p>{{ $product->description }}</p>
                                                        <p> Rs.{{ $product->default_price }}</p>
                                                    </a>
                                                </div> <!-- end caption -->
                                            </div> <!-- end thumbnail -->
                                        </div> <!-- end col-md-3 -->
                                    @endforeach
                                @else
                                    <div class="jumbotron text-center clearfix">
                                        <h2>No item found</h2>
                                        <!-- <h2>Ewis Computers</h2> -->
                                        <!-- <p>An Laravel App that demos the basic functionality of the e-commerce shopping cart.</p> -->
                                        {{--<p> <img src="/img/3.jpg" width="1000" height="400"> </p>--}}
                                        <p>
                                            <a href="{{ URL::previous() }}" class="btn btn-primary btn-lg" target="_blank">Category</a>
                                            <a href="{{ url('brands') }}" class="btn btn-success btn-lg" target="_blank">Brand</a>
                                        </p>
                                    </div> <!-- end jumbotron -->
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop