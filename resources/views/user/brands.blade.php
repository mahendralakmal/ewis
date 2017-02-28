@extends('theme')

@section('content')
            <!-- Nav tabs -->
            <div class="col-md-12 col-sm-12 col-sx-12 col-lg-12">
                <ul class="nav nav-tabs nav-menu" role="tablist">
                    <li class="active">
                        <a href="#agent" role="tab" data-toggle="tab">
                            <i class="fa fa-male"></i>Brands
                        </a>
                    </li>

                </ul>

                <!-- Tab panes -->
                <div class="tab-content white-background">
                    <div class="tab-pane fade active in" id="agent">
                        <div class="container col-md-12 col-sm-12 col-sx-12 col-lg-12">
                            <div class="row">
                                @foreach ($brands as $brand)
                                    <div class="col-md-2 col-xs-12 col-sm-3 col-lg-2">
                                        <div class="thumbnail">
                                            <div class="caption text-center row">
                                                <a href="{{ url('client-profile/'.App\User::find(\Illuminate\Support\Facades\Session::get('User'))->clientuser->first()->client->agent_id).'/'.$brand->title.'/'.$brand->id}}">
                                                    <img src="{{ asset('/' . $brand->image) }}" alt="brand" class="img-responsive">
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