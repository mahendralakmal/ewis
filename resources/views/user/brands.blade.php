@extends('theme')

@section('content')
    <!-- Nav tabs -->
    <div class="col-md-12 col-sm-12 col-sx-12 col-lg-12">
        <ul class="nav nav-tabs nav-menu" role="tablist">
            <li class="active">
                <a href="#agent" role="tab" data-toggle="tab"> Brands </a>
            </li>

        </ul>

        <!-- Tab panes -->
        {{--{{ $brands }}--}}
        <div class="tab-content white-background">
            <div class="tab-pane fade active in" id="agent">
                <div class="container col-md-12 col-sm-12 col-sx-12 col-lg-12">
                    <div class="row">
                        @foreach($cbranch->cbrands as $brand)
{{--                            {{ $brand }}--}}
                            <div class="col-md-2 col-xs-12 col-sm-3 col-lg-2">
                                <div class="thumbnail">
                                    <div class="caption text-center row">
                                        <a href="{{ url('client-profile/'.$brand->client->client->name.'/'.$brand->brand->title.'/'.$brand->id) }}">
                                            <img src="{{ asset('/' . $brand->brand->image) }}" alt="brand"
                                                 class="img-responsive">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop