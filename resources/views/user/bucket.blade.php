@extends('theme')

@section('title')
    Ewis Peripherals Bucket
@endsection

@section('content')
    <div class="col-md-12">
        <ul class="nav nav-tabs nav-menu" role="tablist">
            <li class="active">
                <a href="#agent" role="tab" data-toggle="tab">
                    <i class="fa fa-user-secret"></i> Your Bucket
                </a>
            </li>

        </ul>
    <div class="tab-content white-background">
        <div class="tab-pane fade active in" id="agent">
                <div class="col-sm-11" style="float:left;">
                    <br clear="all"/>
                    <div class="container">
                        @if (Session::has('bucket'))
                            <div class="row">
                                <div class="col-lg-6 col-sm-6 col-xs-6 col-md-6 col-md-offset-3 col-lg-offset-3">
                                    <table class="table-bordered col-sm-10 col-lg-10 col-md-10">
                                        <tr>
                                            <td><strong>Product Number</strong></td>
                                            <td><strong>Product Name</strong></td>
                                            <td><strong>Quantity</strong></td>
                                            <td><strong>Price</strong></td>
                                            <td><strong>Edit Bucket</strong></td>
                                        </tr>
                                        @foreach($products as $product)
                                            <tr>
                                            <td><center>{{ $product['item'] ['part_no'] }}</center></td>
                                            <td><center>{{ $product['item'] ['name'] }}</center></td>
                                                <td><center>{{ $product['qty'] }}</center></td>
                                            <td><center>{{ $product['price'] }}</center></td>
                                                <td>
                                                    {{--href="{{ url('client-profile/'.App\User::find(\Illuminate\Support\Facades\Session::get('User'))->clientuser->first()->client->id.'/remove_item') }}"--}}
                                                    <button type="button" onclick="" class="btn btn-primary btn-xs">Remove Item </button>
                                                </td></tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-sm-6 col-xs-6 col-md-6 col-md-offset-3 col-lg-offset-3">
                                    <strong>Total : {{ $totalPrice }}</strong>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-sm-6 col-xs-6 col-md-6 col-md-offset-3 col-lg-offset-3">
                                    <a href="{{ url('client-profile/'.App\User::find(\Illuminate\Support\Facades\Session::get('User'))->clientuser->first()->client->id.'/checkout') }}" type="button" class="btn btn-success"> Checkout </a>
                                </div>
                            </div>

                            @else
                            <div class="row">
                                <div class="col-lg-6 col-sm-6 col-xs-6 col-md-6 col-md-offset-3 col-lg-offset-3">
                                    <h2>No Items in the Bucket! </h2>
                                </div>
                            </div>
                            @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
