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
                    <div class="col-sm-4 form-group">
                        <input type="hidden" id="hidCate" value="{{$category->id}}">
                        <input type="text" id="search" name="search" class="form-control" placeholder="Search Product">
                    </div>
                </div>
                <div class="container">
                    <div class="col-md-11 col-sm-11 col-sx-11 col-lg-11 laravel_container">

                        @if($products->count()!= 0)
                            <div class="row">
                                <div class="col-md-1 text-center td-h" style="height:55px; padding:5px; border: 1px solid #dddddd; background-color: #f0f8ff">Product Image</div>
                                <div class="col-md-1 text-center td-h" style="height:55px; padding:5px; border: 1px solid #dddddd; background-color: #f0f8ff">Part Number</div>
                                <div class="col-md-5 text-center td-h" style="height:55px; padding:5px; border: 1px solid #dddddd; background-color: #f0f8ff">Product Name</div>
                                <div class="col-md-1 text-center td-h" style="height:55px; padding:5px; border: 1px solid #dddddd; background-color: #f0f8ff">Vat Applicalbe</div>
                                <div class="col-md-1 text-center td-h" style="height:55px; padding:5px; border: 1px solid #dddddd; background-color: #f0f8ff">Unit Price (Rs.)</div>
                                <div class="col-md-1 text-center td-h" style="height:55px; padding:5px; border: 1px solid #dddddd; background-color: #f0f8ff">Quantity</div>
                                <div class="col-md-2 td-h" style="height:55px; padding:5px; border: 1px solid #dddddd; background-color: #f0f8ff"></div>
                            </div>
                            @foreach ($products as $product)
                                @if($product->remove !=1)
                                    <form action="/client-profile/add-to-bucket" method="POST" class="side-by-side">
                                        {!! csrf_field() !!}
                                        <div class="row">
                                            <div class="col-md-1 text-center td-b" style="border: 1px solid #dddddd; padding:5px; height:45px;"><input type="hidden" id="id" name="id" value="{{ $product->id }}"><a href="{{ url('client-profile/'.$product->ccategory->c_brand->client->client->id, [$product->product->part_no]) }}"> {{$product->product->part_no}}</a></div>
                                            <div class="col-md-1 text-center td-b" style="border: 1px solid #dddddd; padding:5px; height:45px;"><img src="{{ asset('/' . $product->product->image) }}" alt="product" class="img-responsive" height="25" width="30"></div>
                                            <div class="col-md-5 " style="border: 1px solid #dddddd; padding:5px; height:45px;"><a href="{{ url('client-profile/'.$product->ccategory->c_brand->client->client->id, [$product->product->part_no]) }}">{{ $product->product->name }}</a></div>
                                            <div class="col-md-1 text-center td-b" style="border: 1px solid #dddddd; padding:5px; height:45px;">@if($product->product->vat_apply) Yes @else No @endif</div>
                                            <div class="col-md-1 text-center td-b" style="border: 1px solid #dddddd; padding:5px; height:45px;"><p>{{ number_format($product->special_price,2,'.',',') }} </p></div>
                                            <div class="col-md-1 text-center td-b" style="border: 1px solid #dddddd; padding:5px; height:45px;"><input style="width: 50px" align="right" type="number" min="1" value="1" name="Qty" id="Qty" class="form-controls"></div>
                                            <div class="col-md-2 text-center td-b" style="border: 1px solid #dddddd; padding:5px; height:45px;"><input class="btn btn-success btn-sm" type="submit" value="Add To Bucket"></div>
                                        </div>
                                    </form>
                                @endif
                            @endforeach
                        @else
                            <div class="jumbotron text-center clearfix">
                                <h2>No items found</h2>
                                <p>
                                    <a href="{{ URL::previous() }}" class="btn btn-primary btn-lg" target="_blank">Category</a>
                                    <a href="{{ (\Illuminate\Support\Facades\Session::has('User')) ? url('client-profile/'.App\User::find(\Illuminate\Support\Facades\Session::get('User'))->c_user->client_branch->client->id.'/brands'):'' }}"
                                       class="btn btn-success btn-lg">Brand</a>
                                </p>
                            </div>
                        @endif



                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('scripts')
    <script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
    <script>
        $("#search").on('keyup change', function () {
            var path = window.location.pathname;
            if(this.value != '') {
                $.ajax(
                    {
                        type: 'get',
                        url: '/client-profile/search/' + $('#hidCate').val() + '/' + this.value,
                        success: function (response) {
                            $(".laravel_container").html(response);
                        }
                    }
                );
            } else {
                window.location.replace(path);
            }
        });
    </script>
@stop