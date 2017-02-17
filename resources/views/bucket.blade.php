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
                                    <ul class="list-group">
                                        @foreach($products as $product)
                                            <li class="list-group-item">
                                                <span class="badge">{{ $product['qty'] }} </span>
                                                <strong>{{ $product['item'] ['part_no'] }}</strong>
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
