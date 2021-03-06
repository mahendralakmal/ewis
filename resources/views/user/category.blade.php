@extends('theme')

@section('content')

            <!-- Nav tabs -->
    <div class="col-md-12 col-sm-12 col-sx-12 col-lg-12">
        <ul class="nav nav-tabs nav-menu" role="tablist">
            <li class="active">
                <a href="#agent" role="tab" data-toggle="tab"> Categories </a>
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
                                    <div class="caption text-center row"> <!-- $category->c_brand->client->name.'/'. -->
                                        <a href="{{ url('client-profile/'.$category->c_brand->client->client->name.'/'.
                                        $category->c_brand->client->name.'/'.
                                        $category->c_brand->brand->title.'/'.
                                        $category->id) }}">
                                        <img src="{{ asset('/' . $category->category->image) }}" alt="category" class="img-responsive">
                                            <br>
                                            <p>{{ $category->category->title }}</p>
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