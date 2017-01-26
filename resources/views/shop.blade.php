@extends('master')

@section('content')

    <div class="container">

        @if (session()->has('success_message'))
            <div class="alert alert-success">
                {{ session()->get('success_message') }}
            </div>
        @endif

        @if (session()->has('error_message'))
            <div class="alert alert-danger">
                {{ session()->get('error_message') }}
            </div>
        @endif

        <div class="header">
            <h2> Products </h2>
        </div>
        {{--<div class="jumbotron text-center clearfix">--}}
        {{--<!-- <h2>Ewis Computers</h2> -->--}}
        {{--<!-- <p>An Laravel App that demos the basic functionality of the e-commerce shopping cart.</p> -->--}}
        {{--<p> <img src="/img/3.jpg" width="1000" height="400"> </p>--}}
        {{--<p>--}}
        {{--<a href="http://andremadarang.com/implementing-a-shopping-cart-in-laravel/" class="btn btn-primary btn-lg" target="_blank">Blog Post</a>--}}
        {{--<a href="https://github.com/drehimself/laravel-shopping-cart-example" class="btn btn-success btn-lg" target="_blank">GitHub Repo</a>--}}
        {{--</p>--}}
        {{--</div> <!-- end jumbotron -->--}}
        @if($products->count()!= 0)
            @foreach ($products as $product)
                <div class="col-md-3">
                    <div class="thumbnail">
                        <div class="caption text-center">
                            <a href="{{ url('shop', [$product->part_no]) }}">
                                <img src="{{ asset('img/Products/' . $product->image) }}" alt="product"
                                     class="img-responsive">
                                <p>{{ $product->description }}</p>
                                <p> Rs.{{ $product->default_price }}.00</p>
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

    </div> <!-- end container -->

@endsection