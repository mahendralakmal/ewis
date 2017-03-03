@extends('theme')

@section('content')

            <!-- Nav tabs -->
    <div class="col-md-12 col-sm-12 col-sx-12 col-lg-12">
        <ul class="nav nav-tabs nav-menu" role="tablist">
            <li class="active">
                <a href="#agent" role="tab" data-toggle="tab">
                    <i class="fa fa-male"></i>Categories
                </a>
            </li>

        </ul>

        <!-- Tab panes -->
        <div class="tab-content white-background">
            <div class="tab-pane fade active in" id="agent">
                <div class="container col-md-12 col-sm-12 col-sx-12 col-lg-12">
                    <div class="row">
                        @foreach ($categories as $category)
                            <div class="col-md-2 col-xs-12 col-sm-3 col-lg-2">
                                <div class="thumbnail">
                                    <div class="caption text-center row">
                                        <a href="{{ url('client-profile/'.App\User::find(\Illuminate\Support\Facades\Session::get('User'))->clientuser->first()->client->id.'/'.\App\Category::find($category->category_id)->title.'/'.\App\Category::find($category->category_id)->id) }}">
                                            <img src="{{ asset('/' . \App\Category::find($category->category_id)->image) }}" alt="brand"
                                                 class="img-responsive">
                                            <br>
                                            <p>{{ \App\Category::find($category->category_id)->description }}</p>

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