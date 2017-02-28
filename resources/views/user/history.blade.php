@extends('theme')

@section('content')
            <!-- Nav tabs -->
            <div class="col-md-12 col-sm-12 col-sx-12 col-lg-12">
                <ul class="nav nav-tabs nav-menu" role="tablist">
                    <li class="active">
                        <a href="#agent" role="tab" data-toggle="tab">
                            <i class="fa fa-male"></i>Purchase History</a>
                    </li>

                </ul>

                <!-- Tab panes -->
                <div class="tab-content white-background">
                    <div class="tab-pane fade active in" id="agent">
                        <div class="container col-md-12 col-sm-12 col-sx-12 col-lg-12">
                            <ul class="list-group-item"></ul>
                            @foreach($orders as $order)
                                @foreach($order->bucket->items as $item)
                                    <span class="badge">{{ $item['price'] }}</span>
                                @endforeach
                                </li>
                                @endforeach

                        </div>
                    </div>
                </div>
            </div>
@stop