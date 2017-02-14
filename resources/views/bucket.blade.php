@extends('master')

@section('title')
    Ewis Peripherals Bucket
@endsection

@section('content')

    <div class="container">
        <p><a href="{{ url('shop') }}">Home</a> / Bucket</p>
        <h1>Your Bucket</h1>

        @if (Session::has('bucket'))
            <div class="row">
                <div class="col-lg-6 col-sm-6 col-xs-6 col-md-6 col-md-offset-3 col-lg-offset-3">
                    <ul class="list-group">
                        @foreach($products as $product)
                            <li class="list-group-item">
                                <span class="badge">{{ $product['qty'] }} </span>
                                <strong>{{ $product['item'] ['title'] }}</strong>
                                <span class="lable lable-succsess">{{ $product['price'] }}</span>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">Action <span class="caret"></span> </button>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Reduce </a></li>
                                    </ul>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>



            <div class="row">
                <div class="col-lg-6 col-sm-6 col-xs-6 col-md-6 col-md-offset-3 col-lg-offset-3">
                    <strong>Total : {{ $totalPrice }}</strong>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-sm-6 col-xs-6 col-md-6 col-md-offset-3 col-lg-offset-3">
                    <button type="button" class="btn btn-success"> Checkout </button>
                </div>
            </div>

            @else
            <div class="row">
                <div class="col-lg-6 col-sm-6 col-xs-6 col-md-6 col-md-offset-3 col-lg-offset-3">
                    <h2>No Items in the Bucket! </h2>
                </div>
            </div>
    </div>
@endsection
