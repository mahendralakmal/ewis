@extends('theme')
@section('content')
    <!-- Nav tabs -->
    <div class="col-md-12 col-sm-12 col-sx-12 col-lg-12">
        <ul class="nav nav-tabs nav-menu" role="tablist">
            <li class="active">
                <a href="#agent" role="tab" data-toggle="tab"> Products </a>
            </li>

        </ul>


        <!-- Tab panes -->
        <div class="tab-pane fade active in" id="agent">
            <div class="tab-content white-background">

                <div class="container">
                    <div class="col-md-11 col-sm-11 col-sx-11 col-lg-11">

                        {{--@if($products->count()!= 0)--}}
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


                                    <form action="/client-profile/add-to-bucket" method="POST" class="side-by-side">
                                        {{--                                                <form action="{{ route('add-to-bucket/{id}', ['id' => $product->part_no]) }}" method="GET" class="side-by-side">--}}
                                        {!! csrf_field() !!}
                                        <tr>
                                            <td>
                                                <input type="hidden" id="part_no" name="part_no"
                                                       value="{{ $product->product->part_no }}">
                                                <a href="{{ url('client-profile/'.$product->ccategory->c_brand->client->client->id, [$product->part_no]) }}"> {{$product->part_no}}</a>
                                            </td>
                                            <td><img src="{{ asset('/' . $product->image) }}" alt="product"
                                                     class="img-responsive" height="25" width="30"></td>
                                            <td>
                                                <a href="{{ url('client-profile/'.$product->ccategory->c_brand->client->client->id, [$product->name]) }}">{{ $product->name }}</a>
                                            </td>
                                            <td><p> Rs.{{ $product->default_price }}</p></td>
                                            <td><input type="number" value="1" name="Qty" id="Qty"
                                                       class="col-lg-5 col-md-5 col-sm-5 col-xs-5"></td>
                                            <td><input class="btn btn-success btn-sm" type="submit"
                                                       value="Add To Bucket"></td>
                                        </tr>
                                    </form>

                                @endforeach
                            </table>
                        {{--@else--}}
                            {{--<div class="jumbotron text-center clearfix">--}}
                                {{--<h2>No items found</h2>--}}
                                {{--<p>--}}
                                    {{--<a href="{{ URL::previous() }}" class="btn btn-primary btn-lg" target="_blank">Category</a>--}}
                                    {{--<a href="javascript:history.back()" class="btn btn-primary btn-lg" target="_blank">Category</a>--}}
                                    {{--<a href="{{ (\Illuminate\Support\Facades\Session::has('User')) ? url('client-profile/'.App\User::find(\Illuminate\Support\Facades\Session::get('User'))->clientuser->first()->client->id.'/brands'):'' }}" class="btn btn-success btn-lg">Brand</a>--}}
                                {{--</p>--}}
                            {{--</div> <!-- end jumbotron -->--}}
                        {{--@endif--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop