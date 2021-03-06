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
                                <div class="col-md-11 col-sm-11 col-sx-11 col-lg-11">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <td><strong>Part Number</strong></td>
                                            <td><strong>Product Name</strong></td>
                                            <td><strong>Quantity</strong></td>
                                            <td><strong>Unit Price</strong></td>
                                            <td><strong>VAT</strong></td>
                                            <td><strong>Total Price (Rs.)</strong></td>
                                            <td><strong>Edit Bucket</strong></td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($products as $product)
                                            <tr>
                                                <td style="text-align: center">
                                                    {{ $product['item'] ['part_no'] }}
                                                </td>
                                                <td style="text-align: center">
                                                    {{ $product['item'] ['name'] }}
                                                </td>
                                                <td style="text-align: center">
                                                    {{ $product['qty'] }}
                                                </td>
                                                <td style="text-align: right">
                                                    {{--{{$product['item'] ['id']}}--}}
                                                    {{number_format($product['unit_price'],'2','.',',')}}
                                                </td>
                                                <td style="text-align: center">
                                                    @if($product['item'] ['vat_apply'])15% @else 0% @endif
                                                </td>
                                                <td style="text-align: right">
                                                    {{ number_format($product['price'],'2','.',',')}}
                                                </td>
                                                {{--<input type="hidden" id="item_id" name="item_id" value="{{ $product['item']['id'] }}">--}}
                                                <td style="text-align: center">
                                                    <a type="button"
                                                       href="{{ url('remove_item/'.$product['item']['part_no']) }}"
                                                       class="btn btn-error btn-sm">Remove Item </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-lg-8 col-sm-8 col-xs-8 col-md-8 col-md-offset-7 col-lg-offset-7">
                                <div class="row">
                                    <strong>Grand Total : Rs. {{ number_format($totalPrice,'2','.',',') }}</strong>

                            </div>
                                <br>
                                <br>
                            <div class="row">
                                {{--{{App\User::find(\Illuminate\Support\Facades\Session::get('User'))->c_user->client_branch->client->id}}--}}
                                <div class="col-lg-6 col-sm-6 col-xs-6 col-md-6 col-md-offset-3 col-lg-offset-3">
                                    <a href="{{ url('client-profile/'.App\User::find(\Illuminate\Support\Facades\Session::get('User'))->c_user->client_branch->client->id.'/checkout') }}"
                                       type="button" class="btn btn-success"> Proceed with Order </a>

                                    </div>
                                </div>
                                @else
                                    <div class="row">
                                        <div class="col-lg-6 col-sm-6 col-xs-6 col-md-6 col-md-offset-3 col-lg-offset-3">
                                            <h2>Your Bucket is Empty.....! </h2>
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
