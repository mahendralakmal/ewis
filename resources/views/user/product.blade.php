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
        <div class="tab-pane fade active in" id="agent">
            <div class="tab-content white-background">

                <div class="container">
                    <div class="col-md-11 col-sm-11 col-sx-11 col-lg-11">
                        @if($products->count()!= 0)
                            <table class="table table-bordered">
                                <tr>
                                    <td> Product Number</td>
                                    <td> Image</td>
                                    <td>Product Name</td>
                                    <td>List Price</td>
                                    <td class="col-sm-2 col-lg-2 col-md-2">Quantity</td>
                                    <td></td>

                                </tr>
                                @foreach ($products as $product)

                                    {{--<div class="col-md-2 col-xs-12 col-sm-3 col-lg-2">--}}
                                    {{--<div class="thumbnail">--}}
                                    {{--<div class="caption text-center">--}}
                                    <form action="/client-profile/add-to-bucket" method="POST" class="side-by-side">
                                        {{--                                                <form action="{{ route('add-to-bucket/{id}', ['id' => $product->part_no]) }}" method="GET" class="side-by-side">--}}
                                        {!! csrf_field() !!}
                                        <tr>
                                            <td>
                                                <input type="hidden" id="part_no" name="part_no" value="{{ $product->part_no }}">
                                                <a href="{{ url('client-profile/'.App\User::find(Session::get('User'))->client->id, [$product->part_no]) }}"> {{$product->part_no}}</a>
                                            </td>
                                            <td><img src="{{ asset('/' . $product->image) }}" alt="product"
                                                     class="img-responsive" height="25" width="30"></td>
                                            <td>
                                                <a href="{{ url('client-profile/'.App\User::find(Session::get('User'))->client->id, [$product->part_no]) }}">{{ $product->name }}</a>
                                            </td>
                                            <td><p> Rs.{{ $product->default_price }}</p></td>
                                            <td><input type="number" value="1"  name="Qty" id="Qty"
                                                       class="col-lg-5 col-md-5 col-sm-5 col-xs-5"></td>
                                            <td><input class="btn btn-success btn-sm" type="submit"
                                                       value="Add To Bucket"></td>
                                        </tr>
                                    </form>
                                    {{--</div> <!-- end caption -->--}}
                                    {{--</div> <!-- end thumbnail -->--}}
                                    {{--</div> <!-- end col-md-3 -->--}}
                                @endforeach
                            </table>
                        @else
                            <div class="jumbotron text-center clearfix">
                                <h2>No items found</h2>
                                <!-- <h2>Ewis Computers</h2> -->
                                <!-- <p>An Laravel App that demos the basic functionality of the e-commerce shopping cart.</p> -->
                                {{--<p> <img src="/img/3.jpg" width="1000" height="400"> </p>--}}
                                <p>
                                    <a href="{{ URL::previous() }}" class="btn btn-primary btn-lg" target="_blank">Category</a>
                                    <a href="{{ url('brands') }}" class="btn btn-success btn-lg"
                                       target="_blank">Brand</a>
                                </p>
                            </div> <!-- end jumbotron -->
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop