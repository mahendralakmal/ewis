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
                        @foreach ($brands as $brand)
                            <div class="col-md-2 col-xs-12 col-sm-3 col-lg-2">
                                <div class="thumbnail">
                                    <div class="caption text-center row">
                                        <a href="{{ url('client-profile/'.App\User::find(\Illuminate\Support\Facades\Session::get('User'))->c_user->client_branch->id.'/'.\App\Brand::find($brand->brand_id)->title.'/'.\App\Brand::find($brand->brand_id)->id) }}">
                                            <img src="{{ asset('/' . \App\Brand::find($brand->brand_id)->image) }}" alt="brand"
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