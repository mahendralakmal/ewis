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

        <div class="jumbotron text-center clearfix">
            <!-- <h2>Ewis Computers</h2> -->
            <!-- <p>An Laravel App that demos the basic functionality of the e-commerce shopping cart.</p> -->
            <p> <img src="img/3.jpg" width="1000" height="400"> </p>
            <p>
                <a href="http://andremadarang.com/implementing-a-shopping-cart-in-laravel/" class="btn btn-primary btn-lg" target="_blank">Blog Post</a>
                <a href="https://github.com/drehimself/laravel-shopping-cart-example" class="btn btn-success btn-lg" target="_blank">GitHub Repo</a>
            </p>
        </div> <!-- end jumbotron -->

        <div class="container">
            <div class="row">
                @foreach ($brands as $brand)
                    <div class="col-md-3">
                        <div class="thumbnail">
                            <div class="caption text-center row">
                                <a href="{{ url('brand', [$brand->title,$brand->id]) }}">
                                    <img src="{{ asset('img/Brands/' . $brand->image) }}" alt="brand" class="img-responsive">
                                    <p>{{ $brand->description }}</p>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    {{--<div class="container">--}}
        {{--@foreach($brands as $brand)--}}
            {{--<div class="col-md-3">--}}
                {{--title : {{$brand->title}} <br>--}}
                {{--description : {{$brand->description}} <br><br>--}}
            {{--</div>--}}
        {{--@endforeach--}}
    {{--</div>--}}
@stop