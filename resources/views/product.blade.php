@extends('master')

@section('content')

    <div class="container">
        <p><a href="{{ url('/shop') }}">Shop</a> / {{ $product->part_no }}</p>
        <h1>{{ $product->part_no }}</h1>

        <hr>

        <div class="row">
            <div class="col-md-4">
                <img src="{{ asset('img/Products/' . $product->image) }}" alt="product" class="img-responsive">
            </div>

            <div class="col-md-8">
                <h3>Rs.{{ $product->default_price }}</h3>
                <form action="{{ route('product.AddToBucket', ['id' =>$product->id])}}" method="GET" class="side-by-side">
                    {{--{!! csrf_field() !!}--}}
                    <input type="hidden" name="id" value="{{ $product->part_no }}">
                    <input type="hidden" name="price" value="{{ $product->default_price }}">
                    <input type="submit" class="btn btn-success btn-lg" value="Add to Bucket">
                </form>


                <br><br>

                {{ $product->description }}
            </div> <!-- end col-md-8 -->
        </div> <!-- end row -->

        <div class="spacer"></div>

        <div class="row">
            <h3>You may also like...</h3>

            @foreach ($interested as $product)
                <div class="col-md-3">
                    <div class="thumbnail">
                        <div class="caption text-center">
                            <a href="{{ url('shop', [$product->part_no]) }}"><img src="{{ asset('img/Products/' . $product->image) }}" alt="product" class="img-responsive"></a>
                            <a href="{{ url('shop', [$product->part_no]) }}"><h3>{{ $product->description }}</h3>
                            <p>{{ $product->price }}</p>
                            </a>
                        </div> <!-- end caption -->

                    </div> <!-- end thumbnail -->
                </div> <!-- end col-md-3 -->
            @endforeach

        </div> <!-- end row -->

        <div class="spacer"></div>


    </div> <!-- end container -->

@endsection
