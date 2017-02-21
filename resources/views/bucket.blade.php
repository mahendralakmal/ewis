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
                                    <table class="table-bordered">
                                        <tr>
                                            <td>Product Number</td>
                                            <td>Product Name</td>
                                            <td>Item Price</td>
                                            <td>Quantity</td>
                                            <td>Edit Bucket</td>
                                        </tr>
                                        @foreach($products as $product)
                                            <tr>
                                            <td><strong>{{ $product['item'] ['part_no'] }}</strong></td>
                                            <td><strong>{{ $product['item'] ['name'] }}</strong></td>
                                            <td><strong>{{ $product['price'] }}</strong></td>
                                            <td><p>{{ $product['qty'] }} </p></td>
                                                <td><div class="btn-group">
                                                    <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">Action <span class="caret"></span> </button>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="#">Reduce </a></li>
                                                    </ul>
                                                </div></td></tr>
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
                                    <a href="{{ url('client-profile/'.App\User::find(\Illuminate\Support\Facades\Session::get('User'))->client->id.'/checkout') }}" type="button" class="btn btn-success"> Checkout </a>
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
