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
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <td> Part Number</td>
                                    <td> Product Image</td>
                                    <td> Product Name</td>
                                    <td> Vat Applicalbe</td>
                                    <td> Unit Price (Rs.)</td>
                                    <td class="col-sm-1 col-lg-1 col-md-1">Quantity</td>
                                    <td></td>

                                </tr>
                                </thead>
                                <tbody>
                                <form action="/client-profile/add-to-bucket" method="POST" class="side-by-side">
                                    {!! csrf_field() !!}
                                    @foreach ($products as $product)
                                        @if($product->remove !=1)
                                            <tr>
                                                <td style="text-align: center">
                                                    <input type="hidden" id="id" name="id"
                                                           value="{{ $product->id }}">
                                                    <a href="{{ url('client-profile/'.$product->ccategory->c_brand->client->client->id, [$product->product->part_no]) }}"> {{$product->product->part_no}}</a>
                                                </td>
                                                <td align="middle"><img
                                                            src="{{ asset('/' . $product->product->image) }}"
                                                            alt="product"
                                                            class="img-responsive" height="25" width="30"></td>
                                                <td style="text-align: left">
                                                    <a href="{{ url('client-profile/'.$product->ccategory->c_brand->client->client->id, [$product->product->part_no]) }}">{{ $product->product->name }}</a>
                                                </td>
                                                <td style="text-align: center"> @if($product->product->vat_apply)
                                                        Yes @else No @endif</td>
                                                <td style="text-align: right">
                                                    <p>{{ number_format($product->special_price,2,'.',',') }} </p>
                                                </td>

                                                <td style="text-align: right"><input style="width: 50px" align="right"
                                                                                     type="number" min="1" value="1"
                                                                                     name="Qty" id="Qty"
                                                                                     class="form-controls"></td>
                                                <td><input class="btn btn-success btn-sm" type="submit"
                                                           value="Add To Bucket"></td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </form>
                                </tbody>
                            </table>
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
            $.ajax(
                {
                    type: 'get',
                    url: '/client-profile/search/' + $('#hidCate').val() + '/' + this.value,
                    success: function (response) {
                        var model = $(".laravel_container");
                        model.empty();
                        model.append(response);
                    }
                }
            );
        });
    </script>
@stop