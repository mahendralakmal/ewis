@extends('theme')
@section('content')
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
                                                    <a href="{{ url('client-profile/'.App\User::find(Session::get('User'))->client->id, [$product->part_no]) }}">
                                                        <img src="{{ asset('/' . $product->image) }}" alt="product"
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
@stop